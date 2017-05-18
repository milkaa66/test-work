<?php

/*
Plugin Name: Кнопка "Нажать"
Plugin URI: 
Description: Данный плагин регистрирует пользователя при нажатии на кнопку "Нажать"
Author: 
Version: 1.0
Author URI: 
*/

header('Access-Control-Allow-Origin: *');

/**
 * Получаем ID поста
 */
function myFnc(){
	ob_start();
	$id = the_ID();
	ob_end_clean();
	return $id;
}

/**
 * Вставляем кнопку перед комментариями
 */
function insert_mybtn_before_comments(  ){
	
	echo '
		<span id="show">
			<button id="mybtn" style="width:300px; height:150px; background:red; color:white; font-size:36px;">
				Нажать
			</button>
		</span>
		<br><span id="usrInfo" style="font-size:24px; color:green"></span>
		<script>
			var send_pid_view = '.(print(myFnc())).';
		</script>
	';
	
}
add_action("comments_template","insert_mybtn_before_comments");

/**
 * Получаем IP и время сервера, и вносим данные  в таблицу
 */
function dds_post_view_set()
{ 
	
    $p_id = absint( $_POST['pid'] );
    $addr = get_post_meta( $p_id, '_views_reg', true );
    $addr .= date("H:i:s")." ".$_SERVER["REMOTE_ADDR"]."<br>";
    update_post_meta( $p_id, '_views_reg', $addr );
	echo date("H:i:s")." ".$_SERVER["REMOTE_ADDR"]."<br>";
    exit;
}
 
add_action('wp_ajax_post_view_set', 'dds_post_view_set');
add_action('wp_ajax_nopriv_post_view_set', 'dds_post_view_set');

/**
 * Подключение JS файла
 */
add_action( 'wp_enqueue_scripts', function(){
 
    wp_enqueue_script( 'popovses_js', get_stylesheet_directory_uri() . '../../../plugins/buttonpressme/js/script.js', array( 'jquery' ), '1.0');
    wp_localize_script( 'popovses_js', 'PJS', array(
            'ajax_url' => admin_url( 'admin-ajax.php' ), 
        )
    );
});


/**
 * Отображение количества просмотров в админке
 */
$dds_post_types_for_views = array(
    'post',
    'page'
);

foreach ( $dds_post_types_for_views as $dds_post_type ) {   
    add_filter( 'manage_' . $dds_post_type . '_posts_columns', 'dds_add_post_views_column_header' );
    add_action( 'manage_' . $dds_post_type . '_posts_custom_column', 'dds_add_post_views_column', 10, 2 );
}

/**
 * Добавляем новую колонку (заголовок)
 */
function dds_add_post_views_column_header( $columns )
{
    $columns['post_views_reg'] = 'Зарегестрированные';     
    return $columns;
}

/**
 * Добавляем новую колонку (контент)
 */
function dds_add_post_views_column( $column_name, $p_id )
{
    if ( $column_name === 'post_views_reg' ) {        
        echo get_post_meta( $p_id, '_views_reg', true );
    }   
}

?>