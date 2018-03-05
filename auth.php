<?php
//Если совпадают логин и пароль создать куки до завершения сессии
  if(isset($_POST['submit'])){
    if(($_POST['username'] == 'admin') &&
        ($_POST['password'] == '123')){
          $username = $_POST['username'];
          setcookie('admin_cookie', $username);

          $home_url = 'http://' . $_SERVER['HTTP_HOST'];
          header('Location:' . $home_url);
      }else{
        $errors = '<p style="text-align:center;color:red;">
            Логин и пароль не совпадают</p>';
      }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Авторизация</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
  integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link href="/css/style.css" rel="stylesheet">
</head>
<body>
      <h3 style="text-align:center;">Авторизация</h3>
<div class="row">
    <div class="col-sm-10 col-sm-offset-1 hid">
      <div class="row">
        <div class="col-sm-6 col-sm-offset-3 text-center">
          <form method="POST" action="<?=$_SERVER['PHP_SELF'];?>">
            <label for="username">Введите логин:</label>
            <input type="text" name="username">
            <label for="password">Введите пароль:</label>
            <input type="password" name="password">
            <br>
            <button type="submit" class="btn btn-default" name="submit">Вход</button>
            <a href="index.php" class="btn btn-default">Назад</a>
          </form>
        </div>
      </div>
    </div>
  </div>
  <?php
  include 'config/errors.php';
   ?>
</body>
</html>
