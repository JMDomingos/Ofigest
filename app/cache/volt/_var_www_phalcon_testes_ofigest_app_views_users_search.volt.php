<?php echo $this->getContent(); ?>

<ul class="pager">
    <li class="previous pull-left">
        <?php echo $this->tag->linkTo(array('users/index', '&larr; Voltar')); ?>
    </li>
    <li class="pull-right">
        <?php echo $this->tag->linkTo(array('users/create', 'Novo Utilizador')); ?>
    </li>
</ul>

<?php $v179722621246103544341iterated = false; ?><?php $v179722621246103544341iterator = $page->items; $v179722621246103544341incr = 0; $v179722621246103544341loop = new stdClass(); $v179722621246103544341loop->length = count($v179722621246103544341iterator); $v179722621246103544341loop->index = 1; $v179722621246103544341loop->index0 = 1; $v179722621246103544341loop->revindex = $v179722621246103544341loop->length; $v179722621246103544341loop->revindex0 = $v179722621246103544341loop->length - 1; ?><?php foreach ($v179722621246103544341iterator as $user) { ?><?php $v179722621246103544341loop->first = ($v179722621246103544341incr == 0); $v179722621246103544341loop->index = $v179722621246103544341incr + 1; $v179722621246103544341loop->index0 = $v179722621246103544341incr; $v179722621246103544341loop->revindex = $v179722621246103544341loop->length - $v179722621246103544341incr; $v179722621246103544341loop->revindex0 = $v179722621246103544341loop->length - ($v179722621246103544341incr + 1); $v179722621246103544341loop->last = ($v179722621246103544341incr == ($v179722621246103544341loop->length - 1)); ?><?php $v179722621246103544341iterated = true; ?>
<?php if ($v179722621246103544341loop->first) { ?>
<table class="table table-bordered table-striped" align="center">
    <thead>
        <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Perfil</th>
            <th>Banido?</th>
            <th>Suspenso?</th>
            <th>Confirmado?</th>
        </tr>
    </thead>
<?php } ?>
    <tbody>
        <tr>
            <td><?php echo $user->id; ?></td>
            <td><?php echo $user->name; ?></td>
            <td><?php echo $user->email; ?></td>
            <td><?php echo $user->profile->name; ?></td>
            <td><?php echo ($user->banned == 'Y' ? 'Sim' : 'Não'); ?></td>
            <td><?php echo ($user->suspended == 'Y' ? 'Sim' : 'Não'); ?></td>
            <td><?php echo ($user->active == 'Y' ? 'Sim' : 'Não'); ?></td>
            <td width="12%"><?php echo $this->tag->linkTo(array('users/edit/' . $user->id, '<i class="glyphicon glyphicon-pencil"></i> Editar', 'class' => 'btn')); ?></td>
            <td width="12%"><?php echo $this->tag->linkTo(array('users/delete/' . $user->id, '<i class="glyphicon glyphicon-remove"></i> Eliminar', 'class' => 'btn')); ?></td>
        </tr>
    </tbody>
<?php if ($v179722621246103544341loop->last) { ?>
    <tbody>
        <tr>
            <td colspan="10" align="right">
                <div class="btn-group">
                    <?php echo $this->tag->linkTo(array('users/search', '<i class="glyphicon glyphicon-fast-backward"></i>', 'class' => 'btn')); ?>
                    <?php echo $this->tag->linkTo(array('users/search?page=' . $page->before, '<i class="glyphicon glyphicon-step-backward"></i>', 'class' => 'btn ')); ?>
                    <?php echo $this->tag->linkTo(array('users/search?page=' . $page->next, '<i class="glyphicon glyphicon-step-forward"></i>', 'class' => 'btn')); ?>
                    <?php echo $this->tag->linkTo(array('users/search?page=' . $page->last, '<i class="glyphicon glyphicon-fast-forward"></i>', 'class' => 'btn')); ?>
                    <span class="help-inline"><?php echo $page->current; ?>/<?php echo $page->total_pages; ?></span>
                </div>
            </td>
        </tr>
    <tbody>
</table>
<?php } ?>
<?php $v179722621246103544341incr++; } if (!$v179722621246103544341iterated) { ?>
    No users are recorded
<?php } ?>
