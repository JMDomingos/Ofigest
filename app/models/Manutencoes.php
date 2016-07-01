<?php

class Manutencoes extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $id;

    /**
     *
     * @var string
     */
    protected $data;

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
    protected $inspecionado_ate;

    /**
     *
     * @var integer
     */
    protected $kilometragem;

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
     * Method to set the value of field inspecionado_ate
     *
     * @param string $inspecionado_ate
     * @return $this
     */
    public function setInspecionadoAte($inspecionado_ate)
    {
        $this->inspecionado_ate = $inspecionado_ate;

        return $this;
    }

    /**
     * Method to set the value of field kilometragem
     *
     * @param integer $kilometragem
     * @return $this
     */
    public function setKilometragem($kilometragem)
    {
        $this->kilometragem = $kilometragem;

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
     * Returns the value of field data
     *
     * @return string
     */
    public function getData()
    {
        return $this->data;
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
     * Returns the value of field inspecionado_ate
     *
     * @return string
     */
    public function getInspecionadoAte()
    {
        return $this->inspecionado_ate;
    }

    /**
     * Returns the value of field kilometragem
     *
     * @return integer
     */
    public function getKilometragem()
    {
        return $this->kilometragem;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->hasMany('id', 'Intervencoes', 'id_manutencoes', array('alias' => 'Intervencoes'));
        $this->belongsTo('id_cliente', 'Clientes', 'id', array('alias' => 'Clientes'));
        $this->belongsTo('id_veiculo', 'Veiculos', 'matricula', array('alias' => 'Veiculos'));
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Manutencoes[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Manutencoes
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
        return 'manutencoes';
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
            'id' => 'id',
            'data' => 'data',
            'id_cliente' => 'id_cliente',
            'id_veiculo' => 'id_veiculo',
            'inspecionado_ate' => 'inspecionado_ate',
            'kilometragem' => 'kilometragem'
        );
    }

}
