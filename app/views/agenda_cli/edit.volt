<?php
/**
 * @var \Phalcon\Mvc\View\Engine\Php $this
 */
?>
<div class="row">
    <nav>
        <ul class="pager">
            <li class="previous">
                <?php echo $this->tag->linkTo(array("agenda_cli/search", "Voltar")); ?>
            </li>
        </ul>
    </nav>
</div>
<div class="page-header">
    <h3>
        Editar esta Manutenção Agendada
    </h3>
</div>
<?php echo $this->getContent(); ?>
<?php
    echo $this->tag->form(
        array(
            "agenda_cli/save",
            "autocomplete" => "off",
            "class" => "form-horizontal"
        )
    );
?>
{# Meter num campo hidden
<div class="form-group">
    <label for="fieldIdCliente" class="col-sm-2 control-label">Cliente</label>
    <div class="col-sm-10">
        {{ select("id_cliente", clientes, "using": ["id", "nome"], 'useEmpty': true,
        'emptyText': '...', 'emptyValue': '',  "class" : "form-control", "id" : "fieldIdCliente") }}
    </div>
</div>
#}
<div class="form-group">
    <label for="fieldMatricula" class="col-sm-2 control-label">Matricula</label>
    <div class="col-sm-10">
        {{ select("matricula", veiculos, "using": ["matricula", "oModelo"], 'useEmpty': true,
        'emptyText': '...', 'emptyValue': '', "class" : "form-control", "id" : "fieldMatricula") }}
    </div>
</div>
<div class="form-group">
    <label for="fieldData" class="col-sm-2 control-label">Data</label>
    <div class="col-sm-10"  id="datepicker">
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
{#
<div class="form-group">
    <label for="fieldOrcamento" class="col-sm-2 control-label">Orcamento</label>
    <div class="col-sm-10">
        <?php echo $this->tag->textField(array("orcamento", "size" => 30, "class" => "form-control", "id" => "fieldOrcamento")) ?>
    </div>
</div>
<div class="form-group">
    <label for="fieldDonebyclilogin" class="col-sm-2 control-label">Reserva Web</label>
    <div class="col-sm-10">
        <?php echo $this->tag->selectStatic(array("doneByCliLogin", "class" => "form-control", "id" => "fieldDonebyclilogin"), $SelectSN) ?>
    </div>
</div>
#}
<div class="form-group">
    <label for="fieldCaraterurgencia" class="col-sm-2 control-label">Urgente</label>
    <div class="col-sm-10">
        <?php echo $this->tag->selectStatic(array("caraterUrgencia", "class" => "form-control", "id" => "fieldCaraterurgencia"), $Select10) ?>
    </div>
</div>
<div class="form-group">
    <label for="fieldConfirmed" class="col-sm-2 control-label">Confirmada</label>
    <div class="col-sm-10">
        <?php echo $this->tag->selectStatic(array("confirmed", "class" => "form-control", "id" => "fieldConfirmed"), $Select10) ?>
    </div>
</div>
{#
<div class="form-group">
    <label for="fieldStatus" class="col-sm-2 control-label">Status</label>
    <div class="col-sm-10">
        <?php echo $this->tag->selectStatic(array("status", "class" => "form-control", "id" => "fieldStatus"), $SelectStatus) ?>
    </div>
</div>
#}
<?php echo $this->tag->hiddenField("id") ?>
<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        <?php echo $this->tag->submitButton(array("Guardar", "class" => "btn btn-default")) ?>
    </div>
</div>
<?php echo $this->tag->endForm(); ?>
