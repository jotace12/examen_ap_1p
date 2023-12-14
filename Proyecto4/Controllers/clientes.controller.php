<?php
require_once('../Models/cls_clientes.models.php');
$clientes = new Clase_clientes;

switch ($_GET["op"]) {
    case 'todos':
        $datos = $clientes->todos();
        $todos = [];
        while ($fila = mysqli_fetch_assoc($datos)) {
            $todos[] = $fila;
        }
        echo json_encode($todos);
        break;

    case 'uno':
        $id_cliente = $_POST["id_cliente"];
        $datos = $clientes->uno($id_cliente);
        $uno = mysqli_fetch_assoc($datos);
        echo json_encode($uno);
        break;

    case 'insertar':
        $nombre = $_POST["nombre"];
        $direccion = $_POST["direccion"];
        $telefono = $_POST["telefono"];
        $correo = $_POST["correo"];
        $datos = $clientes->insertar($nombre, $direccion, $telefono, $correo);
        echo json_encode($datos);
        break;

    case 'actualizar':
        $id_cliente = $_POST["id_cliente"];
        $nombre = $_POST["nombre"];
        $direccion = $_POST["direccion"];
        $telefono = $_POST["telefono"];
        $correo = $_POST["correo"];
        $datos = $clientes->actualizar($id_cliente, $nombre, $direccion, $telefono, $correo);
        echo json_encode($datos);
        break;

    case 'eliminar':
        $id_cliente = $_POST["id_cliente"];
        $datos = $clientes->eliminar($id_cliente);
        echo json_encode($datos);
        break;

    case 'telefono_repetido':
        $telefono = $_POST["telefono"];
        $datos = $clientes->telefono_repetido($telefono);
        $telefonoRepetido = mysqli_fetch_assoc($datos);
        echo json_encode($telefonoRepetido);
        break;

    case 'correo_repetido':
        $correo = $_POST["correo"];
        $datos = $clientes->correo_repetido($correo);
        $correoRepetido = mysqli_fetch_assoc($datos);
        echo json_encode($correoRepetido);
        break;
}
