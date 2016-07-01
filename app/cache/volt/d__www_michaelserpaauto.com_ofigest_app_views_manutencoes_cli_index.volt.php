<div class="row">
    <nav>
        <ul class="pager">
            <li class="previous"></li>
            <li class="next"><?= $this->tag->linkTo(['agendaCli/new', 'Agendar Manutenção']) ?></li>
        </ul>
    </nav>
</div>
<div class="page-header">
    <h3>
        Pesquisar Manutenções efetuadas
    </h3>
</div>
<?= $this->getContent() ?><?php if (($has_vehicles == true)) { ?>
    <?= $this->tag->form(['manutencoes_cli/search', 'method' => 'post', 'autocomplete' => 'off', 'class' => 'form-horizontal']) ?>
    
    <div class="form-group">
        <label for="fieldIdVeiculo" class="col-sm-2 control-label">Veiculo</label>
        <div class="col-sm-10">
            
            <?= $this->tag->select(['id_veiculo', $veiculos, 'using' => ['matricula', 'oModelo'], 'useEmpty' => true, 'emptyText' => 'Todos', 'emptyValue' => '', 'class' => 'form-control', 'id' => 'fieldIdVeiculo']) ?>
        </div>
    </div>
    
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <?= $this->tag->submitButton(['Pesquisar', 'class' => 'btn btn-default']) ?>
        </div>
    </div>
    <?= $this->tag->endForm() ?>
    
<?php } ?>