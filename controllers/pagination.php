<?php
$tasks1 = mysqli_query($db, "SELECT * FROM `tasks`");
$count = mysqli_num_rows($tasks1);

$a = $count/3;
$a = ceil($a);

for ($i = 1; $i <= $a; $i++){
  ?><a href="index.php?page=<?php echo $i; ?>" class="btn btn-default">
    <?php echo $i." "; ?>
  </a>
<?php } ?>
