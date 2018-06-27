<?php session_start();
if(isset($_SESSION['verificado'])){
	include 'serv.php'; $id=$_POST["adid"];
	$sql="DELETE FROM entrada WHERE id='".$id."'";
	if(mysqli_query($conn, $sql)){mysqli_close($conn);echo '<script>tablar(8); limpiar(10);</script>'; 
	}else{echo '<script>alert("ERROR AL ELIMINAR");</script>';}
}else{header("location: ../index.php?error=expulsado");	}	
?>