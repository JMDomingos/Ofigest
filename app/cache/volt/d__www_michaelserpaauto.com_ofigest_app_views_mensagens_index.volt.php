<div align="row center-block">
    <div class="page-header">
        <h1>Mensagens</h1>
    </div>
    <?= $this->getContent() ?>
    <div class="row">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Data</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            <?php if (isset($page->items)) { ?>
            <?php foreach ($page->items as $mensagens) { ?>
                <tr <?php if ($mensagens->getReadAt() == null) { ?>
                    class="alert-info"
                <?php } ?>>
                    <td><?= $mensagens->getCreatedAt() ?></td>
                    <td><?= $mensagens->getNome() ?></td>
                    <td><?= $mensagens->getEmail() ?></td>
                    <td><?= $this->tag->linkTo(['mensagens/ler/' . $mensagens->getId(), 'Ler Mensagem']) ?></td>
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
                    <li><?= $this->tag->linkTo(['marcas/search', ' << ']) ?></li>
                    <li><?= $this->tag->linkTo(['marcas/search?page=' . $page->before, ' < ']) ?></li>
                    <li><?= $this->tag->linkTo(['marcas/search?page=' . $page->next, ' > ']) ?></li>
                    <li><?= $this->tag->linkTo(['marcas/search?page=' . $page->last, ' >> ']) ?></li>
                </ul>
            </nav>
        </div>
    </div>
</div>