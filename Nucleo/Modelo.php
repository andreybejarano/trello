<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Modelo
 *
 * @author Cristian Gómez
 */
class Modelo {
    
    public static function cargar($nombreModelo) {
        
        require DIRECTORIO_MODELOS . 'Conexion.php';

        if (!empty($nombreModelo))
            $rutaModelo = DIRECTORIO_MODELOS . $nombreModelo . '.php';
        else
            exit('El Modelo' . $nombreModelo . ' No fue definido');


        if (is_file($rutaModelo))
            require $rutaModelo;
        else
            exit('El Modelo ' . $rutaModelo . ' No existe - 404');
        
        $modelo = new $nombreModelo();
        return $modelo;     
    }
}

