<?php
/**
 * @var \Phalcon\Mvc\View\Engine\Php $this
 */
?>
<?php use Phalcon\Tag; ?>
<div class="row">
    <nav>
        <ul class="pager">
            <li class="previous">
                <?php echo $this->tag->linkTo(array("agenda/index", "Voltar Agenda")); ?>
                <?php echo $this->tag->linkTo(array("manutencoes_agendadas/index", "Voltar para a Pesquisa")); ?>
            </li>
            <li class="next"><?php echo $this->tag->linkTo(array("manutencoes_agendadas/new", "Agendar Manutenção")); ?></li>
        </ul>
    </nav>
</div>
<div class="page-header">
    <h1>Pesquisa de Manutenções Agendadas</h1>
</div>
<?php echo $this->getContent(); ?>
<div class="row">
    <table class="table table-bordered">
        <thead>
            <tr>
                {# <th>Id</th> #}
                <th>Id Of Cliente</th>
                <th>Matricula</th>
                <th>Data/Hora</th>
                {# <th>Mensagem</th> #}
                <th>Ag. Orç.</th>
                <th>Orçamento</th>
                <th>Res. p/ Cli</th>
                <th>Urgente</th>
                <th>Confirmado</th>
                <th>Status</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($page->items as $manutencoes_agendada): ?>
            <tr>
                {# <td><?php echo $manutencoes_agendada->getId() ?></td> #}
                <td><?php echo $manutencoes_agendada->clientes->getNome() ?></td>
                <td><?php echo $manutencoes_agendada->getMatricula() ?></td>
                <td><?php echo $manutencoes_agendada->getData() . ' ' . $manutencoes_agendada->getHora() ?></td>
                {# <td><?php echo $manutencoes_agendada->getMensagem() ?></td> #}
                <td><?php echo ($manutencoes_agendada->getAguardaOrcamento()?'Sim':'Não'); ?></td>
                <td><?php echo $manutencoes_agendada->getOrcamento() ?></td>
                <td><?php echo ($manutencoes_agendada->getDonebyclilogin()=='N'?'Não':'Sim'); ?></td>
                <td><?php echo ($manutencoes_agendada->getCaraterurgencia()=='N'?'Não':'Sim'); ?></td>
                <td><?php echo ($manutencoes_agendada->getConfirmed()=='N'?'Não':'Sim'); ?></td>
                <td><?php echo $SelectStatus[$manutencoes_agendada->getStatus()]; ?></td>
                <td><?php echo $this->tag->linkTo(array("manutencoes_agendadas/edit/" . $manutencoes_agendada->getId(), "Editar")); ?></td>
                <td><?php echo $this->tag->linkTo(array("manutencoes_agendadas/delete/" . $manutencoes_agendada->getId(), "Eliminar")); ?></td>
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
                <li><?php echo $this->tag->linkTo("manutencoes_agendadas/search", " << ") ?></li>
                <li><?php echo $this->tag->linkTo("manutencoes_agendadas/search?page=" . $page->before, " < ") ?></li>
                <li><?php echo $this->tag->linkTo("manutencoes_agendadas/search?page=" . $page->next, " > ") ?></li>
                <li><?php echo $this->tag->linkTo("manutencoes_agendadas/search?page=" . $page->last, " >> ") ?></li>
            </ul>
        </nav>
    </div>
</div>
