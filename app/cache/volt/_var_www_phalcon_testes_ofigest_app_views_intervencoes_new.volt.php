<div class="row">
    <nav>
        <ul class="pager">
            <li class="previous"><?php echo $this->tag->linkTo(array('manutencoes/search', 'Voltar')); ?></li>
        </ul>
    </nav>
</div>
<div class="page-header">
    <h1>
        Criar uma nova Intervenção
    </h1>
    <?php if (isset($manutencao)) { ?>
    <h3>
        manutenção em <?php echo $manutencao->getData(); ?> no
        <?php echo $manutencao->veiculos->modelos->marcas->getMarca(); ?>
        <?php echo $manutencao->veiculos->modelos->getModelo(); ?>
        ( <?php echo $manutencao->veiculos->getMatricula(); ?> )
        de <?php echo $manutencao->clientes->getnome(); ?>
    </h3>
    <?php } ?>
</div>
<?php echo $this->getContent(); ?>
<?php echo $this->tag->form(array('intervencoes/create', 'method' => 'post', 'autocomplete' => 'off', 'class' => 'form-horizontal')); ?>

<?php echo $this->tag->hiddenField(array('id')); ?> 
<?php echo $this->tag->hiddenField(array('id_manutencoes', 'id' => 'fieldIdManutencoes')); ?>
<div class="form-group">
    <label for="fieldIdTipoIntervencao" class="col-sm-2 control-label">Tipo</label>
    <div class="col-sm-10">
        <?php echo $this->tag->select(array('id_tipo_intervencao', $intervencoes_tipos, 'using' => array('id_tipo_intervencao', 'desc_tipo_intervencao'), 'useEmpty' => true, 'emptyText' => '...', 'emptyValue' => '', 'class' => 'form-control', 'id' => 'fieldIdTipoIntervencao')); ?>
    </div>
</div>
<div class="form-group">
    <label for="fieldDescIntervencao" class="col-sm-2 control-label">Descrição</label>
    <div class="col-sm-10">
        <?php echo $this->tag->textField(array('desc_intervencao', 'size' => 30, 'class' => 'form-control', 'id' => 'fieldDescIntervencao')); ?>
    </div>
</div>
<div class="form-group">
    <label for="fieldDataIntervencao" class="col-sm-2 control-label">Data</label>
    <div class="col-sm-10" id="datepicker">
        <?php echo $this->tag->textField(array('data_intervencao', 'size' => 30, 'class' => 'form-control', 'id' => 'fieldDataIntervencao')); ?>
    </div>
</div>
<div class="form-group">
    <label for="fieldCustoIntervencao" class="col-sm-2 control-label">Custo</label>
    <div class="col-sm-10">
        <?php echo $this->tag->textField(array('custo_intervencao', 'size' => 30, 'class' => 'form-control', 'id' => 'fieldCustoIntervencao')); ?>
    </div>
</div>
<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        <?php echo $this->tag->submitButton(array('Salvar', 'class' => 'btn btn-default')); ?>
    </div>
</div>
</form>
