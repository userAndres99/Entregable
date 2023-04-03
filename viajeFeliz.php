<?php

class Viaje{

    //ATRIBUTOS
    private $codigoV;
    private $destinoV;
    private $cantMaxPasajeros;
    private $arrayPasajeros=[];
    

    //CONSTRUCTOR
    public function __construct($codigoV,$destinoV,$cantMaxPasajeros,$arrayPasajeros){

        $this->codigoV=$codigoV;
        $this->destinoV=$destinoV;
        $this->cantMaxPasajeros=$cantMaxPasajeros;
        $this->arrayPasajeros=$arrayPasajeros;

    }

    //METODO GET
    public function get_codigo(){
        return $this->codigoV;
    }
    public function get_destino(){
        return $this->destinoV;
    }
    public function get_cantMaximaPasajeros(){
        return $this->cantMaxPasajeros;
    }
    public function get_arrayPasajeros(){
        return $this->arrayPasajeros;
    }

    //METODO SET
    public function set_codigo($codigoV){
        $this->codigoV = $codigoV;
    }
    public function set_destino($destinoV){
        $this->destinoV = $destinoV;
    }
    public function set_cantMaximaPasajeros($cantMaxPasajeros){
        $this->cantMaxPasajeros=$cantMaxPasajeros;
    }
    public function set_arrayPasajeros($arrayPasajeros){
        $this->arrayPasajeros=$arrayPasajeros;
    }
    public function set_pasajero($numeroPasajero,$datos,$datoModificado){ 
        $this->arrayPasajeros[$numeroPasajero][$datos]=$datoModificado;
    }

    public function __toString(){

        $cadena = "";
        for($i=0;$i < count($this->get_arrayPasajeros()); $i++){
            $cadena=$cadena. "[".$i."]"."-NOMBRE:".$this->get_arrayPasajeros()[$i]["nombre"]." APELLIDO:".$this->get_arrayPasajeros()[$i]["apellido"]." DNI:".$this->get_arrayPasajeros()[$i]["documento"]."\n";
            
        }

        return  "El Codigo es: ".$this->get_codigo()."\n".
                "El Destino es: ".$this->get_destino()."\n".
                "La Cantidad Maxima de Pasajeros es: ".$this->get_cantMaximaPasajeros()."\n".
                $cadena;
                          
    }
}
