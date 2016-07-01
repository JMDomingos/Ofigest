<?php echo $this->elements->getTabs(); ?>
<div align="row center-block">
    <div class="row">
        <nav>
            <ul class="pager">
                <li class="previous"></li>
                <li class="next"><?php echo $this->tag->linkTo(array('marcas/new', 'Nova Marca')); ?></li>
            </ul>
        </nav>
    </div>
    <div class="page-header">
        <h1>Marcas de Veiculos</h1>
    </div>
    <?php echo $this->getContent(); ?>
    <div class="row">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Marca</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            <?php if (isset($page->items)) { ?>
            <?php foreach ($page->items as $marca) { ?>
                <tr>
                    <td><?php echo $marca->getId(); ?></td>
                    <td><?php echo $marca->getMarca(); ?></td>
                    <td><?php echo $this->tag->linkTo(array('marcas/edit/' . $marca->getId(), 'Editar')); ?></td>
                    <td><?php echo $this->tag->linkTo(array('marcas/delete/' . $marca->getId(), 'Eliminar')); ?></td>
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
                    <li><?php echo $this->tag->linkTo(array('marcas/search', ' << ')); ?></li>
                    <li><?php echo $this->tag->linkTo(array('marcas/search?page=' . $page->before, ' < ')); ?></li>
                    <li><?php echo $this->tag->linkTo(array('marcas/search?page=' . $page->next, ' > ')); ?></li>
                    <li><?php echo $this->tag->linkTo(array('marcas/search?page=' . $page->last, ' >> ')); ?></li>
                </ul>
            </nav>
        </div>
    </div>
</div>