<?php

namespace App\Exports\Sheets;

use Maatwebsite\Excel\Concerns\WithTitle;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class RoleSheet implements FromView, WithTitle
{
    private $data;
    private $title;

    public function __construct($data, $title)
    {
        $this->data = $data;
        $this->title  = $title;
    }

    public function view(): View
	{
        if ($this->title == "Role") {
            return view('exports.role', [
                'role' => $this->data
            ]);
        }

        if ($this->title == "Peserta") {
            return view('exports.peserta', [
                'data' => $this->data
            ]);
        }

        if ($this->title == "User") {
            return view('exports.user', [
                'data' => $this->data
            ]);
        }
	}


    /**
     * @return string
     */
    public function title(): string
    {
        return 'Sheet ' . $this->title;
    }
}