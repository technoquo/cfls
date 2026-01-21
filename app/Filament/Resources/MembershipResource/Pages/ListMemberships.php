<?php

namespace App\Filament\Resources\MembershipResource\Pages;

use App\Filament\Resources\MembershipResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Components\Tab;
use Illuminate\Database\Eloquent\Builder;

class ListMemberships extends ListRecords
{
    protected static string $resource = MembershipResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        return [
            'all' => Tab::make('Tous'),
            'active' => Tab::make('Actifs')
                ->modifyQueryUsing(fn (Builder $query) => $query->active()),

            'expiring_soon' => Tab::make('Expiration prochaine')
                ->modifyQueryUsing(fn (Builder $query) => $query->expiringSoon(30))
                ->badge(static::getModel()::expiringSoon(30)->count()),

            'expired' => Tab::make('Expirés')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('status', 'expired')),

            'suspended' => Tab::make('Suspendus')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('status', 'suspended')),
        ];

    }
}