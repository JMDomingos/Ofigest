
<form method="post" autocomplete="off">

<ul class="pager">
    <li class="previous pull-left">
        <?php echo $this->tag->linkTo(array('users', '&larr; Go Back')); ?>
    </li>
    <li class="pull-right">
        <?php echo $this->tag->submitButton(array('Save', 'class' => 'btn btn-success')); ?>
    </li>
</ul>

<?php echo $this->getContent(); ?>

<div class="center scaffold">
    <h2>Create a User</h2>

    <div class="clearfix">
        <label for="name">Name</label>
        <?php echo $form->render('name'); ?>
    </div>

    <div class="clearfix">
        <label for="email">E-Mail</label>
        <?php echo $form->render('email'); ?>
    </div>

    <div class="clearfix">
        <label for="profilesId">Profile</label>
        <?php echo $form->render('profilesId'); ?>
    </div>

</div>

</form>