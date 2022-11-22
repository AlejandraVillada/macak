<?php

require_once "modelo_conexion.php";

class fundaciones extends ModeloConexionDB
{

    private $id;
    private $nit;
    private $nombre;
    private $descripcion;
    private $direccion;
    private $telefono;
    private $URL_imagen;
    private $numero_cuenta;
    private $tipo_cuenta;

    public function __construct()
    {

    }

    public function lista()
    {
        $this->query = "
			SELECT id, nit, nombre, descripcion, direccion, telefono,URL_imagen,
            numero_cuenta, tipo_cuenta
			FROM fundaciones
            ORDER BY id
			";
        $this->obtener_resultados_query();
         $result = $this->rows; 
       
        return  $result;
    }

    public function consultar($id = '')
    {
        if ($id != ''):
            $this->query = "
			    SELECT id,nit,nombre,descripcion,direccion,telefono,URL_imagen,numero_cuenta,tipo_cuenta
			    FROM fundaciones
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
     * Get the value of nit
     */ 
    public function getNit()
    {
        return $this->nit;
    }

    /**
     * Set the value of nit
     *
     * @return  self
     */ 
    public function setNit($nit)
    {
        $this->nit = $nit;

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
     * Get the value of descricpcion
     */ 
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set the value of descricpcion
     *
     * @return  self
     */ 
    public function setDescripcion($descricpcion)
    {
        $this->descricpcion = $descripcion;

        return $this;
    }

    /**
     * Get the value of direccion
     */ 
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Set the value of direccion
     *
     * @return  self
     */ 
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;

        return $this;
    }

    /**
     * Get the value of telefono
     */ 
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set the value of telefono
     *
     * @return  self
     */ 
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }

    /**
     * Get the value of numero_cuenta
     */ 
    public function getNumero_cuenta()
    {
        return $this->numero_cuenta;
    }

    /**
     * Set the value of numero_cuenta
     *
     * @return  self
     */ 
    public function setNumero_cuenta($numero_cuenta)
    {
        $this->numero_cuenta = $numero_cuenta;

        return $this;
    }

    /**
     * Get the value of tipo_cuenta
     */ 
    public function getTipo_cuenta()
    {
        return $this->tipo_cuenta;
    }

    /**
     * Set the value of tipo_cuenta
     *
     * @return  self
     */ 
    public function setTipo_cuenta($tipo_cuenta)
    {
        $this->tipo_cuenta = $tipo_cuenta;

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
}