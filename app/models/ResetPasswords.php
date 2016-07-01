<?php
//namespace Ofigest\Models;

use Phalcon\Mvc\Model;

/**
 * ResetPasswords
 * Stores the reset password codes and their evolution
 */
class ResetPasswords extends Model
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

    /**
     *
     * @var string
     */
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

    /**
     *
     * @var string
     */
    public $reset;

    /**
     * Before create the user assign a password
     */
    public function beforeValidationOnCreate()
    {
        // Timestamp the confirmaton
        $this->createdAt = time();

        // Generate a random confirmation code
        $this->code = preg_replace('/[^a-zA-Z0-9]/', '', base64_encode(openssl_random_pseudo_bytes(24)));

        // Set status to non-confirmed
        $this->reset = 'N';
    }

    /**
     * Sets the timestamp before update the confirmation
     */
    public function beforeValidationOnUpdate()
    {
        // Timestamp the confirmaton
        $this->modifiedAt = time();
    }

    /**
     * Send an e-mail to users allowing him/her to reset his/her password
     */
    public function afterCreate()
    {
        /*
        $this->getDI()
            ->getMail()
            ->createMessage()
            ->to('josemdomingos@gmail.com', 'OPTIONAL NAME')
            ->subject('Reset de password!')
            ->content('Reset Hello world de teste!')
            ->send();
        */

        $resetUrl = APP_URL . '/reset-password/' . $this->code . '/' . $this->user->email ;

        $this->getDI()
            ->getMail()
            ->createMessageFromView('emailTemplates.volt', [
                    'publicUrl' => APP_URL,
                    'mailContent' => '<p>Foi feito um Reset de password para este email.<br>
                                      Clique neste link para fazer o reset da sua password.</p>
                                      <a href="' . $resetUrl . '">' . $resetUrl . '</a>'
                ], APP_PATH . '/app/views/layouts/')
            ->to($this->user->email, $this->user->name)
            ->subject('Reset da sua password!')
            ->send();

    }

    public function initialize()
    {
        $this->belongsTo('usersId', __NAMESPACE__ . '\Users', 'id', array(
            'alias' => 'user'
        ));
    }
}
