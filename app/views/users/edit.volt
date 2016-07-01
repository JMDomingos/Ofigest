<form method="post" autocomplete="off">
<ul class="pager">
    <li class="previous pull-left">
        {{ link_to("users", "&larr; Voltar") }}
    </li>
    <li class="pull-right">
        {{ submit_button("Guardar", "class": "btn btn-big btn-success") }}
    </li>
</ul>
{{ content() }}
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
            {{ form.render("id") }}
            <div class="span4">
                <div class="clearfix">
                    <label for="name">Nome</label>
                    {{ form.render("name") }}
                </div>
                <div class="clearfix">
                    <label for="profilesId">Perfil</label>
                    {{ form.render("profilesId") }}
                </div>
                <div class="clearfix">
                    <label for="suspended">Conta suspendida?</label>
                    {{ form.render("suspended") }}
                </div>
            </div>
            <div class="span4">
                <div class="clearfix">
                    <label for="email">E-Mail</label>
                    {{ form.render("email") }}
                </div>
                <div class="clearfix">
                    <label for="banned">Conta Banida?</label>
                    {{ form.render("banned") }}
                </div>
                <div class="clearfix">
                    <label for="active">Conta Confirmada?</label>
                    {{ form.render("active") }}
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
                    {% for login in user.successLogins %}
                        <tr>
                            <td>{{ login.id }}</td>
                            <td>{{ login.ipAddress }}</td>
                            <td>{{ login.userAgent }}</td>
                        </tr>
                    {% else %}
                        <tr><td colspan="3" align="center">Este Utilizador ainda não fez login</td></tr>
                    {% endfor %}
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
                    {% for change in user.passwordChanges %}
                        <tr>
                            <td>{{ change.id }}</td>
                            <td>{{ change.ipAddress }}</td>
                            <td>{{ change.userAgent }}</td>
                            <td>{{ date("Y-m-d H:i:s", change.createdAt) }}</td>
                        </tr>
                    {% else %}
                        <tr><td colspan="3" align="center">Este Utilizador nunca modificou a sua password</td></tr>
                    {% endfor %}
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
                    {% for reset in user.resetPasswords %}
                        <tr>
                            <th>{{ reset.id }}</th>
                            <th>{{ date("Y-m-d H:i:s", reset.createdAt) }}
                            <th>{{ reset.reset == 'Y' ? 'Yes' : 'No' }}
                        </tr>
                    {% else %}
                        <tr><td colspan="3" align="center">Este Utilizador nunca pediu o reset da sua password</td></tr>
                    {% endfor %}
                    </tbody>
                </table>
            </p>
        </div>

    </div>
</div>
    </form>
</div>