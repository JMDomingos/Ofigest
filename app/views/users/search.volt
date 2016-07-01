{{ content() }}

<ul class="pager">
    <li class="previous pull-left">
        {{ link_to("users/index", "&larr; Voltar") }}
    </li>
    <li class="pull-right">
        {{ link_to("users/create", "Novo Utilizador") }}
    </li>
</ul>

{% for user in page.items %}
{% if loop.first %}
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
{% endif %}
    <tbody>
        <tr>
            <td>{{ user.id }}</td>
            <td>{{ user.name }}</td>
            <td>{{ user.email }}</td>
            <td>{{ user.profile.name }}</td>
            <td>{{ user.banned == 'Y' ? 'Sim' : 'Não' }}</td>
            <td>{{ user.suspended == 'Y' ? 'Sim' : 'Não' }}</td>
            <td>{{ user.active == 'Y' ? 'Sim' : 'Não' }}</td>
            <td width="12%">{{ link_to("users/edit/" ~ user.id, '<i class="glyphicon glyphicon-pencil"></i> Editar', "class": "btn") }}</td>
            <td width="12%">{{ link_to("users/delete/" ~ user.id, '<i class="glyphicon glyphicon-remove"></i> Eliminar', "class": "btn") }}</td>
        </tr>
    </tbody>
{% if loop.last %}
    <tbody>
        <tr>
            <td colspan="10" align="right">
                <div class="btn-group">
                    {{ link_to("users/search", '<i class="glyphicon glyphicon-fast-backward"></i>', "class": "btn") }}
                    {{ link_to("users/search?page=" ~ page.before, '<i class="glyphicon glyphicon-step-backward"></i>', "class": "btn ") }}
                    {{ link_to("users/search?page=" ~ page.next, '<i class="glyphicon glyphicon-step-forward"></i>', "class": "btn") }}
                    {{ link_to("users/search?page=" ~ page.last, '<i class="glyphicon glyphicon-fast-forward"></i>', "class": "btn") }}
                    <span class="help-inline">{{ page.current }}/{{ page.total_pages }}</span>
                </div>
            </td>
        </tr>
    <tbody>
</table>
{% endif %}
{% else %}
    No users are recorded
{% endfor %}
