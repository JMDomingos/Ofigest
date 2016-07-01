<div class="page-header">
    <h1>
        Agenda
    </h1>
    <p>
        <?php echo $this->tag->linkTo(array('manutencoes_agendadas/new', 'Agendar Nova Manutenção')); ?> |
        <?php echo $this->tag->linkTo(array('manutencoes_agendadas/index', 'Pesquisar Manutenções Agendadas')); ?>
    </p>
</div>
<?php echo $this->getContent(); ?>
