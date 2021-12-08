<?php

class Tipos_Columnas{


    function __construct()
    {
        //agrega las columnas al cpt departamento
        add_filter( 'manage_edit-departamento_columns', [$this, 'agregarColumnasDepartamentos']);
        add_action( 'manage_departamento_posts_custom_column',  [$this, 'personalizar_contenido_columna_dpto'], 10, 2);

         //agrega las columnas al cpt copropietarios
        add_filter( 'manage_edit-copropietarios_columns', [$this, 'personalizar_copropietarios'] );
        add_action( 'manage_copropietarios_posts_custom_column', [$this, 'personalizar_contenidos_copropietarios'], 10, 2);

        //agrega las columnas al generar QR
        add_filter( 'manage_edit-generarqr_columns', [$this, 'personalizar_columnas_qr'] );
        add_action( 'manage_generarqr_posts_custom_column', [$this, 'personalizar_contenidos_qr'], 10, 2);
    }

    public function agregarColumnasDepartamentos($columns){
        $columns = array(
          'cb'                       => '<input type="checkbox"/>',
          'title'                    => 'Número del Departamento',
          'descripcion'	             => 'Descripción'
    );
        return $columns;
    }

    public function personalizar_contenido_columna_dpto( $column, $post_id ) {
        global $post;
        
      switch ($column)
      {
        case 'title':
                echo get_field('title', $post_id ,true );
                break;
         case 'descripcion':
                echo get_field('descripcion', $post_id ,true );
                break;
      }
    } 
        

    function personalizar_copropietarios( $columns ) {
        $columns = array(
                'cb'                         => '<input type="checkbox" />',
                'title'                      => 'Nombre Completo',
                'nombre_completo_del_esposo' => 'Nombre esposo(a)',
                'dni_o_ci'                   => 'Carnet de Identidad',
                'fecha_de_nacimiento'        => 'Fecha de Nacimiento',
                'nacionalidad'               => 'Nacionalidad',
                'telefono'                   => 'Teléfono',
                'correo'                     => 'Correo',
                'cantidad_de_personas'       => 'Cantidad de Personas',
                'numero_del_departamento'    => 'Número del Departamento',
        );
    return $columns;
    }

    function personalizar_contenidos_copropietarios( $column, $post_id ) {
        global $post;
        
    switch ($column)
    {
        case 'title':
                    echo get_post_meta($post_id,'title',true );
                    break;
        case 'copropietario_esposo':
            if('copropietario_esposo'== 'Sí'){
                    echo get_post_meta($post_id,'nombre_completo_del_esposo', true);
                    break;
            }  
            else{
                'No Aplica';
            }        
        case 'dni_o_ci':
                    echo get_post_meta($post_id,'dni_o_ci',true );
                    break;
        case 'fecha_de_nacimiento':
                    echo get_post_meta($post_id,'fecha_de_nacimiento',true );
                    break;
        case 'nacionalidad':
                    echo get_post_meta($post_id,'nacionalidad',true );
                    break;
        case 'telefono':
                    echo get_post_meta($post_id,'telefono',true );
                    break;
        case 'correo':
                    echo get_post_meta($post_id,'correo',true );
                    break;
        case 'cantidad_de_personas':
                    echo get_post_meta($post_id,'cantidad_de_personas',true );
                    break;
        case 'numero_de_departamento':
                    echo get_post_meta($post_id,'numero_de_departamento',true );
                    break;
      }
    }

      
    function personalizar_columnas_qr( $columns ) {
        $columns = array(
                'cb'                            => '<input type="checkbox" />',
                'title'                         => 'Título del QR',
                'fecha_y_hora_de_inicio'        => 'Fecha y hora inicio del QR', 
                'fecha_y_hora_de_finalizacion'	=> 'Fecha y hora final del QR',
                'cantidad'	                    => 'Cantidad de Pases',
                'author'                        => 'Copropietario',
                'llave_del_qr'	                => 'Código QR',
        );
    return $columns;
    }

    
    function personalizar_contenidos_qr( $column, $post_id ) {
        global $post;
        
    switch ($column)
        {
        case 'title':
                    echo get_post_meta($post_id,'title', true);
                    break;
        case 'fecha_y_hora_de_inicio':
                    echo get_post_meta($post_id,'fecha_y_hora_de_inicio',true );
                    break;
        case 'fecha_y_hora_de_finalizacion':
                    echo get_post_meta($post_id,'fecha_y_hora_de_finalizacion', true);
                    break;
        case 'cantidad':
                    echo get_post_meta($post_id,'cantidad', true);
                    break;
        case 'author':
                    echo get_the_author();
                    break;
        case 'llave_del_qr':
                 $imagen_qr_id= get_post_meta($post_id, 'id_del_qr', true);
                 $imagen_qr_url= wp_get_attachment_image_url($imagen_qr_id);
                 echo '<a href="' . $imagen_qr_url . '" download="CódigoQR.png"><img width="100" height="100" src="' . $imagen_qr_url . '" ><pre>Descargar QR</pre></a>';
                 //echo '<img width="100" height="100" src="' . $imagen_qr_url . '" >';
                 
        }
    }
} 