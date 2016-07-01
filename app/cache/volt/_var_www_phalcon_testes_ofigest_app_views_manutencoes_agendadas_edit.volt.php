<?php
/**
 * @var \Phalcon\Mvc\View\Engine\Php $this
 */
?>
<div class="row">
    <nav>
        <ul class="pager">
            <li class="previous">
                <?php echo $this->tag->linkTo(array("agenda", "Voltar para a Agenda")) ?>
                <?php echo $this->tag->linkTo(array("manutencoes_agendadas/index", "Voltar para a Pesquisa")); ?>
            </li>
            <li class="next">
                <?php echo $this->tag->linkTo(array("manutencoes/newFromAgenda/" . $id, "Nova Manutenção desta Marcação")) ?>
            </li>
        </ul>
    </nav>
</div>
<div class="page-header">
    <h1>
        Editar esta Manutenção Agendada
    </h1>
</div>
<?php echo $this->getContent(); ?>
<?php
    echo $this->tag->form(
        array(
            "manutencoes_agendadas/save",
            "autocomplete" => "off",
            "class" => "form-horizontal"
        )
    );
?>
<div class="form-group">
    <label for="fieldIdCliente" class="col-sm-2 control-label">Cliente</label>
    <div class="col-sm-8">
        <?php echo $this->tag->select(array('id_cliente', $clientes, 'using' => array('id', 'nome'), 'useEmpty' => true, 'emptyText' => '...', 'emptyValue' => '', 'class' => 'form-control', 'id' => 'fieldIdCliente')); ?>
    </div>
    <div class="col-sm-2">
        <?php echo $this->tag->linkTo(array('clientes/edit/' . $id_cliente, ' <i class=\'glyphicon glyphicon-phone\'></i> Ver Detalhes')); ?>
    </div>
</div>
<div class="form-group">
    <label for="fieldMatricula" class="col-sm-2 control-label">Matricula</label>
    <div class="col-sm-10">
        <?php echo $this->tag->select(array('matricula', $veiculos, 'using' => array('matricula', 'oModelo'), 'useEmpty' => true, 'emptyText' => '...', 'emptyValue' => '', 'class' => 'form-control', 'id' => 'fieldMatricula')); ?>
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
        <?php echo $this->tag->textField(array("mensagem", "size" => 30, "class" => "form-control", "id" => "fieldMensagem")) ?>
    </div>
</div>
<div class="form-group">
    <label for="fieldAguardaOrcamento" class="col-sm-2 control-label">Aguarda um Orçamento</label>
    <div class="col-sm-10">
        <?php echo $this->tag->selectStatic(array("aguarda_orcamento", "class" => "form-control", "id" => "fieldAguardaOrcamento"), $Select10) ?>
    </div>
</div>
<div class="form-group">
    <label for="fieldAguardaOrcamento" class="col-sm-2 control-label">Morada</label>
    <div class="col-sm-10">
        <?php echo $morada->getMoradaRua(); ?><br>
        <?php echo $morada->getMoradaCpLocalidade(); ?>
    </div>
</div>
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
<div class="form-group">
    <label for="fieldStatus" class="col-sm-2 control-label">Status</label>
    <div class="col-sm-10">
        <?php echo $this->tag->selectStatic(array("status", "class" => "form-control", "id" => "fieldStatus"), $SelectStatus) ?>
    </div>
</div>
<?php echo $this->tag->hiddenField("id") ?>
<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        <?php echo $this->tag->submitButton(array("Guardar", "class" => "btn btn-default")) ?>
    </div>
</div>
<?php echo $this->tag->endForm(); ?>
