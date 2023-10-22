<?php

require 'vendor/autoload.php'; 

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

$host = "localhost"; 
$port = "5432"; 
$dbname = "datosdb"; 
$user = "postgres"; 
$password = "root"; 

try {
    $pdo = new PDO("pgsql:host=$host;port=$port;dbname=$dbname;user=$user;password=$password");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// Definir las cabeceras de la tabla
$sheet->setCellValue('A1', 'Código');
$sheet->setCellValue('B1', 'Nombre del Archivo');
$sheet->setCellValue('C1', 'Cantidad de Líneas');
$sheet->setCellValue('D1', 'Cantidad de Palabras');
$sheet->setCellValue('E1', 'Cantidad de Caracteres');
$sheet->setCellValue('F1', 'Fecha de Registro');

$row = 2; // Fila donde empezar a escribir los datos

$sql = "SELECT * FROM informacion";
$stmt = $pdo->query($sql);

while ($data = $stmt->fetch()) { // Usa una variable diferente ($data) para almacenar los datos de la base de datos
    $sheet->setCellValue('A' . $row, $data['codigo']);
    $sheet->setCellValue('B' . $row, $data['nombrearchivo']);
    $sheet->setCellValue('C' . $row, $data['cantlineas']);
    $sheet->setCellValue('D' . $row, $data['cantpalabras']);
    $sheet->setCellValue('E' . $row, $data['cantcaracteres']);
    $sheet->setCellValue('F' . $row, $data['fecharegistro']);
    $row++; // Incrementa el contador de fila
}

// Crear un objeto Writer para guardar la hoja de Excel
$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="informacion.xlsx"');
$writer->save('php://output');

exit;