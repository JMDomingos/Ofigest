<div class="page-header">
    <h1>
        Pesquisar Manutenções efetuadas
    </h1>
    <p>
        <?php echo $this->tag->linkTo(array('manutencoes/new', 'Novo registo de Manutenção')); ?> |
        <?php echo $this->tag->linkTo(array('manutencoes/newFromAgenda', 'Novo registo Agendado')); ?>
    </p>
</div>
<?php echo $this->getContent(); ?>
<?php echo $this->tag->form(array('manutencoes/search', 'method' => 'post', 'autocomplete' => 'off', 'class' => 'form-horizontal')); ?>

<div class="form-group">
    <label for="fieldIdCliente" class="col-sm-2 control-label">Cliente</label>
    <div class="col-sm-10">
        
        <?php echo $this->tag->select(array('id_cliente', $clientes, 'using' => array('id', 'nome'), 'useEmpty' => true, 'emptyText' => '...', 'emptyValue' => '', 'class' => 'form-control', 'id' => 'fieldIdCliente')); ?>
    </div>
</div>
<div class="form-group">
    <label for="fieldIdVeiculo" class="col-sm-2 control-label">Veiculo</label>
    <div class="col-sm-10">
        
        <?php echo $this->tag->select(array('id_veiculo', $veiculos, 'using' => array('matricula', 'oModelo'), 'useEmpty' => true, 'emptyText' => '...', 'emptyValue' => '', 'class' => 'form-control', 'id' => 'fieldIdVeiculo')); ?>
    </div>
</div>

<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        <?php echo $this->tag->submitButton(array('Pesquisar', 'class' => 'btn btn-default')); ?>
    </div>
</div>
<?php echo $this->tag->endForm(); ?>
