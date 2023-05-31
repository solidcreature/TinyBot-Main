<?php

//Новый тип записи -- Участник
//Registering Custom Post Type -- Участник
function tinybot_register_post_types() {

	$labels = array(
		'name'                  => 'Телеграм-подписчики',
		'singular_name'         => 'Телеграм-подписчик',
		'menu_name'             => 'Телеграм-подписчики',
		'name_admin_bar'        => 'Телеграм-подписчика',
		'archives'              => 'Архив Телеграм-подписчиков',
		'attributes'            => 'Атрибуты Телеграм-подписчика',
		'parent_item_colon'     => 'Родительский элемент',
		'all_items'             => 'Все Телеграм-подписчики',
		'add_new_item'          => 'Добавить нового подписчика',
		'add_new'               => 'Добавить нового',
		'new_item'              => 'Новый Телеграм-подписчики',
		'edit_item'             => 'Редактировать Телеграм-подписчики',
		'update_item'           => 'Обновить подписчика',
		'view_item'             => 'Посмотреть подписчика',
		'view_items'            => 'Посмотреть подписчиков',
		'search_items'          => 'Искать подписчика',
		'not_found'             => 'Не найдены',
		'not_found_in_trash'    => 'Не найдены в удаленных',
		'featured_image'        => 'Фотография подписчика',
		'set_featured_image'    => 'Задать фотографию',
		'remove_featured_image' => 'Удалить фотографию',
		'use_featured_image'    => 'Использовать',
		'insert_into_item'      => 'Использовать для подписчика',
		'uploaded_to_this_item' => 'Загружено для подписчика',
		'items_list'            => 'Список Телеграм-подписичков',
		'items_list_navigation' => 'Навигация по подписчика',
		'filter_items_list'     => 'Отсортировать список подписчиков',
	);
	$args = array(
		'label'                 => 'Телаграм-подписчики',
		'description'           => 'Пользователи Телеграма, которые начали общаться с ботом',
		'labels'                => $labels,
		'supports'              => array( 'title', 'slug' ),
		'taxonomies'            => array( ),
		'hierarchical'          => false,
		'public'                => false,
		'show_ui'               => true,
		'show_in_menu'          => false,
		'menu_position'         => 5,
		'show_in_admin_bar'     => false,
		'show_in_nav_menus'     => false,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'tg_person', $args );

}
add_action( 'init', 'tinybot_register_post_types', 0 );



add_action('add_meta_boxes', 'tinybot_register_tg_person_metabox', 10);

function tinybot_register_tg_person_metabox() {
	add_meta_box( 'tg_person_metabox', 'Данные телеграм-подписчика', 'tinybot_create_tg_person_metabox', 'tg_person', 'normal', 'high' );
}

function tinybot_create_tg_person_metabox() {
	global $post;
	$post_id = $post->ID;
	$meta1 = 'Chat ID: ' . get_post_meta($post_id, 'chat_id', true);
	$meta2 = 'Статус: ' . get_post_meta($post_id, 'tg_status', true);
	$meta3 = 'Счетчик: ' . get_post_meta($post_id, 'tg_count', true);
	
	echo "<table border='0' width='100%'><tr><td style='width:33.33%'>{$meta1}</td><td style='width:33.33%'>{$meta2}</td><td style='width:33.33%'>{$meta3}</td></tr></table>";
}
