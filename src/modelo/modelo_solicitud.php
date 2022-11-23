<?php

require_once "modelo_conexion.php";

class solicitudes extends ModeloConexionDB
{

    private $id;
    private $id_user;
    private $id_fundacion;
    private $id_mascota;
    private $estado;

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

    

    public function consultar($id = '')
    {
        

    }

    public function nuevo($datos = array())
    {
            foreach ($datos as $campo => $valor):
                $$campo = $valor;
            endforeach;
            $this->query = "
						INSERT INTO solicitudes
						(id_user,id_fundacion,id_mascota,estado)
						VALUES
						('$id_user', '$id_fundacion', '$id_mascota', '$estado')
						";
            $resultado = $this->ejecutar_query_simple();
            return $resultado;
    }
    public function editar($datos = array())
    {
       

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
     * Get the value of id_user
     */ 
    public function getId_user()
    {
        return $this->id_user;
    }

    /**
     * Set the value of id_user
     *
     * @return  self
     */ 
    public function setId_user($id_user)
    {
        $this->id_user = $id_user;

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
     * Get the value of id_mascota
     */ 
    public function getId_mascota()
    {
        return $this->id_mascota;
    }

    /**
     * Set the value of id_mascota
     *
     * @return  self
     */ 
    public function setId_mascota($id_mascota)
    {
        $this->id_mascota = $id_mascota;

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
}