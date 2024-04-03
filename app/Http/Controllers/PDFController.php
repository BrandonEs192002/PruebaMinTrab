<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PDFController extends Controller
{
    public function downloadPDF($filename)
    {
        $filePath = storage_path('app/' . $filename);
        
        if (file_exists($filePath)) {
            return response()->download($filePath);
        } else {
            return response()->json(['error' => 'PDF not found'], 404);
        }
    }
}
