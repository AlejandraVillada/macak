<?php

require_once "modeloAbstractoDB.php";

class fundaciones extends ModeloAbstractoDB
{

    private $IdFundacion;
    private $Nit;
    private $Nombre;
    private $Descricpcion;
    private $Direccion;
    private $Telefono;
    private $NumeroCuenta;
    private $TipoCuenta;

    public function __construct()
    {

    }

    public function lista()
    {
        $this->query = "
			SELECT id, nit, nombre, descripcion, direccion, telefono,
            numero_cuenta, tipo_cuenta
			FROM fundaciones
            ORDER BY id
			";

        $this->obtener_resultados_query();
        return $this->rows;
    }

    public function consultar($id = '')
    {
        if ($id != ''):
            $this->query = "
			    SELECT id,nit,nombre,descripcion,direccion,telefono,numero_cuenta,tipo_cuenta
			    FROM fundaciones
	            WHERE IdFundacion = '$id'";
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
     * Get the value of Nit
     */ 
    public function getNitFundacion()
    {
        return $this->Nit;
    }

    /**
     * Set the value of Nit
     *
     * @return  self
     */ 
    public function setNitFundacion($Nit)
    {
        $this->Nit = $Nit;

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
     * Get the value of Direccion
     */ 
    public function getDireccion()
    {
        return $this->Direccion;
    }

    /**
     * Set the value of Direccion
     *
     * @return  self
     */ 
    public function setDireccion($Direccion)
    {
        $this->Direccion = $Direccion;

        return $this;
    }

    /**
     * Get the value of Telefono
     */ 
    public function getTelefono()
    {
        return $this->Telefono;
    }

    /**
     * Set the value of Telefono
     *
     * @return  self
     */ 
    public function setTelefono($Telefono)
    {
        $this->Telefono = $Telefono;

        return $this;
    }

    /**
     * Get the value of NumeroCuenta
     */ 
    public function getNumeroCuenta()
    {
        return $this->NumeroCuenta;
    }

    /**
     * Set the value of NumeroCuenta
     *
     * @return  self
     */ 
    public function setNumeroCuenta($NumeroCuenta)
    {
        $this->NumeroCuenta = $NumeroCuenta;

        return $this;
    }

    /**
     * Get the value of TipoCuenta
     */ 
    public function getTipoCuenta()
    {
        return $this->TipoCuenta;
    }

    /**
     * Set the value of TipoCuenta
     *
     * @return  self
     */ 
    public function setTipoCuenta($TipoCuenta)
    {
        $this->TipoCuenta = $TipoCuenta;

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
}