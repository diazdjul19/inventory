<?php

namespace App\Exports;
use App\Models\MsSales;
// use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;


class SalesExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $data = MsSales::with('product' , 'customer')->get();
        return view('export_excel.file_export_sales' , compact('data'));
    }
}
