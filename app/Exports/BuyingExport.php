<?php

namespace App\Exports;

use App\Models\MsBuying;
use Maatwebsite\Excel\Concerns\FromCollection;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class BuyingExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function view(): View
    {
        $data = MsBuying::with('name_supplier' , 'product')->get();
        return view('export_excel.file_export_buying' , compact('data'));
    }
    
}
