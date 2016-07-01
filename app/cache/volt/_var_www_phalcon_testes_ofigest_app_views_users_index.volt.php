<div class="page-header">
    <h1>
        Pesquisar Utilizadores
    </h1>
    <p>
        <?php echo $this->tag->linkTo(array('users/create', '<i class=\'icon-plus-sign\'></i> Criar Utilizador', 'class' => 'btn btn-primary')); ?>
    </p>
</div>
<?php echo $this->getContent(); ?>
<form method="post" action="<?php echo $this->url->get('users/search'); ?>" autocomplete="off" class="form-horizontal">
    
    <div class="form-group">
        <label for="name" class="col-sm-2 control-label">Nome</label>
        <div class="col-sm-10">
            <?php echo $form->render('name'); ?>
        </div>
    </div>
    <div class="form-group">
        <label for="email" class="col-sm-2 control-label">E-Mail</label>
        <div class="col-sm-10">
            <?php echo $form->render('email'); ?>
        </div>
    </div>
    <div class="form-group">
        <label for="profilesId" class="col-sm-2 control-label">Perfil</label>
        <div class="col-sm-10">
            <?php echo $form->render('profilesId'); ?>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <?php echo $this->tag->submitButton(array('Pesquisar', 'class' => 'btn btn-primary')); ?>
        </div>
    </div>
</form>