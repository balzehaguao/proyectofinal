<?php session_start();
if(isset($_SESSION['verificado'])){
	include 'serv.php'; $buscontrol=$_POST["txtsalcontrol2"];
	$sql4="SELECT cservicio FROM almacen WHERE cservicio='".$buscontrol."'";
	$result4=mysqli_query($conn,$sql4); $row4=mysqli_fetch_assoc($result4); 
	if($row4){ ?><script>alert("SOLICITUD EXISTENTE");</script><?php
	}else{echo '<script>habilitar(14);</script>';}
}else{header("location: ../index.php?error=expulsado");	}	
?>