<?php
/**
 * @var \Phalcon\Mvc\View\Engine\Php $this
 */
?>
<?php use Phalcon\Tag; ?>
<div align="row center-block">
    <div class="row">
        <nav>
            <ul class="pager">
                <li class="previous"></li>
                <li class="next"><?php echo $this->tag->linkTo(array("clientes_moradas_cli/new", '<span class="glyphicon glyphicon-plus"></span> Nova Morada')); ?></li>
            </ul>
        </nav>
    </div>
    <div class="page-header">
        <h3>As suas Moradas</h3>
    </div>
    <?php echo $this->getContent(); ?>
    <div class="row">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Morada
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($page->items as $clientes_morada): ?>
                <tr>
                    <td><?php echo $clientes_morada->getMoradaRua() ?><br>
                        <?php echo $clientes_morada->getMoradaCpLocalidade() ?></td>
                    <td><?php echo $this->tag->linkTo(array("clientes_moradas_cli/edit/" . $clientes_morada->getId(), '<span class="glyphicon glyphicon-pencil"></span> Editar')); ?></td>
                    <td><?php echo $this->tag->linkTo(array("clientes_moradas_cli/delete/" . $clientes_morada->getId(), '<span class="glyphicon glyphicon-remove"></span> Eliminar')); ?></td>
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
                    <li>{{ link_to("clientes_moradas_cli/search", " <i class='glyphicon glyphicon-fast-backward'></i> ") }}</li>
                    <li>{{ link_to("clientes_moradas_cli/search?page="~page.before, " <i class='glyphicon glyphicon-step-backward'></i> ") }}</li>
                    <li>{{ link_to("clientes_moradas_cli/search?page="~page.next, " <i class='glyphicon glyphicon-step-forward'></i> ") }}</li>
                    <li>{{ link_to("clientes_moradas_cli/search?page="~page.last, " <i class='glyphicon glyphicon-fast-forward'></i> ") }}</li>
                </ul>
            </nav>
        </div>
    </div>
</div>