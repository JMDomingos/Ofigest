<?php
/**
 * @var \Phalcon\Mvc\View\Engine\Php $this
 */
?>
<div class="page-header">
    <h1>
        Pesquisa de Manutenções Agendadas
    </h1>
    <p>
        <?php echo $this->tag->linkTo(array("agenda", "Voltar para a Agenda")) ?> |
        <?php echo $this->tag->linkTo(array("manutencoes_agendadas/new", "Agendar nova Manutenção")) ?>
    </p>
</div>
<?php echo $this->getContent() ?>
<?php
    echo $this->tag->form(
        array(
            "manutencoes_agendadas/search",
            "autocomplete" => "off",
            "class" => "form-horizontal"
        )
    );
?>

<div class="form-group">
    <label for="fieldIdCliente" class="col-sm-2 control-label">Cliente</label>
    <div class="col-sm-10">
        
        <?php echo $this->tag->select(array('id_cliente', $clientes, 'using' => array('id', 'nome'), 'useEmpty' => true, 'emptyText' => '...', 'emptyValue' => '', 'class' => 'form-control', 'id' => 'fieldIdCliente')); ?>
    </div>
</div>
<div class="form-group">
    <label for="fieldMatricula" class="col-sm-2 control-label">Matrícula</label>
    <div class="col-sm-10">
        <?php echo $this->tag->textField(array("matricula", "size" => 30, "class" => "form-control", "id" => "fieldMatricula")) ?>
    </div>
</div>
<div class="form-group">
    <label for="fieldData" class="col-sm-2 control-label">Data</label>
    <div class="col-sm-10" id="datepicker">
        <?php echo $this->tag->textField(array("data", "type" => "date", "class" => "form-control", "id" => "fieldData")) ?>
    </div>
</div>

<div class="form-group">
    <label for="fieldAguardaOrcamento" class="col-sm-2 control-label">Aguarda Orçamento</label>
    <div class="col-sm-10">
        <?php echo $this->tag->selectStatic(array("aguarda_orcamento", 'useEmpty' => true, 'emptyText' => '...',
        'emptyValue' => '', "class" => "form-control", "id" => "fieldAguardaOrcamento"), $SelectSN) ?>
    </div>
</div>

<div class="form-group">
    <label for="fieldDonebyclilogin" class="col-sm-2 control-label">Agendado pelo Cliente</label>
    <div class="col-sm-10">
        <?php echo $this->tag->selectStatic(array("doneByCliLogin", 'useEmpty' => true, 'emptyText' => '...',
            'emptyValue' => '', "class" => "form-control", "id" => "fieldDonebyclilogin"), $Select10) ?>
    </div>
</div>
<div class="form-group">
    <label for="fieldCaraterurgencia" class="col-sm-2 control-label">Urgente</label>
    <div class="col-sm-10">
        <?php echo $this->tag->selectStatic(array("caraterUrgencia", 'useEmpty' => true, 'emptyText' => '...',
        'emptyValue' => '', "class" => "form-control", "id" => "fieldCaraterurgencia"), $Select10) ?>
    </div>
</div>
<div class="form-group">
    <label for="fieldConfirmed" class="col-sm-2 control-label">Manutenção Confirmada</label>
    <div class="col-sm-10">
        <?php echo $this->tag->selectStatic(array("confirmed", 'useEmpty' => true, 'emptyText' => '...',
        'emptyValue' => '', "class" => "form-control", "id" => "fieldConfirmed"), $Select10) ?>
    </div>
</div>
<div class="form-group">
    <label for="fieldStatus" class="col-sm-2 control-label">Status</label>
    <div class="col-sm-10">
        <?php echo $this->tag->selectStatic(array("status", 'useEmpty' => true, 'emptyText' => '...',
        'emptyValue' => '', "class" => "form-control", "id" => "fieldStatus"), $SelectStatus) ?>
    </div>
</div>
<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        <?php echo $this->tag->submitButton(array("Pesquisar", "class" => "btn btn-default")) ?>
    </div>
</div>
<?php echo $this->tag->endForm(); ?>
