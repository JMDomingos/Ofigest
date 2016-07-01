<?php

class ClientesMoradas extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $id;

    /**
     *
     * @var integer
     */
    protected $id_cliente;

    /**
     *
     * @var string
     */
    protected $morada_rua;

    /**
     *
     * @var string
     */
    protected $morada_cp_localidade;

    /**
     * Method to set the value of field id
     *
     * @param integer $id
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Method to set the value of field id_cliente
     *
     * @param integer $id_cliente
     * @return $this
     */
    public function setIdCliente($id_cliente)
    {
        $this->id_cliente = $id_cliente;

        return $this;
    }

    /**
     * Method to set the value of field morada_rua
     *
     * @param string $morada_rua
     * @return $this
     */
    public function setMoradaRua($morada_rua)
    {
        $this->morada_rua = $morada_rua;

        return $this;
    }

    /**
     * Method to set the value of field morada_cp_localidade
     *
     * @param string $morada_cp_localidade
     * @return $this
     */
    public function setMoradaCpLocalidade($morada_cp_localidade)
    {
        $this->morada_cp_localidade = $morada_cp_localidade;

        return $this;
    }

    /**
     * Returns the value of field id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Returns the value of field id_cliente
     *
     * @return integer
     */
    public function getIdCliente()
    {
        return $this->id_cliente;
    }

    /**
     * Returns the value of field morada_rua
     *
     * @return string
     */
    public function getMoradaRua()
    {
        return $this->morada_rua;
    }

    /**
     * Returns the value of field morada_cp_localidade
     *
     * @return string
     */
    public function getMoradaCpLocalidade()
    {
        return $this->morada_cp_localidade;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->belongsTo('id_cliente', 'Clientes', 'id', array('alias' => 'Clientes'));
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return ClientesMoradas[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return ClientesMoradas
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'clientes_moradas';
    }

}
