{{ content() }}
<form method="post">
<h2>Gerir Permissões</h2>
<div class="well" align="center">
	<table class="perms">
		<tr>
			<td><label for="profileId">Perfil</label></td>
			{# , "class" : "form-control" #}
			<td>{{ select('profileId', profiles, 'using': ['id', 'name'], 'useEmpty': true, 'emptyText': '...',
				'emptyValue': '') }}</td>
			<td>{{ submit_button('Pesquisar / Guardar', 'class': 'btn btn-primary') }}</td>
		</tr>
	</table>
</div>
{% if request.isPost() and profile %}
{% for resource, actions in acl.getResources() %}
	<h3>Recurso: {{ resource }}</h3>
	<table class="table table-bordered table-striped" align="center">
		<thead>
			<tr>
				<th width="5%"></th>
				<th>Acções</th>
			</tr>
		</thead>
		<tbody>
			{% for action in actions %}
			<tr>
				<td align="center"><input type="checkbox" name="permissions[]" value="{{ resource ~ '.' ~ action }}"  {% if permissions[resource ~ '.' ~ action] is defined %} checked="checked" {% endif %}></td>
				<td>{{ acl.getActionDescription(action) ~ ' ' ~ resource }}</td>
			</tr>
			{% endfor %}
		</tbody>
	</table>
{% endfor %}
{% endif %}
</form>