<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use setasign\Fpdi\Fpdi;

class CertificateController extends Controller
{
    public function process(Request $request) {
        $nama = "LUQMAN";
        $outputfile = public_path().'dcc.pdf';
        $this->fillPDF(public_path().'\master/dcc.pdf', $outputfile, $nama);
        return response()->file($outputfile);
    }

    public function fillPDF($file, $outputfile, $nama) {
        $fpdi = new Fpdi();
        $fpdi->setSourceFile($file);
        $template = $fpdi->importPage(1);
        $size = $fpdi->getTemplateSize($template);
        $fpdi->AddPage($size['orientation'],array($size['width'],$size['height']));
        $fpdi->useTemplate($template);
        $top = 70;
        $right = 90;
        $name = $nama;
        $fpdi->SetFont("helvetica","",17);
        $fpdi->SetTextColor(25,26,25);
        $fpdi->Text($right, $top, $name);

        return $fpdi->Output($outputfile,'F');
    }
}
