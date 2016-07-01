<?php echo $this->elements->getTabs(); ?>
<div align="row center-block">
    <div class="row">
        <nav>
            <ul class="pager">
                <li class="previous"><?php echo $this->tag->linkTo(array('marcas', 'Voltar')); ?></li>
            </ul>
        </nav>
    </div>
    <div class="page-header">
        <h1>
            Editar esta Marca
        </h1>
    </div>
    <?php echo $this->getContent(); ?>
    <?php echo $this->tag->form(array('marcas/save', 'method' => 'post', 'autocomplete' => 'off', 'class' => 'form-horizontal')); ?>
    
    <div class="form-group">
        <label for="fieldMarca" class="col-sm-2 control-label">Marca</label>
        <div class="col-sm-10">
            <?php echo $this->tag->textField(array('marca', 'size' => 30, 'class' => 'form-control', 'id' => 'fieldMarca')); ?>
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