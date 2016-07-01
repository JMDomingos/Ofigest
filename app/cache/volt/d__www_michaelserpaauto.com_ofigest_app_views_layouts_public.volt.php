                                     
        <nav id="mainNav" class="navbar navbar-custom" role="navigation">
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
                            <?php } ?> ><?= $this->tag->linkTo(['index', '<span class="glyphicon glyphicon-home"></span> Inicio']) ?></li><?php if (!(empty($logged_in))) { ?>
                            <li <?php if ('agenda_cli' == $this->dispatcher->getControllerName()) { ?>
                                class="active"
                            <?php } ?> ><?= $this->tag->linkTo(['agenda_cli/search', '<span class="glyphicon glyphicon-calendar"> </span> Agenda']) ?></li>
                            <li <?php if ('manutencoes_cli' == $this->dispatcher->getControllerName()) { ?>
                                class="active"
                            <?php } ?> ><?= $this->tag->linkTo(['manutencoes_cli', '<span class="glyphicon glyphicon-wrench"> </span> Manutenções']) ?></li>
                            <li <?php if ('veiculos_cli' == $this->dispatcher->getControllerName()) { ?>
                                class="active"
                            <?php } ?> ><?= $this->tag->linkTo(['veiculos_cli/search', ' Viaturas ']) ?></li> 
                            <li <?php if ('clientes_moradas_cli' == $this->dispatcher->getControllerName()) { ?>
                                class="active"
                            <?php } ?> ><?= $this->tag->linkTo(['clientes_moradas_cli/search', ' Moradas ']) ?></li>
                        <?php } ?>
                    </ul>
                  <ul class="nav navbar-nav navbar-right">
                      <li><?= $this->tag->linkTo(['contact', '<span class="glyphicon glyphicon-envelope"></span> Contacte-nos']) ?></li>
                      <li><?= $this->tag->linkTo(['about', '<span class="glyphicon glyphicon-info-sign"></span> Acerca']) ?></li><?php if (!(empty($logged_in))) { ?>
                          <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> <?= $this->auth->getName() ?> <b class="caret"></b></a>
                              <ul class="dropdown-menu">
                                  <li><?= $this->tag->linkTo(['users/modifyPerfil/' . $this->auth->getId(), '<span class="glyphicon glyphicon-user"></span> Editar Perfil']) ?></li>
                                  <li class="divider"></li>
                                  <li><?= $this->tag->linkTo(['users/changePassword', '<span class="glyphicon glyphicon-lock"></span> Alterar Password']) ?></li>
                              </ul>
                          </li>
                        <li><?= $this->tag->linkTo(['session/logout', '<span class="glyphicon glyphicon-log-out"></span> Logout']) ?></li>
                      <?php } else { ?>
                        <li><?= $this->tag->linkTo(['session/signup', '<span class="glyphicon glyphicon-user"></span> Aderir']) ?></li>
                        <li><?= $this->tag->linkTo(['session/login', '<span class="glyphicon glyphicon-log-in"></span> Login']) ?></li>
                      <?php } ?>
                  </ul>
                </div><!-- /.nav-collapse -->
            </div><!-- /navbar-inner -->
        </nav>
        <div class="container">
          <?= $this->flash->output() ?>
          <?= $this->getContent() ?>
          <hr>
          <footer>
              <div class="row">
                  <div class="col-sm-3">Made with love by José M. Domingos</div>
                  <div class="col-sm-3"><?= $this->tag->linkTo(['privacy', 'Politica de Privacidade']) ?></div>
                  <div class="col-sm-3"><?= $this->tag->linkTo(['terms', 'Termos de Utilização']) ?></div>
                  <div class="col-sm-3">© <?= date('Y') ?> José M. Domingos.</div>
              </div>
          </footer>
        </div>
