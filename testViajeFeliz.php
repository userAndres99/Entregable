<?php

include 'viajeFeliz.php';

/**
 * (Dado dos numero uno el minimo y el otro el maximo le solicita al usuario que ingrese un numero dentro de ese rango)
 * @param int $min
 * @param int $max
 * @return int
 */
function solicitarNumeroEntre($min, $max){
    //int $numero
    $numero = trim(fgets(STDIN));
    while (!is_int($numero) && !($numero >= $min && $numero <= $max)) {
        echo "Debe ingresar un número entre " . $min . " y " . $max . ": ";
        $numero = trim(fgets(STDIN));
    }
    return $numero;
}
//--------------------------------------------------------------------------------
/**
 * (muestra a los pasajeros del viaje)
 * @param array $losPasajeros
 */
function mostrarPasajeros($losPasajeros){

    for($i=0;$i < count($losPasajeros); $i++){

        echo "--- PASAJERO ". $i+1 ."---\n";
        echo "NOMBRE:".$losPasajeros[$i]["nombre"]." APELLIDO:".$losPasajeros[$i]["apellido"]." DNI:".$losPasajeros[$i]["documento"]."\n \n";
    }
}
//-------------------------------------------------------------------------------- 
/**
 * (Menu Principal del Viaje)
 */
function menuPrincipal(){
    // int $opcionPrincipal

    echo "\n----- MENU PRINCIPAL ----- \n \n";
    
    echo "1-)Ver los Datos del Viaje \n";
    echo "2-)Ver los Datos de los Pasajeros: \n";
    echo "3-)Modificar la Informacion del Viaje:  \n";
    echo "4-)Modificar la Informacion de Pasajeros: \n \n";

    $opcionPrincipal=solicitarNumeroEntre(1,4);
    return $opcionPrincipal;
}
//--------------------------------------------------------------------------------
/**
 * (Menu Para Modificar los Datos del Viaje)
 */
function menuViaje(){
    // int $opcionViaje

    echo "----- QUE DESEA MODIFICAR DEL VIAJE? ----- \n \n";

    echo "1) El Codigo del Viaje \n";
    echo "2) El Destino del Viaje \n";
    echo "3) La Cantidad Maxima de Pasajeros \n \n";

    $opcionViaje=solicitarNumeroEntre(1,3);
    return $opcionViaje;
}
//--------------------------------------------------------------------------------
/**
 * (Menu Para Modificar los Datos de los Pasajeros)
 */
function menuPasajeros(){
    //int $opcionPasajero

    echo "----- QUE DESEA MODIFICAR DEL PASAJERO? ----- \n \n";

    echo "1) El Nombre\n";
    echo "2) El Apellido\n";
    echo "3) Numero de Documento\n";

    $opcionPasajero=solicitarNumeroEntre(1,3);
    return $opcionPasajero;

}
//--------------------------------------------------------------------------------
/**
 * (un array de pasajeros de prueba)
 */
/*function cargarPasajerosDePrueba(){
    //array $losPasajerosV
    $losPasajerosV=[];
    $losPasajerosV[0]=["nombre"=>"juan" , "apellido" =>"menard" , "documento"=> 41327654];
    $losPasajerosV[1]=["nombre"=>"lucas" , "apellido" =>"mendoza" , "documento"=> 42849651];
    $losPasajerosV[2]=["nombre"=>"martin" , "apellido" =>"roca" , "documento"=> 35893621];
    $losPasajerosV[3]=["nombre"=>"andres" , "apellido" =>"velozo" , "documento"=> 33009455];
    $losPasajerosV[4]=["nombre"=>"marta" , "apellido" =>"rondozo" , "documento"=> 44047643];

    return $losPasajerosV;
}*/

$viaje1= new Viaje();

/**DATOS DE PRUEBAS 
 * pasajerosDePrueba=cargarPasajerosDePrueba();
 * $viaje1->set_arrayPasajeros($pasajerosDePrueba);
 * $viaje1->set_codigo(4);
 * $viaje1->set_destino("Micasa");
 * $viaje1->set_cantMaximaPasajeros(45);
*/

//PARA QUE EL USUARIO INGRESE LOS DATOS DEL VIAJE Y LOS PASAJEROS
echo "\n----- BIENVENIDO A VIAJE FELIZ----- \n \n";

echo "Ingrese el Codigo del Viaje \n ";
$codigoViaje = trim(fgets(STDIN));

echo "Ingrese el Destino del Viaje \n";
$destinoViaje = trim(fgets(STDIN));

echo "Ingrese la Cantidad Maxima de Pasajeros \n";
$cantidadMaxPasajeros=trim(fgets(STDIN));

//POR SI SE INGRESA UN NUMERO MENOR O IGUAL A 0
while ($cantidadMaxPasajeros <= 0){
    echo "Debe Ingresar un Numero Mayor a 0: \n ";
    $cantidadMaxPasajeros=trim(fgets(STDIN));
}

//PARA IR CARGANDO EL ARRAY DE PASAJEROS
for ($i=1;$i <= $cantidadMaxPasajeros;$i++){
    echo "\n --- Pasajero ". $i ." de ".$cantidadMaxPasajeros." ---\n \n";

    echo "Ingrese el Nombre: \n";
    $nombrePasajero = trim(fgets(STDIN)); 
    echo "Ingrese el Apellido: \n";
    $apellidoPasajero = trim(fgets(STDIN));
    echo "Ingrese el DNI: \n";
    $documentoPasajero = trim(fgets(STDIN));

    $arrayPasajerosViaje[$i-1]=["nombre"=>$nombrePasajero , "apellido" =>$apellidoPasajero , "documento"=> $documentoPasajero];

}

