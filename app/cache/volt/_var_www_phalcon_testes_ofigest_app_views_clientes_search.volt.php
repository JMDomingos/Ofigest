<?php echo $this->elements->getTabs(); ?>
<div align="row center-block">
    <div class="row">
        <nav>
            <ul class="pager">
                <li class="previous"><?php echo $this->tag->linkTo(array('clientes/index', 'Voltar')); ?></li>
                <li class="next"><?php echo $this->tag->linkTo(array('clientes/new', 'Novo Cliente')); ?></li>
            </ul>
        </nav>
    </div>
    <div class="page-header">
        <h1>Pesquisa de Clientes</h1>
    </div>
    <?php echo $this->getContent(); ?>
    <div class="row">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nome</th>
                    <th>Morada</th>
                    <th>Telefone</th>
                    <th>Telemovel</th>
                    <th>Email</th>
                    <th>NIF</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            <?php if (isset($page->items)) { ?>
            <?php foreach ($page->items as $cliente) { ?>
                <tr>
                    <td><?php echo $cliente->getId(); ?></td>
                    <td><?php echo $cliente->getNome(); ?></td>
                    <td><?php echo $cliente->getMorada(); ?></td>
                    <td><?php echo $cliente->getTelefone(); ?></td>
                    <td><?php echo $cliente->getTelemovel(); ?></td>
                    <td><?php echo $cliente->getEmail(); ?></td>
                    <td><?php echo $cliente->getNif(); ?></td>
                    <td><?php echo $this->tag->linkTo(array('clientes/edit/' . $cliente->getId(), 'Editar')); ?></td>
                    <td><?php echo $this->tag->linkTo(array('clientes/delete/' . $cliente->getId(), 'Eliminar')); ?></td>
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
                    <li><?php echo $this->tag->linkTo(array('clientes/search', ' << ')); ?></li>
                    <li><?php echo $this->tag->linkTo(array('clientes/search?page=' . $page->before, ' < ')); ?></li>
                    <li><?php echo $this->tag->linkTo(array('clientes/search?page=' . $page->next, ' > ')); ?></li>
                    <li><?php echo $this->tag->linkTo(array('clientes/search?page=' . $page->last, ' >> ')); ?></li>
                </ul>
            </nav>
        </div>
    </div>
</div>