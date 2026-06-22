<?php

namespace App\Filament\Resources\Edoms\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class EdomsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama_edom')
                    ->label('Nama EDOM')
                    ->searchable(),

                TextColumn::make('prodis.nama')
                    ->label('Prodi')
                    ->badge()
                    ->separator(),

                TextColumn::make('mataKuliahs.nama')
                    ->label('Mata Kuliah')
                    ->badge()
                    ->color('primary') 
                    ->listWithLineBreaks() 
                    ->limitList(2) 
                    ->expandableLimitedList() 
                    ->searchable(),

                TextColumn::make('categories_count')
                    ->counts('categories')
                    ->label('Kategori')
                    ->badge(),

                TextColumn::make('questions_count')
                    ->counts('questions')
                    ->label('Pertanyaan')
                    ->badge(),

                TextColumn::make('status')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'draft' => 'gray',
                        'aktif' => 'success',
                        'ditutup' => 'danger',
                    }),

                TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d M Y H:i'),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
