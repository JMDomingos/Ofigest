<div class="page-header">
    <h1>
        Agenda
    </h1>
    <p>
        <?= $this->tag->linkTo(['manutencoes_agendadas/new', 'Agendar Nova Manutenção']) ?> |
        <?= $this->tag->linkTo(['manutencoes_agendadas/index', 'Pesquisar Manutenções Agendadas']) ?>
    </p>
</div>
<?= $this->getContent() ?>
