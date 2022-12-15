<?php
    // require_once "Connection.php";
    // class Categoria{
    //     public static function getAll(){
    //         $db =new Connection();
    //         $query="SELECT * FROM encuesta_pdv_tbl LIMIT 3";
    //         $resultado= $db->query($query);
    //         $datos=[];
    //         if($resultado->num_rows){
    //             while($row = $resultado->fetch_assoc()){
    //                 $datos[]=[
    //                     'campo1' => $row['cmpIdentificacion'],
    //                     'campo2' => $row['estadoVerificaPdv'],
    //                     'campo3' => $row['pregunta1'],
    //                     'campo4' => $row['respuesta1'],
    //                     'campo5' => $row['pregunta2'],
    //                     'campo6' => $row['respuesta2'],
    //                 ];
    //             }//end while
    //             return $datos;
    //         }//end if
    //         return $datos;
    //     }//end getAll

    //     public static function insert($nombre, $ap, $am, $fn, $genero){
    //         $db =new Connection();
    //         $query="INSERT INTO example_tb(campo1, campo2, campo3, campo4, campo5)
    //         VALUES('".$nombre."', '".$ap."', '".$am."', '".$fn."', '".$genero."')";
    //         $db->query($query);
    //         if($db->affected_rows){
    //             return TRUE;
    //         }//end insert
    //         return FALSE;
    //     }
    // }
    require_once "Connection.php";
    require_once "Connection2.php";
    class Categoria{
        public static function getAll(){
            $db =new Connection();
            $query="SELECT * FROM encuesta_pdv_tbl LIMIT 3";
            $resultado= $db->query($query);
            $datos=[];
            if($resultado->num_rows){
                while($row = $resultado->fetch_assoc()){
                    $datos[]=[
                        'campo1' => $row['cmpIdentificacion'],
                        'campo2' => $row['estadoVerificaPdv'],
                        'campo3' => $row['pregunta1'],
                        'campo4' => $row['respuesta1'],
                        'campo5' => $row['pregunta2'],
                        'campo6' => $row['respuesta2'],
                    ];
                }//end while
                return $datos;
            }//end if
            return $datos;
        }//end getAll

        public static function insert($nombre, $ap, $am, $fn, $genero){
            $db =new Connection();
            $db2 =new Connection2();
            $query="INSERT INTO example_tb(campo1, campo2, campo3, campo4, campo5)
            VALUES('".$nombre."', '".$ap."', '".$am."', '".$fn."', '".$genero."')";
            $query2="UPDATE vivewow.validacion_datos_vivewow
            SET ESTADO = 'FIRMADO' WHERE vivewow.validacion_datos_vivewow.CEDULA='".$nombre."'";
            $db->query($query);
            $db2->query($query2);
            if($db->affected_rows){
                return TRUE;
            }//end insert
            return FALSE;
        }
    }