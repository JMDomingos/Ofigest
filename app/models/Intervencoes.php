<?php

class Intervencoes extends \Phalcon\Mvc\Model
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
    protected $id_manutencoes;

    /**
     *
     * @var integer
     */
    protected $id_tipo_intervencao;

    /**
     *
     * @var string
     */
    protected $desc_intervencao;

    /**
     *
     * @var string
     */
    protected $data_intervencao;

    /**
     *
     * @var string
     */
    protected $custo_intervencao;

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
     * Method to set the value of field id_manutencoes
     *
     * @param integer $id_manutencoes
     * @return $this
     */
    public function setIdManutencoes($id_manutencoes)
    {
        $this->id_manutencoes = $id_manutencoes;

        return $this;
    }

    /**
     * Method to set the value of field id_tipo_intervencao
     *
     * @param integer $id_tipo_intervencao
     * @return $this
     */
    public function setIdTipoIntervencao($id_tipo_intervencao)
    {
        $this->id_tipo_intervencao = $id_tipo_intervencao;

        return $this;
    }

    /**
     * Method to set the value of field desc_intervencao
     *
     * @param string $desc_intervencao
     * @return $this
     */
    public function setDescIntervencao($desc_intervencao)
    {
        $this->desc_intervencao = $desc_intervencao;

        return $this;
    }

    /**
     * Method to set the value of field data_intervencao
     *
     * @param string $data_intervencao
     * @return $this
     */
    public function setDataIntervencao($data_intervencao)
    {
        $this->data_intervencao = $data_intervencao;

        return $this;
    }

    /**
     * Method to set the value of field custo_intervencao
     *
     * @param string $custo_intervencao
     * @return $this
     */
    public function setCustoIntervencao($custo_intervencao)
    {
        $this->custo_intervencao = $custo_intervencao;

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
     * Returns the value of field id_manutencoes
     *
     * @return integer
     */
    public function getIdManutencoes()
    {
        return $this->id_manutencoes;
    }

    /**
     * Returns the value of field id_tipo_intervencao
     *
     * @return integer
     */
    public function getIdTipoIntervencao()
    {
        return $this->id_tipo_intervencao;
    }

    /**
     * Returns the value of field desc_intervencao
     *
     * @return string
     */
    public function getDescIntervencao()
    {
        return $this->desc_intervencao;
    }

    /**
     * Returns the value of field data_intervencao
     *
     * @return string
     */
    public function getDataIntervencao()
    {
        return $this->data_intervencao;
    }

    /**
     * Returns the value of field custo_intervencao
     *
     * @return string
     */
    public function getCustoIntervencao()
    {
        return $this->custo_intervencao;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->belongsTo('id_manutencoes', 'Manutencoes', 'id', array('alias' => 'Manutencoes'));
        $this->belongsTo('id_tipo_intervencao', 'IntervencoesTipos', 'id_tipo_intervencao', array('alias' => 'IntervencoesTipos'));
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Intervencoes[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Intervencoes
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
        return 'intervencoes';
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
            'id_manutencoes' => 'id_manutencoes',
            'id_tipo_intervencao' => 'id_tipo_intervencao',
            'desc_intervencao' => 'desc_intervencao',
            'data_intervencao' => 'data_intervencao',
            'custo_intervencao' => 'custo_intervencao'
        );
    }

}
