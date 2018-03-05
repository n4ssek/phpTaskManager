<?php
//если нажата кнопка удалить
if (isset($_GET['del_task'])){
	$id = $_GET['del_task'];

	mysqli_query($db, "DELETE FROM tasks WHERE id=".$id);

	header('Location: index.php');
}
