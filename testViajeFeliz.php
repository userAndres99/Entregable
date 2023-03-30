<?php

include 'viajeFeliz.php';

/**
 * (Dado dos numero uno el minimo y el otro el maximo le solicita al usuario que ingrese un numero dentro de ese rango)
 * @param int $min
 * @param int $max
 * @return int
 */
function solicitarNumeroEntre($min, $max)
{
    //int $numero
    $numero = trim(fgets(STDIN));
    while (!is_int($numero) && !($numero >= $min && $numero <= $max)) {
        echo "Debe ingresar un número entre " . $min . " y " . $max . ": ";
        $numero = trim(fgets(STDIN));
    }
    return $numero;
}

/**
 * @param array $losPasajeros
 */
function mostrarPasajeros($losPasajeros){

    for($i=0;$i < count($losPasajeros); $i++){
        echo $i + 1 ."-NOMBRE:".$losPasajeros[$i]["nombre"]." APELLIDO:".$losPasajeros[$i]["apellido"]." DNI:".$losPasajeros[$i]["documento"]."\n";
    }
}

function cargarPasajerosDePrueba(){
    //array $losPasajerosV
    $losPasajerosV=[];
    $losPasajerosV[0]=["nombre"=>"juan" , "apellido" =>"menard" , "documento"=> 41327654];
    $losPasajerosV[1]=["nombre"=>"lucas" , "apellido" =>"mendoza" , "documento"=> 42849651];
    $losPasajerosV[2]=["nombre"=>"martin" , "apellido" =>"roca" , "documento"=> 35893621];
    $losPasajerosV[3]=["nombre"=>"andres" , "apellido" =>"velozo" , "documento"=> 33009455];
    $losPasajerosV[4]=["nombre"=>"marta" , "apellido" =>"rondozo" , "documento"=> 44047643];

    return $losPasajerosV;
}





$viaje1= new Viaje();

$pasajerosDePrueba=cargarPasajerosDePrueba();

$viaje1->set_todoPasajeros($pasajerosDePrueba);
$viaje1->set_codigo(4);
$viaje1->set_destino("Micasa");
$viaje1->set_cantMaximaPasajeros(45);




do{



    echo "SELECCIONAR UNA OPCION:\n";
    echo "1) Ver los datos del viaje \n";
    echo "2) Ver los datos de los pasajeros: \n";
    echo "3) Modificar la informacion del viaje: \n";
    echo "4) Modificar la informacion de pasajeros: \n";

    $opcion=solicitarNumeroEntre(1,4);

    switch($opcion){
        case 1:
            //$pasajeros=$viaje1->get_arrayPasajeros();
            echo $viaje1;

           /*echo "el destino es ".$viaje1->get_destino()."\n";
           echo "el codigo es ".$viaje1-get_codigo()."\n";
           echo "la cantidad maxima de pasajeros es ".$viaje1->get_cantMaximaPasajeros()."\n";
            */
        break;
        case 2:

            $pasajeros=$viaje1->get_arrayPasajeros();
            mostrarPasajeros($pasajeros);

        break;
        
        case 3:

            
            do{

                echo "Que desea Modificar del Viaje? \n";
                echo "1) El Codigo del Viaje \n";
                echo "2) El Destino del Viaje \n";
                echo "3) La Cantidad Maxima de Pasajeros \n";

                $opcionViaje=solicitarNumeroEntre(1, 3);

                switch($opcionViaje){
                    
                    case 1:
                        echo "el codigo es ".$viaje1->get_codigo()."\n";
                        echo "Ingrese el Nuevo Codigo";
                        $nuevoCodigo=trim(fgets(STDIN));
                        $viaje1=set_codigo($nuevoCodigo);

                    break;

                    case 2:
                        echo "el destino es ".$viaje1->get_destino()."\n";
                        echo "Ingrese el Nuevo Destino";
                        $nuevoDestino=trim(fgets(STDIN));
                        $viaje1=set_destino($nuevoDestino);

                    break;

                    case 3:
                        echo "la cantidad maxima de pasajeros es ".$viaje1->get_cantMaximaPasajeros()."\n";
                        echo "Ingrese la Nueva Cantidad Maxima de Pasajeros";
                        $nuevaCantMaxPasajeros=trim(fgets(STDIN));
                        $viaje1=set_cantMaximaPasajeros($nuevaCantMaxPasajeros);

                    break;
                    
                }

            
            }while($opcionViaje=!3);
        break;

        case 4:
            
            echo "ingrese la ubicacion del pasajero que quiere modificar";
            $numPasajero=solicitarNumeroEntre( 1 , count($viaje1->get_arrayPasajeros()));
            $numPasajero=$numPasajero - 1;
            do{
                echo "que es lo que quiere modificar del pasajero ? ";
                echo "1) el nombre";
                echo "2) el apellido";
                echo "3) numero de documento";
                $opcionPasajero=solicitarNumeroEntre(1,3);
                switch ($opcionPasajero){

                    case 1:

                        echo "Ingrese el Nuevo Nombre";
                        $nuevoNombre=trim(fgets(STDIN));
                        $viaje1->set_arrayPasajeros($numPasajero,"nombre",$nuevoNombre);

                        //$pasajerosDePrueba=$viaje1->get_arrayPasajeros();
                        //mostrarPasajeros($pasajerosDePrueba);

                    break;

                    case 2:

                        echo "ingrese el nuevo apellido";
                        $nuevoApellido=trim(fgets(STDIN));
                        $viaje1->set_arrayPasajeros($numPasajero,"apellido",$nuevoApellido);

                    break;

                    case 3:

                        echo "ingrese el nuevo documento";
                        $nuevoDocumento=trim(fgets(STDIN));
                        $viaje1->set_arrayPasajeros($numPasajero,"documento",$nuevoDocumento);

                    break;
                }
            }while($opcionPasajero=!3);
        break;

            

            
    }


}while ($opcion=!4);