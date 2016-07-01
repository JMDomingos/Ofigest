
<?php echo $this->getContent(); ?>

<div class="page-header">
    <h2>Register for INVO</h2>
</div>

<?php echo $this->tag->form(array('register', 'id' => 'registerForm', 'onbeforesubmit' => 'return false')); ?>

    <fieldset>

        <div class="control-group">
            <?php echo $form->label('name', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->render('name', array('class' => 'form-control')); ?>
                <p class="help-block">(required)</p>
                <div class="alert alert-warning" id="name_alert">
                    <strong>Warning!</strong> Please enter your full name
                </div>
            </div>
        </div>

        <div class="control-group">
            <?php echo $form->label('username', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->render('username', array('class' => 'form-control')); ?>
                <p class="help-block">(required)</p>
                <div class="alert alert-warning" id="username_alert">
                    <strong>Warning!</strong> Please enter your desired user name
                </div>
            </div>
        </div>

        <div class="control-group">
            <?php echo $form->label('email', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->render('email', array('class' => 'form-control')); ?>
                <p class="help-block">(required)</p>
                <div class="alert alert-warning" id="email_alert">
                    <strong>Warning!</strong> Please enter your email
                </div>
            </div>
        </div>

        <div class="control-group">
            <?php echo $form->label('password', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->render('password', array('class' => 'form-control')); ?>
                <p class="help-block">(minimum 8 characters)</p>
                <div class="alert alert-warning" id="password_alert">
                    <strong>Warning!</strong> Please provide a valid password
                </div>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="repeatPassword">Repeat Password</label>
            <div class="controls">
                <?php echo $this->tag->passwordField(array('repeatPassword', 'class' => 'input-xlarge')); ?>
                <div class="alert" id="repeatPassword_alert">
                    <strong>Warning!</strong> The password does not match
                </div>
            </div>
        </div>

        <div class="form-actions">
            <?php echo $this->tag->submitButton(array('Register', 'class' => 'btn btn-primary', 'onclick' => 'return SignUp.validate();')); ?>
            <p class="help-block">By signing up, you accept terms of use and privacy policy.</p>
        </div>

    </fieldset>
</form>
