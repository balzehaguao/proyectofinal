<?php session_start();
if(isset($_SESSION['verificado'])){
	include 'serv.php'; $id=$_POST["adid"]; $nombre=$_POST["txtadusr"]; $clave=$_POST["txtadpsw"]; $nivel=$_POST["adnl"]; $verclave=""; $contador=0;
	?><script>console.log('<?php echo $nombre; ?>');</script><?php
	if($clave===''){$sql="UPDATE entrada SET nombre ='".$nombre."', nivel ='".$nivel."' WHERE id ='".$id."'";
	}else{$sql="UPDATE entrada SET nombre ='".$nombre."', clave ='".$clave."', nivel ='".$nivel."' WHERE id ='".$id."'";}
	if(mysqli_query($conn, $sql)){mysqli_close($conn); echo '<script>tablar(8); limpiar(10);</script>';
	}else{echo '<script>alert("ERROR AL ACTUALIZAR");</script>';}
}else{header("location: ../index.php?error=expulsado");}	
?>