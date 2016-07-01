<?= $this->elements->getTabs() ?>
<div align="row center-block">
    <div class="page-header">
        <h1>
            Pesquisar Tipos de Intervenções
        </h1>
        <p>
            <?= $this->tag->linkTo(['intervencoes_tipos/new', 'Criar Tipo de intervenção']) ?>
        </p>
    </div>
    <?= $this->getContent() ?>
    <?= $this->tag->form(['intervencoes_tipos/search', 'method' => 'post', 'autocomplete' => 'off', 'class' => 'form-horizontal']) ?>
    
    <div class="form-group">
        <label for="fieldDescTipoIntervencao" class="col-sm-2 control-label">Tipo de Intervenção</label>
        <div class="col-sm-10">
            <?= $this->tag->textField(['desc_tipo_intervencao', 'size' => 30, 'class' => 'form-control', 'id' => 'fieldDescTipoIntervencao']) ?>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <?= $this->tag->submitButton(['Pesquisar', 'class' => 'btn btn-default']) ?>
        </div>
    </div>

    </form>
</div>