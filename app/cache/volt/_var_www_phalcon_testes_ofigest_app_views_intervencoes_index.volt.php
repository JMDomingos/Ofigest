<div class="page-header">
    <h1>
        Search intervencoes
    </h1>
    <p>
        <?php echo $this->tag->linkTo(array('intervencoes/new', 'Create intervencoes')); ?>
    </p>
</div>

<?php echo $this->getContent(); ?>

<?php echo $this->tag->form(array('intervencoes/search', 'method' => 'post', 'autocomplete' => 'off', 'class' => 'form-horizontal')); ?>

<div class="form-group">
    <label for="fieldId" class="col-sm-2 control-label">Id</label>
    <div class="col-sm-10">
        <?php echo $this->tag->textField(array('id', 'type' => 'numeric', 'class' => 'form-control', 'id' => 'fieldId')); ?>
    </div>
</div>

<div class="form-group">
    <label for="fieldIdManutencoes" class="col-sm-2 control-label">Id Of Manutencoes</label>
    <div class="col-sm-10">
        <?php echo $this->tag->textField(array('id_manutencoes', 'type' => 'numeric', 'class' => 'form-control', 'id' => 'fieldIdManutencoes')); ?>
    </div>
</div>

<div class="form-group">
    <label for="fieldIdTipoIntervencao" class="col-sm-2 control-label">Id Of Tipo Of Intervencao</label>
    <div class="col-sm-10">
        <?php echo $this->tag->textField(array('id_tipo_intervencao', 'type' => 'numeric', 'class' => 'form-control', 'id' => 'fieldIdTipoIntervencao')); ?>
    </div>
</div>

<div class="form-group">
    <label for="fieldDescIntervencao" class="col-sm-2 control-label">Desc Of Intervencao</label>
    <div class="col-sm-10">
        <?php echo $this->tag->textField(array('desc_intervencao', 'size' => 30, 'class' => 'form-control', 'id' => 'fieldDescIntervencao')); ?>
    </div>
</div>

<div class="form-group">
    <label for="fieldDataIntervencao" class="col-sm-2 control-label">Data Of Intervencao</label>
    <div class="col-sm-10">
        <?php echo $this->tag->textField(array('data_intervencao', 'size' => 30, 'class' => 'form-control', 'id' => 'fieldDataIntervencao')); ?>
    </div>
</div>

<div class="form-group">
    <label for="fieldCustoIntervencao" class="col-sm-2 control-label">Custo Of Intervencao</label>
    <div class="col-sm-10">
        <?php echo $this->tag->textField(array('custo_intervencao', 'size' => 30, 'class' => 'form-control', 'id' => 'fieldCustoIntervencao')); ?>
    </div>
</div>


<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        <?php echo $this->tag->submitButton(array('Search', 'class' => 'btn btn-default')); ?>
    </div>
</div>

</form>
