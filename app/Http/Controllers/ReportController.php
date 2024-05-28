<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use PDF;
use Mpdf\Mpdf;

class ReportController extends Controller
{
    public function pdf()
    {
        $data = [
            'foo' => 'bar'
        ];

        $pdf = PDF::loadView('invoice.pdf', $data);

        return $pdf->stream('invoice.pdf');
    }

   
}
