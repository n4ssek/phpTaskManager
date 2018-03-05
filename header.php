<?php
if(!isset($_COOKIE['admin_cookie'])){
  $response = '<a class="btn btn-default" href="auth.php">
        Вход в панель администратора</a>';
}else{
  $response = '<h3>Панель администратора</h3>
    <a class="btn btn-default"
    href="controllers/exit.php">Выход</a>';
}
?>
