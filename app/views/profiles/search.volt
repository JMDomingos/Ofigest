{{ content() }}

<ul class="pager">
    <li class="previous pull-left">
        {{ link_to("profiles/index", "&larr; Go Back") }}
    </li>
    <li class="pull-right">
        {{ link_to("profiles/create", "Create profiles", "class": "btn btn-primary") }}
    </li>
</ul>

{% for profile in page.items %}
{% if loop.first %}
<table class="table table-bordered table-striped" align="center">
    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Active?</th>
        </tr>
    </thead>
{% endif %}
    <tbody>
        <tr>
            <td>{{ profile.id }}</td>
            <td>{{ profile.name }}</td>
            <td>{{ profile.active == 'Y' ? 'Yes' : 'No' }}</td>
            <td width="12%">{{ link_to("profiles/edit/" ~ profile.id, '<i class="glyphicon glyphicon-pencil"></i> Edit', "class": "btn") }}</td>
            <td width="12%">{{ link_to("profiles/delete/" ~ profile.id, '<i class="glyphicon glyphicon-remove"></i> Delete', "class": "btn") }}</td>
        </tr>
    </tbody>
{% if loop.last %}
    <tbody>
        <tr>
            <td colspan="10" align="right">
                <div class="btn-group">
                    {{ link_to("profiles/search", '<i class="glyphicon glyphicon-fast-backward"></i>', "class": "btn") }}
                    {{ link_to("profiles/search?page=" ~ page.before, '<i class="glyphicon glyphicon-step-backward"></i>', "class": "btn ") }}
                    {{ link_to("profiles/search?page=" ~ page.next, '<i class="glyphicon glyphicon-step-forward"></i>', "class": "btn") }}
                    {{ link_to("profiles/search?page=" ~ page.last, '<i class="glyphicon glyphicon-fast-forward"></i>', "class": "btn") }}
                    <span class="help-inline">{{ page.current }}/{{ page.total_pages }}</span>
                </div>
            </td>
        </tr>
    <tbody>
</table>
{% endif %}
{% else %}
    No profiles are recorded
{% endfor %}
