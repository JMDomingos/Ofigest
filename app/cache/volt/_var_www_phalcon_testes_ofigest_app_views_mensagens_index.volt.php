<div align="row center-block">
    <div class="page-header">
        <h1>Mensagens</h1>
    </div>
    <?php echo $this->getContent(); ?>
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
                    <td><?php echo $mensagens->getCreatedAt(); ?></td>
                    <td><?php echo $mensagens->getNome(); ?></td>
                    <td><?php echo $mensagens->getEmail(); ?></td>
                    <td><?php echo $this->tag->linkTo(array('mensagens/ler/' . $mensagens->getId(), 'Ler Mensagem')); ?></td>
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