<h1>Функции для работы с клавиатурой</h1>

<h3>tinybot_get_keyboard($rows, $one_time=false, $resize=true)</h3>
<p>Возвращает клавиатуру с кнопками, переданными в переменной $rows</p>

<h3>tinybot_default_keyboard( $type='default', $one_time=false, $resize=true )</h3>
<p>Возвращает одну из заданных заранее клавиатур, выбор происходит через параметр $type</p>

<code>//Получить инлайн-клавиатуру<br>
//$row = array();<br>
//$row[] = array('text' => 'Кнопка-действие', 'callback_data' => 'check');<br>
//$row[] = array('text' => 'Кнопка-url', 'url' => 'http://ya.ru' );<br>
//$buttons = array($row);</code>
<h3>tinybot_inline_keyboard( $buttons )</h3>
<p>Возвращает инлайн-клавиатуру на основе кнопок переданных в переменной $buttons, должны быть массивоам заданной структуры</p>