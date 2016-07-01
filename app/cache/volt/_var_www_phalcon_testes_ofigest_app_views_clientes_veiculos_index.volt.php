<?php echo $this->elements->getTabs(); ?>
<div align="row center-block">
    <div class="page-header">
        <h1>
            Pesquisar associações de Clientes a Veiculos
        </h1>
        <p>
            <?php echo $this->tag->linkTo(array('clientes_veiculos/new', 'Associar Cliente/Veiculo')); ?>
        </p>
    </div>
    <?php echo $this->getContent(); ?>
    <?php echo $this->tag->form(array('clientes_veiculos/search', 'method' => 'post', 'autocomplete' => 'off', 'class' => 'form-horizontal')); ?>
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
        <label for="fieldData" class="col-sm-2 control-label">Data</label>
        <div class="col-sm-10" id="datepicker">
            <?php echo $this->tag->textField(array('data', 'size' => 30, 'class' => 'form-control', 'id' => 'fieldData')); ?>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <?php echo $this->tag->submitButton(array('Pesquisar', 'class' => 'btn btn-default')); ?>
        </div>
    </div>
    </form>
</div>