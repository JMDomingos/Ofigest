<?php echo $this->elements->getTabs(); ?>
<div align="row center-block">
    <div class="row">
        <nav>
            <ul class="pager">
                <li class="previous"><?php echo $this->tag->linkTo(array('intervencoes_tipos', 'Voltar')); ?></li>
            </ul>
        </nav>
    </div>
    <div class="page-header">
        <h1>
            Editar Tipo de Intervenção
        </h1>
    </div>
    <?php echo $this->getContent(); ?>
    <?php echo $this->tag->form(array('intervencoes_tipos/save', 'method' => 'post', 'autocomplete' => 'off', 'class' => 'form-horizontal')); ?>
    <div class="form-group">
        <label for="fieldDescTipoIntervencao" class="col-sm-2 control-label">Descrição do Tipo de Intervenção</label>
        <div class="col-sm-10">
            <?php echo $this->tag->textField(array('desc_tipo_intervencao', 'size' => 30, 'class' => 'form-control', 'id' => 'fieldDescTipoIntervencao')); ?>
        </div>
    </div>
    <?php echo $this->tag->hiddenField(array('id')); ?>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <?php echo $this->tag->submitButton(array('Guardar', 'class' => 'btn btn-default')); ?>
        </div>
    </div>
    </form>
</div>