<?php
// инициализирование переменной для ошибок ввода инфы
 $errors = "";

// вывод данных если нажата кнопка "добавить задачу"
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
    $username = mysqli_real_escape_string($db,
              trim($_POST['username']));
    $email = mysqli_real_escape_string($db,
              trim($_POST['email']));
    $task = mysqli_real_escape_string($db,
              trim($_POST['task']));
    $image = mysqli_real_escape_string($db,
          $_FILES['image']['name']);
    $target = "uploads/".basename($_FILES['image']['name']);

    //добавление записи в базу данных
    $sql = "INSERT INTO tasks (username, email, task, image)
      VALUES ('$username', '$email', '$task', '$image')";
    mysqli_query($db, $sql);

    move_uploaded_file($_FILES['image']['tmp_name'], $target);

    $home_url = 'http://' . $_SERVER['HTTP_HOST'];
    header('Location:' . $home_url);
  }
}
