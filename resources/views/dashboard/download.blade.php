<?php
include_once("../xlsxwriter.class.php");
ini_set('display_errors', 0);
ini_set('log_errors', 1);
error_reporting(E_ALL & ~E_NOTICE);

$filename = "Report Stock.xlsx";
header('Content-disposition: attachment; filename="'.XLSXWriter::sanitize_filename($filename).'"');
header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
header('Content-Transfer-Encoding: binary');
header('Cache-Control: must-revalidate');
header('Pragma: public');

$header = array(
    'No'=>'0',
    'Nama SBU'=>'0',
    'Nama Item'=>'0',
    'Jatah Awal'=>'0',
    'Jatah Sisa'=>'0',
    'jan'=>'0',
    'feb'=>'0',
    'mar'=>'0',
    'apr'=>'0',
    'mei'=>'0',
    'jun'=>'0',
    'jul'=>'0',
    'agt'=>'0',
    'sep'=>'0',
    'okt'=>'0',
    'nov'=>'0',
    'des'=>'0',
);

$rows = array();
$i = 1;
		foreach($report as $d) {
            $rows[] = array(
            "$i",
            "$d->nama_sbu",
            "$d->nama_item",
            "$d->jatah_awal",
            "$d->jatah_sisa",
            "$d->jan",
            "$d->feb",
            "$d->mar",
            "$d->apr",
            "$d->mei",
            "$d->jun",
            "$d->jul",
            "$d->agt",
            "$d->sep",
            "$d->okt",
            "$d->nov",
            "$d->des"
            );
        $i++;
		}
            $writer = new XLSXWriter();
$writer->setAuthor('icon+'); 
$writer->writeSheetHeader('Sheet1', $header);
foreach($rows as $row)
	$writer->writeSheetRow('Sheet1', $row);
$writer->writeToStdOut();
exit(0);
?>