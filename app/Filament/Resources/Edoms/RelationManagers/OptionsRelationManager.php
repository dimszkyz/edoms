<?php

namespace App\Filament\Resources\Edoms\RelationManagers;

use Filament\Actions\CreateAction;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Forms\Components\TextInput;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;

class OptionsRelationManager extends RelationManager
{
    protected static string $relationship = 'options';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('label')
                    ->label('Opsi Jawaban')
                    ->required(),

                TextInput::make('nilai')
                    ->numeric()
                    ->required(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('urutan')
                    ->sortable(),

                Tables\Columns\TextColumn::make('label')
                    ->label('Opsi Jawaban'),

                Tables\Columns\TextColumn::make('nilai'),
            ])

            ->headerActions([
                CreateAction::make()
                    ->mutateDataUsing(function (array $data): array {

                        $lastUrutan = $this->ownerRecord
                            ->options()
                            ->max('urutan');

                        $data['urutan'] = ($lastUrutan ?? 0) + 1;

                        $data['edom_id'] = $this->ownerRecord->id;

                        return $data;
                    }),
            ])

            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ]);
    }
}
