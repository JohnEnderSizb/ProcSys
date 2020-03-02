<?php

namespace App\Http\Controllers;

use App\Exports\SpecificationExport;
use App\Specification;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class PdfsController extends Controller
{
    public function test(){
        $specifications = auth()->user()->specifications()
            ->where('authorisations', '>=', 0)
            ->where('authorised_by_assets', '=', 0)
            ->where('ready_for_collection', '=', 0)
            ->where('collected', '=', 0)
            ->paginate(15);

        //$pdf = app('dompdf.wrapper');
        $pdf = \App::make('dompdf.wrapper');
        set_time_limit(300);
        $pdf->loadView('pdfs.pdf');

        return $pdf->download('pdf.pdf');
    }

    public function pdf() {
        return view("pdfs.pdf");
    }

    public function excell()
    {
        return Excel::download(new SpecificationExport(), 'excell.csv');
    }
}
