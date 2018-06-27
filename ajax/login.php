<?php
include 'serv.php';
$usuario=$_POST["username"];
$clave=$_POST["password"];
$sql="SELECT * FROM entrada WHERE nombre='".$usuario."' AND clave='".$clave."'";
$result=mysqli_query($conn, $sql);
if(mysqli_num_rows($result)>0) {
	while($row=mysqli_fetch_assoc($result)) {
		session_start(); $_SESSION["verificado"]="si"; $vid=$row["nombre"];
		?><script>window.usuario="<?php echo $vid; ?>";</script><?php
		$vper=$row["nivel"]; mysqli_close($conn); echo "<script>correcto($vper);</script>";
	}
}else{ ?><script>alert("Error con la clave");</script><?php }
?>