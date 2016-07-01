<?= $this->elements->getTabs() ?>
<div align="row center-block">
    <div class="page-header">
        <h1>
            Pesquisar associações de Clientes a Veiculos
        </h1>
        <p>
            <?= $this->tag->linkTo(['clientes_veiculos/new', 'Associar Cliente/Veiculo']) ?>
        </p>
    </div>
    <?= $this->getContent() ?>
    <?= $this->tag->form(['clientes_veiculos/search', 'method' => 'post', 'autocomplete' => 'off', 'class' => 'form-horizontal']) ?>
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
        <label for="fieldData" class="col-sm-2 control-label">Data</label>
        <div class="col-sm-10" id="datepicker">
            <?= $this->tag->textField(['data', 'size' => 30, 'class' => 'form-control', 'id' => 'fieldData']) ?>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <?= $this->tag->submitButton(['Pesquisar', 'class' => 'btn btn-default']) ?>
        </div>
    </div>
    </form>
</div>