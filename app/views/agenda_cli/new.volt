<?php
/**
 * @var \Phalcon\Mvc\View\Engine\Php $this
 */
?>
<div class="row">
    <nav>
        <ul class="pager">
            <li class="previous">
                <?php echo $this->tag->linkTo(array("agenda_cli/search", "Voltar")) ?>
            </li>
        </ul>
    </nav>
</div>
<div class="page-header">
    <h3>
        Agendar uma nova Manutenção
    </h3>
</div>
<?php echo $this->getContent(); ?>
<?php
    echo $this->tag->form(
        array(
            "agenda_cli/create",
            "autocomplete" => "off",
            "class" => "form-horizontal"
        )
    );
?>

<?php echo $this->tag->hiddenField("id_cliente") ?>

<div class="form-group">
    <label for="fieldMatricula" class="col-sm-2 control-label">Matricula</label>
    <div class="col-sm-10">
        {{ select("matricula", veiculos, "using": ["matricula", "oModelo"], 'useEmpty': true,
        'emptyText': '...', 'emptyValue': '', "class" : "form-control", "id" : "fieldMatricula") }}
    </div>
</div>
<div class="form-group">
    <label for="fieldData" class="col-sm-2 control-label">Data</label>
    <div class="col-sm-10" id="datepicker">
        <?php echo $this->tag->textField(array("data", "type" => "date", "class" => "form-control", "id" => "fieldData")) ?>
    </div>
</div>
<div class="form-group">
    <label for="fieldHora" class="col-sm-2 control-label">Hora</label>
    <div class="col-sm-10">
        <?php echo $this->tag->selectStatic(array("hora", "class" => "form-control", "id" => "fieldHora"), $horas) ?>
    </div>
</div>
<div class="form-group">
    <label for="fieldMensagem" class="col-sm-2 control-label">Mensagem</label>
    <div class="col-sm-10">
        <?php echo $this->tag->textArea(array("mensagem", "class" => "form-control", "id" => "fieldMensagem")) ?>
    </div>
</div>
<div class="form-group">
    <label for="fieldIdMorada" class="col-sm-2 control-label">Morada</label>
    <div class="col-sm-10">
        {{ select("id_morada", moradas, "using": ["id", "morada_rua"], 'useEmpty': true,
        'emptyText': 'À nossa descrição.', 'emptyValue': '', "class" : "form-control", "id" : "fieldIdMorada") }}
    </div>
</div>
<div class="form-group">
    <label for="fieldAguardaOrcamento" class="col-sm-2 control-label">Aguarda um Orçamento</label>
    <div class="col-sm-10">
        <?php echo $this->tag->selectStatic(array("aguarda_orcamento", "class" => "form-control", "id" => "fieldAguardaOrcamento"), $Select10) ?>
    </div>
</div>
<?php echo $this->tag->hiddenField("doneByCliLogin") ?>
<div class="form-group">
    <label for="fieldCaraterurgencia" class="col-sm-2 control-label">Urgente</label>
    <div class="col-sm-10">
        <?php echo $this->tag->selectStatic(array("caraterUrgencia", "class" => "form-control", "id" => "fieldCaraterurgencia"), $Select10) ?>
    </div>
</div>

<?php echo $this->tag->hiddenField("confirmed") ?>

<?php echo $this->tag->hiddenField("status") ?>

<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        <?php echo $this->tag->submitButton(array("Guardar", "class" => "btn btn-default")) ?>
    </div>
</div>
<?php echo $this->tag->endForm(); ?>
