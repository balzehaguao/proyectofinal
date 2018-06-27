<?php session_start(); session_unset(); session_destroy(); ?><!doctype html><html lang="en"><?php if(!empty($_POST["error"])){if($_POST["error"]==="si"){echo "tu usuario o clave son errados.";} else if($_POST["error"]==="expulsado"){echo "<script>alert('inicie sesion primero.');</script>";}else if($_POST["error"]==="salio"){echo "Hasta luego.";}}?><head><meta charset="utf-8"> <meta name="viewport" content="width=device-width, initial-scale=1"><title>SISTEMA CONTROL DE SERVICIOS : Alfredo Bohorquez</title><link href="css/estilos.css" rel="stylesheet"><link rel="stylesheet" href="css/jquery-ui.css"><script src="js/jquery221.min.js"></script><script src="js/jquery-ui.min.js"></script><link href="css/alertify.css" rel="stylesheet"> <script src="js/alertify.js"></script></head>
<body>
<div id="dentrada">	
	<div id="login"><div id="menbox"></div><form id="formu" method="post"><div id="ltexto"><input type="text" name="username" id="username" placeholder="Usuario" autocomplete="off" class="input iplace2" value=""/><br><input type="password" name="password" id="password" placeholder="Clave" autocomplete="off" class="input iplace2" value="" /></div><div id="lboton"><button id="submit" onClick="enviar();return false;">Entrar</button></div></form></div>
</div>
<div id="contenedor"> 
<div id="menu"> 
	<div id="arriba"></div>
	<div id="abajo" style="font-size:12px; text-align:center">
		<ul id="opciones">
			<li><div class="dopc dhopc" id="op1"><center><img src="img/inbox.png"><br>Produccion</center></div></li>
			<li><div class="dopc dhopc" id="op3"><center><img src="img/ic_settings.png"><br>Gesti&oacute;n</center></div></li>
			<li><div class="dopc dhopc" id="op6"><center><img src="img/salir.png"><br>Salir</center></div></li>
		</ul>
	</div>
	<div id="salir"></div>
</div> 
<div id="zonalt"> 
	<div id="subarriba"></div>
	<div id="subabajo" style="font-size:12px; text-align:center"><ul id="subm1">
		<li id="li8"><div class="sdopc sdhopc" id="sop8">Gestion de Usuarios</div><br></li> 
		<li id="li17"><div class="sdopc sdhopc" id="sop17">Almacen</div><br></li>
	</ul></div>
