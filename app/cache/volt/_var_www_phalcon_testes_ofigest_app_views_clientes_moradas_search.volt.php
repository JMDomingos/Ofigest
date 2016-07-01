<?php
/**
 * @var \Phalcon\Mvc\View\Engine\Php $this
 */
?>
<?php use Phalcon\Tag; ?>
<?php echo $this->elements->getTabs(); ?>
<div align="row center-block">
    <div class="row">
        <nav>
            <ul class="pager">
                <li class="previous"><?php echo $this->tag->linkTo(array("clientes_moradas/index", "Voltar")); ?></li>
                <li class="next"><?php echo $this->tag->linkTo(array("clientes_moradas/new", "Nova Morada")); ?></li>
            </ul>
        </nav>
    </div>
    <div class="page-header">
        <h1>Pesquisa de Moradas de Clientes</h1>
    </div>
    <?php echo $this->getContent(); ?>
    <div class="row">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Cliente</th>
                    <th>Morada/Rua</th>
                    <th>Morada Cód.Postal/Localidade</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($page->items as $clientes_morada): ?>
                <tr>
                    <td><?php echo $clientes_morada->Clientes->getNome() ?></td>
                    <td><?php echo $clientes_morada->getMoradaRua() ?></td>
                    <td><?php echo $clientes_morada->getMoradaCpLocalidade() ?></td>
                    <td><?php echo $this->tag->linkTo(array("clientes_moradas/edit/" . $clientes_morada->getId(), "Editar")); ?></td>
                    <td><?php echo $this->tag->linkTo(array("clientes_moradas/delete/" . $clientes_morada->getId(), "Eliminar")); ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="row">
        <div class="col-sm-1">
            <p class="pagination" style="line-height: 1.42857;padding: 6px 12px;">
                <?php echo $page->current, "/", $page->total_pages ?>
            </p>
        </div>
        <div class="col-sm-11">
            <nav>
                <ul class="pagination">
                    <li><?php echo $this->tag->linkTo("clientes_moradas/search", " << ") ?></li>
                    <li><?php echo $this->tag->linkTo("clientes_moradas/search?page=" . $page->before, " < ") ?></li>
                    <li><?php echo $this->tag->linkTo("clientes_moradas/search?page=" . $page->next, " > ") ?></li>
                    <li><?php echo $this->tag->linkTo("clientes_moradas/search?page=" . $page->last, " >> ") ?></li>
                </ul>
            </nav>
        </div>
    </div>
</div>