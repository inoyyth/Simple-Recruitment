<?php

namespace App\Exports;

use App\Models\Pelamar;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithTitle;

class PelamarExport implements FromView, WithTitle
{
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function view(): View
    {
        return view('exports.pelamar', [
            'pelamar' => $this->data
        ]);
    }

    public function title(): string
    {
        return 'Data Pelamar';
    }
}
