<?php

class Tipos_Entradas
{
    function __construct()
    {
        // Añadir Entradas: departamentos
        $this->agregarDepartamentos();
        // Añadir Entradas: Copropietarios
        $this->agregarCopropietarios();
        // Añadir Entradas: Generar_QR
		$this->GenerarQr();
		//Guardar qr
		add_action('save_post_generarqr', [$this, 'guardarQR'], 10, 3);
		//Agregar la página de QR
		add_action('admin_menu',[$this, 'agregar_pagina_qr']);
		//Funcion para redireccionar si el QR viene con la url correcta
		$this->redireccionar_si_viene_con_qr();
		
    }

   //Registrando la función para añadir departamentos
    public function agregarDepartamentos() {

		$etiquetas_departamento = array(
			'name'                  => 'Departamentos',
			'singular_name'         => 'Departamento',
			'menu_name'             => 'Departamento',
			'name_admin_bar'        => 'Departamento',
			'archives'              => 'Archivo del Departamento',
			'attributes'            => 'Atributos del Departamento',
			'parent_item_colon'     => 'Padre del Departamento',
			'all_items'             => 'Todos los Departamentos',
			'add_new_item'          => 'Añadir Departamento',
			'add_new'               => 'Añadir Departamento',
			'new_item'              => 'Nuevo Departamento',
			'edit_item'             => 'Editar Departamento',
			'update_item'           => 'Actualizar Departamento',
			'view_item'             => '',
			'view_items'            => '',
			'search_items'          => 'Buscar Departamento',
			'not_found'             => 'Departamento no encontrado',
			'not_found_in_trash'    => 'Departamento no encontrado en la papelera',
			'featured_image'        => '',
			'set_featured_image'    => '',
			'remove_featured_image' => '',
			'use_featured_image'    => '',
			'insert_into_item'      => 'Insertar en el Departamento',
			'uploaded_to_this_item' => 'Subido a este Departamento',
			'items_list'            => 'Lista de Items',
			'items_list_navigation' => 'Lista de navegación',
			'filter_items_list'     => 'Filtro de la lista',
		);
		$argumentos_departamento = array(
			'label'                 => 'Departamento',
			'description'           => 'Descripción del Departamento',
			'labels'                => $etiquetas_departamento,
			'supports'              => array('author', 'title'),
			'public'                => true,
			'publicly_queryable'    => false,
			'menu_position'         => 5,
			'menu_icon'             => 'dashicons-building',
			'map_meta_cap'          => true
		);
		register_post_type('departamento', $argumentos_departamento);

	}

    //Registrando la función para añadir copropietarios
    function agregarCopropietarios() {

		$etiquetas_copropietarios = array(
			'name'                  => 'Copropietarios',
			'singular_name'         => 'Copropietario',
			'menu_name'             => 'Copropietario',
			'name_admin_bar'        => 'Copropietario',
			'archives'              => 'Archivo del Copropietario',
			'attributes'            => 'Atributos del Copropietario',
			'parent_item_colon'     => 'Padre del Copropietario',
			'all_items'             => 'Todos los Copropietarios',
			'add_new_item'          => 'Añadir Copropietario',
			'add_new'               => 'Añadir Copropietario',
			'new_item'              => 'Nuevo Copropietario',
			'edit_item'             => 'Editar Copropietario',
			'update_item'           => 'Actualizar Copropietario',
			'view_item'             => '',
			'view_items'            => '',
			'search_items'          => 'Buscar Copropietario',
			'not_found'             => 'Copropietario no encontrado',
			'not_found_in_trash'    => 'Copropietario no encontrado en la papelera',
			'featured_image'        => '',
			'set_featured_image'    => '',
			'remove_featured_image' => '',
			'use_featured_image'    => '',
			'insert_into_item'      => 'Insertar en el Copropietario',
			'uploaded_to_this_item' => 'Subido a este Copropietario',
			'items_list'            => 'Lista de Items',
			'items_list_navigation' => 'Lista de navegación',
			'filter_items_list'     => 'Filtro de la lista',
		);
		$argumentos_copropietario = array(
			'label'                 => 'Copropietario',
			'description'           => 'Descripción del Copropietario',
			'labels'                => $etiquetas_copropietarios,
			'supports'              => array('author', 'title' ),
			'public'                => true,
			'publicly_queryable'    => false,
			'menu_position'         => 5,
			'menu_icon'             => 'dashicons-businessperson',
		);
		register_post_type( 'copropietarios', $argumentos_copropietario);

	}

