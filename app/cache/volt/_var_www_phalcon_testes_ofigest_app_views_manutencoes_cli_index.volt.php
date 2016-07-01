<div class="row">
    <nav>
        <ul class="pager">
            <li class="previous"></li>
            <li class="next"><?php echo $this->tag->linkTo(array('agendaCli/new', 'Agendar Manutenção')); ?></li>
        </ul>
    </nav>
</div>
<div class="page-header">
    <h3>
        Pesquisar Manutenções efetuadas
    </h3>
</div>
<?php echo $this->getContent(); ?><?php if (($has_vehicles == true)) { ?>
    <?php echo $this->tag->form(array('manutencoes_cli/search', 'method' => 'post', 'autocomplete' => 'off', 'class' => 'form-horizontal')); ?>
    
    <div class="form-group">
        <label for="fieldIdVeiculo" class="col-sm-2 control-label">Veiculo</label>
        <div class="col-sm-10">
            
            <?php echo $this->tag->select(array('id_veiculo', $veiculos, 'using' => array('matricula', 'oModelo'), 'useEmpty' => true, 'emptyText' => 'Todos', 'emptyValue' => '', 'class' => 'form-control', 'id' => 'fieldIdVeiculo')); ?>
        </div>
    </div>
    
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <?php echo $this->tag->submitButton(array('Pesquisar', 'class' => 'btn btn-default')); ?>
        </div>
    </div>
    <?php echo $this->tag->endForm(); ?>
    
<?php } ?>