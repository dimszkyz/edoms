<?php

namespace App\Filament\Resources\Edoms;

use App\Filament\Resources\Edoms\Pages\CreateEdom;
use App\Filament\Resources\Edoms\Pages\EditEdom;
use App\Filament\Resources\Edoms\Pages\ListEdoms;
use App\Filament\Resources\Edoms\Schemas\EdomForm;
use App\Filament\Resources\Edoms\Tables\EdomsTable;
use App\Models\Edom;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use App\Filament\Resources\Edoms\RelationManagers\CategoriesRelationManager;
use App\Filament\Resources\Edoms\RelationManagers\OptionsRelationManager;


class EdomResource extends Resource
{
    protected static ?string $model = Edom::class;

    protected static string|\UnitEnum|null $navigationGroup = 'Master Data';

    protected static ?string $navigationLabel = 'Kelola EDOM';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'nama_edom';

    public static function form(Schema $schema): Schema
    {
        return EdomForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return EdomsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            CategoriesRelationManager::class,
            OptionsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListEdoms::route('/'),
            'create' => CreateEdom::route('/create'),
            'edit' => EditEdom::route('/{record}/edit'),
        ];
    }
}
