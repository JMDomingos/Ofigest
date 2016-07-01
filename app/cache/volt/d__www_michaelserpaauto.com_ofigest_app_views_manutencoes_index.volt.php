<div class="page-header">
    <h1>
        Pesquisar Manutenções efetuadas
    </h1>
    <p>
        <?= $this->tag->linkTo(['manutencoes/new', 'Novo registo de Manutenção']) ?> |
        <?= $this->tag->linkTo(['manutencoes/newFromAgenda', 'Novo registo Agendado']) ?>
    </p>
</div>
<?= $this->getContent() ?>
<?= $this->tag->form(['manutencoes/search', 'method' => 'post', 'autocomplete' => 'off', 'class' => 'form-horizontal']) ?>

<div class="form-group">
    <label for="fieldIdCliente" class="col-sm-2 control-label">Cliente</label>
    <div class="col-sm-10">
        
        <?= $this->tag->select(['id_cliente', $clientes, 'using' => ['id', 'nome'], 'useEmpty' => true, 'emptyText' => '...', 'emptyValue' => '', 'class' => 'form-control', 'id' => 'fieldIdCliente']) ?>
    </div>
</div>
<div class="form-group">
    <label for="fieldIdVeiculo" class="col-sm-2 control-label">Veiculo</label>
    <div class="col-sm-10">
        
        <?= $this->tag->select(['id_veiculo', $veiculos, 'using' => ['matricula', 'oModelo'], 'useEmpty' => true, 'emptyText' => '...', 'emptyValue' => '', 'class' => 'form-control', 'id' => 'fieldIdVeiculo']) ?>
    </div>
</div>

<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        <?= $this->tag->submitButton(['Pesquisar', 'class' => 'btn btn-default']) ?>
    </div>
</div>
<?= $this->tag->endForm() ?>
