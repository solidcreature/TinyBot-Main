<h1>Функции для работы с API телеграм</h1>

<h3>tinybot_request($method, $data = array()) </h3>
<p>Базовая функция, которая непосредственно реализует запрос к API Телеграма. Все функции ниже работают на основе tinybot_request. Используется, когда для соответствующего метода пока не написана функция-обертка</p>


<h3>tinybot_send($chat_id, $text, $keyboard='', $parse_mode='HTML', $disable_preview = false, $silent = false, $reply = '' )</h3>
<p>Позволяет отправить пользователю любое текстовое сообщение. Можно добавить к сообщению клавиатуру</p>
<p>Реализует метод sendMessage, https://core.telegram.org/bots/api#sendmessage</p>

<h3>tinybot_change_message($chat_id, $message_id, $text, $keyboard='', $parse_mode='HTML')</h3>
<p>Позволяет изменить уже отправленное сообщение</p>
<p>Реализует метод editMessageText, https://core.telegram.org/bots/api#editmessagetext</p>

<h3>tinybot_send_photo($chat_id, $photo, $caption='', $keyboard='', $parse_mode='HTML', $disable_preview = false, $silent = false, $reply = '') </h3>
<p>Позволяет отправить пользователю фотографию / графическое изображение. Можно добавить подпись. Можно добавить / изменить клавиатуру</p>
<p>Реализует метод sendPhoto, https://core.telegram.org/bots/api#sendphoto</p>


<h3>tinybot_send_video($chat_id, $video, $caption='', $keyboard='', $thumb='', $duration='', $width=320, $height=240, $streaming = false, $parse_mode = 'HTML', $silent = false, $reply = '') </h3>
<p>Позволяет отправить пользователю видеофайл формата .mp4. Можно добавить подпись. Можно добавить / изменить клавиатуру</p>
<p>Реализует метод sendVideo, https://core.telegram.org/bots/api#sendvideo</p>








<p><strong>По аналогии другие функции:</strong></p>
<p>tinybot_send_audio($chat_id, $audio, $caption='', $keyboard='', $duration='', $performer='', $title='', $thumb='', $parse_mode = 'HTML', $silent = false, $reply = '')</p>
<p>tinybot_send_document($chat_id, $document, $caption='', $keyboard='', $thumb='', $parse_mode = 'HTML', $silent = false, $reply = '') <p>
<p>tinybot_send_video($chat_id, $video, $caption='', $keyboard='', $thumb='', $duration='', $width=320, $height=240, $streaming = false, $parse_mode = 'HTML', $silent = false, $reply = '') </p>
<p>tinybot_send_animation($chat_id, $animation, $caption='', $keyboard='', $thumb='', $duration='', $width=320, $height=240, $parse_mode = 'HTML', $silent = false, $reply = '')</p>
<p>tinybot_send_voice($chat_id, $voice, $caption='', $keyboard='', $duration='', $parse_mode = 'HTML', $silent = false, $reply = '')</p>
<p>tinybot_send_videonote($chat_id, $video_note, $keyboard='', $thumb='',$duration='', $length='', $silent = false, $reply = '')</p>
<p>tinybot_send_mediagroup($chat_id, $media, $silent = false, $reply = '')</p>
<p>tinybot_send_location($chat_id, $latitude, $longitude, $live_period=3600, $keyboard='', $silent = false, $reply = '')</p>
<p>tinybot_send_venue($chat_id, $latitude, $longitude, $title, $address, $foursquare_id='', $foursquare_type='', $keyboard='', $silent = false, $reply = '') </p>
<p>tinybot_send_contact($chat_id, $phone, $f_name, $l_name='', $vcard='', $keyboard='', $silent=false, $reply='') </p>
<p>tinybot_send_poll($chat_id, $question, $options, $keyboard='', $anonymous=false, $type='regular', $multiple=false, $correct='', $explanation='', $parse_mode='HTML', $open_period='', $close_date='', $is_closed=false, $silent=false, $reply='') </p>
<p>tinybot_send_dice($chat_id, $emoji, $keyboard='', $silent='', $reply='')</p>
<p>tinybot_change_caption($chat_id, $message_id, $caption, $keyboard='', $parse_mode='HTML') </p>
<p>tinybot_change_media($chat_id, $message_id, $media_object, $keyboard='') </p>
<p>tinybot_change_keyboard($chat_id, $message_id, $keyboard)</p>
<p>tinybot_stop_poll($chat_id, $message_id, $keyboard='') </p>
<p>tinybot_delete_message($chat_id, $message_id) </p>