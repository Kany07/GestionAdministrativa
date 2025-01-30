<?php
// Incluir las bibliotecas necesarias
include ('../../app/config.php'); // Incluir el archivo de configuración
include ('../../app/controllers/asistencias/reportes.php'); 

// Definir el ID de la institución desde la URL
$id_config_institucion = isset($_GET['id']) ? $_GET['id'] : 2; // Si no se pasa un ID, usar 1 por defecto

include ('../../app/controllers/configuraciones/institucion/datos_institucion.php'); // Incluir datos de la institución
include ('../../app/controllers/configuraciones/institucion/listado_de_instituciones.php'); // Incluir datos de la institución
require_once('../../public/TCPDF-main/tcpdf.php'); // Incluir la biblioteca TCPDF para generar PDFs

// Crear una nueva instancia de TCPDF
$pdf = new TCPDF('L', PDF_UNIT, array(216, 279), true, 'UTF-8', false);

// Configurar el documento
$pdf->setCreator(PDF_CREATOR); // Configurar el creador del documento
$pdf->setAuthor(APP_NAME); // Configurar el autor del documento
$pdf->setTitle(APP_NAME); // Configurar el título del documento
$pdf->setSubject(APP_NAME); // Configurar el asunto del documento
$pdf->setKeywords(APP_NAME); // Configurar las palabras clave del documento

// Configurar los datos del encabezado
$pdf->SetHeaderData(NULL, 0, $nombre_institucion, 'Fecha: '.date('d/m/Y'), array(0,64,255), array(0,64,128)); // Agregar la fecha al encabezado
$pdf->SetFont('dejavusans', '', 10); // Configurar la fuente del encabezado
$pdf->Image($logo, 10, 10, 30); // Agregar el logo de la institución

$pdf->setFooterData(array(0,64,0), array(0,64,128)); // Configurar el pie de página
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN)); // Configurar la fuente del encabezado
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA)); // Configurar la fuente del pie de página
$pdf->setDefaultMonospacedFont(PDF_FONT_MONOSPACED); // Configurar la fuente monoespaciada por defecto
$pdf->setMargins(30, 20, 20); // Configurar los márgenes del documento
$pdf->setHeaderMargin(PDF_MARGIN_HEADER); // Configurar el margen del encabezado
$pdf->setFooterMargin(PDF_MARGIN_FOOTER); // Configurar el margen del pie de página
$pdf->setPrintHeader(true); // Decidir si imprimir el encabezado o no
$pdf->setAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM); // Configurar el salto de página automático
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO); // Configurar la escala de las imágenes

// Agregar una página
$pdf->AddPage(); // Agregar una nueva página al documento
$style = array(
    'border' => 0,
    'vpadding' => '3',
    'hpadding' => '3',
    'fgcolor' => array(0,0,0),
    'bgcolor' => false, // array(255,255,255)
    'module_width' => 1,
    'module_height' => 1
);
$QR = 'Este reporte esta verificado por la coordinación de la unidad educativa EEIB Julio César Sanchéz Olivo, por el/la Señor(a) Yris García, con C.I.: Nro 13.255.789, quien ejerce el cargo de director(a) del plantel, habil por derecho en '.$fecha_actual;
$pdf->write2DBarcode($QR, 'QRCODE, L', 230, 25, 40, 40, $style);
// Agregar los datos encima de la tabla
$pdf->SetXY(30, 20); // Establecer la posición inicial (X, Y)
$pdf->SetFont('dejavusans', 'B', 12); // Establecer la fuente en negrita y tamaño 12
$pdf->Cell(0, 6, $nombre_institucion, 0, 1, 'C'); // Agregar el nombre de la institución centrado
$pdf->SetFont('dejavusans', 'I', 8); // Establecer la fuente en negrita y tamaño 12
$pdf->Cell(0, 6, 'REGISTRO DE ASISTENCIA', 0, 1, 'C'); 
$pdf->SetXY(30, 35); // Establecer la posición inicial (X, Y)
$pdf->SetFont('dejavusans', 'IB', 8); // Volver a la fuente normal y tamaño 10
$pdf->Cell(0, 6, 'Periodo: 2024 - 2025', 0, 1, 'C'); // Agregar el periodo centrado
$pdf->SetFont('dejavusans', 'IB', 8); // Volver a la fuente normal y tamaño 10
$pdf->Cell(0, 6, 'Ubicación: '.$direccion, 0, 1, 'C'); // Agregar la ubicación
$pdf->Cell(0, 6, 'Teléfono: '.$telefono, 0, 1, 'C'); // Agregar el teléfono
$pdf->Cell(0, 6, 'RIF: '.$rif, 0, 1, 'C'); // Agregar el RIF

