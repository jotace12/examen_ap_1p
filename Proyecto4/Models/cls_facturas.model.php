<?php
require_once('cls_conexion.model.php');
class Clase_facturas
{
    public function todos()
    {
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
            $cadena = "SELECT factura.id_factura, factura.fecha, factura.total, factura.estado, cliente.nombre as cliente FROM `factura` inner JOIN cliente on cliente.id_cliente = factura.id_cliente";
            $result = mysqli_query($con, $cadena);
            return $result;
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function uno($id_factura)
    {
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
            $cadena = "SELECT * FROM `factura` WHERE id_factura=$id_factura";
            $result = mysqli_query($con, $cadena);
            return $result;
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function insertar($id_cliente, $fecha, $total, $estado)
    {
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
            date_default_timezone_set('America/Guayaquil');
            $fecha = date("Y-m-d H:i:s");
            $cadena = "INSERT INTO `factura`(`id_cliente`,`fecha`, `total`, `estado`) VALUES ('$id_cliente', '$fecha', '$total', '$estado')";
            $result = mysqli_query($con, $cadena);
            return 'ok';
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function actualizar($id_factura, $id_cliente, $total, $estado)
    {
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
            $cadena = "UPDATE `factura` SET `id_cliente`='$id_cliente', `total`='$total', `estado`='$estado' WHERE `id_factura`='$id_factura'";
            $result = mysqli_query($con, $cadena);
            return "ok";
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function eliminar($id_factura)
    {
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
            $cadena = "delete from factura where id_factura=$id_factura";
            $result = mysqli_query($con, $cadena);
            return "ok";
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }



}
