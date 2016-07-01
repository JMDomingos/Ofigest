<div align="row center-block">
    <div class="page-header">
        <h1>
            Pesquisar Viaturas
        </h1>
        <p>
            <?php echo $this->tag->linkTo(array('veiculos_cli/new', 'Inserir Viatura')); ?>
        </p>
    </div>
    <?php echo $this->getContent(); ?>
    <?php echo $this->tag->form(array('veiculos_cli/search', 'method' => 'post', 'autocomplete' => 'off', 'class' => 'form-horizontal')); ?>
    <div class="form-group">
        <label for="fieldMatricula" class="col-sm-2 control-label">Matricula</label>
        <div class="col-sm-10">
            
            <?php echo $this->tag->select(array('matricula', $matriculas, 'using' => array('matricula', 'oModelo'), 'useEmpty' => true, 'emptyText' => 'Todas', 'emptyValue' => '', 'class' => 'form-control', 'id' => 'fieldMatricula')); ?>
        </div>
    </div>
    
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <?php echo $this->tag->submitButton(array('Pesquisar', 'class' => 'btn btn-default')); ?>
        </div>
    </div>
    </form>
</div>