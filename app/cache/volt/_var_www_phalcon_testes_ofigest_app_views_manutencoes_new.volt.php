<div class="row">
    <nav>
        <ul class="pager">
            <li class="previous"><?php echo $this->tag->linkTo(array('manutencoes', 'Voltar')); ?></li>
        </ul>
    </nav>
</div>
<div class="page-header">
    <h1>
        Criar novo registo de manutenção
    </h1>
</div>
<?php echo $this->getContent(); ?>
<?php echo $this->tag->form(array('manutencoes/create', 'method' => 'post', 'autocomplete' => 'off', 'class' => 'form-horizontal')); ?>
<div class="form-group">
    <label for="fieldData" class="col-sm-2 control-label">Data</label>
    <div class="col-sm-10" id="datepicker">
        <?php echo $this->tag->textField(array('data', 'type' => 'date', 'class' => 'form-control', 'id' => 'fieldData')); ?>
    </div>
</div>
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
    <label for="fieldInspecionadoAte" class="col-sm-2 control-label">Inspecionado Até</label>
    <div class="col-sm-10" id="datepicker">
        <?php echo $this->tag->textField(array('inspecionado_ate', 'type' => 'date', 'class' => 'form-control', 'id' => 'fieldInspecionadoAte')); ?>
    </div>
</div>
<div class="form-group">
    <label for="fieldKilometragem" class="col-sm-2 control-label">Kilometragem</label>
    <div class="col-sm-10">
        <?php echo $this->tag->textField(array('kilometragem', 'type' => 'numeric', 'class' => 'form-control', 'id' => 'fieldKilometragem')); ?>
    </div>
</div>
<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        <?php echo $this->tag->submitButton(array('Save', 'class' => 'btn btn-default')); ?>
    </div>
</div>
</form>
