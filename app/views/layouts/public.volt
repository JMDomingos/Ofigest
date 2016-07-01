                                     {# navbar-default navbar-inverse #}
        <nav id="mainNav" class="navbar navbar-custom" role="navigation">
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
                        {%- if not(logged_in is empty) %}
                            <li {% if 'agenda_cli' == dispatcher.getControllerName() %}
                                class="active"
                            {% endif %} >{{ link_to('agenda_cli/search', '<span class="glyphicon glyphicon-calendar"> </span> Agenda') }}</li>
                            <li {% if 'manutencoes_cli' == dispatcher.getControllerName() %}
                                class="active"
                            {% endif %} >{{ link_to('manutencoes_cli', '<span class="glyphicon glyphicon-wrench"> </span> Manutenções') }}</li>
                            <li {% if 'veiculos_cli' == dispatcher.getControllerName() %}
                                class="active"
                            {% endif %} >{{ link_to('veiculos_cli/search', ' Viaturas ') }}</li> {#<span class="fa fa-car"> </span>#}
                            <li {% if 'clientes_moradas_cli' == dispatcher.getControllerName() %}
                                class="active"
                            {% endif %} >{{ link_to('clientes_moradas_cli/search', ' Moradas ') }}</li>
                        {% endif %}
                    </ul>
                  <ul class="nav navbar-nav navbar-right">
                      <li>{{ link_to('contact', '<span class="glyphicon glyphicon-envelope"></span> Contacte-nos') }}</li>
                      <li>{{ link_to('about', '<span class="glyphicon glyphicon-info-sign"></span> Acerca') }}</li>
                      {%- if not(logged_in is empty) %}
                          <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> {{ auth.getName() }} <b class="caret"></b></a>
                              <ul class="dropdown-menu">
                                  <li>{{ link_to('users/modifyPerfil/'~auth.getId(), '<span class="glyphicon glyphicon-user"></span> Editar Perfil') }}</li>
                                  <li class="divider"></li>
                                  <li>{{ link_to('users/changePassword', '<span class="glyphicon glyphicon-lock"></span> Alterar Password') }}</li>
                              </ul>
                          </li>
                        <li>{{ link_to('session/logout', '<span class="glyphicon glyphicon-log-out"></span> Logout') }}</li>
                      {% else %}
                        <li>{{ link_to('session/signup', '<span class="glyphicon glyphicon-user"></span> Aderir') }}</li>
                        <li>{{ link_to('session/login', '<span class="glyphicon glyphicon-log-in"></span> Login') }}</li>
                      {% endif %}
                  </ul>
                </div><!-- /.nav-collapse -->
            </div><!-- /navbar-inner -->
        </nav>
        <div class="container">
          {{ flash.output() }}
          {{ content() }}
          <hr>
          <footer>
              <div class="row">
                  <div class="col-sm-3">Made with love by José M. Domingos</div>
                  <div class="col-sm-3">{{ link_to("privacy", "Politica de Privacidade") }}</div>
                  <div class="col-sm-3">{{ link_to("terms", "Termos de Utilização") }}</div>
                  <div class="col-sm-3">© {{ date("Y") }} José M. Domingos.</div>
              </div>
          </footer>
        </div>
