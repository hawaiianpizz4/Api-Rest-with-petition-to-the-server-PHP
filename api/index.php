<?php
// require_once "../Categoria.php";

//     switch($_SERVER['REQUEST_METHOD']){
//         case 'GET':
//             echo json_encode(Categoria::getAll());
//             break;


//         case 'POST':
//             $datos=json_decode(file_get_contents('php://input'));
//             $pdf =base64_decode($datos->campo5, true);
//             // file_put_contents('/var/www/html/ventaspdv/ApiRi/file.pdf', $pdf);
//             // var_dump($pdf);
//             // var_dump($cedula->dato1);
//             if($datos != NULL){
//                 if(Categoria::insert($datos->dato1, $datos->campo2, $datos->campo3, $datos->campo4, $datos->campo5)){
//                     http_response_code(200);

//                 }//end if
//                 else{
//                     http_response_code(400);
//                 }//end else
//             }//end if
//             else{
//                 http_response_code(405);
//             }//end else
//             break;   
//         default:
//             break;
//     }


require_once "../Categoria.php";

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        echo json_encode(Categoria::getAll());
        break;


    case 'POST':
        $datos = json_decode(file_get_contents('php://input'));
        // var_dump($pdf);
        // guardamos en el archivo el contenido que hay despues de la coma
        // $f = fopen("archivos", "w") or die("Unable to open file!");
        // fwrite($f, $pdf);
        // fclose($f);
        // var_dump($pdf);
        if ($datos != NULL) {
            if (Categoria::insert($datos->cedula, $datos->nombre, $datos->celular, $datos->email, $datos->pdf)) {
                $pdf = base64_decode($datos->pdf, true);
                $cedula= $datos->cedula;
                $nombre= $datos->nombre;
                // $cedulanombre= $cedula . $nombre;
                $fechaActual = date('d-m-y');
                //C:\Users\JMORALES\Desktop\imagen
                // $url  = "\\\\210.17.1.38\h\\htdocs\\pdf\\";
                $url  = "\\\\210.17.1.38\htdocs\\archivoscontratos\\";
                if($pdf_final = file_put_contents( $url .$cedula. '_'  .$nombre. '_' .$fechaActual. 'file.pdf', $pdf)){
                    echo json_encode('Archivo Guardado Correctamente'); //Imprimir mensaje de exito en postamn
                    http_response_code(200);
                }
                else{
                    echo json_encode('Ocurrio un error'); //Imprimir mensaje de error en el postamn
                }
                // var_dump($pdf_final);
                
                
            } //end if
            else {
                http_response_code(400);
            } //end else
        } //end if
        else {
            http_response_code(405);
        } //end else
        break;
    default:
        break;
}


