<?php
include 'config/config.php';
if (isset($_POST['submit'])){
    if (empty($_POST['username'])){
      $errors = "Впишите ваше имя";
    }elseif (empty($_POST['email'])){
      $errors = "Впишите ваш email";
    }elseif (empty($_POST['task'])){
      $errors = "Впишите задание";
    }elseif (empty($_FILES['image']['name'])){
      $errors = "Вставьте картинку";
    }else{
      $id = mysqli_real_escape_string($db,
                trim($_GET['edit']));
      $username = mysqli_real_escape_string($db,
                trim($_POST['username']));
      $email = mysqli_real_escape_string($db,
                trim($_POST['email']));
      $task = mysqli_real_escape_string($db,
                trim($_POST['task']));
      $image = mysqli_real_escape_string($db,
            $_FILES['image']['name']);
      $target = "uploads/".basename($_FILES['image']['name']);

      $sql = "UPDATE `tasks` SET `username`='$username', `email`='$email',
          `task`='$task', `image`='$image' WHERE `id`='$id'";
      mysqli_query($db, $sql);
      move_uploaded_file($_FILES['image']['tmp_name'], $target);

      $home_url = 'http://' . $_SERVER['HTTP_HOST'];
      header('Location:' . $home_url);
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>задачник</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link href="/css/style.css" rel="stylesheet">
</head>
<body>
<header>
    <h3>Внесение изменений в запись</h3>
    <a href="index.php" class="btn btn-default">На страницу администратора</a>
</header>
<br>
  <?php
  include 'config/errors.php';
  ?>
<form method="POST" action="/<?PHP echo basename($_SERVER['REQUEST_URI']); ?>" class="input_form" enctype="multipart/form-data">
<input type="text" name="username" placeholder="Введите Имя" class="username_input">
<input type="email" name="email" placeholder="Введите email" class="email_input">
  <br>
  <br>
<input type="hidden" name="MAX_FILE_SIZE" value="300000" />
<input type="text" name="task" placeholder="Введите задание" class="task_input">
  <p>Сменить изображение</p>
<input type="file" name="image" multiple accept="image/png, image/jpeg, image/gif">
  <br>
<button type="submit" name="submit" id="add_btn">Изменить запись</button>
</form>
