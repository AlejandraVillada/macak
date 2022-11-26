<?php

require_once "modelo_conexion.php";

class donaciones extends ModeloConexionDB
{

    private $id;
    private $id_fundacion;
    private $monto;
    private $estado_transaccion;
    private $cuenta_origen;
    private $cedula;
    private $id_usuario;
    private $correo;

    public function __construct()
    {

    }

    public function lista()
    {
        $this->query = "
			SELECT id,id_fundacion,valor,estado_transaccion,cuenta_origen,cedula,id_usuario,correo
			FROM transacciones
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
						INSERT INTO transacciones
						(id_fundacion,monto,estado_transaccion,cuenta_origen,cedula,id_usuario,correo)
						VALUES
						('$id_fundacion', '$monto', '$estado_transaccion', '$cuenta_origen', '$cedula', '$id_usuario', '$correo')
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
     * Get the value of estado_transaccion
     */ 
    public function getEstado_transaccion()
    {
        return $this->estado_transaccion;
    }

    /**
     * Set the value of estado_transaccion
     *
     * @return  self
     */ 
    public function setEstado_transaccion($estado_transaccion)
    {
        $this->estado_transaccion = $estado_transaccion;

        return $this;
    }

    /**
     * Get the value of cuenta_origen
     */ 
    public function getCuenta_origen()
    {
        return $this->cuenta_origen;
    }

    /**
     * Set the value of cuenta_origen
     *
     * @return  self
     */ 
    public function setCuenta_origen($cuenta_origen)
    {
        $this->cuenta_origen = $cuenta_origen;

        return $this;
    }

    /**
     * Get the value of cedula
     */ 
    public function getCedula()
    {
        return $this->cedula;
    }

    /**
     * Set the value of cedula
     *
     * @return  self
     */ 
    public function setCedula($cedula)
    {
        $this->cedula = $cedula;

        return $this;
    }

    /**
     * Get the value of id_usuario
     */ 
    public function getId_usuario()
    {
        return $this->id_usuario;
    }

    /**
     * Set the value of id_usuario
     *
     * @return  self
     */ 
    public function setId_usuario($id_usuario)
    {
        $this->id_usuario = $id_usuario;

        return $this;
    }

    /**
     * Get the value of correo
     */ 
    public function getCorreo()
    {
        return $this->correo;
    }

    /**
     * Set the value of correo
     *
     * @return  self
     */ 
    public function setCorreo($correo)
    {
        $this->correo = $correo;

        return $this;
    }

    /**
     * Get the value of monto
     */ 
    public function getMonto()
    {
        return $this->monto;
    }

    /**
     * Set the value of monto
     *
     * @return  self
     */ 
    public function setMonto($monto)
    {
        $this->monto = $monto;

        return $this;
    }
}