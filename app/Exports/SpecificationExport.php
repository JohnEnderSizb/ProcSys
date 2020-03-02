<?php

namespace App\Exports;

use App\Specification;
use Maatwebsite\Excel\Concerns\FromCollection;

class SpecificationExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Specification::all();
    }
}
