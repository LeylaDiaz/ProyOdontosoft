<?php
// Permisos:
permiso_medico();
include('./php/clases/Historial.class.php');
include('./php/clases/Db.class.php');
// Inicio:
$alerta_tipo = "no-alerta";
$alerta_mensaje = "";
// Incluimos las clases necesarias:

if(isset($_POST['submit'])) {
	$obj_historial = Historial::getInstancia();

	if($_POST['isOpcion'] == 1) $_POST['isOpcion'] = true; else $_POST['isOpcion'] = false;
	if($_POST['isMultiple'] == 1) $_POST['isMultiple'] = true; else $_POST['isMultiple'] = false;

	//$pregunta, $isOpcion, $isMultiple, $opciones
	if($obj_historial->crearPreguntaHistorial($_POST['pregunta'],$_POST['isOpcion'],$_POST['isMultiple'],$_POST['opciones'])) {
		$alerta_tipo = $obj_historial->getAlerta();
		$alerta_mensaje = $obj_historial->getMensaje();
		$_POST = null; // Limpiamos cajas de Texto.
	} else {
		$alerta_tipo = $obj_historial->getAlerta();
		$alerta_mensaje = $obj_historial->getMensaje();
	}
}
?>
		<title><?php echo $website_nombre; ?></title>
		<script src="./js/historial/administrar/crear.js" type="text/javascript"></script>
	</head>
	<body>
		<div id="navegador"><?php echo $website_ruta; ?></div>
		<div id="mensaje_alerta" class="<?php echo $alerta_tipo; ?>"><?php echo $alerta_mensaje; ?></div>
		<form action="?sitio=<?php echo toUrl(35); ?>" method="post">
			<fieldset>
				<legend>Agregar una pregunta</legend>
				<br />
				Ingrese pregunta:
				<br />
				<textarea pattern="^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]{1,500}$" name="pregunta"></textarea>
				<br />
				<br />
				¿La pregunta tiene opciones? <input type="radio" id="jSi" name="isOpcion" value="1">Si <input id="jNo" checked type="radio" name="isOpcion" value="0">No
				<br />
				<div id="jisOpcion" style="visibility: hidden; height: 0px;">
					<br />
					Ingrese las opciones (separe las opciones con una coma ","):
					<br />
					<br />
					<textarea name="opciones"></textarea>
					<br />
					<br />
					¿La pregunta puede ser marcada con mas de una opcion? <input type="radio" name="isMultiple" value="1">Si <input checked type="radio" name="isMultiple" value="0">No
					<br />
				</div>
				<br />
				<input type="submit" class="btn" name="submit" value="Agregar pregunta">
				<br />
			</fieldset>
		</form>

<?
/*
CREATE TABLE  `preg_hist` (
 `id` INT NOT NULL ,
 `pregunta` VARCHAR( 500 ) NOT NULL ,
 `isOpcion` BOOL NOT NULL ,
 `isMultiple` BOOL NOT NULL ,
 `rpta_str` VARCHAR( 500 ) NOT NULL ,
 `rpta_op` INT NOT NULL ,
PRIMARY KEY (  `id` )
) ENGINE = MYISAM ;
*/
?>