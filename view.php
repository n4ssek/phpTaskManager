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

  <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
  <script type="text/javascript" src="js/jquery-ui.js"></script>
  <link rel="stylesheet" href="js/jquery-ui.css">

  <script src="datatables/dt/js/jquery.dataTables.min.js" type="text/javascript"></script>
  <script type="text/javascript" src="js/controls.js"></script>
</head>
<body>
  <div class="heading">
  <h3 >Задачник</h3>
  <?php
    include 'header.php';
   ?>
  </div>
<br>
  <?php
  include 'config/errors.php';
  ?>
<form method="post" action="" class="input_form" enctype="multipart/form-data">
  <input type="text" name="username" placeholder="Введите ваше имя" class="username_input" id="username">
  <input type="email" name="email" placeholder="Введите ваш email" class="email_input" id="email">
  <br>
  <br>
  <input type="text" name="task" placeholder="Введите задание" class="task_input" id="task">
  <input type="hidden" name="MAX_FILE_SIZE" value="300000" />
  <p>Добавить изображение</p>
  <input type="file" name="image"  multiple accept="image/png, image/jpeg, image/gif, image/jpg">
  <br>
	<button type="submit" name="submit" id="add_btn" >Добавить задачу</button>
  <button type="preview" name="preview" id="preview">Предварительный просмотр</button>
</form>

  <div id="preview_data" title="Предпросмотр" style="display:none;"></div>
<br>
<table id="myTable" class="table table-striped task-table">
	<thead >
		<tr>
			<th>Имя</th>
      <th>email</th>
      <th>задание</th>
      <th>картинка</th>
		</tr>
	</thead>
  <tbody>
    <?php include 'tbody.php'; ?>
  </tbody>
</table>

<ul class="pagination">
<?php include 'controllers/pagination.php'; ?>
</ul>

</body>
</html>
