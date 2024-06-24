<?php

// Establecer la conexión a la base de datos
$servername = "localhost";
$username = "cobra";
$password = "xogJjqNFVP3-30eJ";
$database = "sistemadehospital";

$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Obtener los datos del formulario
$id = isset($_POST['id']) ? (int) $_POST['id'] : 0;
$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
$apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : '';
$estado_civil = isset($_POST['estado civil']) ? $_POST['estado civil'] : '';
$sexo = isset($_POST['sexo']) ? $_POST['sexo'] : '';
$tipo_documento = isset($_POST['tipo de documento']) ? $_POST['tipo de documento'] : '';
$documento = isset($_POST['documento']) ? $_POST['documento'] : '';
$afiliacion_ars = isset($_POST['afiliado ars']) ? $_POST['afiliado ars'] : '';
$telefono = isset($_POST['telefono']) ? $_POST['telefono'] : '';
$pais_origen = isset($_POST['paisde origen']) ? $_POST['pais de origen'] : '';
$direccion = isset($_POST['direccion']) ? $_POST['direccion'] : '';
$nss = isset($_POST['nss']) ? $_POST['nss'] : '';

// Preparar la consulta SQL
$sql = "UPDATE pacientes SET nombre = ?, apellidos = ?,  `estado civil` = ?, sexo = ?, `tipo de documento` = ?, documento = ?, `afiliado ars` = ?, telefono = ?, `pais deorigen` = ?, direccion = ?, nss = ? WHERE id_pacientes = ?";
$stmt = $conn->prepare($sql);

if (!$stmt) {
    die("Error al preparar la consulta: " . $conn->error);
}

$stmt->bind_param("ssssssssssss", $nombre, $apellidos, $estado_civil, $sexo, $tipo_documento, $documento, $afiliacion_ars, $telefono, $pais_origen, $direccion, $nss, $id);

// Ejecutar la consulta
if ($stmt->execute()) {
    echo "Paciente actualizado correctamente.";
} else {
    echo "Error al actualizar el paciente: " . $stmt->error;
}

// Cerrar la conexión
$stmt->close();
$conn->close();
?>