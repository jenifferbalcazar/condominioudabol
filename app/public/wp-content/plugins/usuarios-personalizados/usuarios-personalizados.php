<?php

/*
Plugin Name:  Usuarios Personalizados
Version:  1.0
Description: Añadir los usuarios personalizados para los Custom Post Types: Copropietario y Seguridad'
Author: Jeniffer Balcazar, Leonardo Guevara, Jesús Chavarria y Fanor Flores
*/

add_action('init', 'agregar_usuarios_personalizados');

function agregar_usuarios_personalizados()
{
    include plugin_dir_path(__FILE__) . '/funcionesUsuarios/tipos-roles.php';
    new Tipo_Roles;
}