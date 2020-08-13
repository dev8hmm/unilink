<?php

namespace App\Http\Helper;


class FileDownload 
{
    public static function download($file)
    {
        $zip_file = 'invoices.zip'; // Name of our archive to download

        // Initializing PHP class
        $zip = new \ZipArchive();
        $zip->open($zip_file, \ZipArchive::CREATE | \ZipArchive::OVERWRITE);
        
        $invoice_file = 'invoices/aaa001.pdf';
        
        // Adding file: second parameter is what will the path inside of the archive
        // So it will create another folder called "storage/" inside ZIP, and put the file there.
        $zip->addFile($file, $invoice_file);
        $zip->close();
        
        // We return the file immediately after download
        return response()->download($zip_file);
    }
}