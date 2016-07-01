<?php echo $this->elements->getTabs(); ?>
<div align="row center-block">
    <div class="page-header">
        <h1>
            Pesquisar Clientes
        </h1>
        <p>
            <?php echo $this->tag->linkTo(array('clientes/new', 'Criar Novo Cliente')); ?>
        </p>
    </div>
    <?php echo $this->getContent(); ?>
    <?php echo $this->tag->form(array('clientes/search', 'method' => 'post', 'autocomplete' => 'off', 'class' => 'form-horizontal')); ?>
    
    <div class="form-group">
        <label for="fieldNome" class="col-sm-2 control-label">Nome</label>
        <div class="col-sm-10">
            <?php echo $this->tag->textField(array('nome', 'size' => 30, 'class' => 'form-control', 'id' => 'fieldNome')); ?>
        </div>
    </div>
    
    <div class="form-group">
        <label for="fieldTelefone" class="col-sm-2 control-label">Telefone</label>
        <div class="col-sm-10">
            <?php echo $this->tag->textField(array('telefone', 'type' => 'numeric', 'class' => 'form-control', 'id' => 'fieldTelefone')); ?>
        </div>
    </div>
    <div class="form-group">
        <label for="fieldTelemovel" class="col-sm-2 control-label">Telemovel</label>
        <div class="col-sm-10">
            <?php echo $this->tag->textField(array('telemovel', 'type' => 'numeric', 'class' => 'form-control', 'id' => 'fieldTelemovel')); ?>
        </div>
    </div>
    <div class="form-group">
        <label for="fieldEmail" class="col-sm-2 control-label">Email</label>
        <div class="col-sm-10">
            <?php echo $this->tag->textField(array('email', 'size' => 30, 'class' => 'form-control', 'id' => 'fieldEmail')); ?>
        </div>
    </div>
    <div class="form-group">
        <label for="fieldNif" class="col-sm-2 control-label">NIF</label>
        <div class="col-sm-10">
            <?php echo $this->tag->textField(array('NIF', 'type' => 'numeric', 'class' => 'form-control', 'id' => 'fieldNif')); ?>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <?php echo $this->tag->submitButton(array('Pesquisar', 'class' => 'btn btn-default')); ?>
        </div>
    </div>
    </form>
</div>