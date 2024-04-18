<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use App\Exports\Sheets\RoleSheet;
use Maatwebsite\Excel\Concerns\WithTitle;

class RoleExport2 implements FromView, WithTitle
{
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function view(): View
    {
        return view('exports.role', [
            'role' => $this->data
        ]);
    }

    public function title(): string
    {
        return 'Laporan Role ';
    }
}
