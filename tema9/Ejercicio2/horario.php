<?php

require '../../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// Crear una instancia de la hoja de cálculo
$spreadsheet = new Spreadsheet();

// Seleccionar la hoja activa
$sheet = $spreadsheet->getActiveSheet();

// Agregar datos al horario de DAW
$sheet->setCellValue('A1', 'Horario de DAW');

// Encabezados de las columnas
$sheet->setCellValue('A2', 'Hora');
$sheet->setCellValue('B2', 'Lunes');
$sheet->setCellValue('C2', 'Martes');
$sheet->setCellValue('D2', 'Miércoles');
$sheet->setCellValue('E2', 'Jueves');
$sheet->setCellValue('F2', 'Viernes');

// Datos de ejemplo (puedes adaptarlos a tu necesidad)
$horario = [
    ['8:00 AM', 'Clase 1', 'Clase 2', 'Descanso', 'Clase 3', 'Clase 4'],
    ['9:00 AM', 'Clase 5', 'Clase 6', 'Descanso', 'Clase 7', 'Clase 8'],
    // Agrega más filas según sea necesario
];

// Llenar la hoja con los datos del horario
foreach ($horario as $rowIndex => $rowData) {
    foreach ($rowData as $colIndex => $value) {
        $sheet->setCellValueByColumnAndRow($colIndex + 1, $rowIndex + 3, $value);
    }
}

// Guardar la hoja de cálculo en un archivo
$writer = new Xlsx($spreadsheet);
$writer->save('horario_daw.xlsx');

echo "Horario de DAW generado correctamente en el archivo 'horario_daw.xlsx'" . PHP_EOL;