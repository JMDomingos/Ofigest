<?php echo $this->elements->getTabs(); ?>
<div align="row center-block">
    <div class="row">
        <nav>
            <ul class="pager">
                <li class="previous"><?php echo $this->tag->linkTo(array('veiculos/index', 'Voltar')); ?></li>
                <li class="next"><?php echo $this->tag->linkTo(array('veiculos/new', 'Criar ')); ?></li>
            </ul>
        </nav>
    </div>
    <div class="page-header">
        <h1>Veiculos</h1>
    </div>
    <?php echo $this->getContent(); ?>
    <div class="row">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Matricula</th>
                    <th>Marca / Modelo</th>
                    <th>Num. do Quadro</th>
                    <th>Ano</th>
                    <th>Mes</th>
                    <th>Cor</th>
                    <th>Tam. Pneus</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            <?php if (isset($page->items)) { ?>
            <?php foreach ($page->items as $veiculo) { ?>
                <tr>
                    <td><?php echo $veiculo->getMatricula(); ?></td>
                    <td><?php echo $veiculo->getModelo(); ?> - <?php echo $veiculo->modelos->marcas->getMarca(); ?> - <?php echo $veiculo->modelos->getModelo(); ?></td>
                    <td><?php echo $veiculo->getNQuadro(); ?></td>
                    <td><?php echo $veiculo->getAno(); ?></td>
                    <td><?php echo $veiculo->getMes(); ?></td>
                    <td><?php echo $veiculo->getCor(); ?></td>
                    <td><?php echo $veiculo->getTamanhoPneus(); ?></td>
                    <td><?php echo $this->tag->linkTo(array('veiculos/edit/' . $veiculo->getMatricula(), 'Editar')); ?></td>
                    <td><?php echo $this->tag->linkTo(array('veiculos/delete/' . $veiculo->getMatricula(), 'Eliminar')); ?></td>
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
                    <li><?php echo $this->tag->linkTo(array('veiculos/search', ' << ')); ?></li>
                    <li><?php echo $this->tag->linkTo(array('veiculos/search?page=' . $page->before, ' < ')); ?></li>
                    <li><?php echo $this->tag->linkTo(array('veiculos/search?page=' . $page->next, ' > ')); ?></li>
                    <li><?php echo $this->tag->linkTo(array('veiculos/search?page=' . $page->last, ' >> ')); ?></li>
                </ul>
            </nav>
        </div>
    </div>
</div>