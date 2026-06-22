<?php

namespace App\Filament\Resources\Prodis\Tables;

use App\Models\Prodi;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class ProdisTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('nama')
            ->columns([
                TextColumn::make('unw_prodi_id')
                    ->label('ID API')
                    ->sortable()
                    ->toggleable(),

                TextColumn::make('nama')
                    ->label('Nama Prodi')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('jenjang_nama_singkat')
                    ->label('Jenjang')
                    ->badge()
                    ->placeholder('-')
                    ->sortable(),

                TextColumn::make('fakultas_nama')
                    ->label('Fakultas')
                    ->placeholder('-')
                    ->searchable()
                    ->sortable()
                    ->wrap(),

                TextColumn::make('slug')
                    ->label('Slug')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('api_updated_at')
                    ->label('Update API')
                    ->dateTime('d M Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('synced_at')
                    ->label('Terakhir Sync')
                    ->dateTime('d M Y H:i')
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('jenjang_nama_singkat')
                    ->label('Jenjang')
                    ->options(fn (): array => Prodi::query()
                        ->whereNotNull('jenjang_nama_singkat')
                        ->distinct()
                        ->orderBy('jenjang_nama_singkat')
                        ->pluck('jenjang_nama_singkat', 'jenjang_nama_singkat')
                        ->all())
                    ->placeholder('Semua jenjang'),

                SelectFilter::make('fakultas_nama')
                    ->label('Fakultas')
                    ->options(fn (): array => Prodi::query()
                        ->whereNotNull('fakultas_nama')
                        ->distinct()
                        ->orderBy('fakultas_nama')
                        ->pluck('fakultas_nama', 'fakultas_nama')
                        ->all())
                    ->placeholder('Semua fakultas'),
            ])
            ->recordActions([])
            ->toolbarActions([]);
    }
}
