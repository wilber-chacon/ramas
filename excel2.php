<?php



require 'vendor/autoload.php';
require 'conexion.php';

use PhpOffice\PhpSpreadsheet\{Spreadsheet, IOFactory};

//consultando los resgistros en La BD
$conexion->set_charset("utf8");
$sql = "SELECT id_persona, nombre_persona, edad_persona, telefono_persona, sexo_persona, fecha_nac FROM persona";
$ejecutar = mysqli_query($conexion, $sql);


    
//creaccion de instancia de la clase Spreadsheet
$spreadcheet = new Spreadsheet();
//especificacion del autor y titulo del archivo
$spreadcheet->getProperties()->setCreator("ISSS")->setTitle("Ejemplo");


$hojaActiva = $spreadcheet->getActiveSheet();

//creando estilo para los bordes
$styleArray = [
    'borders' => [
        'outline' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            
            'color' => ['argb' => '00000000'],
        ],
    ],
];

//colocando auto ajustable el tamaño en cada columna
$hojaActiva->getColumnDimension('A')->setAutoSize(true);
$hojaActiva->getColumnDimension('B')->setAutoSize(true);
$hojaActiva->getColumnDimension('C')->setAutoSize(true);
$hojaActiva->getColumnDimension('D')->setAutoSize(true);
$hojaActiva->getColumnDimension('E')->setAutoSize(true);
$hojaActiva->getColumnDimension('F')->setAutoSize(true);

//aplicacion de color a la cabecera
$hojaActiva->getStyle('A1:F1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('00FF7F');
//aplicacion de borde en cada celda de la cabecera
$hojaActiva->getStyle('A1')->applyFromArray($styleArray);
$hojaActiva->getStyle('B1')->applyFromArray($styleArray);
$hojaActiva->getStyle('C1')->applyFromArray($styleArray);
$hojaActiva->getStyle('D1')->applyFromArray($styleArray);
$hojaActiva->getStyle('E1')->applyFromArray($styleArray);
$hojaActiva->getStyle('F1')->applyFromArray($styleArray);
//colocacion de los titulos a la cabecera de las columnas
$hojaActiva->setCellValue('A1', 'id');
$hojaActiva->setCellValue('B1', 'nombre');
$hojaActiva->setCellValue('C1', 'edad');
$hojaActiva->setCellValue('D1', 'telefono');
$hojaActiva->setCellValue('E1', 'genero');
$hojaActiva->setCellValue('F1', 'fecha de nacimiento');

//contador para imprimir los datos desde la fila 2
$row = 2;


//bucle utilizado para imprimir la informacion obtenida de la consulta
while ($fila=mysqli_fetch_array($ejecutar)) {
    $hojaActiva->setCellValue('A' . $row, $fila[0]);
    $hojaActiva->setCellValue('B' . $row, $fila[1]);
    $hojaActiva->setCellValue('C' . $row, $fila[2]);
    $hojaActiva->setCellValue('D' . $row, $fila[3]);
    $hojaActiva->setCellValue('E' . $row, $fila[4]);
    $hojaActiva->setCellValue('F' . $row, $fila[5]);
    //aplicacion de borde en cada celda
    $hojaActiva->getStyle('A'.$row)->applyFromArray($styleArray);
    $hojaActiva->getStyle('B'.$row)->applyFromArray($styleArray);
    $hojaActiva->getStyle('C'.$row)->applyFromArray($styleArray);
    $hojaActiva->getStyle('D'.$row)->applyFromArray($styleArray);
    $hojaActiva->getStyle('E'.$row)->applyFromArray($styleArray);
    $hojaActiva->getStyle('F'.$row)->applyFromArray($styleArray);

    //aumentando en uno el contador para avanzar a la siguiente fila
    $row++;
}


//especificacion del contexto de la aplicacion para generar el documento
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="archivo.xlsx"');
header('Cache-Control: max-age=0');

//generacion y descarga del documento
$writer = IOFactory::createWriter($spreadcheet, 'Xlsx');
$writer->save('php://output');
exit;//finalizacion del proceso

?>