   // public function agregarGenerarQr()
	function GenerarQr() {

	$etiquetas_generarqr = array(
		'name'                  => 'generarqr',
		'singular_name'         => 'Generar QR',
		'menu_name'             => 'Generar QR',
		'name_admin_bar'        => 'Generar QR',
		'archives'              => 'Archivo del QR',
		'attributes'            => 'Atributos del QR',
		'parent_item_colon'     => 'Padre del QR',
		'all_items'             => 'Todos los QR',
		'add_new_item'          => 'Añadir nuevo QR',
		'add_new'               => 'Generar QR',
		'new_item'              => 'Generar QR',
		'edit_item'             => 'Editar QR',
		'update_item'           => 'Actualizar QR',
		'view_item'             => 'Ver QR',
		'view_items'            => 'Ver QR',
		'search_items'          => 'Buscar QR',
		'not_found'             => 'QR no encontrado',
		'not_found_in_trash'    => 'QR no encontrado en la papelera',
		'featured_image'        => '',
		'set_featured_image'    => '',
		'remove_featured_image' => '',
		'use_featured_image'    => '',
		'insert_into_item'      => 'Insertar en el QR',
		'uploaded_to_this_item' => 'Subido a este QR',
		'items_list'            => 'Lista de Items',
		'items_list_navigation' => 'Lista de navegación',
		'filter_items_list'     => 'Filtro de la lista',
	);
	$capacidades_generarqr = array(
		'edit_post'             => 'editar_qr',
		'read_post'             => 'leer_qr',
		'delete_post'           => 'eliminar_qr',
		'edit_posts'            => 'editar_qrs',
		'edit_others_posts'     => 'editar_otros_qr',
		'publish_posts'         => 'publicar_qr',
		'read_private_posts'    => 'leer_qr_privados',
		'edit_published_posts'  => 'editar_qr_publicados'
	);
	$arguementos_generarqr = array(
		'label'                 => 'Generar QR',
		'description'           => 'Descripción del QR',
		'labels'                => $etiquetas_generarqr,
		'supports'              => array('author','title' ),
		'public'                => true,
		'publicly_queryable'    => false,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-plus-alt',
		'capabilities'          => $capacidades_generarqr,
	);
	    register_post_type( 'generarqr', $arguementos_generarqr );

    }

	/**
     * Maneja el guardado de las visitas, a partir de este se genera el código QR
     * @param int $id_post_generarqr Id del post del post type generar qr
	 * @param WP_Post $post_generarqr Objeto del post actual, contiene todo el contenido del post.
	 * @param bool $actualizando define si el post se esta actualizando o no. True actualizando, False Creando.
     * @return void
     */
   public function guardarQR(int $id_post_generarqr, \WP_Post $post_generarqr, bool $actualizando)
   {
        // Si viene el ID del post, se está guardando, sino, es autoguardado y no queremos hacer nada
        if (empty($_POST['ID'])) return;
        
		include CARPETA_PLUGIN . '/funciones/generarQR.php';

        if (!empty($_POST['acf'])) {
            //Hcacer la url a la que los guardias vayan al momennto de validar el qr
			//La llave unica será para que cuando el guardia lea un qr, este se compare con este enlace único que estamos generando del qr que ya se generó.
            $llave_unica = md5($id_post_generarqr . $_POST['post_type']);

			//condominio.local/?datos-del-qr-a-analizar=95-gkmtgmotrmhptrmh450
            $enlace_unico = home_url() . '?datos-del-qr-a-analizar='. $id_post_generarqr .'-' . $llave_unica;

            //genera el qr con los datos del enlace único de este post y el id del qr en la base de datos. Devuleve la instancia
            $qr = new GenerarQR($enlace_unico);

            //Guardar el qr en los metadatos del post. Estos no se encuentran vinculados, con el addpostmeta se vinculan con el post.
            update_post_meta($id_post_generarqr, 'llave_del_qr', $llave_unica);

			//Guarda el id de la imagen del post, utiliza la variable pública id_imagen que se declaró en la clase GenerarQR.
			//Se hace una relación entre la imagen y el post.
			update_post_meta($id_post_generarqr, 'id_del_qr', $qr->id_imagen);

            //Mostrar el qr
           // $id_del_qr = get_post_meta($id_visita, 'id_imagen_qr', true); // [id = 1] - 1
            //echo get_media_item($id_del_qr);
        }
    }

