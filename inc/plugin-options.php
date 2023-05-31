<?php
//Регистрируем страницу настроек плагина в админ-панели
function tinybot_register_options_page() {
  add_menu_page('TinyBot Main', 'TinyBot Main', TINY_BOT_CAPABILITY, 'tinybot-main', 'tinybot_documentation_page','dashicons-format-chat');
  add_submenu_page( 'tinybot-main', 'Документация', 'Документация', TINY_BOT_CAPABILITY, 'tinybot-main', 'tinybot_documentation_page', 100);
  add_submenu_page( 'tinybot-main', 'Подписчики телеграм-бота', 'Подписчики', TINY_BOT_CAPABILITY, 'edit.php?post_type=tg_person', '', 110);
}
add_action('admin_menu', 'tinybot_register_options_page');

function tinybot_documentation_page() { 
	include TINY_BOT_DIR . '/docs/plugin_hooks.php';
	include TINY_BOT_DIR . '/docs/plugin_functions.php';
	include TINY_BOT_DIR . '/docs/keyboards_functions.php';
} 
