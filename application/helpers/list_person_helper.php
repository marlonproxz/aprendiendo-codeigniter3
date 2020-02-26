<?php

if ( ! function_exists('list_person'))
{
    function list_person(){
        $CI =& get_instance();
        
        $personas = $CI->Persona->findAll();
        
        $ul = "<ul>";
        foreach ($personas as $key => $persona) {
            $ul .= "<li>$persona->nombre $persona->apellido";
        }
        $ul .= "</ul>";
        
        return $ul;
    }
}
