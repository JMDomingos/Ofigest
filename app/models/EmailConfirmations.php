<?php
//namespace Ofigest\Models;

use Phalcon\Mvc\Model;

/**
 * EmailConfirmations
 * Stores the reset password codes and their evolution
 */
class EmailConfirmations extends Model
{

    /**
     *
     * @var integer
     */
    public $id;

    /**
     *
     * @var integer
     */
    public $usersId;

    public $code;

    /**
     *
     * @var integer
     */
    public $createdAt;

    /**
     *
     * @var integer
     */
    public $modifiedAt;

    public $confirmed;

    /**
     * Before create the user assign a password
     */
    public function beforeValidationOnCreate()
    {
        // Timestamp the confirmation
        $this->createdAt = time();

        // Generate a random confirmation code
        $this->code = preg_replace('/[^a-zA-Z0-9]/', '', base64_encode(openssl_random_pseudo_bytes(24)));

        // Set status to non-confirmed
        $this->confirmed = 'N';
    }

    /**
     * Sets the timestamp before update the confirmation
     */
    public function beforeValidationOnUpdate()
    {
        // Timestamp the confirmation
        $this->modifiedAt = time();
    }

    /**
     * Send a confirmation e-mail to the user after create the account
     */
    public function afterCreate()
    {
        $confirmUrl = APP_URL . '/confirm/' . $this->code . '/' . $this->user->email ;

        $this->getDI()
            ->getMail()
            ->createMessageFromView('emailTemplates.volt', [
                'publicUrl' => APP_URL,
                'mailContent' => '<p>Foi feito um Registo com este endereço eletrónico 
                                    em <a href="' . APP_URL . '">' . APP_URL . '</a>. 
                                    Se este registo não foi feito por si, simplesmente ignore 
                                    esta mensagem.<br>
                                    Caso contrário, por motivos de segurança, clique neste 
                                    link para confirmar o seu Email.</p>
                                    <a href="' . $confirmUrl . '">' . $confirmUrl . '</a>'
            ], APP_PATH . '/app/views/layouts/')
            ->to($this->user->email, $this->user->name )
            ->subject('Confirmação de Email!')
            ->send();
    }

    public function initialize()
    {
        $this->belongsTo('usersId', __NAMESPACE__ . '\Users', 'id', array(
            'alias' => 'user'
        ));
    }
}
