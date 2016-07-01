<?php

use Phalcon\Mvc\Model;
use Phalcon\Db\RawValue;

class Contact extends Model
{
	public $id;

	public $name;

	public $email;

	public $comments;

	public $created_at;

	public $read_at;

    public function getId()
    {
        return $this->id;
    }

    public function getNome()
    {
        return $this->name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getMensagem()
    {
        return $this->comments;
    }

    public function getCreatedAt()
    {
        return $this->created_at;
    }

    public function getReadAt()
    {
        return $this->read_at;
    }

    public function setReadAt($date)
    {
        $this->read_at = $date;
        return $this;
    }

	public function beforeCreate()
	{
		$this->created_at = new RawValue('now()');
	}

}
