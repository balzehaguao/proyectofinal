<?php session_start();
if(isset($_SESSION['verificado'])){ 
	$linea=0;
	$cnivel="";
	$mytab = '<table id="tabadmin" cellspacing=1 cellpadding=2 ><thead><tr><th style="display:none;"><b>ID</b></th><th width="40%"><b>Nombre</b></th><th width="60%"><b>Departamento</b></th><th style="display:none;"><b>ep</b></th></tr></thead><tbody>';
	include 'serv.php';
	$result = $conn->query("SELECT * FROM entrada ORDER BY id DESC");
	$numero = 0;
	while($row = $result->fetch_assoc())
	{
		if($row["nivel"]==11){$cnivel="PRODUCCION";
		}else if($row["nivel"]==12){$cnivel="VENTAS";
		}else if($row["nivel"]==10){$cnivel="ADMIN";}
		if($linea==0){
			$mytab .= '<tr style="height:8px"><td style="display:none;">'.$row["id"].'</td><td width="50%">'.$row["nombre"].'</td><td style="display:none;">'.$row["nivel"].'</td><td width="40%">'.$cnivel.'</td></tr>';
			$numero++;$linea++;
		}else{
			$mytab .= '<tr style="height:8px" class="alt"><td style="display:none;">'.$row["id"].'</td><td width="50%">'.$row["nombre"].'</td><td style="display:none;">'.$row["nivel"].'</td><td width="40%">'.$cnivel.'</td></tr>';
			$numero++;$linea--;
		}
	}
	$mytab .= '</tbody><thead><tr id="tfootad"><td style="border-top: 1px solid #0070A8;" width="40%">Usuarios:'.$numero.'</td><td style="border-top: 1px solid #0070A8;" width="60%"><button id="btntab" onClick="tablar(8);">ACTUALIZAR</button></td></tr></thead></table>';
	
	echo $mytab; $conn->close(); echo "<script> tablar(17); </script>";
}else{header("location: ../index.php?error=expulsado");	}
?>