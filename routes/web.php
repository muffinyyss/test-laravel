<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogController;
use App\Models\Blog;
use App\Http\Controllers\ReportController;
use App\Models\Report;
use App\Http\Controllers\PdfController;

//นักอ่าน
Route::get('/', [BlogController::class,'index']);
Route::get('/detail/{id}', [BlogController::class,'detail']);

//นักเขียน
Route::prefix('author')->group(function () {
    Route::get('/about', [AdminController::class, 'about'])->name('about');
    Route::get('/blog', [AdminController::class, 'index'])->name('blog');
    Route::get('/create', [AdminController::class, 'create']);
    Route::post('/insert', [AdminController::class,'insert']);
    Route::get('/delete/{id}', [AdminController::class,'delete'])->name('delete');
    Route::get('/change/{id}', [AdminController::class,'change'])->name('change');
    Route::get('/edit/{id}', [AdminController::class,'edit'])->name('edit');
    Route::post('/update/{id}', [AdminController::class,'update'])->name('update');  
    Route::get('/pdf', [ReportController::class, 'pdf']);
    
    // Route::get('/pdfForm', function () {
    //     return view('invoice.pdfForm');
    // });
    
    // Route::post('/generate-pdf', [PdfController::class, 'generatePdf'])->name('generate.pdf');
    
    Route::get('/pdfForm', [PdfController::class, 'showForm'])->name('pdf-form');
    Route::post('/generate-pdf', [PdfController::class, 'PdfForm'])->name('generate-pdf');
    
    Route::get('/blog/{id}/download-pdf', [PdfController::class,'PdfForm'])->name('download-pdf');


    Route::post('/pdf/{id}', [PdfController::class, 'getDataFromDatabase'])->name('pdfData');
    // Route::post('/pdf/{id}', [PdfController::class, 'PdfForm'])->name('pdfData');


    
    
    
    
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('/', function () {
//     return "<a href='".route('admin')."'>Login</a>";
// });

// Route::get('about', function () {
//     return "<h1>about me!</h1>";
// });

// Route::get('blog', function () {
//     return "<h1>article all <3 </h1>";
// });

// Route::get('blog/{name}', function ($name) {
//     return "<h1>article ${name} </h1>";
// });

// Route::get('admin/user/cream', function () {
//     return "<h1>welcome to my webie ADMIN ♡</h1>";
// })->name('admin');


// Route::fallback(function () {
//     return "<h1>Not Found Web page</h1>";
// });

