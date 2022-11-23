<?php

require_once "modelo_conexion.php";

class mascotas extends ModeloConexionDB
{

    private $id;
    private $id_fundacion;
    private $nombre;
    private $descripcion;
    private $edad;
    private $tipo;
    private $raza;
    private $URL_imagen;
    private $estado;
    private $activo;

    public function __construct()
    {

    }

    public function lista()
    {
        $this->query = "
			SELECT pets.id, pets.id_fundacion,fundaciones.nombre, pets.nombre, pets.descripcion, pets.edad, pets.tipo,
            pets.raza,pets.URL_imagen, pets.estado, pets.activo
			FROM pets
            Inner join fundaciones on(pets.id_fundacion=fundaciones.id)
            ORDER BY pets.nombre ASC
			";

        $this->obtener_resultados_query();
        $resultado=$this->rows;
        return $resultado;
    }

    

    public function cambiar_estado($id = '')
    {
        if ($id != ''):
            $this->query ="UPDATE pets SET estado='adoptado'
	            WHERE id = '$id'";
            $resultado = $this->ejecutar_query_simple();
            return $resultado;
        endif;
       


    }

    public function consultar($id = '')
    {
        if ($id != ''):
            $this->query ="Select
                id, id_fundacion, nombre, descripcion, edad, tipo,raza,URL_imagen, estado, activo
			    FROM pets
	            WHERE id = '$id'";
            $this->obtener_resultados_query();
        endif;
        if (count($this->rows) == 1):
            foreach ($this->rows[0] as $propiedad => $valor):
                $this->$propiedad = $valor;
            endforeach;
        endif;
        

    }

    public function nuevo($datos = array())
    {
        if (array_key_exists('IdCliente', $datos)):
            foreach ($datos as $campo => $valor):
                $$campo = $valor;
            endforeach;
            $Nit = utf8_decode($Nit);
            $Nombre = utf8_decode($Nombre);
            $Descripcion = utf8_decode($Descripcion);
            $Direccion = utf8_decode($Direccion);
            $Telefono = utf8_decode($Telefono);
            $NumeroCuenta = utf8_decode($NumeroCuenta);
            $TipoCuenta = utf8_decode($TipoCuenta);
            $this->query = "
						INSERT INTO fundaciones
						(id,nit,nombre,descripcion,direccion,telefono,numero_cuenta,tipo_cuenta)
						VALUES
						('$Nit', '$Nombre', '$Descripcion', '$Direccion', '$Telefono', '$NumeroCuenta', '$TipoCuenta')
						";
            $resultado = $this->ejecutar_query_simple();
            return $resultado;
        endif;
    }
    public function editar($datos = array())
    {
        foreach ($datos as $campo => $valor):
            $$campo = $valor;
        endforeach;
      
        $this->query = "
			UPDATE fundaciones
			SET nit = '$Nit',
            nombre = '$Nombre',
			descripcion = '$Descripcion',
			direccion = '$Direccion',
			telefono = '$Telefono',
			numero_cuenta = '$NumeroCuenta',
			tipo_cuenta = '$TipoCuenta'
			WHERE IdFundacion = '$IdFundacion'
			";
        $resultado = $this->ejecutar_query_simple();
        return $resultado;

    }

    public function borrar()
    {

    }

    

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of id_fundacion
     */ 
    public function getId_fundacion()
    {
        return $this->id_fundacion;
    }

    /**
     * Set the value of id_fundacion
     *
     * @return  self
     */ 
    public function setId_fundacion($id_fundacion)
    {
        $this->id_fundacion = $id_fundacion;

        return $this;
    }

    /**
     * Get the value of nombre
     */ 
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */ 
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get the value of descripcion
     */ 
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set the value of descripcion
     *
     * @return  self
     */ 
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get the value of edad
     */ 
    public function getEdad()
    {
        return $this->edad;
    }

    /**
     * Set the value of edad
     *
     * @return  self
     */ 
    public function setEdad($edad)
    {
        $this->edad = $edad;

        return $this;
    }

    /**
     * Get the value of tipo
     */ 
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set the value of tipo
     *
     * @return  self
     */ 
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get the value of raza
     */ 
    public function getRaza()
    {
        return $this->raza;
    }

    /**
     * Set the value of raza
     *
     * @return  self
     */ 
    public function setRaza($raza)
    {
        $this->raza = $raza;

        return $this;
    }

    /**
     * Get the value of URL_imagen
     */ 
    public function getURL_imagen()
    {
        return $this->URL_imagen;
    }

    /**
     * Set the value of URL_imagen
     *
     * @return  self
     */ 
    public function setURL_imagen($URL_imagen)
    {
        $this->URL_imagen = $URL_imagen;

        return $this;
    }

    /**
     * Get the value of estado
     */ 
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set the value of estado
     *
     * @return  self
     */ 
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get the value of activo
     */ 
    public function getActivo()
    {
        return $this->activo;
    }

    /**
     * Set the value of activo
     *
     * @return  self
     */ 
    public function setActivo($activo)
    {
        $this->activo = $activo;

        return $this;
    }
}