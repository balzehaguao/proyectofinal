<?php session_start();
if(isset($_SESSION['verificado'])){
	include 'serv.php'; $id=$_POST["txtsalid"];
	$sql1="DELETE FROM almacen WHERE idal='".$id."'";
	if(mysqli_query($conn,$sql1)){mysqli_close($conn); echo '<script>tablar(34); limpiar(18);</script>';
	}else{echo '<script>alert("ERROR AL ELIMINAR")</script>';}
}else{header("location: ../index.php?error=expulsado");}	
?>