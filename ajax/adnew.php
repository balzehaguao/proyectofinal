<?php session_start();
if(isset($_SESSION['verificado'])){
	include 'serv.php'; $nombre=$_POST['txtadusr']; $clave=$_POST['txtadpsw']; $nivel=$_POST['adnl']; $verclave=""; $contador=0;
	
	$result = $conn->query("SELECT nombre FROM entrada");
	while($row = $result->fetch_assoc())
	{
		$verclave = $row["nombre"];
		if($nombre === $verclave){$contador = 1;
		}else{$contador = 0;}
	}
	
	if($contador === 0){
		$sql="INSERT INTO entrada (nombre, clave, nivel) VALUES ('$nombre', '$clave', '$nivel')";
		if(mysqli_query($conn, $sql)){$rmen="Cuenta Correctamente Creada"; mysqli_close($conn); echo "<script>tablar(8); limpiar(10);</script>"; echo $rmen;
		}else{$rmen="Error al ingresar datos de la informacion!"; echo $rmen;}
	}else{$rmen="El usuario \"".$nombre."\" ya est&aacute; registrado en base de datos"; echo $rmen;}		
}else{header("location: ../index.php?error=expulsado");}
?>