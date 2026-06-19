<?php

namespace App\Filament\Pages;

use App\Models\Edom;
use Filament\Forms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Pages\Page;
use BackedEnum;
use Filament\Support\Icons\Heroicon;

class PreviewEdom extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationLabel = 'Preview EDOM';

    protected static string|\UnitEnum|null $navigationGroup = 'Evaluasi';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedEye;

    protected string $view = 'filament.pages.preview-edom';

    public ?int $edom_id = null;

    public function mount(): void
    {
        $this->edom_id = Edom::query()->latest()->value('id');

        $this->form->fill([
            'edom_id' => $this->edom_id,
        ]);
    }

    public function updatedEdomId($value): void
    {
        $this->edom_id = $value;
    }

    public function getForms(): array
    {
        return ['form'];
    }

    public function form($form)
    {
        return $form
            ->schema([
                Forms\Components\Select::make('edom_id')
                    ->label('Pilih EDOM untuk di-preview')
                    ->options(Edom::pluck('nama_edom', 'id'))
                    ->searchable()
                    ->live()
                    ->afterStateUpdated(function ($state) {
                        $this->edom_id = $state;
                    }),
            ])
            ->statePath('formData');
    }

    public function getEdom(): ?Edom
    {
        if (!$this->edom_id) {
            return null;
        }

        return Edom::with([
            'prodis',
            'mataKuliahs',
            'categories.questions',
            'options',
        ])->find($this->edom_id);
    }
}