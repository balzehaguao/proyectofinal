<?php session_start();
if(isset($_SESSION['verificado'])){
	include 'serv.php';
	$id=$_POST["txtsalid"]; $cliente=$_POST["txtsalproy"]; $responsable=$_POST["txtsalresp"]; $descripcion=$_POST["txtsalta"]; 
	$sql="UPDATE almacen SET proyecto='".$cliente."', responsable='".$responsable."', descripcion='".$descripcion."' WHERE idal='".$id."'";

	if(mysqli_query($conn,$sql)){mysqli_close($conn);echo '<script>tablar(34); limpiar(18);</script>';
	}else{echo '<script>alert("ERROR AL ACTUALIZAR 2")</script>';}	
}else{header("location: ../index.php?error=expulsado");	}
?>