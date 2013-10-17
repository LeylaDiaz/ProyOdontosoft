<?php 
class Historial {
	/* Atributos */
	// Atributos Tipo A: Atributos utilizados en la clase.
	private $id;
	private $pregunta;
	private $isOpcion;
	private $isMultiple;
	private $opciones;
	private $rpta_str;
	private $rpta_op;

	// Atributos Tipo B: Atributos utilizados internamente por la clase.
	private static $obj_instancia;
	public $alerta;
	public $mensaje;

	/* Constructores */
	// Constructor: Construye a la clase de forma automática.
	private function __construct() { }
	private function __clone() { }
	// Get: Patrón Singleton para evitar más de una instancia de la clase.
	public static function getInstancia() {
		if (!(self::$obj_instancia instanceof self)) {
			self::$obj_instancia = new self();
		}
		return self::$obj_instancia;
	}

	/* Get y Set*/
	public function getAlerta() {
		return $this->alerta;
	}
	public function getMensaje() {
		return $this->mensaje;
	}
	//
	public function getId() {
		return $this->id;
	}
	public function getPregunta() {
		return $this->pregunta;
	}
	public function getIsOpcion() {
		return $this->isOpcion;
	}
	public function getOpciones() {
		return $this->opciones;
	}
	public function getIsMultiple() {
		return $this->isMultiple;
	}
	public function getRpta_str() {
		return $this->rpta_str;
	}
	public function getRpta_op() {
		return $this->rpta_op;
	}

	/* Métodos */
	public function crearPreguntaHistorial($pregunta, $isOpcion, $isMultiple, $opciones) {
		$obj_bd = Db::getInstancia();
		// Registro en la BD:
		if($isOpcion == 1) $isOpcion = true; else $isOpcion = false;
		if($isMultiple == 1) $isMultiple = true; else $isMultiple = false;
		if($obj_bd->ejecutar_consulta("INSERT INTO preg_hist(pregunta, isOpcion, isMultiple, opciones) VALUES 
			('$pregunta', '$isOpcion', '$isMultiple', '$opciones');")) {
			$this->alerta = "exito";
			$this->mensaje = "Se agregó la pregunta al historial.";
		} else {
			$this->alerta = "error";
			$this->mensaje = "Ha ocurrido un error en la base de datos.";
			return false;
		}
	}

	public function listarPreguntasHistoriales()
	{
		$obj_bd = Db::getInstancia();
		$sql_stmt = $obj_bd->ejecutar_consulta("SELECT id, pregunta, isOpcion, opciones FROM preg_hist ORDER BY id");
		while ($array_rpta = $obj_bd->obtener_fila($sql_stmt, 0)) {
			?><tr>
				<td><?php echo $array_rpta['pregunta']; ?></td>
				<td><?php 
					if($array_rpta['isOpcion'] == true) {
						echo $array_rpta['opciones'];
					} else {
						echo "Pregunta sin opciones.";
					}

				?></td>
				<td><a href="?sitio=<?php echo toUrl(37); ?>&id=<?php echo toUrl($array_rpta['id']); ?>">Editar</a></td>
				<td><a onclick="return confirmar();" href="?sitio=<?php echo toUrl(36); ?>&id=<?php echo toUrl($array_rpta['id']); ?>">Eliminar</a></td>
			</tr><?php
		}
	}

	public function removePreguntaHistorial($id) {
		$obj_bd = Db::getInstancia();
		$sql_stmt = $obj_bd->ejecutar_consulta("DELETE FROM preg_hist WHERE id = $id");
		$this->alerta = "exito";
		$this->mensaje = "Pregunta eliminada correctamente, redireccionando en <span id='tiempo'>5</span> segundos.";
	}

	public function modificarPreguntaHistorial($id, $pregunta, $isOpcion, $isMultiple, $opciones) {
		$obj_bd = Db::getInstancia();
		echo "Sgundo ID: ".$id;
		echo "Sgundo ID: ".$pregunta;
		$consult_sql = "UPDATE preg_hist SET pregunta = '$pregunta', 
							   isOpcion = '$isOpcion',
							   isMultiple = '$isMultiple',
							   opciones = '$opciones'
						WHERE id = $id;";
		if($obj_bd->ejecutar_consulta($consult_sql)) {
			$this->alerta = "exito";
			$this->mensaje = "Pregunta editada correctamente.";
		} else {
			$this->alerta = "error";
			$this->mensaje = "Ha ocurrido un error en la base de datos.";
			return false;
		}
	}

	public function  getFromPreguntaHistorialbyId($id) {
		$obj_bd = Db::getInstancia();
		$sql_stmt = $obj_bd->ejecutar_consulta("SELECT id, pregunta, isOpcion, opciones, isMultiple FROM preg_hist WHERE id = $id;");
		while ($array_rpta = $obj_bd->obtener_fila($sql_stmt, 0)) {
			$this->pregunta = $array_rpta['pregunta'];
			$this->isOpcion = $array_rpta['isOpcion'];
			$this->opciones = $array_rpta['opciones'];
			$this->isMultiple = $array_rpta['isMultiple'];
		}
	}

}
?>
