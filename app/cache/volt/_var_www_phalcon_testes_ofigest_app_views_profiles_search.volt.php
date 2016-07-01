<?php echo $this->getContent(); ?>

<ul class="pager">
    <li class="previous pull-left">
        <?php echo $this->tag->linkTo(array('profiles/index', '&larr; Go Back')); ?>
    </li>
    <li class="pull-right">
        <?php echo $this->tag->linkTo(array('profiles/create', 'Create profiles', 'class' => 'btn btn-primary')); ?>
    </li>
</ul>

<?php $v156711511840717348361iterated = false; ?><?php $v156711511840717348361iterator = $page->items; $v156711511840717348361incr = 0; $v156711511840717348361loop = new stdClass(); $v156711511840717348361loop->length = count($v156711511840717348361iterator); $v156711511840717348361loop->index = 1; $v156711511840717348361loop->index0 = 1; $v156711511840717348361loop->revindex = $v156711511840717348361loop->length; $v156711511840717348361loop->revindex0 = $v156711511840717348361loop->length - 1; ?><?php foreach ($v156711511840717348361iterator as $profile) { ?><?php $v156711511840717348361loop->first = ($v156711511840717348361incr == 0); $v156711511840717348361loop->index = $v156711511840717348361incr + 1; $v156711511840717348361loop->index0 = $v156711511840717348361incr; $v156711511840717348361loop->revindex = $v156711511840717348361loop->length - $v156711511840717348361incr; $v156711511840717348361loop->revindex0 = $v156711511840717348361loop->length - ($v156711511840717348361incr + 1); $v156711511840717348361loop->last = ($v156711511840717348361incr == ($v156711511840717348361loop->length - 1)); ?><?php $v156711511840717348361iterated = true; ?>
<?php if ($v156711511840717348361loop->first) { ?>
<table class="table table-bordered table-striped" align="center">
    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Active?</th>
        </tr>
    </thead>
<?php } ?>
    <tbody>
        <tr>
            <td><?php echo $profile->id; ?></td>
            <td><?php echo $profile->name; ?></td>
            <td><?php echo ($profile->active == 'Y' ? 'Yes' : 'No'); ?></td>
            <td width="12%"><?php echo $this->tag->linkTo(array('profiles/edit/' . $profile->id, '<i class="glyphicon glyphicon-pencil"></i> Edit', 'class' => 'btn')); ?></td>
            <td width="12%"><?php echo $this->tag->linkTo(array('profiles/delete/' . $profile->id, '<i class="glyphicon glyphicon-remove"></i> Delete', 'class' => 'btn')); ?></td>
        </tr>
    </tbody>
<?php if ($v156711511840717348361loop->last) { ?>
    <tbody>
        <tr>
            <td colspan="10" align="right">
                <div class="btn-group">
                    <?php echo $this->tag->linkTo(array('profiles/search', '<i class="glyphicon glyphicon-fast-backward"></i>', 'class' => 'btn')); ?>
                    <?php echo $this->tag->linkTo(array('profiles/search?page=' . $page->before, '<i class="glyphicon glyphicon-step-backward"></i>', 'class' => 'btn ')); ?>
                    <?php echo $this->tag->linkTo(array('profiles/search?page=' . $page->next, '<i class="glyphicon glyphicon-step-forward"></i>', 'class' => 'btn')); ?>
                    <?php echo $this->tag->linkTo(array('profiles/search?page=' . $page->last, '<i class="glyphicon glyphicon-fast-forward"></i>', 'class' => 'btn')); ?>
                    <span class="help-inline"><?php echo $page->current; ?>/<?php echo $page->total_pages; ?></span>
                </div>
            </td>
        </tr>
    <tbody>
</table>
<?php } ?>
<?php $v156711511840717348361incr++; } if (!$v156711511840717348361iterated) { ?>
    No profiles are recorded
<?php } ?>
