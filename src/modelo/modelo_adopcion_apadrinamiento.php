<?php

require_once "modeloAbstractoDB.php";

class mascotas extends ModeloAbstractoDB
{

    private $IdMascota;
    private $IdFundacion;
    private $Nombre;
    private $Descricpcion;
    private $Edad;
    private $Tipo;
    private $Raza;
    private $Estado;
    private $Activo;

    public function __construct()
    {

    }

    public function lista()
    {
        $this->query = "
			SELECT pets.id, pets.id_fundacion,fundaciones.nombre, pets.nombre, pets.descripcion, pets.edad, pets.tipo,
            pets.raza, pets.estado, pets.activo
			FROM pets
            Inner join fundaciones on(pets.id_fundacion=fundaciones.id)
            ORDER BY pets.nombre ASC
			";

        $this->obtener_resultados_query();
        return $this->rows;
    }

    public function consultar($id = '')
    {
        if ($id != ''):
            $this->query = "
            id, id_fundacion, nombre, descripcion, edad, tipo,
            raza, estado, activo
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
        if (array_key_exists('IdMascota', $datos)):
            foreach ($datos as $campo => $valor):
                $$campo = $valor;
            endforeach;
            $IdFundacion = utf8_decode($IdFundacion);
            $Nombre = utf8_decode($Nombre);
            $Descripcion = utf8_decode($Descripcion);
            $Edad = utf8_decode($Edad);
            $Telefono = utf8_decode($Telefono);
            $Tipo = utf8_decode($Tipo);
            $Raza = utf8_decode($Raza);
            $Estado = utf8_decode($Estado);
            $Activo = utf8_decode($Activo);
            $this->query = "
						INSERT INTO pets
						(id, id_fundacion, nombre, descripcion, edad, tipo,
                        raza, estado, activo)
						VALUES
						('$IdMascota', '$IdFundacion', '$Nombre', '$Descripcion', '$Edad', '$Tipo', '$Raza', '$Estado', '$Activo')
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
			UPDATE pets
			SET id_fundacion = '$IdFundacion',
            nombre = '$Nombre',
			descripcion = '$Descripcion',
			Edad = '$Edad',
			tipo = '$Tipo',
			Raza = '$Raza',
			Estado = '$Estado',
            Activo = '$Activo'
			WHERE IdMascota = '$IdMascota'
			";
        $resultado = $this->ejecutar_query_simple();
        return $resultado;

    }

    public function borrar()
    {

    }




    /**
     * Get the value of IdMascota
     */ 
    public function getIdMascota()
    {
        return $this->IdMascota;
    }

    /**
     * Set the value of IdMascota
     *
     * @return  self
     */ 
    public function setIdMascota($IdMascota)
    {
        $this->IdMascota = $IdMascota;

        return $this;
    }

    /**
     * Get the value of IdFundacion
     */ 
    public function getIdFundacion()
    {
        return $this->IdFundacion;
    }

    /**
     * Set the value of IdFundacion
     *
     * @return  self
     */ 
    public function setIdFundacion($IdFundacion)
    {
        $this->IdFundacion = $IdFundacion;

        return $this;
    }

    /**
     * Get the value of Nombre
     */ 
    public function getNombre()
    {
        return $this->Nombre;
    }

    /**
     * Set the value of Nombre
     *
     * @return  self
     */ 
    public function setNombre($Nombre)
    {
        $this->Nombre = $Nombre;

        return $this;
    }

    /**
     * Get the value of Descricpcion
     */ 
    public function getDescricpcion()
    {
        return $this->Descricpcion;
    }

    /**
     * Set the value of Descricpcion
     *
     * @return  self
     */ 
    public function setDescricpcion($Descricpcion)
    {
        $this->Descricpcion = $Descricpcion;

        return $this;
    }

    /**
     * Get the value of Edad
     */ 
    public function getEdad()
    {
        return $this->Edad;
    }

    /**
     * Set the value of Edad
     *
     * @return  self
     */ 
    public function setEdad($Edad)
    {
        $this->Edad = $Edad;

        return $this;
    }

    /**
     * Get the value of Tipo
     */ 
    public function getTipo()
    {
        return $this->Tipo;
    }

    /**
     * Set the value of Tipo
     *
     * @return  self
     */ 
    public function setTipo($Tipo)
    {
        $this->Tipo = $Tipo;

        return $this;
    }

    /**
     * Get the value of Raza
     */ 
    public function getRaza()
    {
        return $this->Raza;
    }

    /**
     * Set the value of Raza
     *
     * @return  self
     */ 
    public function setRaza($Raza)
    {
        $this->Raza = $Raza;

        return $this;
    }

    /**
     * Get the value of Estado
     */ 
    public function getEstado()
    {
        return $this->Estado;
    }

    /**
     * Set the value of Estado
     *
     * @return  self
     */ 
    public function setEstado($Estado)
    {
        $this->Estado = $Estado;

        return $this;
    }

    /**
     * Get the value of Activo
     */ 
    public function getActivo()
    {
        return $this->Activo;
    }

    /**
     * Set the value of Activo
     *
     * @return  self
     */ 
    public function setActivo($Activo)
    {
        $this->Activo = $Activo;

        return $this;
    }
}