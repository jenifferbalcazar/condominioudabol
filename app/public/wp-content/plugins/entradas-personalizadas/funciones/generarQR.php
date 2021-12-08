<?php

class GenerarQR{

    public $id_imagen;

    private const URL_API_Generador = 'https://chart.googleapis.com/chart?cht=qr&chs=177x177&';
  
    function __construct($datos)
    {
        $url = self::URL_API_Generador . 'chl=' . $datos;
        //https://chart.googleapis.com/chart?cht=qr&chs=177x177&chl=condominio.local/wp-admin/validar-qr.php/?datos={id_generarqr:95,cantidad:5}

        //Hace una solicitu  HTTP a una URL especifica y devuelve la respuesta
        $resultado = wp_remote_get($url);

        //La imagen vuelve en modo binario entonces se vuelve a base64 para poder trabajar con ella.
        $image64 = base64_encode($resultado['body']);

        $this->id_imagen = $this->guardar_imagen($image64, 'CódigoQR');

    }


    /**
     * Guardar la imagen del QR en el Servidor de WP
     */
    function guardar_imagen($base64_img, $title)
    {

        //Obtiene un arreglo con el directorio de subidas de archivos y la url de subidas.
        /*uploar_dir=array(
            'path' = 'C:\Users\jenif\Local Sites\condominio\app\public\wp-content\uploads',
            'url' = 'https://condominio.local/wp-admin/upload.php'
        )
        */
        $upload_dir  = wp_upload_dir();
        $upload_path = str_replace('/', DIRECTORY_SEPARATOR, $upload_dir['path']) . DIRECTORY_SEPARATOR;

        $img             = str_replace(' ', '+', $base64_img);  //upload+1+2 
        $decoded         = base64_decode($img); //imagen en formato binario
        $filename        = $title . '.png'; //le añade la extension .png
        $file_type       = 'image/png'; //define el tipo de archivo
        $hashed_filename = md5($filename . microtime()) . '_' . $filename; //encripta el nombre de la imagen.

        // Save the image in the uploads directory.
        $upload_file = file_put_contents($upload_path . $hashed_filename, $decoded);

        $attachment = array(
            'post_mime_type' => $file_type,
            'post_title'     => preg_replace('/\.[^.]+$/', '', basename($hashed_filename)),
            'post_content'   => 'Código QR generado para visitas',
            'post_status'    => 'inherit',
            //id global unico que hace referencia al post
            //Genera el enlace único de la imagen del qr en wordpress
            'guid'           => $upload_dir['url'] . '/' . basename($hashed_filename)
        );
        //guarda una imagen en wordpress, en este caso, la imagen del qr.
        /*
        $attachment= argumentos del post de tipo imagen.
        $upload_dir['path'] . '/' . $hashed_filename = La dirección en el servidor donde se esta guardando la imagen(mi compu xd)
        */
        $adjunto = wp_insert_attachment($attachment, $upload_dir['path'] . '/' . $hashed_filename);

        //retorna el id de la imagen que se subió, ese id es el id único del post de tipo imagen.
        return $adjunto;
    }
}

