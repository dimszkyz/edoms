<?php

namespace App\Filament\Resources\EdomResponses\Tables;

use App\Models\EdomResponse;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class EdomResponsesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(fn ($query) => $query
                ->with(['edom', 'answers'])
                ->latest('submitted_at')
                ->latest('id'))
            ->columns([
                TextColumn::make('edom.nama_edom')
                    ->label('EDOM')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('nama_responden')
                    ->label('Nama Mahasiswa')
                    ->placeholder('Anonim')
                    ->searchable(),

                TextColumn::make('nim')
                    ->label('NIM')
                    ->placeholder('-')
                    ->searchable(),

                TextColumn::make('answers_count')
                    ->counts('answers')
                    ->label('Jawaban')
                    ->badge(),

                TextColumn::make('average_score')
                    ->label('Rata-rata Nilai')
                    ->state(function (EdomResponse $record): string {
                        $average = $record->answers
                            ->whereNotNull('nilai')
                            ->avg('nilai');

                        return $average === null ? '-' : number_format((float) $average, 2, ',', '.');
                    })
                    ->badge()
                    ->color('success'),

                TextColumn::make('submitted_at')
                    ->label('Dikirim')
                    ->dateTime('d M Y H:i')
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('edom')
                    ->label('EDOM')
                    ->relationship('edom', 'nama_edom')
                    ->searchable()
                    ->preload()
                    ->placeholder('Semua EDOM'),
            ])
            ->recordActions([
                ViewAction::make()
                    ->label('Lihat Hasil'),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
