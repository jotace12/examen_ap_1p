<?php
require_once('../Models/cls_facturas.model.php');
$facturas = new Clase_facturas;
switch ($_GET["op"]) {
    case 'todos':
        $datos = array(); //defino un arreglo
        $datos = $facturas->todos(); //llamo al modelo de usuarios e invoco al procedimiento todos y almaceno en una variable
        while ($fila = mysqli_fetch_assoc($datos)) { //recorro el arreglo de datos
            $todos[] = $fila;
        }
        echo json_encode($todos); //devuelvo el arreglo en formato json
        break;
    case "uno":
        $id_factura = $_POST["id_factura"]; //defino una variable para almacenar el id del usuario, la variable se obtiene mediante POST
        $datos = array(); //defino un arreglo
        $datos = $facturas->uno($id_factura); //llamo al modelo de usuarios e invoco al procedimiento uno y almaceno en una variable
        $uno = mysqli_fetch_assoc($datos); //recorro el arreglo de datos
        echo json_encode($uno); //devuelvo el arreglo en formato json
        break;
    case 'insertar':
        $id_cliente = $_POST["id_cliente"];
        $fecha = $_POST["fecha"];
        $total = $_POST["total"];
        $estado = $_POST["estado"];
        $datos = array(); //defino un arreglo
        $datos = $facturas->insertar($id_cliente, $fecha, $total, $estado); //llamo al modelo de usuarios e invoco al procedimiento insertar
        echo json_encode($datos); //devuelvo el arreglo en formato json
        break;
    case 'actualizar':
        $id_factura = $_POST["id_factura"];
        $id_cliente = $_POST["id_cliente"];
        $total = $_POST["total"];
        $estado = $_POST["estado"];
        $datos = array(); //defino un arreglo
        $datos = $facturas->actualizar($id_factura, $id_cliente, $total, $estado); //llamo al modelo de usuarios e invoco al procedimiento actual
        echo json_encode($datos); //devuelvo el arreglo en formato json
        break;
    case 'eliminar':
        $id_factura = $_POST["id_factura"]; //defino una variable para almacenar el id del usuario, la variable se obtiene mediante POST
        $datos = array(); //defino un arreglo
        $datos = $facturas->eliminar($id_factura); //llamo al modelo de usuarios e invoco al procedimiento uno y almaceno en una variable
        echo json_encode($datos); //devuelvo el arreglo en formato json
        break;
}
