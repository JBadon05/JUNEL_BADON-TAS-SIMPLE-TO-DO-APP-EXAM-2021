<?php
include('../database/dbcon.php');
$task = $_POST['task'];
$query = mysqli_query($conn,"SELECT * from todolist where task = '$task' ")or die(mysqli_error());
$count = mysqli_num_rows($query);
if ($count > 0){ 
	?>
    <script>
    alert("Task already exists");
    window.location = '../index.php';
    </script>
    <?php
}else{
	if(isset($_POST['task'])){
	require '../database/dbconn.php';

	$task = $_POST['task'];

	if(empty($task)){
		header("Location: ../index.php?message=?");
	}else{
		$stmt = $conn->prepare("INSERT INTO todolist(task) VALUE(?)");
		$res =$stmt->execute([$task]);

		if($res){
			header("Location: ../index.php?message=added");
		}else{
			header("Location: ../index.php");
		}
		$conn = null;
		exit();
	}
}else{
	header("Location: ../index.php?message=?");
}

}

?>