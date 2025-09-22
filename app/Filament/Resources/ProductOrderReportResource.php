<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductOrderReportResource\Pages;
use App\Filament\Resources\ProductOrderReportResource\RelationManagers;
use App\Mail\OrderCompletedClientNotification;
use App\Mail\OrderCancelledClientNotification;
use App\Models\Order;
use App\Models\ProductOrder;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Mail;
use pxlrbt\FilamentExcel\Actions\Tables\ExportAction;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;
use Filament\Notifications\Notification;




class ProductOrderReportResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationLabel = 'Commandes de produits';
    protected static ?string $label = 'Commandes de produits';
    protected static ?string $navigationGroup = 'Commandes & Inscriptions';
    protected static ?int $navigationSort = 1;


    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Forms\Components\Select::make('order_id')
                    ->relationship('order', 'id') // asume que 'name' es visible
                    ->disabled()
                    ->label('ID de la commande'),
                Forms\Components\Select::make('product_id')
                    ->relationship('product', 'name') // asume que 'name' es visible
                    ->disabled()
                    ->label('Produit'),
                Forms\Components\TextInput::make('quantity')
                    ->numeric()
                    ->required()
                    ->label('Quantité'),
                Forms\Components\TextInput::make('choix')
                    ->required()
                    ->label('Choix sélectionné'),
                Forms\Components\TextInput::make('price')
                    ->numeric()
                    ->required()
                    ->label('Prix unitaire')
                    ->prefix('€'),
                Forms\Components\TextInput::make('order.total')
                    ->numeric()
                    ->required()
                    ->label('Total de la commande')
                    ->prefix('€'),



                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->query(
                Order::query()
                    ->with(['user', 'productOrders.product'])
                    ->orderBy('created_at', 'desc')
            )
            ->columns([
                TextColumn::make('id')->label('N° de commande'),
                TextColumn::make('created_at')->label('Date')->dateTime('d/m/Y H:i'),
                TextColumn::make('user.name')
                    ->label('Client')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('delivery')->label('Méthode de livraison'),
                TextColumn::make('productOrders')
                    ->label('Produits')
                    ->getStateUsing(function ($record) {
                        return $record->productOrders->map(function ($po) {
                            $name = $po->product->name ?? '—';
                            $quantity = $po->quantity;
                            return "{$name} ×{$quantity}";
                        })->implode(', ');
                    }),
                TextColumn::make('total')->label('Total de la commande')->money('eur'),
                TextColumn::make('order_status')
                    ->label('Statut')
                    ->badge()
                    ->color(fn ($state) => match($state) {
                        'attente' => 'warning',
                        'complétée' => 'success',
                        'annulée' => 'danger',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn ($state) => match($state) {
                        'attente' => 'En attente',
                        'complétée' => 'Complétée',
                        'annulée' => 'Annulée',
                        default => ucfirst($state),
                    }),
                TextColumn::make('user.address')->label('Adresse')->wrap(),
                TextColumn::make('user.ville')->label('Ville'),
                TextColumn::make('user.postal_code')->label('Code postal'),
                TextColumn::make('user.province')->label('Province'),
                TextColumn::make('user.region')->label('Région'),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                SelectFilter::make('order_status')
                    ->label('Statut de la commande')
                    ->options([
                        'attente' => 'En attente',
                        'complétée' => 'Complétée',
                        'annulée' => 'Annulée',
                    ])
                    ->searchable(),

                SelectFilter::make('delivery')
                    ->label('Méthode de livraison')
                    ->options([
                        'livraison' => 'Livraison',
                        'retrait' => 'Retrait',
                    ])
                    ->searchable(),

                Filter::make('created_at')
                    ->label('Date de la commande')
                    ->form([
                        Forms\Components\DatePicker::make('from')->label('De'),
                        Forms\Components\DatePicker::make('until')->label('À'),
                    ])
                    ->query(function (Builder $query, array $data) {
                        return $query
                            ->when($data['from'], fn ($q, $date) => $q->whereDate('created_at', '>=', $date))
                            ->when($data['until'], fn ($q, $date) => $q->whereDate('created_at', '<=', $date));
                    }),
            ])
            ->actions([
                Action::make('voir_details')
                    ->label('Voir détails')
                    ->icon('heroicon-o-eye')
                    ->modalHeading('Détails de la commande')
                    ->modalSubheading(fn ($record) => 'Commande N° ' . $record->id)
                    ->modalContent(fn ($record) => view('filament.components.order-details', ['order' => $record])),

                Action::make('changer_statut')
                    ->label('Changer le statut')
                    ->icon('heroicon-o-pencil-square')
                    ->form([
                        \Filament\Forms\Components\Select::make('order_status')
                            ->label('Nouveau statut')
                            ->options([
                                'attente' => 'En attente',
                                'complétée' => 'Complétée',
                                'annulée' => 'Annulée',
                            ])
                            ->required()
                    ])
                    ->action(function ($record, array $data) {
                        $record->update([
                            'order_status' => $data['order_status'],
                        ]);

                        // Traducción del statut
                        $statusLabel = match($data['order_status']) {
                            'attente' => 'En attente',
                            'complétée' => 'Complétée',
                            'annulée' => 'Annulée',
                            default => ucfirst($data['order_status']),
                        };

                        $mailSent = false;

                        if ($data['order_status'] === 'complétée') {
                            if ($record->delivery === 'livraison' || $record->delivery === 'retrait') {
                                Mail::to($record->user->email)->send(new OrderCompletedClientNotification($record));
                                $mailSent = true;
                            }
                        } elseif ($data['order_status'] === 'annulée') {
                            Mail::to($record->user->email)->send(new OrderCancelledClientNotification($record));
                            $mailSent = true;
                        }

                        Notification::make()
                            ->title('Commande mise à jour')
                            ->body($mailSent
                                ? "Le statut est passé à « {$statusLabel} » et un email a été envoyé au client."
                                : "Le statut est passé à « {$statusLabel} ».")
                            ->success()
                            ->icon('heroicon-o-check-circle')
                            ->iconColor('success')
                            ->send();
                    })
                    ->modalHeading('Modifier le statut')
                    ->modalSubmitActionLabel('Enregistrer')
                    ->color('primary'),
            ])
            ->headerActions([
                ExportAction::make('export_all')
                    ->label('Exporter tout')
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProductOrderReports::route('/'),
           // 'edit' => Pages\EditProductOrderReport::route('/{record}/edit'),
        ];
    }
}
