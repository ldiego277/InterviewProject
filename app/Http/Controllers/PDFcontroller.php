<?php

namespace App\Http\Controllers;

use App\Documents;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class PDFcontroller extends Controller
{
    public function index($id)
    {
        $lista = DB::table('document')
            ->where('id', '=', $id)
            ->first();

        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($lista->Documento);
        return $pdf->download();
    }
}
