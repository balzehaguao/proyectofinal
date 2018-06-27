$(document).on('ready',function(){
	$('#txtsalcontrol2').keyup(function(event){if(event.keyCode===13){if($('#txtsalcontrol2').val()===''){alert('Debe llenar el campo');}else{comprobar();}}});
	$('#contenedor').hide(); document.addEventListener('contextmenu', event=>event.preventDefault()); nobackbutton(); var st=0; $('a').click(function(e){e.preventDefault();}); 
	window.pomenu=0; window.qumenu=0; window.vaop=0; window.vper=0; window.usuario=""; 
	$('#contenedor').hide(); $('#salir').hide(); $('#btadmmod').hide(); $('#btadmsav').hide(); $('#btadmupd').hide(); $('#btadmbor').hide(); $('#btadmlim').hide(); $('#paneladmin').hide(); $('#dsalidas').hide(); $('#op3').hide(); $('#li8').hide(); $('.dopc').mouseenter(function(){if(st===1){st=0; $('.dopc').addClass('dhopc');}}); $('.sdopc').mouseenter(function(){if(st===1){st=0; $('.sdopc').addClass('sdhopc');}});
	$('#op1').click(function(){$('#li17').show(); $('#li8').hide();
		if(window.pomenu===1 && window.qumenu===1){$('#cuerpo').animate({'left':'100px'},200,function(){window.pomenu=0; window.qumenu=0; limpiar(18);});
		}else{$('#cuerpo').animate({'left':'100px'},200,function(){$('#cuerpo').animate({'left':'250px'},200,function(){window.pomenu=1; window.qumenu=1;});});}
	});
	$('#op3').click(function(){$('#li1').hide(); $('#li2').hide(); $('#li3').hide(); $('#li4').hide(); $('#li5').hide(); $('#li8').show(); $('#li9').show(); $('#li10').hide(); $('#li11').hide(); $('#li12').hide(); $('#li13').hide(); $('#li14').hide(); $('#li15').hide(); $('#li16').hide(); $('#li17').hide();
		if(window.pomenu===1 && window.qumenu===3){$('#cuerpo').animate({'left':'100px'},200,function(){window.pomenu=0; window.qumenu=0; limpiar(8);});
		}else{$('#cuerpo').animate({'left':'100px'},200,function(){if(window.vaop!==10){$('#li8').hide(); $('#li9').hide();}$('#cuerpo').animate({'left':'250px'},200,function(){window.pomenu=1; window.qumenu=3;});});}
	});
	$('#op6').click(function(){salir();});
	$('#sop8').click(function(){limpiar(8); limpiar(10); $('#cuerpo').animate({'left':'100px'},100,function(){$('#dsalidas').hide(); $('#paneladmin').toggle();}); window.pomenu=0; window.qumenu=0; tablar(8);});
	$('#sop17').click(function(){limpiar(8); $('#cuerpo').animate({'left':'100px'},100,function(){$('#paneladmin').hide(); $('#dsalidas').toggle();}); window.pomenu=0; window.qumenu=0; tablar(34); limpiar(18);});
	$('.dopc').click(function(){$('.dopc').removeClass('activo'); $('.dopc').removeClass('dhopc'); st=1; $(this).addClass('activo');});
});
function comprobar(){$.ajax({type:'post',url:'ajax/sacomprobar.php',data: $('#fsalida').serialize(),success:function(data){$('#mensal').html(data);}});}
function enviar(){if($('#username').val()==='' || $('#password').val()===''){alert('Debe llenar los campos');}else{console.log('p1');$.ajax({type:'post',url:'ajax/login.php',data: $('#formu').serialize(),success:function(data){$('#menbox').html(data);}});}}
function correcto(valor1){var cssbnd; $('#contenedor').show(); 
	if(valor1===14){alert('Usuario no autorizado para este sistema');
	}else if(valor1!==14){window.vaop=valor1;
		if(valor1===10){$('#op1').show(); $('#op3').show();
		}else if(valor1===11){$('#op1').show(); $('#op3').hide();}
		$('#dentrada').fadeOut(1000); $('#salir').show(); 
	}
}
function limpiar(num){
	if(num===10){admindesha(); $('#adid').val(''); $('#txtadusr').val(''); $('#txtadpsw').val(''); $('#adnl').val(''); $('#menadmin').text(''); $('#adid').attr('autocomplete','off'); $('#txtadusr').attr('autocomplete','off'); $('#txtadpsw').attr('autocomplete','off'); $('#adnl').attr('autocomplete','off'); $('#snivel option').prop('selected',function(){return this.defaultSelected;}); 
	}else if(num===18){$('#tabsal tr').removeClass('sel'); $('#txtsalid').val(''); $('#txtsalfecha').val(''); $('#txtsalproy').val(''); $('#txtsalcontrol').val(''); $('#txtareasal').val(''); $('#txtsalcontrol2').val(''); $('#txtsalcodigo').val(''); $('#txtsalresp').val(''); $('div#mensal').html('');$('#salbox').prop('disabled','true'); $('#txtsalcontrol2').prop('readOnly',false); $('#txtsalproy').prop('readOnly',true); $('#txtareasal').prop('readOnly',true); $('#txtsalid').attr('autocomplete','off'); $('#txtsalfecha').attr('autocomplete','off'); $('#txtsalproy').attr('autocomplete','off'); $('#txtsalcontrol').attr('autocomplete','off'); $('#txtsalcodigo').attr('autocomplete','off'); $('#txtsalresp').attr('autocomplete','off'); 
	$('#salbox option').prop('selected',function(){return this.defaultSelected;}); $('#btsalmod').hide(); $('#btsalguarda0').hide(); $('#btsalguarda1').hide(); $('#btsalborrar').hide(); $('#btsallimpiar').hide(); $('#btsallisto').hide();}
}
function admindesha(){$('#txtadusr').prop('readonly',true); $('#txtadpsw').prop('readonly',true); $('#snivel').prop('disabled',true); $('#btadmagr').show(); $('#btadmmod').hide(); $('#btadmsav').hide(); $('#btadmupd').hide(); $('#btadmbor').hide(); $('#btadmlim').hide(); $('#chponcheo').prop('checked', false); $('#chponcheo').attr("disabled", true);}
function fundate(){var d2=new Date(); window.fecha=(1+d2.getMonth())+"/"+d2.getDate()+"/"+d2.getFullYear();}
function habilitar(num){var d2,t,d;
	if(num===9){$('#txtadusr').prop('readonly',false); $('#txtadpsw').prop('readonly',false); $('#snivel').prop('disabled',false); $('#adid').attr('autocomplete','off'); $('#txtadusr').attr('autocomplete','off'); $('#txtadpsw').attr('autocomplete','off'); $('#adnl').attr('autocomplete','off'); $('#btadmagr').hide(); $('#btadmmod').hide(); $('#btadmsav').show(); $('#btadmupd').hide(); $('#btadmbor').hide(); $('#btadmlim').show();			   
	}else if(num===14){d2=new Date(); fundate(); $('#salbox').prop('disabled',false); $('#txtsalfecha').val(window.fecha); $('#btsalguarda0').show(); $('#btsalmod').hide(); $('#btsallimpiar').show(); t=d2.getHours().toString()+d2.getMinutes().toString()+d2.getSeconds().toString(); d=d2.getMonth().toString()+d2.getDate().toString()+d2.getFullYear().toString(); $('#txtsalproy').prop('readOnly',false); $('#txtsalcontrol2').prop('readOnly',true); $('#txtsalresp').prop('readOnly',false); $('#txtareasal').prop('readOnly',false); $('#salbox').prop('disabled',false); document.getElementById("txtsalproy").focus();} 
}
function deshabilitar(num){
	if(num===1){$('#txtcliente').prop('readOnly',true); $('#txtcontacto').prop('readOnly',true); $('#txtarease').prop('readOnly',true); $('#txtareaor').prop('readOnly',true); $('#txtareava').prop('readOnly',true);$('#txtrecibo').prop('readOnly',true); $('#txtrecibos').prop('readOnly',true); $('#status').prop('disabled',true); $('#stipo').prop('disabled',true); $('#sconductor').prop('disabled',true); $('#selecubi4').prop('disabled',true); $('#selecubi5').prop('disabled',true);
	}else if(num===2){$('#cbconduce').prop('disabled',true);
	}else if(num===3){$('#txtpscliente').prop('readOnly',true); $('#txtpsresp').prop('readOnly',true); $('#txtareama').prop('readOnly',true); $('#txtpscontrol').prop('readOnly',true); $('#txtpsmarca').prop('readOnly',true);$('#txtpsmodelo').prop('readOnly',true); $('#txtpsserie').prop('readOnly',true); $('#psstatus').prop('disabled',true);
	}else{num--; $('#txtcliente'+num).prop('readOnly',true); $('#txtcontacto'+num).prop('readOnly',true); $('#txtareas'+num).prop('readOnly',true); $('#txtareao'+num).prop('readOnly',true); $('#txtareav'+num).prop('readOnly',true); $('#txtrecibo'+num).prop('readOnly',true); $('#txtrecibos'+num).prop('readOnly',true); $('#tnotas'+num).prop('readOnly',true); $('#status'+num).prop('disabled',true);}
}
function nobackbutton(){window.location.hash='no-back-button'; window.location.hash='Again-No-back-button'; window.onhashchange=function(){window.location.hash='no-back-button';};}
function salir(){window.open('index.php','_self');}
function tablar(num){var i, rows, st6;
  if(num===8){$.ajax({type:'post',url:'ajax/tablaad.php',success:function(data){$('div#resadmin').html(data);}}); 
	}else if(num===17){rows=document.getElementById('tabadmin').rows;
		for(i=0; i<rows.length; i++){
			rows[i].onclick=(function(){return function(){$('#btagregar').hide(); $('#btmod').show(); $('#btborrar').show(); $('#btlimpiar').show(); $('#bttraspa').show(); $('#btlistar').show(); $('#btpreparado').show(); $('#adid').val(this.cells[0].innerHTML); $('#txtadusr').val(this.cells[1].innerHTML); $('#adnl').val(this.cells[2].innerHTML); var varnivel=$('#adnl').val(); $('#snivel option[value="'+varnivel+'"]').prop('selected',true); $('#btadmagr').hide(); $('#btadmmod').show(); $('#btadmsav').hide(); $('#btadmupd').hide(); $('#btadmbor').show(); $('#btadmlim').show();};})(i);
		}
	}else if(num===34){fundate(); st6=window.fecha; $.ajax({type:'post',url:'ajax/taalmacen.php',data:{fecha:st6},success:function(data){$('div#mensalidas').html(data);}});
	}else if(num===35){rows=document.getElementById('tabsal').rows;
		for(i=0; i<rows.length; i++){rows[i].onclick=(function(){return function(){
			$('#btsalborrar').show(); $('#btsalmod').show(); $('#btsallisto').show();  $('#tabsal tr').removeClass('sel'); $(this).removeClass('new'); $(this).addClass('sel'); $('#salformula').hide(); $('#btsalagregar').hide(); $('#btsallimpiar').show(); $('#btsallistar').show(); $('#txtsalid').val(this.cells[0].innerHTML); $('#txtsalcontrol').val(this.cells[1].innerHTML); $('#txtsalproy').val(this.cells[2].innerHTML); $('#txtareasal').val(this.cells[3].innerHTML); 
			$('#txtsalresp').val(this.cells[5].innerHTML); $('#txtsalcontrol2').val(this.cells[6].innerHTML); $('#txtsalcontrol2').prop('readOnly',true); var varsalres=$('#txtsalresp').val(); $('#salbox option[value="'+varsalres+'"]').prop('selected',true);
		};})(i);}
	}
}
function guardar(num){var action,ta,nvl;
	if(num===5){
		if($('#txtadusr').val()==='' || $('#txtadpsw').val()===''){alert('DEBE LLENAR TODOS LOS CAMPOS');
		}else{$.ajax({type:'post',url:'ajax/adnew.php',data: $('#fadmin').serialize(),success:function(data){$('#menadmin').html(data);}});}
	}else if(num===6){
		if($('#txtadusr').val()==='' && $('#txtadpsw').val()===''){alert('DEBE LLENAR TODOS LOS CAMPOS');
		}else if($('#txtadusr').val()==='' && $('#txtadpsw').val()!==''){alert('DEBE LLENAR TODOS LOS CAMPOS');
		}else if($('#txtadusr').val()!=='' && $('#txtadpsw').val()===''){
			alertify.confirm('DESEA DEJAR LA MISMA CLAVE?',function(){nvl=$('#snivel option:selected').val(); $('#adnl').val(nvl); $('#fadmin').attr('action',action); $.ajax({type:'post',url:'ajax/adminupd.php',data: $('#fadmin').serialize(),success:function(data){$('#menadmin').html(data);}});},function(){alertify.error('Operacion cancelada');});
		}else{nvl=$('#snivel option:selected').val(); $('#adnl').val(nvl); $.ajax({type:'post',url:'ajax/adminupd.php',data: $('#fadmin').serialize(),success:function(data){$('#menadmin').html(data);}});}
	}else if(num===18){ta=$('#txtareasal').val(); $('#txtsalta').val(ta); $('#btsalguardar0').hide(); $('#btsallimpiar').hide(); $.ajax({type:'post',url:'ajax/saregister.php',data: $('#fsalida').serialize(),success:function(data){$('#mensal').html(data);}});
	}else if(num===19){if($('#txtsalproy').val()==='' || $('#txtsalresp').val()===''){alert('SELECCIONE UNA ITEM');
		}else{ta=$('#txtareasal').val(); $('#txtsalta').val(ta); $('#btsalguarda1').hide(); $('#btsallimpiar').hide(); $.ajax({type:'post',url:'ajax/saactualiza.php',data: $('#fsalida').serialize(),success:function(data){$('#mensal').html(data);}});}	
	}
}
function modificar(num){
	if(num===5){habilitar(9);$('#btadmagr').hide(); $('#btadmmod').hide(); $('#btadmsav').hide(); $('#btadmupd').show(); $('#btadmbor').hide(); $('#btadmlim').show();
	}else if(num===12){$('#btsalguarda1').show(); $('#btsalmod').hide(); $('#btsallimpiar').show(); $('#txtsalcontrol2').prop('readOnly',true); $('#txtsalproy').prop('readOnly',false); $('#txtsalresp').prop('readOnly',false); $('#txtareasal').prop('readOnly',false); $('#salbox').prop('disabled',false);}
}
function eliminar(num){
	if(num===10){
		if($('#txtadusr').val()===''){alert('DEBE SELECCIONAR UN USUARIO');
		}else{alertify.confirm('DESEA BORRAR ESTE USUARIO?',function(){$.ajax({type:'post',url:'ajax/admindel.php',data: $('#fadmin').serialize(),success:function(data){$('#menadmin').html(data);}});},function(){alertify.error('Operacion cancelada');});}
	}else if(num===15){
		if($('#txtsalproy').val()==='' || $('#txtsalresp').val()===''){alert('DEBE SELECCIONAR UNA SALIDA');
		}else{alertify.confirm('DESEA BORRAR ESTA SALIDA?',function(){$.ajax({type:'post',url:'ajax/saleliminar.php',data: $('#fsalida').serialize(),success:function(data){$('#mensalidas').html(data);}}); limpiar(18);},function(){alertify.error('Operacion cancelada');});}
	}
}
function sbox(num){var nvl,des;
	if(num===7){nvl=$('#snivel option:selected').val(); $('#adnl').val(nvl);
	}else if(num===17){des=$('#salbox option:selected').val(); $('#txtsalresp').val(des);}
}