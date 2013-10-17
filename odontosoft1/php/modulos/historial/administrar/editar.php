<?php
// Permisos:
permiso_administrador();
include('./php/clases/Historial.class.php');
include('./php/clases/Db.class.php');
// Inicio:
$alerta_tipo = "no-alerta";
$alerta_mensaje = "";
// Incluimos las clases necesarias:

$int_id_pregunta = realUrl($_GET['id']);
echo "Id: ".$int_id_pregunta;
$obj_historial = Historial::getInstancia();
if(isset($_POST['submit'])) {

	if($_POST['isOpcion'] == 1) $_POST['isOpcion'] = true; else $_POST['isOpcion'] = false;
	if($_POST['isMultiple'] == 1) $_POST['isMultiple'] = true; else $_POST['isMultiple'] = false;

	//$id, $pregunta, $isOpcion, $isMultiple, $opciones
	if($obj_historial->modificarPreguntaHistorial($int_id_pregunta, $_POST['pregunta'], $_POST['isOpcion'], $_POST['isMultiple'], $_POST['opciones'])) {
		$alerta_tipo = $obj_historial->getAlerta();
		$alerta_mensaje = $obj_historial->getMensaje();
		$_POST = null; // Limpiamos cajas de Texto.
	} else {
		$alerta_tipo = $obj_historial->getAlerta();
		$alerta_mensaje = $obj_historial->getMensaje();
	}
}
// Otenemos los datos del usuario seleccionado:
$obj_historial->getFromPreguntaHistorialbyId($int_id_pregunta);
?>

		<title><?php echo $website_nombre; ?></title>
		<script src="./js/historial/administrar/crear.js" type="text/javascript"></script>
	</head>
	<body>
		<div id="navegador"><?php echo $website_ruta; ?></div>
		<div id="mensaje_alerta" class="<?php echo $alerta_tipo; ?>"><?php echo $alerta_mensaje; ?></div>
		<form action="?sitio=<?php echo toUrl(34); ?>&id=<? echo toUrl($int_id_pregunta); ?>" method="post">
			<fieldset>
				<legend>Agregar una pregunta</legend>
				<br />
				Ingrese pregunta:
				<br />
				<textarea pattern="^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]{1,500}$" name="pregunta"><?php printf($obj_historial->getPregunta()); ?></textarea>
				<br />
				<br />
				¿La pregunta tiene opciones? <input type="radio" id="jSi" name="isOpcion" value="1" <?php if($obj_historial->getIsOpcion() == true) { echo "checked"; }; ?> >Si <input id="jNo" <?php if($obj_historial->getIsOpcion() == false) { echo "checked"; }; ?> type="radio" name="isOpcion" value="0">No
				<br />
				<div id="jisOpcion" <?php if($obj_historial->getIsOpcion() == false) { ?>style="visibility: hidden; height: 0px;"<? }; ?> >
					<br />
					Ingrese las opciones (separe las opciones con una coma ","):
					<br />
					<br />
					<textarea name="opciones"><?php printf($obj_historial->getOpciones()); ?></textarea>
					<br />
					<br />
					¿La pregunta puede ser marcada con mas de una opcion? <input <?php if($obj_historial->getIsMultiple() == true) { echo "checked"; }; ?> type="radio" name="isMultiple" value="1">Si <input <?php if($obj_historial->getIsMultiple() == false) { echo "checked"; }; ?> type="radio" name="isMultiple" value="0">No
					<br />
				</div>
				<br />
				<input type="submit" class="btn" name="submit" value="Guardar Pregunta">
				<br />
			</fieldset>
		</form>