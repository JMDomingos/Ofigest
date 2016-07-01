<div class="row">
    <nav>
        <ul class="pager">
            <li class="previous"><?php echo $this->tag->linkTo(array('manutencoes_cli/index', 'Voltar')); ?></li>
            <li class="next"></li>
        </ul>
    </nav>
</div>
<div class="page-header">
    <h3>Pesquisa de Manutenções</h3>
</div>
<?php echo $this->getContent(); ?>
<div class="row">
    <table class="table table-bordered table-striped table-condensed">
        <thead>
            <tr>
                <th>Data</th>
                <th>Matrícula</th>
                <th>Veiculo</th>
                <th>Insp. Até</th>
                <th>Kilom.</th>
            </tr>
        </thead>
        <tbody>
        <?php if (isset($page->items)) { ?>
        <?php foreach ($page->items as $manutencoe) { ?>
            <tr>
                <td><?php echo $manutencoe->getData(); ?></td>
                <td><?php echo $manutencoe->getIdVeiculo(); ?></td>
                <td><?php echo $manutencoe->veiculos->modelos->marcas->getMarca(); ?> -
                    <?php echo $manutencoe->veiculos->modelos->getModelo(); ?></td>
                <td><?php echo $manutencoe->getInspecionadoAte(); ?></td>
                <td><?php echo $manutencoe->getKilometragem(); ?></td>
            </tr>
            <tr>
                <td colspan="8">
                    <table class="table table-bordered table-striped table-condensed">
                            <thead>
                            <th>Tipo Intervencao</th>
                            <th>Descrição Intervenção</th>
                            <th>Data</th>
                            <th>Custo</th>
                        </thead>
                        <?php if ($this->length($manutencoe->intervencoes) == 0) { ?>
                        <tbody>
                            <td colspan="4">
                                <div class="alert alert-info">Não existem intervenções nesta manutenção.</div>
                            </td>
                        </tbody>
                        <?php } else { ?>
                        <?php foreach ($manutencoe->intervencoes as $intervencao) { ?>
                        <tbody>
                            <td><?php echo $intervencao->intervencoesTipos->getDescTipoIntervencao(); ?></td>
                            <td><?php echo $intervencao->getDescIntervencao(); ?></td>
                            <td><?php echo $intervencao->getDataIntervencao(); ?></td>
                            <td><?php echo $intervencao->getCustoIntervencao(); ?></td>
                        </tbody>
                        <?php } ?>
                        <?php } ?>
                    </table>
                </td>
            </tr>
        <?php } ?>
        <?php } ?>
        </tbody>
    </table>
</div>
<div class="row">
    <div class="col-sm-4">
        <p class="pagination" style="line-height: 1.42857;padding: 6px 12px;">
            <?php echo $page->current . '/' . $page->total_pages; ?>
        </p>
    </div>
    <div class="col-sm-8">
        <nav>
            <ul class="pagination">
                <li><?php echo $this->tag->linkTo(array('manutencoes_cli/search', ' <i class=\'glyphicon glyphicon-fast-backward\'></i> ')); ?></li>
                <li><?php echo $this->tag->linkTo(array('manutencoes_cli/search?page=' . $page->before, ' <i class=\'glyphicon glyphicon-step-backward\'></i> ')); ?></li>
                <li><?php echo $this->tag->linkTo(array('manutencoes_cli/search?page=' . $page->next, ' <i class=\'glyphicon glyphicon-step-forward\'></i> ')); ?></li>
                <li><?php echo $this->tag->linkTo(array('manutencoes_cli/search?page=' . $page->last, ' <i class=\'glyphicon glyphicon-fast-forward\'></i> ')); ?></li>
            </ul>
        </nav>
    </div>
</div>