//ENVIO DE LOS DATOS INGRESADOS POR EL USUARIO
$viaje1->set_codigo($codigoViaje);
$viaje1->set_destino($destinoViaje);
$viaje1->set_cantMaximaPasajeros($cantidadMaxPasajeros);
$viaje1->set_arrayPasajeros($arrayPasajerosViaje);

do{

    $opcion = menuPrincipal();

    switch($opcion){
        case 1:

            echo "\n----- DATOS DEL VIAJE ----- \n \n";

            echo "el destino es ".$viaje1->get_destino()."\n";
            echo "el codigo es ".$viaje1->get_codigo()."\n";
            echo "la cantidad maxima de pasajeros es ".$viaje1->get_cantMaximaPasajeros()."\n";
            
        break;
        case 2:

            echo "\n----- DATOS DE LOS PASAJEROS ----- \n \n";

            $arrayPasajerosViaje=$viaje1->get_arrayPasajeros();
            mostrarPasajeros($arrayPasajerosViaje);

        break;
        
        case 3:

            
            do{

                $opcion = menuViaje();

                switch($opcion){
                    
                    case 1:
                        echo "--- El Codigo es ".$viaje1->get_codigo()." ---\n \n";
                        echo "Ingrese el Nuevo Codigo";
                        $nuevoCodigo=trim(fgets(STDIN));
                        $viaje1=set_codigo($nuevoCodigo);

                    break;

                    case 2:
                        echo "--- El Destino es ".$viaje1->get_destino()." ---\n \n";
                        echo "Ingrese el Nuevo Destino";
                        $nuevoDestino=trim(fgets(STDIN));
                        $viaje1=set_destino($nuevoDestino);

                    break;

                    case 3:
                        echo "--- La Cantidad Maxima de Pasajeros es ".$viaje1->get_cantMaximaPasajeros()." ---\n \n";
                        echo "Ingrese la Nueva Cantidad Maxima de Pasajeros";
                        $nuevaCantMaxPasajeros=trim(fgets(STDIN));
                        $viaje1=set_cantMaximaPasajeros($nuevaCantMaxPasajeros);

                    break;
                    
                }

            
            }while($opcion=!3);

        break;

        case 4:


            $arrayPasajerosViaje=$viaje1->get_arrayPasajeros();
            


            //-----UN DO WHILE POR SI NO SE ENCUENTRA EL DOCUMENTO INGRESADO-----
            do{

            echo "Ingrese el Documento del Pasajero que Quiere Modificar";
            $documentoPasajero=trim(fgets(STDIN));
                
            $i = 0;
            //-----RECORRIDO PARCIAL PARA BUSCAR AL PASAJERO-----
            while (($i < count($arrayPasajerosViaje)) && !($documentoPasajero == $arrayPasajerosViaje[$i]["documento"])) {
                $i = $i + 1;
            }
            if( $i == count($arrayPasajerosViaje)){
                echo "\n--- EL DOCUMENTO INGRESADO NO FUE ENCONTRADO EN LA LISTA DE PASAJEROS ---  \n \n ";
            }
           
            }while($i == count($arrayPasajerosViaje));


            do{

                $opcion=menuPasajeros();

                switch ($opcion){

                    case 1:

                        echo "--- (EL NOMBRE ES: ".$arrayPasajero[$i]["nombre"].") ---\n\n";
                        echo "Ingrese el Nuevo Nombre\n";
                        $nuevoNombre=trim(fgets(STDIN));
                        $viaje1->set_pasajero($i,"nombre",$nuevoNombre);

                        //-----PARA VER SI SE GUARDO EL NOMBRE-----
                       // $pasajerosDePrueba=$viaje1->get_arrayPasajeros();
                       // mostrarPasajeros($pasajerosDePrueba);

                    break;

                    case 2:

                        echo "--- (EL APELLIDO ES: ".$arrayPasajero[$i]["apellido"].") ---\n\n";
                        echo "Ingrese el Nuevo Apellido\n";
                        $nuevoApellido=trim(fgets(STDIN));
                        $viaje1->set_pasajero($i,"apellido",$nuevoApellido);

                        //-----PARA VER SI SE GUARDO EL APELLIDO-----
                        // $pasajerosDePrueba=$viaje1->get_arrayPasajeros();
                        // mostrarPasajeros($pasajerosDePrueba);

                    break;

                    case 3:

                        echo "--- (EL DOCUMENTO ES: ".$arrayPasajero[$i]["documento"].") ---\n\n";
                        echo "Ingrese el Nuevo Documento\n";
                        $nuevoDocumento=trim(fgets(STDIN));
                        $viaje1->set_pasajero($i,"documento",$nuevoDocumento);

                        //-----PARA VER SI SE GUARDO EL DOCUMENTO-----
                        // $pasajerosDePrueba=$viaje1->get_arrayPasajeros();
                        // mostrarPasajeros($pasajerosDePrueba);

                    break;
                }
                
            }while($opcionPasajero=!3);

        break;
      
    }

}while ($opcion=!4);