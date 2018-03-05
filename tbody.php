<?php
$page = $_GET["page"];

if ($page == "" || $page=="1"){
  $page1 = 0;
}else{
  $page1 = ($page*3) - 3;
}

// выбрать все задания
$tasks = mysqli_query($db, "SELECT * FROM `tasks`ORDER BY (id) DESC LIMIT $page1,3");

//отрисовка таблицы с заданиями
while ($row = mysqli_fetch_assoc($tasks)) { ?>
  <tr>
    <td class="username"> <?php echo $row['username']; ?> </td>
    <td class="email"> <?php echo $row['email']; ?> </td>
    <td class="task"> <?php echo $row['task']; ?> </td>
    <td > <?php echo "<img src='uploads/".$row['image']."'>"; ?> </td>
  <?php
      if(isset($_COOKIE['admin_cookie'])){  ?>
        <td>
          <a class="delete" href="index.php?del_task=<?php echo $row['id'] ?>">x</a>
          <br><br>
          <a class="edit" href="edit.php?edit=<?php echo $row['id']; ?>">Редактировать</a>
        </td>
      <?php }
     ?>
  </tr>

<?php  } ?>
