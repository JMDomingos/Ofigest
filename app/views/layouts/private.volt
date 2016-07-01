        <nav id="mainNav" class="navbar navbar-default navbar-inverse" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    {{ link_to(null, 'class': 'navbar-brand', 'OfiGest')}}
                </div>
                <div class="collapse navbar-collapse" id="navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                      <li {% if 'index' == dispatcher.getControllerName() %}
                          class="active"
                      {% endif %} >{{ link_to('index', '<span class="glyphicon glyphicon-home"></span> Inicio') }}</li>
                      <li {% if 'agenda' == dispatcher.getControllerName() or
                                'manutencoes_agendadas' == dispatcher.getControllerName() %}
                          class="active"
                      {% endif %} >
                          {# Vê se têm mensagens por ler #}
                          <?php
                            if($marcacoesPorConfirmar>0) $messagesStr = '<span class="label label-danger">' . $marcacoesPorConfirmar . '</span> Agenda ';
                            else $messagesStr = '<span class="glyphicon glyphicon-calendar"> </span> Agenda ';
                          ?>
                          {{ link_to('agenda/index', messagesStr ) }}
                          </li>
                      <li {% if 'manutencoes' == dispatcher.getControllerName() %}
                          class="active"
                      {% endif %} >{{ link_to('manutencoes/index', '<span class="glyphicon glyphicon-wrench"> </span> Manutencoes') }}</li>
                      <li {% if 'gerir' == dispatcher.getControllerName() or
                                'clientes' == dispatcher.getControllerName() or
                                'veiculos' == dispatcher.getControllerName() or
                                'clientes_veiculos' == dispatcher.getControllerName() or
                                'clientes_moradas' == dispatcher.getControllerName() or
                                'marcas' == dispatcher.getControllerName() or
                                'modelos' == dispatcher.getControllerName() or
                                'intervencoes_tipos' == dispatcher.getControllerName() %}
                          class="active"
                      {% endif %} >{{ link_to('gerir/index', '<span class="glyphicon glyphicon-cog"></span> Gerir Tabelas') }}</li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li {% if 'mensagens' == dispatcher.getControllerName() %}
                            class="active"
                        {% endif %} >
                            {# Vê se têm mensagens por ler #}
                            <?php
                            if($unreadMessagesCount>0) $messagesStr = '<span class="label label-warning">' . $unreadMessagesCount . '</span> Mensagens ';
                            else $messagesStr = '<span class="glyphicon glyphicon-envelope"> </span> Mensagens ';
                            ?>
                            {{ link_to('mensagens/index', messagesStr ) }} </li>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <span class="glyphicon glyphicon-cog"></span> Manutenção <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                                <li>{{ link_to('gerir/index', '<span class="glyphicon glyphicon-cog"></span> Gerir outras Tabelas') }}</li>
                                <li class="divider"></li>
                                <li>{{ link_to('users', '<span class="glyphicon glyphicon-user"></span> Utilizadores') }}</li>
                                <li>{{ link_to('profiles', '<span class="glyphicon glyphicon-transfer"></span> Perfis') }}</li>
                                <li>{{ link_to('permissions', '<span class="glyphicon glyphicon-floppy-disk"></span> Permissões') }}</li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <span class="glyphicon glyphicon-user"></span> {{ auth.getName() }} <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                                <li>{{ link_to('users/modifyPerfil', '<span class="glyphicon glyphicon-briefcase"></span> Editar Perfil') }}</li>
                                <li class="divider"></li>
                                <li>{{ link_to('users/changePassword', '<span class="glyphicon glyphicon-lock"></span> Alterar Password') }}</li>
                            </ul>
                        </li>
                        <li>{{ link_to('session/logout', '<span class="glyphicon glyphicon-log-out"></span> Logout') }}</li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">
            {{ flash.output() }}
            {{ content() }}
            <hr>
            <footer>
                <div class="col-sm-3">Made with love by José M. Domingos</div>
                <div class="col-sm-3">{{ link_to("privacy", "Politica de Privacidade") }}</div>
                <div class="col-sm-3">{{ link_to("terms", "Termos de Utilização") }}</div>
                <div class="col-sm-3">© {{ date("Y") }} José M. Domingos.</div>
            </footer>
        </div>