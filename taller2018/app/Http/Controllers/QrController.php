<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use LaravelQRCode\Providers\QRCodeServiceProvider;
use LaravelQRCode\Facades\QRCode;
use QR_Code\QR_Code;


class QrController extends Controller
{
    public function make()
    {

        $file=resource_path('qr1.png');
        return QRCode::text('hhhh','qrasd','qasd','asd')->setOutfile($file)->setSize(4)->png();

    }
}
