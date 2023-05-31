<?php

//Получить объект клавиатуры на основе кнопок и параметров
function tinybot_get_keyboard($rows, $one_time=false, $resize=true) {
	
	$keyboard = array(
		'one_time_keyboard' => $one_time,
		'resize_keyboard' => $resize,
	  	'keyboard' => $rows
	);
	
	return $keyboard;	
}


//Получить дефолтную клавиатуру
//статическими клавиатурами из одного места
function tinybot_default_keyboard( $type='default', $one_time=false, $resize=true ) {
	
	//Дефолтные клавиатуры должны задаваться во внешних плагинах
	$rows = apply_filters('tinybot_get_default_keyboard_rows', $rows, $type);

	$keyboard = array(
		'one_time_keyboard' => $one_time,
		'resize_keyboard' => $resize,
	  	'keyboard' => $rows
	);
	
	return $keyboard;
}	



//Получить инлайн-клавиатуру
//$row = array();
//$row[] = array('text' => 'Кнопка-действие', 'callback_data' => 'check');
//$row[] = array('text' => 'Кнопка-url', 'url' => 'http://ya.ru' );
//$buttons = array($row);
function tinybot_inline_keyboard( $buttons ) {
	$keyboard = array(
		'inline_keyboard' => $buttons,
	);
	
	return $keyboard;
}


//Убрать кастомную клавиатуру
function tinybot_remove_keyboard($selective=false) {
	$remove_keyboard = array(
		'remove_keyboard' => true,
		'selective' => $selective
	);
	
	return $remove_keyboard;
}


//Обязательный ответ
function tinybot_force_reply($selective=false) {
	$force_reply = array(
		'force_reply' => true,
		'selective' => $selective
	);
	
	return $force_reply;
}