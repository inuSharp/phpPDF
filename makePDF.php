<?php

ini_set('date.timezone', 'Asia/Tokyo');

include "./TCPDF-main/tcpdf.php";

$orientation = 'Portrait '; // 用紙の向き 縦:Portrait  横:Landscape
$unit        = 'mm'; // 単位
$format      = 'A4'; // 用紙フォーマット
$unicode     = true; // ドキュメントテキストがUnicodeの場合にTRUEとする
$encoding    = 'UTF-8'; // 文字コード
$diskcache   = false; // ディスクキャッシュを使うかどうか
$pdf         = new TCPDF($orientation, $unit, $format, $unicode, $encoding, $diskcache);

$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->SetFont('ipaexg', '', 14, '');
$pdf->AddPage();
$pdf->SetMargins(10, 10, 10);
$html = file_get_contents('template.html');

$html = str_replace('@DATE', date("Y-m-d H:i:s"),$html);

$pdf->writeHTML($html);
$pdf->Output('C:\Users\sg\prj\phpPDF\test.pdf', "F"); // 絶対パスじゃないとエラーが出た

