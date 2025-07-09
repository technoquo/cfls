<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductOrderReportResource\Pages;
use App\Filament\Resources\ProductOrderReportResource\RelationManagers;
use App\Models\ProductOrder;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductOrderReportResource extends Resource
{
    protected static ?string $model = ProductOrder::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->query(
                ProductOrder::query()
                    ->select('product_orders.*')
                    ->join('orders', 'product_orders.order_id', '=', 'orders.id')
                    ->with(['order.user', 'product'])
                    ->orderBy('orders.created_at', 'desc')
            )
            ->columns([
                TextColumn::make('order.id')->label('N° de commande'),
                TextColumn::make('order.created_at')->label('Date')->dateTime('d/m/Y H:i'),
                TextColumn::make('order.user.name')->label('Client')->sortable()->searchable(),
                TextColumn::make('order.delivery')->label('Méthode de livraison'),
                TextColumn::make('product.name')->label('Produit')->sortable()->searchable(),
                TextColumn::make('quantity')->label('Quantité'),
                TextColumn::make('choix')->label('Choix sélectionné'),
                TextColumn::make('price')->label('Prix unitaire')->money('eur'),
                TextColumn::make('order.total')->label('Total de la commande')->money('eur'),
                TextColumn::make('order.order_status')->label('Statut')->badge(),
                TextColumn::make('order.user.address')->label('Adresse')->wrap(),
                TextColumn::make('order.user.province')->label('Province'),
                TextColumn::make('order.user.region')->label('Région'),
            ])
            ->defaultSort('orders.created_at', 'desc')
            ->filters([
                SelectFilter::make('order_status')
                    ->label('Statut de la commande')
                    ->relationship('order', 'order_status')
                    ->options([
                        'pendiente' => 'En attente',
                        'procesando' => 'En cours de traitement',
                        'completado' => 'Complétée',
                        'cancelado' => 'Annulée',
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
                            ->when($data['from'], fn ($q, $date) => $q->whereHas('order', fn ($q2) => $q2->whereDate('created_at', '>=', $date)))
                            ->when($data['until'], fn ($q, $date) => $q->whereHas('order', fn ($q2) => $q2->whereDate('created_at', '<=', $date)));
                    }),
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
        ];
    }
}