// Configurar el estilo de la tabla
$style = array(
    'border' => 2, // Borde de la tabla
    'padding' => 2, // Relleno de las celdas
    'fgcolor' => array(43,43,34), // Color de primer plano
    'bgcolor' => array(255,255,255), // Color de fondo
    'cellpadding' => 1, // Relleno interno de las celdas
    'cellspacing' => 1, // Espaciado entre celdas
    'fontname' => 'dejavusans', // Nombre de la fuente
    'fontsize' => 10, // Tamaño de la fuente
    'align' => 'center' // Alineación del texto
);

// Crear los datos de la tabla
$data = array(
    array('Nº','NOMBRE Y APELLIDO','CI','ROL','ENTRADA','SALIDA'), // Definir los datos de la tabla
);

// Agregar los registros de asistencia
foreach ($asistencias as $index => $asistencia) {
    $data[] = array(
        $index + 1, // Número
        $asistencia['student_name']." ".$asistencia['student_last_name'], // Nombre del estudiante
        $asistencia['course_section'], // Sección del curso
        $asistencia['rol'], // Rol
        $asistencia['time_in'], // Hora de entrada
        $asistencia['time_out'] // Hora de salida
    );
}

// Agregar la tabla al PDF
$pdf->SetFillColor(0, 0, 255);
$pdf->SetFont('dejavusans', '', 10); // Configurar la fuente de la tabla
$pdf->SetFillColor(255, 255, 255); // Configurar el color de relleno
$pdf->SetTextColor(0, 0, 0); // Configurar el color del texto
$pdf->SetDrawColor(0, 0, 255); // Configurar el color del borde
$pdf->SetLineWidth(0.3); // Configurar el ancho de las líneas
$pdf->SetX(10); // Configurar la posición X inicial de la tabla
$pdf->SetY(70); // Configurar la posición Y inicial de la tabla

foreach ($data as $row) {
    $pdf->Cell(8, 6, $row[0], 1, 0, 'C', 1); // Agregar celda con datos y configuraciones específicas
    $pdf->Cell(68, 6, $row[1], 1, 0, 'C', 1); 
    $pdf->Cell(25, 6, $row[2], 1, 0, 'C', 1);
    $pdf->Cell(35, 6, $row[3], 1, 0, 'C', 1);
    $pdf->Cell(45, 6, $row[4], 1, 0, 'C', 1);
    $pdf->Cell(45, 6, $row[5], 1, 1, 'C', 1);
}

// Generar y mostrar el PDF
$pdf->Output('reporte_asistencias.pdf', 'I'); // Generar el archivo PDF y mostrarlo en el navegador






















// <?php
// // Incluir las bibliotecas necesarias
// include ('../../app/config.php'); // Incluir el archivo de configuración
// include ('../../app/controllers/asistencias/reportes.php'); 
// include ('../../app/controllers/configuraciones/institucion/listado_de_instituciones.php'); 
// require_once('../../public/TCPDF-main/tcpdf.php'); // Incluir la biblioteca TCPDF para generar PDFs

// // Crear una nueva instancia de TCPDF
// $pdf = new TCPDF('L', PDF_UNIT, array(216, 279), true, 'UTF-8', false);

// // Configurar el documento
// $pdf->setCreator(PDF_CREATOR); // Configurar el creador del documento
// $pdf->setAuthor(APP_NAME); // Configurar el autor del documento
// $pdf->setTitle(APP_NAME); // Configurar el título del documento
// $pdf->setSubject(APP_NAME); // Configurar el asunto del documento
// $pdf->setKeywords(APP_NAME); // Configurar las palabras clave del documento
// $pdf->setHeaderData('../public/images/logo.jpg', PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128)); // Configurar los datos del encabezado
// $pdf->setFooterData(array(0,64,0), array(0,64,128)); // Configurar los datos del pie de página
// $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN)); // Configurar la fuente del encabezado
// $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA)); // Configurar la fuente del pie de página
// $pdf->setDefaultMonospacedFont(PDF_FONT_MONOSPACED); // Configurar la fuente monoespaciada por defecto
// $pdf->setMargins(30, 20, 20); // Configurar los márgenes del documento
// $pdf->setHeaderMargin(PDF_MARGIN_HEADER); // Configurar el margen del encabezado
// $pdf->setFooterMargin(PDF_MARGIN_FOOTER); // Configurar el margen del pie de página
// $pdf->setPrintHeader(false); // Decidir si imprimir el encabezado o no
// $pdf->setAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM); // Configurar el salto de página automático
// $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO); // Configurar la escala de las imágenes

// // Agregar una página
// $pdf->AddPage(); // Agregar una nueva página al documento



