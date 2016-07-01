<div class="row">
    <nav>
        <ul class="pager">
            <li class="previous"><?php echo $this->tag->linkTo(array('manutencoes/index', 'Voltar')); ?></li>
            <li class="next"><?php echo $this->tag->linkTo(array('manutencoes/new', 'Criar ')); ?></li>
        </ul>
    </nav>
</div>
<div class="page-header">
    <h1>Pesquisa de Manutenções</h1>
</div>
<?php echo $this->getContent(); ?>
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
                <td><?php echo $manutencoe->getId(); ?></td>
                <td><?php echo $manutencoe->getData(); ?></td>
                <td><?php echo $manutencoe->getIdCliente(); ?> - <?php echo $manutencoe->clientes->getNome(); ?></td>
                <td><?php echo $manutencoe->getIdVeiculo(); ?> -
                    <?php echo $manutencoe->veiculos->modelos->marcas->getMarca(); ?> -
                    <?php echo $manutencoe->veiculos->modelos->getModelo(); ?></td>
                <td><?php echo $manutencoe->getInspecionadoAte(); ?></td>
                <td><?php echo $manutencoe->getKilometragem(); ?></td>
                <td><?php echo $this->tag->linkTo(array('manutencoes/edit/' . $manutencoe->getId(), 'Editar')); ?></td>
                <td><?php echo $this->tag->linkTo(array('manutencoes/delete/' . $manutencoe->getId(), 'Eliminar')); ?></td>
            </tr>
            <tr>
                <td colspan="8">
                    <table class="table table-bordered table-striped">
                            <thead>
                            <th>Tipo de Intervencao</th>
                            <th>Descrição da Intervenção</th>
                            <th>Data</th>
                            <th>Custo</th>
                            <th colspan="2"><?php echo $this->tag->linkTo(array('intervencoes/new/' . $manutencoe->getId(), 'Nova Intervencao')); ?></th>
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
                            <td><?php echo $intervencao->intervencoesTipos->getDescTipoIntervencao(); ?></td>
                            <td><?php echo $intervencao->getDescIntervencao(); ?></td>
                            <td><?php echo $intervencao->getDataIntervencao(); ?></td>
                            <td><?php echo $intervencao->getCustoIntervencao(); ?></td>
                            <td><?php echo $this->tag->linkTo(array('intervencoes/edit/' . $intervencao->id, 'Editar')); ?></td>
                            <td><?php echo $this->tag->linkTo(array('intervencoes/delete/' . $intervencao->id, 'Eliminar')); ?></td>
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
            <?php echo $page->current . '/' . $page->total_pages; ?>
        </p>
    </div>
    <div class="col-sm-11">
        <nav>
            <ul class="pagination">
                <li><?php echo $this->tag->linkTo(array('manutencoes/search', ' << ')); ?></li>
                <li><?php echo $this->tag->linkTo(array('manutencoes/search?page=' . $page->before, ' < ')); ?></li>
                <li><?php echo $this->tag->linkTo(array('manutencoes/search?page=' . $page->next, ' > ')); ?></li>
                <li><?php echo $this->tag->linkTo(array('manutencoes/search?page=' . $page->last, ' >> ')); ?></li>
            </ul>
        </nav>
    </div>
</div>
