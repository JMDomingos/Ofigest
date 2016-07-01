<?php echo $this->elements->getTabs(); ?>
<div align="row center-block">
    <div class="row">
        <nav>
            <ul class="pager">
                <li class="previous"><?php echo $this->tag->linkTo(array('clientes_veiculos/index', 'Voltar')); ?></li>
                <li class="next"><?php echo $this->tag->linkTo(array('clientes_veiculos/new', 'Associar nova Viatura ')); ?></li>
            </ul>
        </nav>
    </div>

    <div class="page-header">
        <h1>Resultado da Pesquisa</h1>
    </div>
    <?php echo $this->getContent(); ?>
    <div class="row">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Cliente</th>
                    <th>Viatura</th>
                    <th>Data</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            <?php if (isset($page->items)) { ?>
            <?php foreach ($page->items as $clientes_veiculo) { ?>
                <tr>
                    <td><?php echo $clientes_veiculo->getIdCliente(); ?> - <?php echo $clientes_veiculo->clientes->getNome(); ?></td>
                    <td><?php echo $clientes_veiculo->getIdVeiculo(); ?> -
                        <?php echo $clientes_veiculo->veiculos->modelos->marcas->getMarca(); ?> -
                        <?php echo $clientes_veiculo->veiculos->modelos->getModelo(); ?>
                    </td>
                    <td><?php echo $clientes_veiculo->getData(); ?></td>
                    <td><?php echo $this->tag->linkTo(array('clientes_veiculos/edit/' . $clientes_veiculo->getIdCliente(), 'Editar')); ?></td>
                    <td><?php echo $this->tag->linkTo(array('clientes_veiculos/delete/' . $clientes_veiculo->getIdCliente(), 'Eliminar')); ?></td>
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
                    <li><?php echo $this->tag->linkTo(array('clientes_veiculos/search', ' << ')); ?></li>
                    <li><?php echo $this->tag->linkTo(array('clientes_veiculos/search?page=' . $page->before, ' < ')); ?></li>
                    <li><?php echo $this->tag->linkTo(array('clientes_veiculos/search?page=' . $page->next, ' > ')); ?></li>
                    <li><?php echo $this->tag->linkTo(array('clientes_veiculos/search?page=' . $page->last, ' >> ')); ?></li>
                </ul>
            </nav>
        </div>
    </div>
</div>