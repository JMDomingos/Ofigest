<?php
//namespace Ofigest\Models;

class ClientesVeiculos extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $id_cliente;

    /**
     *
     * @var string
     */
    protected $id_veiculo;

    /**
     *
     * @var string
     */
    protected $data;

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
     * Method to set the value of field id_veiculo
     *
     * @param string $id_veiculo
     * @return $this
     */
    public function setIdVeiculo($id_veiculo)
    {
        $this->id_veiculo = $id_veiculo;

        return $this;
    }

    /**
     * Method to set the value of field data
     *
     * @param string $data
     * @return $this
     */
    public function setData($data)
    {
        $this->data = $data;

        return $this;
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
     * Returns the value of field id_veiculo
     *
     * @return string
     */
    public function getIdVeiculo()
    {
        return $this->id_veiculo;
    }

    /**
     * Returns the value of field data
     *
     * @return string
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->belongsTo('id_veiculo', 'Veiculos', 'matricula', array('alias' => 'Veiculos'));
        $this->belongsTo('id_cliente', 'Clientes', 'id', array('alias' => 'Clientes'));
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return ClientesVeiculos[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return ClientesVeiculos
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
        return 'clientes_veiculos';
    }

    /**
     * Independent Column Mapping.
     * Keys are the real names in the table and the values their names in the application
     *
     * @return array
     */
    public function columnMap()
    {
        return array(
            'id_cliente' => 'id_cliente',
            'id_veiculo' => 'id_veiculo',
            'data' => 'data'
        );
    }

}
