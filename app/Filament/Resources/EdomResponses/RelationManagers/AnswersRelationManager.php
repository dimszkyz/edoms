<?php

namespace App\Filament\Resources\EdomResponses\RelationManagers;

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
                TextColumn::make('question.category.nama_kategori')
                    ->label('Kategori')
                    ->badge()
                    ->color('primary')
                    ->wrap(),

                TextColumn::make('question.pernyataan')
                    ->label('Pernyataan')
                    ->limit(120)
                    ->wrap()
                    ->searchable(),

                TextColumn::make('option.label')
                    ->label('Pilihan')
                    ->placeholder('Jawaban Esai')
                    ->badge(),

                TextColumn::make('nilai')
                    ->label('Nilai')
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
