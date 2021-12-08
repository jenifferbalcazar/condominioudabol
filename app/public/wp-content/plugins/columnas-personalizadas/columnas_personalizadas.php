<?php

/**
 * Plugin Name: Columnas Personalizadas para las tablas de todos los Custom Post Types.
 * Description: Añade las columnas personalizadas de cada Custom Post Type en su respectivas tablas.
 * Author: Jeniffer Balcazar, Leonardo Guevara, Jesús Chavarria y Fanor Flores
 */


add_action('init', 'agregar_columnas_personalizadas');

function agregar_columnas_personalizadas()
{
    include plugin_dir_path(__FILE__) . '/funciones/tipo-columnas.php';
    new Tipos_Columnas;
}