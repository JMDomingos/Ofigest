<div align="row center-block">
    <div class="row">
        <nav>
            <ul class="pager">
                <li class="previous"><?= $this->tag->linkTo(['veiculos_cli', 'Voltar']) ?></li>
            </ul>
        </nav>
    </div>
    <div class="page-header">
        <h3>
            Editar este Veiculo
        </h3>
    </div>
    <?= $this->getContent() ?>
    <?= $this->tag->form(['veiculos_cli/save', 'method' => 'post', 'autocomplete' => 'off', 'class' => 'form-horizontal']) ?>
    <div class="form-group">
        <label for="fieldMatricula" class="col-sm-2 control-label">Matricula</label>
        <div class="col-sm-10">
            <?= $this->tag->textField(['matricula', 'size' => 30, 'class' => 'form-control', 'id' => 'fieldMatricula']) ?>
        </div>
    </div>
    <div class="form-group">
        <label for="fieldMarca" class="col-sm-2 control-label">Marca</label>
        <div class="col-sm-10">
            <?= $this->tag->select(['id_marca', $marcas, 'using' => ['id', 'marca'], 'useEmpty' => false, 'class' => 'form-control', 'id' => 'fieldIdMarca']) ?>
        </div>
    </div>
    <div class="form-group">
        <label for="fieldModelo" class="col-sm-2 control-label">Modelo</label>
        <div class="col-sm-10">
            <?= $this->tag->select(['modelo', $modelos, 'using' => ['id', 'oModelo'], 'useEmpty' => false, 'class' => 'form-control', 'id' => 'fieldIdModelo']) ?>
        </div>
    </div>
    
    <div class="form-group">
        <label for="fieldNQuadro" class="col-sm-2 control-label">N Of Quadro</label>
        <div class="col-sm-10">
            <?= $this->tag->textField(['n_quadro', 'size' => 30, 'class' => 'form-control', 'id' => 'fieldNQuadro']) ?>
        </div>
    </div>
    <div class="form-group">
        <label for="fieldAno" class="col-sm-2 control-label">Ano</label>
        <div class="col-sm-10">
            <?= $this->tag->textField(['ano', 'type' => 'numeric', 'class' => 'form-control', 'id' => 'fieldAno']) ?>
        </div>
    </div>
    <div class="form-group">
        <label for="fieldMes" class="col-sm-2 control-label">Mes</label>
        <div class="col-sm-10">
            <?= $this->tag->textField(['mes', 'type' => 'numeric', 'class' => 'form-control', 'id' => 'fieldMes']) ?>
        </div>
    </div>
    <div class="form-group">
        <label for="fieldCor" class="col-sm-2 control-label">Cor</label>
        <div class="col-sm-10">
            <?= $this->tag->textField(['cor', 'size' => 30, 'class' => 'form-control', 'id' => 'fieldCor']) ?>
        </div>
    </div>
    <div class="form-group">
        <label for="fieldTamanhoPneus" class="col-sm-2 control-label">Tamanho Of Pneus</label>
        <div class="col-sm-10">
            <?= $this->tag->textField(['tamanho_pneus', 'size' => 30, 'class' => 'form-control', 'id' => 'fieldTamanhoPneus']) ?>
        </div>
    </div>
    <?= $this->tag->hiddenField(['id']) ?>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <?= $this->tag->submitButton(['Guardar', 'class' => 'btn btn-default']) ?>
        </div>
    </div>
    </form>
</div>