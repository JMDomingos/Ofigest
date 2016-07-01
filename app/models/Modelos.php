<?php
//namespace Ofigest\Models;

class Modelos extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var string
     */
    protected $id;

    /**
     *
     * @var string
     */
    protected $modelo;

    /**
     *
     * @var integer
     */
    protected $marca;

    /**
     * Method to set the value of field id
     *
     * @param string $id
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Method to set the value of field modelo
     *
     * @param string $modelo
     * @return $this
     */
    public function setModelo($modelo)
    {
        $this->modelo = $modelo;

        return $this;
    }

    /**
     * Method to set the value of field marca
     *
     * @param integer $marca
     * @return $this
     */
    public function setMarca($marca)
    {
        $this->marca = $marca;

        return $this;
    }

    /**
     * Returns the value of field id
     *
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Returns the value of field modelo
     *
     * @return string
     */
    public function getModelo()
    {
        return $this->modelo;
    }

    /**
     * Returns the value of field marca
     *
     * @return integer
     */
    public function getMarca()
    {
        return $this->marca;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->hasMany('marca', 'Veiculos', 'modelo', array('alias' => 'Veiculos'));
        $this->belongsTo('marca', 'Marcas', 'id', array('alias' => 'Marcas'));
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Modelos[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Modelos
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
        return 'modelos';
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
            'modelo' => 'modelo',
            'marca' => 'marca'
        );
    }

}
