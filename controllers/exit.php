<?php
//удаление куки если нажата кнопка "Выход"
unset($_COOKIE['admin_cookie']);
setcookie('admin_cookie', '', -1, '/');
$home_url = 'http://' . $_SERVER['HTTP_HOST'];
header('Location:' . $home_url);
