<?php
// Permisos:
permiso_secretaria();
include('./php/clases/Historial.class.php');
include('./php/clases/Paciente.class.php');
include('./php/clases/Db.class.php');
// Inicio:
$alerta_tipo = "no-alerta";
$alerta_mensaje = "";
// Incluimos las clases necesarias:

if(isset($_POST['submit'])) {
	$obj_historial = Historial::getInstancia();

	$p5= $_POST['p5_1']."|".$_POST['p5_2']."|".$_POST['p5_3']."|".$_POST['p5_4']."|".$_POST['p5_5']."|".$_POST['p5_6']."|".$_POST['p5_7']."|".
	$_POST['p5_8']."|".$_POST['p5_9']."|".$_POST['p5_10']."|".$_POST['p5_11']."|".$_POST['p5_12']."|".$_POST['p5_13']."|".$_POST['p5_14'];

	if($obj_historial->crearHistorial($_POST['p1'],$_POST['p2'],$_POST['p3'],$_POST['p4'],$p5,$_POST['p6'],$_POST['p7'],$_POST['p8'],
		$_POST['p9'],$_POST['p10'],$_POST['p11'],$_POST['p12'],$_POST['p13'], $_POST['nombre'], $_POST['appat'],$_POST['apmat'],$_POST['dni'],$_POST['telefono'],
		$_POST['direccion'])) {
		$alerta_tipo = $obj_historial->getAlerta();
		$alerta_mensaje = $obj_historial->getMensaje();
		$_POST = null; // Limpiamos cajas de Texto.
	} else {
		$alerta_tipo = $obj_usuario->getAlerta();
		$alerta_mensaje = $obj_usuario->getMensaje();
	}
}
?>
		<title><?php echo $website_nombre; ?></title>
		<script src="./js/usuarios/crear.js" type="text/javascript"></script>
	</head>
	<body>
		<div id="navegador"><?php echo $website_ruta; ?></div>
		<div id="mensaje_alerta" class="<?php echo $alerta_tipo; ?>"><?php echo $alerta_mensaje; ?></div>
		<form action="?sitio=<?php echo toUrl(30); ?>" method="post">
			<fieldset>
				<legend>Rellene los siguienets datos</legend>
				<br />
				Nombre:
				<br />
				<input type="text" name="nombre" pattern="^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]{1,50}$" placeholder="Nombre del paciente" required autocomplete="off">
				<br />
				<br />
				Apellidos:
				<br />
				<input type="text" name="appat" pattern="^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]{1,50}$" placeholder="Apellido paterno" required autocomplete="off"> <input type="text" name="apmat" pattern="^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]{1,50}$" placeholder="Apellido materno" required autocomplete="off">
				<br />
				<br />
				DNI:
				<br />
				<input type="text" name="dni" pattern="^[0-9]{8,}$" maxlength="8" placeholder="DNI" required autocomplete="off" >
				<br />
				<br />
				Teléfono personal:
				<br />
				<input type="text" name="telefono" pattern="^[0-9]{6,15}$" placeholder="Teléfono">
				<br />
				<br />
				Dirección:
				<br />
				<input type="text" name="direccion" pattern="^[a-zA-ZñÑáéíóúÁÉÍÓÚ . 0-9]{1,50}$" placeholder="Dirección">
				<br />
				<br />
				¿Ha estado hospitalizado en los ultimos meses? ¿Por qué?:
				<br />
				<textarea name="p1"></textarea>
				<br />
				<br />
				¿Ha estado bajo atencion médica en estos últimos meses? ¿Por qué? ¿Dónde?
				<br />
				<textarea name="p2"></textarea>
				<br />
				<br />
				¿Es alérgico a alguna droga, anestesia y/o antibióticos? ¿Cuáles?
				<br />
				<textarea name="p3"></textarea>
				<br />
				<br />
				¿Ha tenido hemorragia, que haya tenido que ser tratada?
				<br />
				<textarea name="p4"></textarea>
				<br />
				<br />
				Ha tenido alguna de estas enfermedades:
				<br />
				<input type="checkbox" name="p5_1" value="Cardiopatía"> Cardiopatía
				<br /> 
				<input type="checkbox" name="p5_2" value="Fiebre neumática"> Fiebre neumática
				<br />
				<input type="checkbox" name="p5_3" value="Artritis"> Artritis
				<br />
				<input type="checkbox" name="p5_4" value="Tuberculosis"> Tuberculosis
				<br />
				<input type="checkbox" name="p5_5" value="Anemia"> Anemia
				<br />
				<input type="checkbox" name="p5_6" value="Epilepsia"> Epilepsia
				<br />
				<input type="checkbox" name="p5_7" value="Marcapasos"> Marcapasos
				<br />
				<input type="checkbox" name="p5_8" value="Hepatitis"> Hepatitis
				<br />
				<input type="checkbox" name="p5_9" value="Tratamiento oncológico"> Tratamiento oncológico
				<br />
				<input type="checkbox" name="p5_10" value="Hipertensión arterial"> Hipertensión arterial
				<br />
				<input type="checkbox" name="p5_11" value="Diabetes"> Diabetes
				<br />
				<input type="checkbox" name="p5_12" value="Apoplejia"> Apoplejia
				<br />
				<input type="checkbox" name="p5_13" value="Accidentes vasculares"> Accidentes vasculares
				<br />
				<input type="checkbox" name="p5_14" value="Perdida de peso"> Perdida de peso
				<br />
				<br />
				Ha tenido alguna otra enfermedad:
				<br />
				<textarea name="p6"></textarea>
				<br />
				<br />
				¿Esta tomando algún medicamento actualmente? ¿Cuál?
				<br />
				<textarea name="p7"></textarea>
				<br />
				<br />
				¿Esta embarazada? ¿Cuántas semanas o meses?
				<br />
				<textarea name="p8"></textarea>
				<br />
				<br />
				¿Está amamantando?
				<br />
				<textarea name="p9"></textarea>
				<br />
				<br />
				En caso de urgencia llamar al teléfono:
				<br />
				<textarea name="p10"></textarea>
				<br />
				<br />
				Teléfono y dirección de su servicio médico en caso de urgencia. Si en caso lo tuviera.
				<br />
				<textarea name="p11"></textarea>
				<br />
				<br />
				¿Cuándo ha sido su última consulta dental?
				<br />
				<textarea name="p12"></textarea>
				<br />
				<br />
				Observaciones:
				<br />
				<textarea name="p13"></textarea>
				<br />
				<br />
				<input type="submit" class="btn" name="submit" value="Crear historial">
				<br />
			</fieldset>
		</form>