// // Agregar los datos encima de la tabla
// $pdf->SetXY(10, 20); // Establecer la posición inicial (X, Y)
// $pdf->SetFont('dejavusans', 'B', 12); // Establecer la fuente en negrita y tamaño 12
// $pdf->Cell(0, 6, APP_NAME, 0, 1, 'C'); // Agregar el título centrado
// $pdf->SetXY(30, 35); // Establecer la posición inicial (X, Y)
// $pdf->SetFont('dejavusans', 'C', 8); // Volver a la fuente normal y tamaño 10
// $pdf->Cell(0, 6, 'Periodo: 2024 - 2025', 0, 1, 'L'); // Agregar el periodo centrado
// $pdf->SetFont('dejavusans', 'I', 8); // Volver a la fuente normal y tamaño 10
// $pdf->Cell(0, 6, 'Ubicación: Urbanización los centauros, manzana b-4, casa numero 18', 0, 1, 'L'); // Agregar el periodo centrado
// $pdf->SetFont('dejavusans', 'I', 8); // Volver a la fuente normal y tamaño 10
// $pdf->Cell(0, 6, 'Telefono: 0412-0653926', 0, 1, 'L'); // Agregar el periodo centrado
// $pdf->SetFont('dejavusans', 'I', 8); // Volver a la fuente normal y tamaño 10
// $pdf->Cell(0, 6, 'RIF: J-23145313-0', 0, 1, 'L'); // Agregar el periodo centrado

// // Agregar el logo a la tabla


// // Configurar el estilo de la tabla
// $style = array(
//     'border' => 2, // Borde de la tabla
//     'padding' => 2, // Relleno de las celdas
//     'fgcolor' => array(43,43,34), // Color de primer plano
//     'bgcolor' => array(255,255,255), // Color de fondo
//     'cellpadding' => 1, // Relleno interno de las celdas
//     'cellspacing' => 1, // Espaciado entre celdas
//     'fontname' => 'dejavusans', // Nombre de la fuente
//     'fontsize' => 10, // Tamaño de la fuente
//     'align' => 'center' // Alineación del texto
// );


// // Crear los datos de la tabla
// $data = array(
//     array('Nº','NOMBRE Y APELLIDO','CI','ROL','ENTRADA','SALIDA'), // Definir los datos de la tabla
   
// );

// // Agregar los registros de asistencia
// foreach ($asistencias as $index => $asistencia) {
//     $data[] = array(
//         $index + 1, // Número
//         $asistencia['student_name']." ".$asistencia['student_last_name'], // Cambia esto según el nombre de la columna en tu tabla
//         $asistencia['course_section'], // Cambia esto según el nombre de la columna en tu tabla
//         $asistencia['rol'], // Cambia esto según el nombre de la columna en tu tabla
//         $asistencia['time_in'], // Cambia esto según el nombre de la columna en tu tabla
//         $asistencia['time_out'] // Cambia esto según el nombre de la columna en tu tabla
//     );
// }

// // Agregar la tabla al PDF
// $pdf->SetFillColor(0, 0, 255);
// $pdf->SetFont('dejavusans', '', 10); // Configurar la fuente de la tabla
// $pdf->SetFillColor(255, 255, 255); // Configurar el color de relleno
// $pdf->SetTextColor(0, 0, 0); // Configurar el color del texto
// $pdf->SetDrawColor(0, 0, 255); // Configurar el color del borde
// $pdf->SetLineWidth(0.3); // Configurar el ancho de las líneas
// $pdf->SetX(10); // Configurar la posición X inicial de la tabla
// $pdf->SetY(70); // Configurar la posición Y inicial de la tabla

// foreach ($data as $row) {
//     $pdf->Cell(8, 6, $row[0], 1, 0, 'C', 1); // Agregar celda con datos y configuraciones específicas
//     $pdf->Cell(68, 6, $row[1], 1, 0, 'C', 1); 
//     $pdf->Cell(25, 6, $row[2], 1, 0, 'C', 1);
//     $pdf->Cell(35, 6, $row[3], 1, 0, 'C', 1);
//     $pdf->Cell(45, 6, $row[4], 1, 0, 'C', 1);
//     $pdf->Cell(45, 6, $row[5], 1, 1, 'C', 1);
// }

// // Agregar la fecha actual en el pie de página
// $pdf->SetFont('dejavusans', 'I', 8);
// $pdf->SetY(-35);
// $pdf->Cell(50, 10, 'Fecha: ' . date('d/m/Y'), 0, 0, 'L');

// // Generar y mostrar el PDF
// $pdf->Output('reporte_asistencias.pdf', 'I'); // Generar el archivo PDF y mostrarlo en el navegador
