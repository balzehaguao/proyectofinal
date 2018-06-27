<?php session_start();
if(isset($_SESSION['verificado'])){include 'serv.php';
	$cliente=$_POST["txtsalproy"]; $responsable=$_POST["txtsalresp"]; $fechai=$_POST["txtsalfecha"]; $buscontrol=$_POST["txtsalcontrol2"]; $descripcion=$_POST["txtsalta"]; $codigo=$_POST["txtsalcodigo"]; $vuelta=$_POST["txtsalcash"];
	$sql2="SELECT ncontrol FROM almacen ORDER BY ncontrol DESC";
	$result2=mysqli_query($conn,$sql2); $row2=mysqli_fetch_assoc($result2); if($row2){$vercontrol=$row2["ncontrol"]; $vercontrol++;}else{$vercontrol="SA180000";} 
	$sql="INSERT INTO almacen (ncontrol,proyecto,responsable,descripcion,fecha,codigo,cservicio) VALUES ('$vercontrol','$cliente','$responsable','$descripcion','$fechai','$codigo','$buscontrol')";
	if(mysqli_query($conn,$sql)){mysqli_close($conn); echo '<script>tablar(34); limpiar(18);</script>';
	}else{echo '<script>alert("ERROR AL CREAR ORDEN2")</script>';}
}else{header("location: ../index.php?error=expulsado");}	
?>