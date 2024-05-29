<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mpdf\Mpdf;
use PDF;
use App\Models\Blog;

class PdfController extends Controller
{
    public function generatePdf(Request $request)
    {
        // Validate the request
        $request->validate([
            'content' => 'required|string|min:1',
        ]);

        // Get content from the request
        $content = $request->input('content');

        // Create an instance of mPDF using the app container
        $mpdf = app(Mpdf::class);

        // Write HTML content to PDF
        $mpdf->WriteHTML($content);

        // Output the PDF as a download
        return $mpdf->Output('invoice.pdf', 'I');
    }

    public function showForm()
    {
        return view('invoice.pdfForm');
    } 

    public function PdfForm(Request $request)
    {
        // Validate the request
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string|min:1',
        ]);

        // Get content from the request
        $title = $request->input('title');
        $content = $request->input('content');

        // Create an instance of mPDF using the app container
        $mpdf = app(Mpdf::class);

        // Create HTML content
        $html = "
        <html>
        <head>
            <style>
                body { font-family: thsarabun; }
                .title { font-size: 24pt; font-weight: bold; text-align: center; margin-bottom: 20px; }
                .content { font-size: 16pt; }
            </style>
        </head>
        <body>
            <div class='title'>{$title}</div>
            <div class='content'>{$content}</div>
        </body>
        </html>";

        // Write HTML content to PDF
        $mpdf->WriteHTML($html);

        // Output the PDF as a download
        return $mpdf->Output('document.pdf', 'I');
    }


    public function gPDF($id)
    {
        // ดึงข้อมูลจากฐานข้อมูล
        $data = Blog::find($id);

        if (!$data) {
            return redirect()->back()->with('error', 'ไม่พบข้อมูล.');
        }

        // เตรียมเนื้อหา HTML
        $htmlContent = view('invoice.pdf_template', compact('data'))->render();

        // สร้างอินสแตนซ์ของ mPDF
        $mpdf = new Mpdf([
            'mode' => 'utf-8', // ตั้งค่าให้รองรับ UTF-8
            'default_font' => 'THSarabunNew',
            'fontDir' => [base_path('resources/fonts')], // กำหนดเส้นทางไปยังโฟลเดอร์ฟอนต์
            'fontdata' => [
                'thsarabun' => [
                    'R' => 'THSarabunNew.ttf',
                    'B' => 'THSarabunNew Bold.ttf',
                    'I' => 'THSarabunNew Italic.ttf',
                    'BI' => 'THSarabunNew BoldItalic.ttf',
                ]
            ],
        ]);

        // กำหนดฟอนต์เริ่มต้น
        $mpdf->default_font = 'thsarabun';

        // เขียนเนื้อหา HTML ลงใน PDF
        $mpdf->WriteHTML($htmlContent);

        // ส่งออกไฟล์ PDF ให้ดาวน์โหลด
        return $mpdf->Output('document.pdf', 'I');


    }

}
