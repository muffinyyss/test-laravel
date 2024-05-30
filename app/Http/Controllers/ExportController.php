<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\Shared\Html;

class ExportController extends Controller
{
    public function exportWord($id)
    {
        // สร้าง instance ของ PhpWord
        $phpWord = new PhpWord();

        // เพิ่มหน้าในไฟล์ Word
        $section = $phpWord->addSection();

        // ดึงข้อมูลจากฐานข้อมูล
        $data = Blog::find($id); // ดึงข้อมูลจาก model ของคุณ

        if ($data) {
            // เพิ่มข้อมูลลงในไฟล์ Word
            $section->addText('id: ' . $data->id);
            $section->addText('title: ' . $data->title);
            $section->addText('content: ' . $data->content);
            // เพิ่มข้อมูลอื่น ๆ ตามต้องการ

            $htmlContent = $data->content; // สมมติว่า 'content' คือฟิลด์ที่มีเนื้อหา HTML
            Html::addHtml($section, $htmlContent, false, false);
        } else {
            $section->addText('No data found for ID: ' . $id);
        }

        // บันทึกไฟล์ Word ลงใน server
        $objWriter = IOFactory::createWriter($phpWord, 'Word2007');
        $fileName = 'exported_file_' . $id . '.docx';
        $objWriter->save($fileName);

        // ส่งไฟล์ให้ผู้ใช้ดาวน์โหลด
        return response()->download($fileName)->deleteFileAfterSend(true);
    }
}
