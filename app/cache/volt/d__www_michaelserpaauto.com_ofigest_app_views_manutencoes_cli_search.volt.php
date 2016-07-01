<div class="row">
    <nav>
        <ul class="pager">
            <li class="previous"><?= $this->tag->linkTo(['manutencoes_cli/index', 'Voltar']) ?></li>
            <li class="next"></li>
        </ul>
    </nav>
</div>
<div class="page-header">
    <h3>Pesquisa de Manutenções</h3>
</div>
<?= $this->getContent() ?>
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
                <td><?= $manutencoe->getData() ?></td>
                <td><?= $manutencoe->getIdVeiculo() ?></td>
                <td><?= $manutencoe->veiculos->modelos->marcas->getMarca() ?> -
                    <?= $manutencoe->veiculos->modelos->getModelo() ?></td>
                <td><?= $manutencoe->getInspecionadoAte() ?></td>
                <td><?= $manutencoe->getKilometragem() ?></td>
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
                            <td><?= $intervencao->intervencoesTipos->getDescTipoIntervencao() ?></td>
                            <td><?= $intervencao->getDescIntervencao() ?></td>
                            <td><?= $intervencao->getDataIntervencao() ?></td>
                            <td><?= $intervencao->getCustoIntervencao() ?></td>
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
            <?= $page->current . '/' . $page->total_pages ?>
        </p>
    </div>
    <div class="col-sm-8">
        <nav>
            <ul class="pagination">
                <li><?= $this->tag->linkTo(['manutencoes_cli/search', ' <i class=\'glyphicon glyphicon-fast-backward\'></i> ']) ?></li>
                <li><?= $this->tag->linkTo(['manutencoes_cli/search?page=' . $page->before, ' <i class=\'glyphicon glyphicon-step-backward\'></i> ']) ?></li>
                <li><?= $this->tag->linkTo(['manutencoes_cli/search?page=' . $page->next, ' <i class=\'glyphicon glyphicon-step-forward\'></i> ']) ?></li>
                <li><?= $this->tag->linkTo(['manutencoes_cli/search?page=' . $page->last, ' <i class=\'glyphicon glyphicon-fast-forward\'></i> ']) ?></li>
            </ul>
        </nav>
    </div>
</div>