<div class="row">
    <nav>
        <ul class="pager">
            <li class="previous"><?= $this->tag->linkTo(['manutencoes/index', 'Voltar']) ?></li>
            <li class="next"><?= $this->tag->linkTo(['manutencoes/new', 'Criar ']) ?></li>
        </ul>
    </nav>
</div>
<div class="page-header">
    <h1>Pesquisa de Manutenções</h1>
</div>
<?= $this->getContent() ?>
<div class="row">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th>Data</th>
                <th>Cliente</th>
                <th>Matrícula</th>
                <th>Inspecionado Até</th>
                <th>Kilometragem</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        <?php if (isset($page->items)) { ?>
        <?php foreach ($page->items as $manutencoe) { ?>
            <tr>
                <td><?= $manutencoe->getId() ?></td>
                <td><?= $manutencoe->getData() ?></td>
                <td><?= $manutencoe->getIdCliente() ?> - <?= $manutencoe->clientes->getNome() ?></td>
                <td><?= $manutencoe->getIdVeiculo() ?> -
                    <?= $manutencoe->veiculos->modelos->marcas->getMarca() ?> -
                    <?= $manutencoe->veiculos->modelos->getModelo() ?></td>
                <td><?= $manutencoe->getInspecionadoAte() ?></td>
                <td><?= $manutencoe->getKilometragem() ?></td>
                <td><?= $this->tag->linkTo(['manutencoes/edit/' . $manutencoe->getId(), 'Editar']) ?></td>
                <td><?= $this->tag->linkTo(['manutencoes/delete/' . $manutencoe->getId(), 'Eliminar']) ?></td>
            </tr>
            <tr>
                <td colspan="8">
                    <table class="table table-bordered table-striped">
                            <thead>
                            <th>Tipo de Intervencao</th>
                            <th>Descrição da Intervenção</th>
                            <th>Data</th>
                            <th>Custo</th>
                            <th colspan="2"><?= $this->tag->linkTo(['intervencoes/new/' . $manutencoe->getId(), 'Nova Intervencao']) ?></th>
                        </thead>
                        <?php if ($this->length($manutencoe->intervencoes) == 0) { ?>
                        <tbody>
                            <td colspan="6">
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
                            <td><?= $this->tag->linkTo(['intervencoes/edit/' . $intervencao->id, 'Editar']) ?></td>
                            <td><?= $this->tag->linkTo(['intervencoes/delete/' . $intervencao->id, 'Eliminar']) ?></td>
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
    <div class="col-sm-1">
        <p class="pagination" style="line-height: 1.42857;padding: 6px 12px;">
            <?= $page->current . '/' . $page->total_pages ?>
        </p>
    </div>
    <div class="col-sm-11">
        <nav>
            <ul class="pagination">
                <li><?= $this->tag->linkTo(['manutencoes/search', ' << ']) ?></li>
                <li><?= $this->tag->linkTo(['manutencoes/search?page=' . $page->before, ' < ']) ?></li>
                <li><?= $this->tag->linkTo(['manutencoes/search?page=' . $page->next, ' > ']) ?></li>
                <li><?= $this->tag->linkTo(['manutencoes/search?page=' . $page->last, ' >> ']) ?></li>
            </ul>
        </nav>
    </div>
</div>
