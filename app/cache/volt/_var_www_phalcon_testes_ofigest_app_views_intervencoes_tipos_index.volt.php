<?php echo $this->elements->getTabs(); ?>
<div align="row center-block">
    <div class="page-header">
        <h1>
            Pesquisar Tipos de Intervenções
        </h1>
        <p>
            <?php echo $this->tag->linkTo(array('intervencoes_tipos/new', 'Criar Tipo de intervenção')); ?>
        </p>
    </div>
    <?php echo $this->getContent(); ?>
    <?php echo $this->tag->form(array('intervencoes_tipos/search', 'method' => 'post', 'autocomplete' => 'off', 'class' => 'form-horizontal')); ?>
    
    <div class="form-group">
        <label for="fieldDescTipoIntervencao" class="col-sm-2 control-label">Tipo de Intervenção</label>
        <div class="col-sm-10">
            <?php echo $this->tag->textField(array('desc_tipo_intervencao', 'size' => 30, 'class' => 'form-control', 'id' => 'fieldDescTipoIntervencao')); ?>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <?php echo $this->tag->submitButton(array('Pesquisar', 'class' => 'btn btn-default')); ?>
        </div>
    </div>

    </form>
</div>