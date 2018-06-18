<?php

echo 'Программа цензор<br><br>';

$text = $_POST['textfield'];

$find = ['/fuck/', '/idiot/', '/bitch/'];
$replace = ['f**k', 'i***t', 'b***h'];

if ($text)
	$text = preg_replace($find, $replace, $text);

echo $text;
echo '<br><br>';


?>
<form method='post'>
	<textarea name='textfield'></textarea><br>
	<input type="submit" name="send">
</form>