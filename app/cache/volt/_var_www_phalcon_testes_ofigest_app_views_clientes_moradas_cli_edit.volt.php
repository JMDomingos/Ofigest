<?php
/**
 * @var \Phalcon\Mvc\View\Engine\Php $this
 */
?>
<div align="row center-block">
    <div class="row">
        <nav>
            <ul class="pager">
                <li class="previous"><?php echo $this->tag->linkTo(array("clientes_moradas_cli/search", "Voltar")) ?></li>
            </ul>
        </nav>
    </div>
    <div class="page-header">
        <h3>
            Editar esta Morada
        </h3>
    </div>
    <?php echo $this->getContent(); ?>
    <?php
        echo $this->tag->form(
            array(
                "clientes_moradas_cli/save",
                "autocomplete" => "off",
                "class" => "form-horizontal"
            )
        );
    ?>
    <?php echo $this->tag->hiddenField(array("id_cliente", "id" => "fieldIdCliente")) ?>
    <div class="form-group">
        <label for="fieldMoradaRua" class="col-sm-2 control-label">Morada Of Rua</label>
        <div class="col-sm-10">
            <?php echo $this->tag->textField(array("morada_rua", "size" => 30, "class" => "form-control", "id" => "fieldMoradaRua")) ?>
        </div>
    </div>
    <div class="form-group">
        <label for="fieldMoradaCpLocalidade" class="col-sm-2 control-label">Morada Of Cp Of Localidade</label>
        <div class="col-sm-10">
            <?php echo $this->tag->textField(array("morada_cp_localidade", "size" => 30, "class" => "form-control", "id" => "fieldMoradaCpLocalidade")) ?>
        </div>
    </div>
    <?php echo $this->tag->hiddenField("id") ?>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <?php echo $this->tag->submitButton(array("Guardar", "class" => "btn btn-default")) ?>
        </div>
    </div>
    <?php echo $this->tag->endForm(); ?>
</div>