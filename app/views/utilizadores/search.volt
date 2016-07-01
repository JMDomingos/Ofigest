<div class="row">
    <nav>
        <ul class="pager">
            <li class="previous">{{ link_to("utilizadores/index", "Go Back") }}</li>
            <li class="next">{{ link_to("utilizadores/new", "Create ") }}</li>
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
            <th>Nome</th>
            <th>Email</th>

                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        {% if page.items is defined %}
        {% for user in page.items %}
            <tr>
                <td>{{ user.getId() }}</td>
            <td>{{ user.getNome() }}</td>
            <td>{{ user.getEmail() }}</td>

                <td>{{ link_to("utilizadores/edit/"~user.getId(), "Edit") }}</td>
                <td>{{ link_to("utilizadores/delete/"~user.getId(), "Delete") }}</td>
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
                <li>{{ link_to("utilizadores/search", "First") }}</li>
                <li>{{ link_to("utilizadores/search?page="~page.before, "Previous") }}</li>
                <li>{{ link_to("utilizadores/search?page="~page.next, "Next") }}</li>
                <li>{{ link_to("utilizadores/search?page="~page.last, "Last") }}</li>
            </ul>
        </nav>
    </div>
</div>
