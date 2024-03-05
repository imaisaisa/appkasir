<?php
include '../../koneksi.php';
//============================================================+
// File name   : example_006.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 006 for TCPDF class
//               WriteHTML and RTL support
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: WriteHTML and RTL support
 * @author Nicola Asuni
 * @since 2008-03-04
 */

// Include the main TCPDF library (search for installation path).
require_once('tcpdf_include.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->setCreator(PDF_CREATOR);
$pdf->setAuthor('App Kasir');
$pdf->setTitle('Laporan Penjualan');
$pdf->setSubject('Laporan Penjualan');
$pdf->setKeywords('App Kasir, Laporan Penjualan');

// set default header data
$pdf->setHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' Laporan Penjualan', PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->setDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->setMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->setHeaderMargin(PDF_MARGIN_HEADER);
$pdf->setFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->setAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->setFont('dejavusans', '', 10);

// add a page
$pdf->AddPage();

$tanggal_awal=$_GET['tanggal_awal'];
$tanggal_akhir=$_GET['tanggal_akhir'];

// create some HTML content
$html = '
<h3>Laporan Penjualan</h3> <br>
Periode : '.$tanggal_awal.' S/D '.$tanggal_akhir.' <br><br>

<table style="border-collapse:collapse;" border="1">
    <tr>
        <td width="5%" align="center"><b>No</b></td>
        <td width="15%" align="center"><b>Tanggal</b></td>
        <td width="15%" align="center"><b>Waktu</b></td>
        <td width="30%" align="center"><b>Nama Pelanggan</b></td>
        <td width="15%" align="center"><b>Total Item</b></td>
        <td width="20%" align="center"><b>Total Belanja</b></td>
    </tr>
';

$sql = "SELECT jual.*,pelanggan.nama,(SELECT SUM(jumlah) FROM jual_detail WHERE id_jual=jual.id_jual) AS total_item,(SELECT SUM(jumlah*harga_jual) FROM jual_detail WHERE id_jual=jual.id_jual) AS total_belanja FROM jual,pelanggan WHERE jual.id_pelanggan=pelanggan.id_pelanggan AND jual.tanggal BETWEEN '$tanggal_awal' AND '$tanggal_akhir'";
$query=mysqli_query($koneksi,$sql);
while($kolom=mysqli_fetch_array($query)){
    $html.='    
        <tr>
            <td>'.$kolom['id_jual'].'</td>
            <td>'.$kolom['tanggal'].'</td>
            <td>'.$kolom['waktu'].'</td>
            <td>'.$kolom['nama'].'</td>
            <td align="right">'.number_format($kolom['total_item']).'</td>
            <td align="right">'.number_format($kolom['total_belanja']).'</td>
        </tr>
    ';
}

$html.='
</table>
';

// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('laporan_penjualan.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
