<?php

namespace App\Filament\Resources\EdomResponses\RelationManagers;

use App\Models\EdomAnswer;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class AnswersRelationManager extends RelationManager
{
    protected static string $relationship = 'answers';

    protected static ?string $title = 'Detail Jawaban';

    protected static ?string $modelLabel = 'Jawaban';

    protected static ?string $pluralModelLabel = 'Detail Jawaban';

    public function table(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(fn ($query) => $query->with(['question.category', 'option'])->orderBy('id'))
            ->columns([
                TextColumn::make('nama_kategori_snapshot')
                    ->label('Kategori')
                    ->state(fn (EdomAnswer $record): string => $record->nama_kategori_snapshot ?: ($record->question?->category?->nama_kategori ?? 'Kategori dihapus'))
                    ->badge()
                    ->color('primary')
                    ->wrap(),

                TextColumn::make('pernyataan_snapshot')
                    ->label('Pernyataan')
                    ->state(fn (EdomAnswer $record): string => $record->pernyataan_snapshot ?: ($record->question?->pernyataan ?? 'Pernyataan dihapus'))
                    ->limit(120)
                    ->wrap()
                    ->searchable(),

                TextColumn::make('option_label_snapshot')
                    ->label('Pilihan')
                    ->state(fn (EdomAnswer $record): string => $record->option_label_snapshot ?: ($record->option?->label ?? 'Jawaban Esai'))
                    ->badge(),

                TextColumn::make('nilai')
                    ->label('Nilai')
                    ->state(fn (EdomAnswer $record): ?int => $record->option_nilai_snapshot ?? $record->nilai)
                    ->placeholder('-')
                    ->badge()
                    ->color('success'),

                TextColumn::make('jawaban_teks')
                    ->label('Jawaban Teks')
                    ->placeholder('-')
                    ->limit(120)
                    ->wrap(),
            ])
            ->recordActions([])
            ->toolbarActions([]);
    }
}
