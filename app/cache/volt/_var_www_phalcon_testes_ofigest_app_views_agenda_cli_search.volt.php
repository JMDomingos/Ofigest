<?php
/**
 * @var \Phalcon\Mvc\View\Engine\Php $this
 */
?>
<?php use Phalcon\Tag; ?>
<div class="row">
    <nav>
        <ul class="pager">
            <li class="previous"></li>
            <li class="next"><?php echo $this->tag->linkTo(array("agenda_cli/new", "Agendar Manutenção")); ?></li>
        </ul>
    </nav>
</div>
<div class="page-header">
    <h3>As suas Manutenções Agendadas</h3>
</div>
<?php echo $this->getContent(); ?>
<?php if ($contagem != 0) { ?>
<div class="row">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Matricula</th>
                <th>Data/Hora</th>
                <th>Detalhes</th>
                
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($page->items as $manutencoes_agendada): ?>
            <tr>
                <td><?php echo $manutencoes_agendada->getMatricula() ?></td>
                <td><?php echo $manutencoes_agendada->getData() . ' ' . $manutencoes_agendada->getHora() ?></td>
                <td>
                    
                    Ag. Orç. : <?php echo ($manutencoes_agendada->getAguardaOrcamento()?'S':'N'); ?><br>
                    Orç. : <?php echo $manutencoes_agendada->getOrcamento() ?><br>
                    Urgente : <?php echo ($manutencoes_agendada->getCaraterurgencia()=='N'?'N':'S'); ?><br>
                    Confirmado : <?php echo ($manutencoes_agendada->getConfirmed()=='N'?'N':'S'); ?>
                </td>
                
                <td><?php echo $this->tag->linkTo(array("agenda_cli/edit/" . $manutencoes_agendada->getId(), "Editar")); ?></td>
                <td><?php echo $this->tag->linkTo(array("agenda_cli/delete/" . $manutencoes_agendada->getId(), "Eliminar")); ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
<div class="row">
    <div class="col-sm-1">
        <p class="pagination" style="line-height: 1.42857;padding: 6px 12px;">
            <?php echo $page->current, "/", $page->total_pages ?>
        </p>
    </div>
    <div class="col-sm-11">
        <nav>
            <ul class="pagination">
                <li><?php echo $this->tag->linkTo("agenda_cli/search", " <i class='glyphicon glyphicon-fast-backward'></i> ") ?></li>
                <li><?php echo $this->tag->linkTo("agenda_cli/search?page=" . $page->before, " <i class='glyphicon glyphicon-step-backward'></i> ") ?></li>
                <li><?php echo $this->tag->linkTo("agenda_cli/search?page=" . $page->next, " <i class='glyphicon glyphicon-step-forward'></i> ") ?></li>
                <li><?php echo $this->tag->linkTo("agenda_cli/search?page=" . $page->last, " <i class='glyphicon glyphicon-fast-forward'></i> ") ?></li>
            </ul>
        </nav>
    </div>
</div>
<?php } ?>