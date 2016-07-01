<?php echo $this->elements->getTabs(); ?>
<div align="row center-block">
    <div class="row">
        <nav>
            <ul class="pager">
                <li class="previous"><?php echo $this->tag->linkTo(array('clientes', 'Voltar')); ?></li>
            </ul>
        </nav>
    </div>
    <div class="page-header">
        <h1>
            Editar Cliente
        </h1>
    </div>
    <?php echo $this->getContent(); ?>
    <?php echo $this->tag->form(array('clientes/save', 'method' => 'post', 'autocomplete' => 'off', 'class' => 'form-horizontal')); ?>
    <div class="form-group">
        <label for="fieldNome" class="col-sm-2 control-label">Nome</label>
        <div class="col-sm-10">
            <?php echo $this->tag->textField(array('nome', 'size' => 30, 'class' => 'form-control', 'id' => 'fieldNome')); ?>
        </div>
    </div>
    <div class="form-group">
        <label for="fieldMorada" class="col-sm-2 control-label">Morada</label>
        <div class="col-sm-10">
            <?php echo $this->tag->textField(array('morada', 'size' => 30, 'class' => 'form-control', 'id' => 'fieldMorada')); ?>
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
    <?php echo $this->tag->hiddenField(array('id')); ?>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <?php echo $this->tag->submitButton(array('Guardar', 'class' => 'btn btn-default')); ?>
        </div>
    </div>
    </form>
</div>