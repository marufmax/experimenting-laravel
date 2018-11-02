<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class PdfExportController extends Controller
{
    public function generatePdf()
    {
        $data = ['title' => 'We are using DOM PDF to exporting PDFs'];

        $pdf = PDF::loadView('dom.domPdf', $data);

        return $pdf->download('domPdf.pdf');
    }
}
