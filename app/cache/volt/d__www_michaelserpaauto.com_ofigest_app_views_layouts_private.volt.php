        <nav id="mainNav" class="navbar navbar-default navbar-inverse" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <?= $this->tag->linkTo([null, 'class' => 'navbar-brand', 'OfiGest']) ?>
                </div>
                <div class="collapse navbar-collapse" id="navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                      <li <?php if ('index' == $this->dispatcher->getControllerName()) { ?>
                          class="active"
                      <?php } ?> ><?= $this->tag->linkTo(['index', '<span class="glyphicon glyphicon-home"></span> Inicio']) ?></li>
                      <li <?php if ('agenda' == $this->dispatcher->getControllerName() || 'manutencoes_agendadas' == $this->dispatcher->getControllerName()) { ?>
                          class="active"
                      <?php } ?> >
                          
                          <?php
                            if($marcacoesPorConfirmar>0) $messagesStr = '<span class="label label-danger">' . $marcacoesPorConfirmar . '</span> Agenda ';
                            else $messagesStr = '<span class="glyphicon glyphicon-calendar"> </span> Agenda ';
                          ?>
                          <?= $this->tag->linkTo(['agenda/index', $messagesStr]) ?>
                          </li>
                      <li <?php if ('manutencoes' == $this->dispatcher->getControllerName()) { ?>
                          class="active"
                      <?php } ?> ><?= $this->tag->linkTo(['manutencoes/index', '<span class="glyphicon glyphicon-wrench"> </span> Manutencoes']) ?></li>
                      <li <?php if ('gerir' == $this->dispatcher->getControllerName() || 'clientes' == $this->dispatcher->getControllerName() || 'veiculos' == $this->dispatcher->getControllerName() || 'clientes_veiculos' == $this->dispatcher->getControllerName() || 'clientes_moradas' == $this->dispatcher->getControllerName() || 'marcas' == $this->dispatcher->getControllerName() || 'modelos' == $this->dispatcher->getControllerName() || 'intervencoes_tipos' == $this->dispatcher->getControllerName()) { ?>
                          class="active"
                      <?php } ?> ><?= $this->tag->linkTo(['gerir/index', '<span class="glyphicon glyphicon-cog"></span> Gerir Tabelas']) ?></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li <?php if ('mensagens' == $this->dispatcher->getControllerName()) { ?>
                            class="active"
                        <?php } ?> >
                            
                            <?php
                            if($unreadMessagesCount>0) $messagesStr = '<span class="label label-warning">' . $unreadMessagesCount . '</span> Mensagens ';
                            else $messagesStr = '<span class="glyphicon glyphicon-envelope"> </span> Mensagens ';
                            ?>
                            <?= $this->tag->linkTo(['mensagens/index', $messagesStr]) ?> </li>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <span class="glyphicon glyphicon-cog"></span> Manutenção <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                                <li><?= $this->tag->linkTo(['gerir/index', '<span class="glyphicon glyphicon-cog"></span> Gerir outras Tabelas']) ?></li>
                                <li class="divider"></li>
                                <li><?= $this->tag->linkTo(['users', '<span class="glyphicon glyphicon-user"></span> Utilizadores']) ?></li>
                                <li><?= $this->tag->linkTo(['profiles', '<span class="glyphicon glyphicon-transfer"></span> Perfis']) ?></li>
                                <li><?= $this->tag->linkTo(['permissions', '<span class="glyphicon glyphicon-floppy-disk"></span> Permissões']) ?></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <span class="glyphicon glyphicon-user"></span> <?= $this->auth->getName() ?> <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                                <li><?= $this->tag->linkTo(['users/modifyPerfil', '<span class="glyphicon glyphicon-briefcase"></span> Editar Perfil']) ?></li>
                                <li class="divider"></li>
                                <li><?= $this->tag->linkTo(['users/changePassword', '<span class="glyphicon glyphicon-lock"></span> Alterar Password']) ?></li>
                            </ul>
                        </li>
                        <li><?= $this->tag->linkTo(['session/logout', '<span class="glyphicon glyphicon-log-out"></span> Logout']) ?></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">
            <?= $this->flash->output() ?>
            <?= $this->getContent() ?>
            <hr>
            <footer>
                <div class="col-sm-3">Made with love by José M. Domingos</div>
                <div class="col-sm-3"><?= $this->tag->linkTo(['privacy', 'Politica de Privacidade']) ?></div>
                <div class="col-sm-3"><?= $this->tag->linkTo(['terms', 'Termos de Utilização']) ?></div>
                <div class="col-sm-3">© <?= date('Y') ?> José M. Domingos.</div>
            </footer>
        </div>