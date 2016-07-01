
<?php echo $this->getContent(); ?>

<div class="page-header">
    <h2>Contatos</h2>
</div>

<p>Envie-nos uma mensagem a informar-nos como o podemos assistir.</p>
<p>Por favor seja o mais sucinto possivel de forma ajudar-nos a servi-lo da melhor forma.</p>

<?php echo $this->tag->form(array('contact/send', 'role' => 'form')); ?>
    <fieldset>
        <div class="form-group">
            <?php echo $form->label('name'); ?>
            <?php echo $form->render('name', array('class' => 'form-control')); ?>
        </div>
        <div class="form-group">
            <?php echo $form->label('email'); ?>
            <?php echo $form->render('email', array('class' => 'form-control')); ?>
        </div>
        <div class="form-group">
            <?php echo $form->label('comments'); ?>
            <?php echo $form->render('comments', array('class' => 'form-control')); ?>
        </div>
        <div class="form-group">
            <?php echo $this->tag->submitButton(array('Enviar', 'class' => 'btn btn-primary btn-large')); ?>
        </div>
    </fieldset>
</form>
