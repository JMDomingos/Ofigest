<form method="post" autocomplete="off">
<ul class="pager">
    <li class="previous pull-left">
        <?php echo $this->tag->linkTo(array('users', '&larr; Voltar')); ?>
    </li>
    <li class="pull-right">
        <?php echo $this->tag->submitButton(array('Guardar', 'class' => 'btn btn-big btn-success')); ?>
    </li>
</ul>
<?php echo $this->getContent(); ?>
<div class="center scaffold">
    <h2>Consultar/Editar Utilizador</h2>
    <ul class="nav nav-tabs">
        <li class="active"><a href="#A" data-toggle="tab">Informação Básica</a></li>
        <li><a href="#B" data-toggle="tab">Histórico Logins</a></li>
        <li><a href="#C" data-toggle="tab">Alterações de Password</a></li>
        <li><a href="#D" data-toggle="tab">Resets de Passwords</a></li>
    </ul>
<div class="tabbable">
    <div class="tab-content">
        <div class="tab-pane active" id="A">
            <?php echo $form->render('id'); ?>
            <div class="span4">
                <div class="clearfix">
                    <label for="name">Nome</label>
                    <?php echo $form->render('name'); ?>
                </div>
                <div class="clearfix">
                    <label for="profilesId">Perfil</label>
                    <?php echo $form->render('profilesId'); ?>
                </div>
                <div class="clearfix">
                    <label for="suspended">Conta suspendida?</label>
                    <?php echo $form->render('suspended'); ?>
                </div>
            </div>
            <div class="span4">
                <div class="clearfix">
                    <label for="email">E-Mail</label>
                    <?php echo $form->render('email'); ?>
                </div>
                <div class="clearfix">
                    <label for="banned">Conta Banida?</label>
                    <?php echo $form->render('banned'); ?>
                </div>
                <div class="clearfix">
                    <label for="active">Conta Confirmada?</label>
                    <?php echo $form->render('active'); ?>
                </div>
            </div>
        </div>
        <div class="tab-pane" id="B">
            <p>
                <table class="table table-bordered table-striped" align="center">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th nowrap="">Endereço IP</th>
                            <th>User Agent</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $v67068204059102234421iterated = false; ?><?php foreach ($user->successLogins as $login) { ?><?php $v67068204059102234421iterated = true; ?>
                        <tr>
                            <td><?php echo $login->id; ?></td>
                            <td><?php echo $login->ipAddress; ?></td>
                            <td><?php echo $login->userAgent; ?></td>
                        </tr>
                    <?php } if (!$v67068204059102234421iterated) { ?>
                        <tr><td colspan="3" align="center">Este Utilizador ainda não fez login</td></tr>
                    <?php } ?>
                    </tbody>
                </table>
            </p>
        </div>
        <div class="tab-pane" id="C">
            <p>
                <table class="table table-bordered table-striped" align="center">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th nowrap="">Endereço IP</th>
                            <th>User Agent</th>
                            <th>Data</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $v67068204059102234421iterated = false; ?><?php foreach ($user->passwordChanges as $change) { ?><?php $v67068204059102234421iterated = true; ?>
                        <tr>
                            <td><?php echo $change->id; ?></td>
                            <td><?php echo $change->ipAddress; ?></td>
                            <td><?php echo $change->userAgent; ?></td>
                            <td><?php echo date('Y-m-d H:i:s', $change->createdAt); ?></td>
                        </tr>
                    <?php } if (!$v67068204059102234421iterated) { ?>
                        <tr><td colspan="3" align="center">Este Utilizador nunca modificou a sua password</td></tr>
                    <?php } ?>
                    </tbody>
                </table>
            </p>
        </div>
        <div class="tab-pane" id="D">
            <p>
                <table class="table table-bordered table-striped" align="center">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Data</th>
                            <th>Reset?</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $v67068204059102234421iterated = false; ?><?php foreach ($user->resetPasswords as $reset) { ?><?php $v67068204059102234421iterated = true; ?>
                        <tr>
                            <th><?php echo $reset->id; ?></th>
                            <th><?php echo date('Y-m-d H:i:s', $reset->createdAt); ?>
                            <th><?php echo ($reset->reset == 'Y' ? 'Yes' : 'No'); ?>
                        </tr>
                    <?php } if (!$v67068204059102234421iterated) { ?>
                        <tr><td colspan="3" align="center">Este Utilizador nunca pediu o reset da sua password</td></tr>
                    <?php } ?>
                    </tbody>
                </table>
            </p>
        </div>

    </div>
</div>
    </form>
</div>