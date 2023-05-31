<?php
/*
Plugin Name: TinyBot Main
Description: Create bots, services, games, apps and more with WordPress and Telegram
Version: 1.0.0
Author: Nikolay Mironov
*/

//Задаем базовые константы для плагина
define( 'TINY_BOT_DIR', plugin_dir_path( __FILE__ ) );
define( 'TINY_BOT_URL', plugin_dir_url( __FILE__ ) );
define( 'TINY_BOT_CAPABILITY', 'manage_options' );


//Подключаем необходимые файлы для работы плагина
include TINY_BOT_DIR . '/inc/telegram-api.php';
include TINY_BOT_DIR . '/inc/plugin-options.php';
include TINY_BOT_DIR . '/inc/post-types.php';
include TINY_BOT_DIR . '/inc/utilities.php';
include TINY_BOT_DIR . '/inc/keyboards.php';


//Ключевая функция, которая обрабатывает данные, полученные из телеграма
function tinybot_main_function($request) {
	//Получаем необходимые данные из запроса
	$data = $request->get_json_params();	
	
	//Узнаем имя бота, который отправил запрос
	global $tinybot_name; 	
	$tinybot_name = $request->get_param('tinybot_name');

	//По-разному получаем базовые параметры, в зависимости пришел текстовый запрос или колбек кнопки или фото
	if ( $data['message']['text'] ) {
		$message = $data['message']['text']; 
		$from_id = $data['message']['from']['id'];
		$chat_id = $data['message']['chat']['id'];
		$name = $data['message']['from']['first_name'] . ' ' . $l_name = $data['message']['from']['last_name'];	
	}
	
	elseif ( $data['callback_query']['data'] or $data['callback_query']['data'] == '0' ) {
		$message = $data['callback_query']['data'];
		$from_id = $data['callback_query']['from']['id'];
		$chat_id = $data['callback_query']['chat']['id'];
		$name = $data['callback_query']['from']['first_name'] . ' ' . $data['callback_query']['from']['last_name'];
	}
	
	//Здесь проверяем принадлежность к чату и откуда поступают сообщения: напрямую между человеком и ботом или из чата
	do_action('tinybot_check_request_hook', $from_id, $chat_id, $data);	

	//Идентифицируем или создаем новую запись Участника с уникальным $chat_id
	$person_id = tinybot_get_person_id($from_id, $name);
	$person_status = get_post_meta( $person_id, 'tg_status', true);	
		
	//На этот хук вешаем привествие и сброс статуса участника
	if ($message == '/start') {
		do_action('tinybot_start_message_hook', $from_id, $message, $person_id);
	}
		
	//Выполняем команды бота, которые повешены на данные хуки
	if ($person_status != '') {
		do_action('tinybot_status_commands_hook', $from_id, $message, $person_id, $person_status);
	}
	else {
		do_action('tinybot_commands_hook', $from_id, $message, $person_id);
	}
		
	//Если дошли до этого момента, значит команда не была распознана
	do_action('tinybot_no_commands_hook', $from_id, $message, $person_id);	

	exit('ok'); 
}

