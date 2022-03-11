<?php

namespace App\Http\Livewire;

use App\Models\Nilai as ModelsNilai;
use Livewire\Component;
use Livewire\WithFileUploads;

class Nilai extends Component
{

    use WithFileUploads;

    public $header;
    public $file;
    public $keterangan;

    protected $rules = [
        'keterangan' => 'required',
        'file' => 'required|mimes:pdf',
    ];

    public function render()
    {
        $this->header = 'Penilaian';

        return view('nilai.index', [
            'nilai' => ModelsNilai::all(),
        ]);
    }

    public function store()
    {
        $this->validate();

        $fileName = date('His') . '-' . $this->file->getClientOriginalName();
        $this->file->storeAs(
            'public/pdf',
            $fileName
        );

        ModelsNilai::create(
            [
                'file' => $fileName,
                'keterangan' => $this->keterangan,
            ]
        );

        $this->resetInputFields();
    }

    private function resetInputFields()
    {
        $this->file = null;
        $this->keterangan = '';
    }
}
