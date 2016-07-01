<?php echo $this->elements->getTabs(); ?>
<div align="row center-block">
    <div class="row">
        <nav>
            <ul class="pager">
                <li class="previous"><?php echo $this->tag->linkTo(array('intervencoes_tipos/index', 'Voltar')); ?></li>
                <li class="next"><?php echo $this->tag->linkTo(array('intervencoes_tipos/new', 'Criar novo ')); ?></li>
            </ul>
        </nav>
    </div>
    <div class="page-header">
        <h1>Tipos de Intervenções</h1>
    </div>
    <?php echo $this->getContent(); ?>
    <div class="row">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Id do Tipo de Intervenção</th>
                    <th>Descrição do Tipo de Intervenção</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            <?php if (isset($page->items)) { ?>
            <?php foreach ($page->items as $intervencoes_tipo) { ?>
                <tr>
                    <td><?php echo $intervencoes_tipo->getIdTipoIntervencao(); ?></td>
                    <td><?php echo $intervencoes_tipo->getDescTipoIntervencao(); ?></td>
                    <td><?php echo $this->tag->linkTo(array('intervencoes_tipos/edit/' . $intervencoes_tipo->getIdTipoIntervencao(), 'Editar')); ?></td>
                    <td><?php echo $this->tag->linkTo(array('intervencoes_tipos/delete/' . $intervencoes_tipo->getIdTipoIntervencao(), 'Eliminar')); ?></td>
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
                    <li><?php echo $this->tag->linkTo(array('intervencoes_tipos/search', ' << ')); ?></li>
                    <li><?php echo $this->tag->linkTo(array('intervencoes_tipos/search?page=' . $page->before, ' < ')); ?></li>
                    <li><?php echo $this->tag->linkTo(array('intervencoes_tipos/search?page=' . $page->next, ' > ')); ?></li>
                    <li><?php echo $this->tag->linkTo(array('intervencoes_tipos/search?page=' . $page->last, ' >> ')); ?></li>
                </ul>
            </nav>
        </div>
    </div>
</div>