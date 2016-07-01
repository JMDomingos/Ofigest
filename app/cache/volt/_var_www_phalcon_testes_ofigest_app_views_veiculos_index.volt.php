<?php echo $this->elements->getTabs(); ?>
<div align="row center-block">
    <div class="page-header">
        <h1>
            Pesquisar Veiculos
        </h1>
        <p>
            <?php echo $this->tag->linkTo(array('veiculos/new', 'Criar Veiculo')); ?>
        </p>
    </div>
    <?php echo $this->getContent(); ?>
    <?php echo $this->tag->form(array('veiculos/search', 'method' => 'post', 'autocomplete' => 'off', 'class' => 'form-horizontal')); ?>
    <div class="form-group">
        <label for="fieldMatricula" class="col-sm-2 control-label">Matricula</label>
        <div class="col-sm-10">
            <?php echo $this->tag->textField(array('matricula', 'size' => 30, 'class' => 'form-control', 'id' => 'fieldMatricula')); ?>
        </div>
    </div>
    
    <div class="form-group">
        <label for="fieldMarca" class="col-sm-2 control-label">Marca</label>
        <div class="col-sm-10">
            <?php echo $this->tag->select(array('marca', $marcas, 'using' => array('id', 'marca'), 'useEmpty' => true, 'emptyText' => '...', 'emptyValue' => '', 'class' => 'form-control', 'id' => 'fieldIdMarca')); ?>
        </div>
    </div>
    <div class="form-group">
        <label for="fieldModelo" class="col-sm-2 control-label">Modelo</label>
        <div class="col-sm-10">
            <?php echo $this->tag->select(array('modelo', $modelos, 'using' => array('id', 'oModelo'), 'useEmpty' => true, 'emptyText' => '...', 'emptyValue' => '', 'class' => 'form-control', 'id' => 'fieldIdModelo')); ?>
        </div>
    </div>

    <div class="form-group">
        <label for="fieldNQuadro" class="col-sm-2 control-label">Num. do Quadro</label>
        <div class="col-sm-10">
            <?php echo $this->tag->textField(array('n_quadro', 'size' => 30, 'class' => 'form-control', 'id' => 'fieldNQuadro')); ?>
        </div>
    </div>
    
    <div class="form-group">
        <label for="fieldTamanhoPneus" class="col-sm-2 control-label">Tamanho Of Pneus</label>
        <div class="col-sm-10">
            <?php echo $this->tag->textField(array('tamanho_pneus', 'size' => 30, 'class' => 'form-control', 'id' => 'fieldTamanhoPneus')); ?>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <?php echo $this->tag->submitButton(array('Pesquisar', 'class' => 'btn btn-default')); ?>
        </div>
    </div>
    </form>
</div>