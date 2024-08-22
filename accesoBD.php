<?php
require_once 'conexion.php';

date_default_timezone_set("UTC");

class accesoBD{

  public static function leerDatos(){
    $pArray = new stdClass();
    $sql="SELECT * FROM datos;";
    $res=conexion::ejecutarSQL($sql);
    if($res->num_rows>0){
      while($campos=$res->fetch_object()){
        $pArray->datos[] = array('id'=>$campos->id, 'valor'=>$campos->valor, 'fecha'=>$campos->fecha, 'tipo'=>$campos->tipo);
      }
      $pArray->code = '200';
    }else $pArray->code = '300';
    conexion::cerrarConexion();
    return $pArray;
  }
}
?>