</div>
<div id="cuerpo"> 
	<div id="container"><canvas id="ctaller"></canvas><canvas id="ctipos"></canvas></div> 
	<div id="paneladmin"> 
		<div id="sutabla1">
			<div id="titulo"><b style="font-size:12px">PANEL DE ADMINISTRADOR</b></div>
			<div id="despera">
				<center><p id="sebt">USUARIOS</p></center>
				<div id="resadmin"></div><br>
				<div id="modadm">
					<form id="fadmin" method="POST">
						<table width="98%" align="center" style="margin-left:2px; float:left"><tr><td width="30%" align="left" valign="top">
							<input type="hidden" name="adid" id="adid" autocomplete="off" placeholder="ID" class="input finput" value="" readonly=true/>
							<input type="text" name="txtadusr" id="txtadusr" autocomplete="off" placeholder="USUARIO" class="input finput" value="" readonly=true/>
							<input type="text" name="txtadpsw" id="txtadpsw" autocomplete="off" placeholder="CLAVE" class="input finput" value="" readonly=true/>
							<input type="hidden" name="adnl" id="adnl" autocomplete="off" class="input finput" value="" readonly=true/><br>
							<select id="snivel" onChange="sbox(7)">
								<option value="0" disabled selected>NIVEL</option>
								<option value="10">MASTER</option><option value="11">PRODUCCION</option><option value="12">VENTAS</option>
							</select>
						</td><td width="2%"></td></tr></table>
					</form><br>
					<table width="100%" style="float:left"><tr><td><div id="btnopc">
						<div id="btadmagr" onClick="habilitar(9);" class="tooltip"><center><img src="img/nuevo.png" width="20"><br>Nuevo</center></div>
						<div id="btadmmod" onClick="modificar(5);" class="tooltip"><center><img src="img/mod.png" width="20"><br>Modificar</center></div>
						<div id="btadmsav" onClick="guardar(5);" class="tooltip"><center><img src="img/salvar.png" width="20"><br>Guardar</center></div>
						<div id="btadmupd" onClick="guardar(6);" class="tooltip"><center><img src="img/salvar.png" width="20"><br>Guardar</center></div>
						<div id="btadmbor" onClick="eliminar(10);" class="tooltip"><center><img src="img/borrar.png" width="20"><br>Borrar</center></div>
						<div id="btadmlim" onClick="limpiar(10);" class="tooltip"><center><img src="img/cancelar.png" width="20"><br>Limpiar</center></div>
					</div></td></tr></table>
				</div> 
				<div id="menadmin"></div>
			</div>
			<div id="sombrita"></div>
		</div> 
	</div>
	<div id="dsalidas">
		<div id="sutabla">
			<div id="titulo"><b style="font-size:12px">CONTROL DE ALMACEN</b></div>
			<div id="tbsalidas"><div id="mensalidas"></div></div>
			<div id="modtab">
				<form id="fsalida" method="POST">
					<table width="60%" border="0" style="float:left"><tr>
						<td id="tab1" width="100%" align="left" valign="top">
							<table width="100%" align="center" border="0" cellpadding="0" style="border-spacing: 0px;">
								<tr><td width="10%" align="left" valign="top"><label># SERVICIOS</label></td><td width="10%" align="left" valign="top"></td></tr>
								<tr><td width="10%" align="left" valign="top"><input type="text" name="txtsalcontrol2" id="txtsalcontrol2" autocomplete="off" class="input finput" value="" readonly=false/></td><td width="10%" align="left" valign="top"></td></tr>
								<tr><td width="10%" align="left" valign="top"><label>PROYECTO</label></td></tr>
								<tr><td width="10%" align="left" valign="top"><input type="text" name="txtsalproy" id="txtsalproy" autocomplete="off" class="input finput" value="" readonly=true /></td></tr>
								<tr><td width="5%" align="left" valign="top"><label>PERSONA</label></td></tr>
								<tr><td width="5%" align="left" valign="top"><input type="hidden" name="txtsalresp" id="txtsalresp" class="input finput" autocomplete="off" value="" readonly=true placeholder="responsable"/>
									<select id="salbox" onChange="sbox(17);">
										<option value="0" disabled selected>PERSONA</option><option id="SALALEXIS" value="ALEXIS">ALEXIS</option><option id="SALANTHONYA" value="ANTHONYA">ANTHONY A</option><option id="SALANTHONYN" value="ANTHONYN">ANTHONY N</option><option id="SALCULLEN" value="CULLEN">CULLEN</option><option id="SALLUIS" value="LUIS">LUIS</option><option id="SALTELLO" value="TELLO">TELLO</option><option id="SALTITO" value="TITO">TITO</option><option id="SALWILLY" value="WILLY">WILLY</option>
									</select>
								</td></tr>
								<tr>
									<input type="hidden" name="txtsalfecha" id="txtsalfecha" autocomplete="off" placeholder="FECHA" class="input finput" value="" readonly=true/>
									<input type="hidden" name="txtsalcontrol" id="txtsalcontrol" class="input finput" autocomplete="off" value="" readonly=true/>
									<input type="hidden" name="txtsalid" id="txtsalid" class="input finput" autocomplete="off" value="" readonly=true/>
									<input type="hidden" name="txtsalcodigo" id="txtsalcodigo" class="input finput" placeholder="codigo" autocomplete="off" value="" readonly=true/>
									<input type="hidden" name="txtsalta" id="txtsalta" class="input finput" autocomplete="off" placeholder="descripciones" value=""/>
									<input type="hidden" name="txtsalcash" id="txtsalcash" class="input finput" autocomplete="off" placeholder="escash" value=""/>
								</tr>
							</table>
						</td>
						<td width="60%" align="left" valign="top" rowspan="8"><textarea rows="15" cols="20" class="input txtareas" id="txtareasal" placeholder="DESCRIPCION" readonly=true></textarea></td>
					</tr></table>
				</form>
				<table class="tabli" width="40%" style="float:left"><tr><td>
					<div id="btnopcpri">
						<div id="btsalmod" onClick="modificar(12);" class="tooltip"><center><img src="img/mod.png" width="20"><br>Modificar</center></div>
						<div id="btsalguarda0" onClick="guardar(18);" class="tooltip"><center><img src="img/salvar.png" width="20"><br>Guardar</center></div>
						<div id="btsalguarda1" onClick="guardar(19);" class="tooltip"><center><img src="img/salvar.png" width="20"><br>Guardar</center></div>
						<div id="btsalborrar" onClick="eliminar(15);" class="tooltip"><center><img src="img/borrar.png" width="20"><br>Borrar</center></div>
						<div id="btsallimpiar" onClick="limpiar(18);" class="tooltip"><center><img src="img/cancelar.png" width="20"><br>Limpiar</center></div>
						<div id="mensal"></div>
					</div>
				</td></tr></table>
			</div>
		</div> 
	</div>
</div>
</div>	
<script type="text/javascript" src="js/scripts.js"></script>
</body>
</html>