<?= $this->elements->getTabs() ?>
<div align="row center-block">
    <div class="page-header">
        <h1>Pesquisar Marcas</h1>
        <p>
            <?= $this->tag->linkTo(['marcas/new', 'Criar Marca']) ?>
        </p>
    </div>
    <?= $this->getContent() ?>
    <?= $this->tag->form(['marcas/search', 'method' => 'post', 'autocomplete' => 'off', 'class' => 'form-horizontal']) ?>
    
    <div class="form-group">
        <label for="fieldMarca" class="col-sm-2 control-label">Marca</label>
        <div class="col-sm-10">
            <?= $this->tag->textField(['marca', 'size' => 30, 'class' => 'form-control', 'id' => 'fieldMarca']) ?>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <?= $this->tag->submitButton(['Pesquisar', 'class' => 'btn btn-default']) ?>
        </div>
    </div>
    </form>
</div>