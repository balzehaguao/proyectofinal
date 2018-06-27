<?php 
session_start();
if(isset($_SESSION['verificado'])){
	$time=$_POST["fecha"]; $linea=0;
	$mytab='<table id="tabsal" cellspacing=1 cellpadding=2 style="font-size: 10pt; table-layout: fixed; cursor: pointer;"><thead><tr><th style="display:none;"><b>ID</b></th><th width="6%"><b>#Control</b></th><th width="15%"><b>Proyecto</b></th><th width="50%"><b>Descripcion</b></th><th width="8%"><b>Fecha</b></th><th width="10%"><b>Responsable</b></th><th style="display:none;">cservicios</th><tr></thead><tbody>';
	include 'serv.php';
	$cuerpo="SELECT * FROM almacen ORDER BY idal DESC"; 
	$result = $conn->query($cuerpo); $numero=0;
	while($row = $result->fetch_assoc()){$mytab.='<tr id="tcol" style="height:8px" class="';
		if($row["listo"]==1){$mytab.="cerrado ";}
		if($linea==0){$numero++; $linea++;
		}else{$mytab.='alt '; $numero++; $linea--;}
		$mytab.='"><td style="display:none;">'.$row["idal"].'</td><td width="6%">'.$row["ncontrol"].'</td><td width="15%">'.$row["proyecto"].'</td><td width="50%" style="word-wrap: break-word">'.$row["descripcion"].'</td><td width="8%">'.$row["fecha"].'</td><td width="10%">'.$row["responsable"].'</td><td style="display:none;">'.$row["cservicio"].'</td></tr>';	
	}
	$mytab .= '</tbody></table>';
	echo $mytab; mysqli_close($conn); echo "<script>tablar(35);</script>";
}else{echo"<script>alert('sale');</script>";header("location: ../index.php?error=expulsado");}
?>