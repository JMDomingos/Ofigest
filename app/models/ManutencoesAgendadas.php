<?php

class ManutencoesAgendadas extends \Phalcon\Mvc\Model
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
    protected $matricula;

    /**
     *
     * @var string
     */
    protected $data;

    /**
     *
     * @var string
     */
    protected $hora;

    /**
     *
     * @var string
     */
    protected $mensagem;

    /**
     *
     * @var integer
     */
    protected $id_morada;

    /**
     *
     * @var string
     */
    protected $aguarda_orcamento;

    /**
     *
     * @var string
     */
    protected $orcamento;

    /**
     *
     * @var string
     */
    protected $doneByCliLogin;

    /**
     *
     * @var integer
     */
    protected $caraterUrgencia;

    /**
     *
     * @var integer
     */
    protected $confirmed;

    /**
     *
     * @var string
     */
    protected $status;

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
     * Method to set the value of field hora
     *
     * @param string $hora
     * @return $this
     */
    public function setHora($hora)
    {
        $this->hora = $hora;

        return $this;
    }

    /**
     * Method to set the value of field mensagem
     *
     * @param string $mensagem
     * @return $this
     */
    public function setMensagem($mensagem)
    {
        $this->mensagem = $mensagem;

        return $this;
    }

    /**
     * Method to set the value of field id_morada
     *
     * @param integer $idMorada
     * @return $this
     */
    public function setIdMorada($idMorada)
    {
        $this->id_morada = $idMorada;

        return $this;
    }

    /**
     * Method to set the value of field aguarda_orcamento
     *
     * @param string $aguarda_orcamento
     * @return $this
     */
    public function setAguardaOrcamento($aguarda_orcamento)
    {
        $this->aguarda_orcamento = $aguarda_orcamento;

        return $this;
    }

    /**
     * Method to set the value of field orcamento
     *
     * @param string $orcamento
     * @return $this
     */
    public function setOrcamento($orcamento)
    {
        $this->orcamento = $orcamento;

        return $this;
    }

    /**
     * Method to set the value of field doneByCliLogin
     *
     * @param string $doneByCliLogin
     * @return $this
     */
    public function setDoneByCliLogin($doneByCliLogin)
    {
        $this->doneByCliLogin = $doneByCliLogin;

        return $this;
    }

    /**
     * Method to set the value of field caraterUrgencia
     *
     * @param integer $caraterUrgencia
     * @return $this
     */
    public function setCaraterUrgencia($caraterUrgencia)
    {
        $this->caraterUrgencia = $caraterUrgencia;

        return $this;
    }

    /**
     * Method to set the value of field confirmed
     *
     * @param integer $confirmed
     * @return $this
     */
    public function setConfirmed($confirmed)
    {
        $this->confirmed = $confirmed;

        return $this;
    }

    /**
     * Method to set the value of field status
     *
     * @param string $status
     * @return $this
     */
    public function setStatus($status)
    {
        $this->status = $status;

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
     * Returns the value of field matricula
     *
     * @return string
     */
    public function getMatricula()
    {
        return $this->matricula;
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
     * Returns the value of field hora
     *
     * @return string
     */
    public function getHora()
    {
        return $this->hora;
    }

    /**
     * Returns the value of field mensagem
     *
     * @return string
     */
    public function getMensagem()
    {
        return $this->mensagem;
    }

    /**
     * Returns the value of field id_morada
     *
     * @return integer
     */
    public function getIdMorada()
    {
        return $this->id_morada;
    }

    /**
     * Returns the value of field aguarda_orcamento
     *
     * @return string
     */
    public function getAguardaOrcamento()
    {
        return $this->aguarda_orcamento;
    }

    /**
     * Returns the value of field orcamento
     *
     * @return string
     */
    public function getOrcamento()
    {
        return $this->orcamento;
    }

    /**
     * Returns the value of field doneByCliLogin
     *
     * @return string
     */
    public function getDoneByCliLogin()
    {
        return $this->doneByCliLogin;
    }

    /**
     * Returns the value of field caraterUrgencia
     *
     * @return integer
     */
    public function getCaraterUrgencia()
    {
        return $this->caraterUrgencia;
    }

    /**
     * Returns the value of field confirmed
     *
     * @return integer
     */
    public function getConfirmed()
    {
        return $this->confirmed;
    }

    /**
     * Returns the value of field status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Method to set the value of field data_hora
     *
     * @param string $data_hora
     * @return $this
     */
    public function setDataHora($data_hora)
    {
        $this->data_hora = $data_hora;

        return $this;
    }

    /**
     * Returns the value of field data_hora
     *
     * @return string
     */
    public function getDataHora()
    {
        return $this->data_hora;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->belongsTo('id_cliente', 'Clientes', 'id', array('alias' => 'Clientes'));
        //ainda não sei se a morada trabalha
        $this->belongsTo('id_morada', 'ClientesMoradas', 'id', array('alias' => 'ClientesMoradas'));
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return ManutencoesAgendadas[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return ManutencoesAgendadas
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
        return 'manutencoes_agendadas';
    }

}
