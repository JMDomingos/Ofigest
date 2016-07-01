<?php
//namespace Ofigest\Models;

use Phalcon\Mvc\Model\Validator\Email as Email;

class Clientes extends \Phalcon\Mvc\Model
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
    protected $user_id;

    /**
     *
     * @var string
     */
    protected $nome;

    /**
     *
     * @var string
     */
    protected $morada;

    /**
     *
     * @var integer
     */
    protected $telefone;

    /**
     *
     * @var integer
     */
    protected $telemovel;

    /**
     *
     * @var string
     */
    protected $email;

    /**
     *
     * @var integer
     */
    protected $NIF;

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
     * Method to set the value of field user_id
     *
     * @param integer $id
     * @return $this
     */
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;

        return $this;
    }

    /**
     * Method to set the value of field nome
     *
     * @param string $nome
     * @return $this
     */
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Method to set the value of field morada
     *
     * @param string $morada
     * @return $this
     */
    public function setMorada($morada)
    {
        $this->morada = $morada;

        return $this;
    }

    /**
     * Method to set the value of field telefone
     *
     * @param integer $telefone
     * @return $this
     */
    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;

        return $this;
    }

    /**
     * Method to set the value of field telemovel
     *
     * @param integer $telemovel
     * @return $this
     */
    public function setTelemovel($telemovel)
    {
        $this->telemovel = $telemovel;

        return $this;
    }

    /**
     * Method to set the value of field email
     *
     * @param string $email
     * @return $this
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Method to set the value of field NIF
     *
     * @param integer $NIF
     * @return $this
     */
    public function setNIF($NIF)
    {
        $this->NIF = $NIF;

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
     * Returns the value of field user_id
     *
     * @return integer
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * Returns the value of field nome
     *
     * @return string
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Returns the value of field morada
     *
     * @return string
     */
    public function getMorada()
    {
        return $this->morada;
    }

    /**
     * Returns the value of field telefone
     *
     * @return integer
     */
    public function getTelefone()
    {
        return $this->telefone;
    }

    /**
     * Returns the value of field telemovel
     *
     * @return integer
     */
    public function getTelemovel()
    {
        return $this->telemovel;
    }

    /**
     * Returns the value of field email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Returns the value of field NIF
     *
     * @return integer
     */
    public function getNIF()
    {
        return $this->NIF;
    }

    /**
     * Validations and business logic
     *
     * @return boolean
     */
    public function validation()
    {
        //TODO: Fazer aqui a validação dos outros campos

        $this->validate(
            new Email(
                array(
                    'field'    => 'email',
                    'required' => true,
                )
            )
        );

        if ($this->validationHasFailed() == true) {
            return false;
        }

        return true;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->hasMany('id', 'ClientesVeiculos', 'id_cliente', array('alias' => 'ClientesVeiculos'));
        $this->hasMany('id', 'Manutencoes', 'id_cliente', array('alias' => 'Manutencoes'));

        $this->hasOne('id', 'Users', 'id_user', array('alias' => 'Users'));
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Clientes[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Clientes
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
        return 'clientes';
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
            'user_id' => 'user_id',
            'nome' => 'nome',
            'morada' => 'morada',
            'telefone' => 'telefone',
            'telemovel' => 'telemovel',
            'email' => 'email',
            'NIF' => 'NIF'
        );
    }

}