	public function agregar_pagina_qr(){

		/**
		* @param string   $page_title Título de la página en el navegador
		* @param string   $menu_title Título en el menú de wordpress
		* @param string   $capability Capacidades
		* @param string   $menu_slug  Slug del Menú
		* @param callable $function   La función a la que llamará
		* @param string   $icon_url   Icóno en el menú de WP, se pueden encontrar en https://developer.wordpress.org/resource/dashicons/#dashicons-code-standards
		* @param int      $position   La posición en el menú donde tiene que aparecer. https://codex.wordpress.org/Administration_Menus#Top-Level_Menus
		* @return string  Retornará un string.
		 */

		//Añadirá en el menú de wordpress el apartado de validar para que cuando este sea consultado llame a la función contenido_pagina_qr
		add_menu_page('Validación de QR', 'Validar QR', 'capability_seguridad', 'validar-qr', [$this, 'contenido_pagina_qr'], 'dashicons-code-standards', 9);
	}

    //Función para verificar que los QR, tanto el leído como el que se encuentra creado sean iguales.
	public function contenido_pagina_qr(){
		//si esta vacia la variable get en su atributo datosQR mostrará un mensaje.
		if(empty($_GET['datosQR'])){
			echo 'Hey, tienes que analizar un qr para poder ingresar a esta seción';
		}
        else{
			//Si contiene obtendrá los datos y los separará generando dos variables en sus distintas posicions para obteneer el id del qr y el qr hasheado
			$codigo_qr_info = explode('-',$_GET['datosQR']);
			$id_post_del_qr = $codigo_qr_info['0'];
			$qr_hasheado   = $codigo_qr_info['1'];

			//Obtendrá los datos del qr a partir del id, si es que esta guardado con el key.
			$qr_hash = get_post_meta($id_post_del_qr, 'llave_del_qr', true);

			//entonces compara el qr leído con el qr existente.
			if($qr_hasheado === $qr_hash){
				echo 'SI DA EL QR';
				$cantidad = get_field('cantidad', $id_post_del_qr);
				//Añadir el if para el contador aqui
				update_field('cantidad', $cantidad-1, $id_post_del_qr);
			}
			else{
				echo 'NO FUNCA';
			}
		}	
	}

	//Función para redireccionar al usuario si es que no llega con la url necesaria para validar el qr.
	public function redireccionar_si_viene_con_qr(){

		//si en la url en el get no contiene los datos del QR a analizar no hará nada.
		if(empty($_GET['datos-del-qr-a-analizar'])){
			return;
		}
		//si contiene los datos, entonces guardará los datos y redireccionará a la url que creamos incluyendo la página validar-qr y los datos validados.
		else{
			$datos_a_validar = $_GET['datos-del-qr-a-analizar'];
			wp_redirect( get_admin_url() . 'admin.php?page=validar-qr&datosQR=' . $datos_a_validar );
		}
	}

}