<?php

namespace App\Exports;
use App\Models\MsProduct;
// use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;


class ProductExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $data = MsProduct::with('category')->get();
        return view('export_excel.file_export_product' , compact('data'));
    }
}
