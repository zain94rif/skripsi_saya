<?php
ob_start();
// include_once "../config/koneksi.php";
include "../config/koneksi.php";
// include "function/function.php";
/**
 * PHPExcel
 *
 * Copyright (c) 2006 - 2015 PHPExcel
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
 *
 * @category   PHPExcel
 * @package    PHPExcel
 * @copyright  Copyright (c) 2006 - 2015 PHPExcel (http://www.codeplex.com/PHPExcel)
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt	LGPL
 * @version    ##VERSION##, ##DATE##
 */

/** Error reporting */
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
date_default_timezone_set('Asia/Bangkok');

if (PHP_SAPI == 'cli')
	die('This example should only be run from a Web Browser');

/** Include PHPExcel */
require_once dirname(__FILE__) . '/PHPExcel/Classes/PHPExcel.php';


// Create new PHPExcel object
$objPHPExcel = new PHPExcel();

// Set document properties
$objPHPExcel->getProperties()->setCreator("Elektro_UTM")
							 ->setLastModifiedBy("Elektro_UTM")
							 ->setTitle("Office 2007 XLSX Test Document")
							 ->setSubject("Office 2007 XLSX Test Document")
							 ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
							 ->setKeywords("office 2007 openxml php")
							 ->setCategory("Test result file");

$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'TANGGAL')
            ->setCellValue('B1', 'HARI')
            ->setCellValue('C1', 'MATA PELAJARAN')
            ->setCellValue('D1', 'NIS')
            ->setCellValue('E1', 'SISWA')
            ->setCellValue('F1', 'MASUK');

$no=0;

$myQry = mysqli_query($koneksiDb,dataabsen()) or die ("Query Salah : ".mysqli_error($koneksiDb));
while($myData = mysqli_fetch_array($myQry)){
	$no += 1;
	$id_jadwal = $myData['id_jadwal'];
	$hari = $myData['hari'];
	$mata_pelajaran = $myData['mata_pelajaran'];
	$jam_masuk = $myData['jam_masuk'];
	$jam_keluar = $myData['jam_keluar'];
	$no = $myData['no'];
	$id_siswa = $myData['id_siswa'];
	$tanggal_absensi = $myData['tanggal_absensi'];
	$masuk = $myData['masuk'];
	$nama_siswa = $myData['nama_siswa'];
	$myQry2 = mysqli_query($koneksiDb,datamatapelajaran2($mata_pelajaran)) or die ("Query Salah : ".mysqli_error($koneksiDb));
	while($myData2 = mysqli_fetch_array($myQry2)){
	  $mata_pelajaran = $myData2['mata_pelajaran'];
	}
	$objPHPExcel->setActiveSheetIndex(0)
	            ->setCellValue('A'.$no, $tanggal_absensi)
	            ->setCellValue('B'.$no, $hari)
	            ->setCellValue('C'.$no, $mata_pelajaran)
	            ->setCellValue('D'.$no, $id_siswa)
	            ->setCellValue('E'.$no, $nama_siswa)
	            ->setCellValue('F'.$no, $masuk);
}

// Rename worksheet
$objPHPExcel->getActiveSheet()->setTitle('Data Absensi');


// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);


// Redirect output to a client’s web browser (Excel5)
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="Data ABSENSI.xls"');
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');

// If you're serving to IE over SSL, then the following may be needed
header ('Expires: Mon, 12 Nov 2018 18:53:00'); // Date in the past
header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header ('Pragma: public'); // HTTP/1.0

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');
exit;
