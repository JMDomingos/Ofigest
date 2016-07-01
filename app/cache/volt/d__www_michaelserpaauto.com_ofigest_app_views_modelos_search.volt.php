<?= $this->elements->getTabs() ?>
<div align="row center-block">
    <div class="row">
        <nav>
            <ul class="pager">
                <li class="previous"><?= $this->tag->linkTo(['modelos/index', 'Voltar']) ?></li>
                <li class="next"><?= $this->tag->linkTo(['modelos/new', 'Novo Modelo']) ?></li>
            </ul>
        </nav>
    </div>
    <div class="page-header">
        <h1>Pesquisa de Modelos</h1>
    </div>
    <?= $this->getContent() ?>
    <div class="row">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            <?php if (isset($page->items)) { ?>
            <?php foreach ($page->items as $modelo) { ?>
                <tr>
                    <td><?= $modelo->getId() ?></td>
                    <td><?= $modelo->getMarca() ?> - <?= $modelo->marcas->getMarca() ?></td>
                    <td><?= $modelo->getModelo() ?></td>
                    <td><?= $this->tag->linkTo(['modelos/edit/' . $modelo->getId(), 'Editar']) ?></td>
                    <td><?= $this->tag->linkTo(['modelos/delete/' . $modelo->getId(), 'Eliminar']) ?></td>
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
                    <li><?= $this->tag->linkTo(['modelos/search', ' << ']) ?></li>
                    <li><?= $this->tag->linkTo(['modelos/search?page=' . $page->before, ' < ']) ?></li>
                    <li><?= $this->tag->linkTo(['modelos/search?page=' . $page->next, ' > ']) ?></li>
                    <li><?= $this->tag->linkTo(['modelos/search?page=' . $page->last, ' >> ']) ?></li>
                </ul>
            </nav>
        </div>
    </div>
</div>