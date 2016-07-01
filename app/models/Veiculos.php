<?php


//use Phalcon\Validation;
//use Phalcon\Validation\Validator\PresenceOf;
//use Phalcon\Validation\Validator\Regex as RegexValidator;

class Veiculos extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var string
     */
    protected $matricula;

    /**
     *
     * @var integer
     */
    protected $modelo;

    /**
     *
     * @var string
     */
    protected $n_quadro;

    /**
     *
     * @var integer
     */
    protected $ano;

    /**
     *
     * @var integer
     */
    protected $mes;

    /**
     *
     * @var string
     */
    protected $cor;

    /**
     *
     * @var string
     */
    protected $tamanho_pneus;

    /**
     * Method to set the value of field matricula
     *
     * @param string $matricula
     * @return $this
     */
    public function setMatricula($matricula)
    {
        $this->matricula = $matricula;

        return $this;
    }

    /**
     * Method to set the value of field modelo
     *
     * @param integer $modelo
     * @return $this
     */
    public function setModelo($modelo)
    {
        $this->modelo = $modelo;

        return $this;
    }

    /**
     * Method to set the value of field n_quadro
     *
     * @param string $n_quadro
     * @return $this
     */
    public function setNQuadro($n_quadro)
    {
        $this->n_quadro = $n_quadro;

        return $this;
    }

    /**
     * Method to set the value of field ano
     *
     * @param integer $ano
     * @return $this
     */
    public function setAno($ano)
    {
        $this->ano = $ano;

        return $this;
    }

    /**
     * Method to set the value of field mes
     *
     * @param integer $mes
     * @return $this
     */
    public function setMes($mes)
    {
        $this->mes = $mes;

        return $this;
    }

    /**
     * Method to set the value of field cor
     *
     * @param string $cor
     * @return $this
     */
    public function setCor($cor)
    {
        $this->cor = $cor;

        return $this;
    }

    /**
     * Method to set the value of field tamanho_pneus
     *
     * @param string $tamanho_pneus
     * @return $this
     */
    public function setTamanhoPneus($tamanho_pneus)
    {
        $this->tamanho_pneus = $tamanho_pneus;

        return $this;
    }

    /**
     * Returns the value of field matricula
     *
     * @return string
     */
    public function getMatricula()
    {
        return $this->matricula;
    }

    /**
     * Returns the value of field modelo
     *
     * @return integer
     */
    public function getModelo()
    {
        return $this->modelo;
    }

    /**
     * Returns the value of field n_quadro
     *
     * @return string
     */
    public function getNQuadro()
    {
        return $this->n_quadro;
    }

    /**
     * Returns the value of field ano
     *
     * @return integer
     */
    public function getAno()
    {
        return $this->ano;
    }

    /**
     * Returns the value of field mes
     *
     * @return integer
     */
    public function getMes()
    {
        return $this->mes;
    }

    /**
     * Returns the value of field cor
     *
     * @return string
     */
    public function getCor()
    {
        return $this->cor;
    }

    /**
     * Returns the value of field tamanho_pneus
     *
     * @return string
     */
    public function getTamanhoPneus()
    {
        return $this->tamanho_pneus;
    }


    /**
     * Validations and business logic
     *
     * @return boolean
     */
    public function validation()
    {
        /*
        $validator = new Validation();

        //FIXME: Ainda não está testado
        $validator->add(
            'matricula',
            new RegexValidator(
                array(              ///^[0-9]{4}[-\/](0[1-9]|1[12])[-\/](0[1-9]|[12][0-9]|3[01])$/
                    'required'      => true,
                    'pattern'       => '(^(?:[A-Z]{2}-\d{2}-\d{2})|(?:\d{2}-[A-Z]{2}-\d{2})|(?:\d{2}-\d{2}-[A-Z]{2})$)',
                    'message'       => 'A Matrícula que inseriu é inválida'
                )
            )
        );

        return $this->validate($validator);
        */
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->hasMany('matricula', 'ClientesVeiculos', 'id_veiculo', array('alias' => 'ClientesVeiculos'));
        $this->hasMany('matricula', 'Manutencoes', 'id_veiculo', array('alias' => 'Manutencoes'));
        $this->belongsTo('modelo', 'Modelos', 'id', array('alias' => 'Modelos'));
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Veiculos[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Veiculos
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
        return 'veiculos';
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
            'matricula' => 'matricula',
            'modelo' => 'modelo',
            'n_quadro' => 'n_quadro',
            'ano' => 'ano',
            'mes' => 'mes',
            'cor' => 'cor',
            'tamanho_pneus' => 'tamanho_pneus'
        );
    }

}
