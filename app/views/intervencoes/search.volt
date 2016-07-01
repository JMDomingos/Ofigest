<div class="row">
    <nav>
        <ul class="pager">
            <li class="previous">{{ link_to("intervencoes/index", "Go Back") }}</li>
            <li class="next">{{ link_to("intervencoes/new", "Create ") }}</li>
        </ul>
    </nav>
</div>

<div class="page-header">
    <h1>Search result</h1>
</div>

{{ content() }}

<div class="row">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th>Id Of Manutencoes</th>
                <th>Id Of Tipo Of Intervencao</th>
                <th>Desc Of Intervencao</th>
                <th>Data Of Intervencao</th>
                <th>Custo Of Intervencao</th>

                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        {% if page.items is defined %}
        {% for intervencoe in page.items %}
            <tr>
                <td>{{ intervencoe.getId() }}</td>
            <td>{{ intervencoe.getIdManutencoes() }}</td>
            <td>{{ intervencoe.getIdTipoIntervencao() }}</td>
            <td>{{ intervencoe.getDescIntervencao() }}</td>
            <td>{{ intervencoe.getDataIntervencao() }}</td>
            <td>{{ intervencoe.getCustoIntervencao() }}</td>

                <td>{{ link_to("intervencoes/edit/"~intervencoe.getId(), "Edit") }}</td>
                <td>{{ link_to("intervencoes/delete/"~intervencoe.getId(), "Delete") }}</td>
            </tr>
        {% endfor %}
        {% endif %}
        </tbody>
    </table>
</div>

<div class="row">
    <div class="col-sm-1">
        <p class="pagination" style="line-height: 1.42857;padding: 6px 12px;">
            {{ page.current~"/"~page.total_pages }}
        </p>
    </div>
    <div class="col-sm-11">
        <nav>
            <ul class="pagination">
                <li>{{ link_to("intervencoes/search", "First") }}</li>
                <li>{{ link_to("intervencoes/search?page="~page.before, "Previous") }}</li>
                <li>{{ link_to("intervencoes/search?page="~page.next, "Next") }}</li>
                <li>{{ link_to("intervencoes/search?page="~page.last, "Last") }}</li>
            </ul>
        </nav>
    </div>
</div>
