<?php
/*
Plugin Name: Plugin de Recetas
Description: Plugin que permite a los usuarios agregar y mostrar recetas como un tipo de publicación personalizada en WordPress.
Version: 1.0
Author: Enrique Cuevas Garcia
*/

function registrar_tipo_receta()
{

    $args = array(
        'public' => true,
        'label' => 'Recetas'
    );
    register_post_type('recetas', $args);
}

add_action('init', 'registrar_tipo_receta');

// Agregamos el campo custom para ingredientes a la creación y edición de recetas

function agregar_campos_receta()
{
    add_meta_box('detalles_receta', 'Detalles de la Receta', 'mostrar_campos_receta', 'recetas', 'normal', 'default');
}
add_action('add_meta_boxes', 'agregar_campos_receta');

function mostrar_campos_receta()
{
    global $post;
    $titulo = get_post_meta($post->ID, 'titulo', true);
    $descripcion = get_post_meta($post->ID, 'descripcion', true);
    $ingredientes = get_post_meta($post->ID, 'ingredientes', true);
    $instrucciones = get_post_meta($post->ID, 'instrucciones', true);
    $tiempo_preparacion = get_post_meta($post->ID, 'tiempo_preparacion', true);

    echo '<label for="titulo">Título:</label>';
    echo '<input type="text" id="titulo" name="titulo" value="' . esc_attr($titulo) . '"><br>';

    echo '<label for="descripcion">Descripción:</label>';
    echo '<textarea id="descripcion" name="descripcion">' . esc_textarea($descripcion) . '</textarea><br>';

    echo '<label for="ingredientes">Ingredientes:</label>';
    echo '<textarea id="ingredientes" name="ingredientes">' . esc_textarea($ingredientes) . '</textarea><br>';

    echo '<label for="instrucciones">Instrucciones de Preparación:</label>';
    echo '<textarea id="instrucciones" name="instrucciones">' . esc_textarea($instrucciones) . '</textarea><br>';

    echo '<label for="tiempo_preparacion">Tiempo de Preparación:</label>';
    echo '<input type="text" id="tiempo_preparacion" name="tiempo_preparacion" value="' . esc_attr($tiempo_preparacion) . '"><br>';
}

function guardar_campos_receta($post_id)
{
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (isset($_POST['titulo'])) {
        update_post_meta($post_id, 'titulo', sanitize_text_field($_POST['titulo']));
    }
    if (isset($_POST['descripcion'])) {
        update_post_meta($post_id, 'descripcion', sanitize_textarea_field($_POST['descripcion']));
    }
    if (isset($_POST['ingredientes'])) {
        update_post_meta($post_id, 'ingredientes', sanitize_textarea_field($_POST['ingredientes']));
    }
    if (isset($_POST['instrucciones'])) {
        update_post_meta($post_id, 'instrucciones', sanitize_textarea_field($_POST['instrucciones']));
    }
    if (isset($_POST['tiempo_preparacion'])) {
        update_post_meta($post_id, 'tiempo_preparacion', sanitize_text_field($_POST['tiempo_preparacion']));
    }
}
add_action('save_post', 'guardar_campos_receta');


// Agregamos los shortcode para mostrar las recetas

function mostrar_recetas_shortcode()
{
    $args = array(
        'post_type' => 'recetas',
        'posts_per_page' => -1
    );

    $recetas = new WP_Query($args);

    if ($recetas->have_posts()) {
        $output = '<div class="recetas-container">';
        while ($recetas->have_posts()) {
            $recetas->the_post();
            $output .= '<div class="receta">';
            $output .= '<h2>' . get_the_title() . '</h2>';
            $output .= '<div class="descripcion">' . get_post_meta(get_the_ID(), 'descripcion', true) . '</div>';
            $output .= '<div class="ingredientes">' . get_post_meta(get_the_ID(), 'ingredientes', true) . '</div>';
            $output .= '<div class="instrucciones">' . get_post_meta(get_the_ID(), 'instrucciones', true) . '</div>';
            $output .= '<div class="tiempo-preparacion">Tiempo de Preparación: ' . get_post_meta(get_the_ID(), 'tiempo_preparacion', true) . '</div>';
            // Puedes agregar más campos personalizados aquí si los has creado.
            $output .= '</div>';
        }
        $output .= '</div>';
        wp_reset_postdata();
        return $output;
    } else {
        return 'No hay recetas disponibles.';
    }
}
add_shortcode('mostrar_recetas', 'mostrar_recetas_shortcode');


// Función para enlazar el archivo CSS
function enqueue_recetas_styles()
{
    // Enlaza el archivo CSS
    wp_enqueue_style('recetas-styles', plugins_url('/css/recetas-styles.css', __FILE__));
}
// Agrega el enlace del archivo CSS al hook 'wp_enqueue_scripts'
add_action('wp_enqueue_scripts', 'enqueue_recetas_styles');
