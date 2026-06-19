<?php

namespace App\Filament\Resources\MataKuliahs\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Tables\Grouping\Group; // Tambahkan import class Group

class MataKuliahsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('prodi.nama')
                    ->label('Prodi')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('nama')
                    ->label('Mata Kuliah')
                    ->searchable()
                    ->sortable(),

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
            ])
            // Menambahkan fitur pengelompokan berdasarkan relasi Prodi
            ->groups([
                Group::make('prodi.nama')
                    ->label('Program Studi')
                    ->collapsible(), // Membuat grup bisa di-collapse (buka-tutup)
            ])
            ->defaultGroup('prodi.nama'); // Otomatis mengelompokkan saat halaman list dibuka
    }
}