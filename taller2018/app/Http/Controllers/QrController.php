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
        $file=resource_path('qr.png');
        return QRCode::meCard('QR prueba 3','qr2','q3','qr4')->setOutfile($file)->setSize(4)->png();

    }
}
