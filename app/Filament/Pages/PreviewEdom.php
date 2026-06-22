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

    // 1. Mengubah properti menjadi array $formData agar sesuai dengan ->statePath('formData')
    public ?array $formData = []; 

    public function mount(): void
    {
        // 2. Langsung isi form dengan ID EDOM terbaru
        $this->form->fill([
            'edom_id' => Edom::query()->latest()->value('id'),
        ]);
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
                    ->live(), // Cukup gunakan live() agar otomatis me-refresh halaman saat dipilih
            ])
            ->statePath('formData');
    }

    public function getEdom(): ?Edom
    {
        // 3. Ambil edom_id langsung dari array formData
        $edomId = $this->formData['edom_id'] ?? null;

        if (!$edomId) {
            return null;
        }

        return Edom::with([
            'prodis',
            'mataKuliahs',
            'categories.questions',
            'options',
        ])->find($edomId);
    }
}