<?php
//namespace Ofigest\Models;

class IntervencoesTipos extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $id_tipo_intervencao;

    /**
     *
     * @var string
     */
    protected $desc_tipo_intervencao;

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
     * Method to set the value of field desc_tipo_intervencao
     *
     * @param string $desc_tipo_intervencao
     * @return $this
     */
    public function setDescTipoIntervencao($desc_tipo_intervencao)
    {
        $this->desc_tipo_intervencao = $desc_tipo_intervencao;

        return $this;
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
     * Returns the value of field desc_tipo_intervencao
     *
     * @return string
     */
    public function getDescTipoIntervencao()
    {
        return $this->desc_tipo_intervencao;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->hasMany('id_tipo_intervencao', 'Intervencoes', 'id_tipo_intervencao', array('alias' => 'Intervencoes'));
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return IntervencoesTipos[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return IntervencoesTipos
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
        return 'intervencoes_tipos';
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
            'id_tipo_intervencao' => 'id_tipo_intervencao',
            'desc_tipo_intervencao' => 'desc_tipo_intervencao'
        );
    }

}
