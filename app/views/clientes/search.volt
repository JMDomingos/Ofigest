{{ elements.getTabs() }}
<div align="row center-block">
    <div class="row">
        <nav>
            <ul class="pager">
                <li class="previous">{{ link_to("clientes/index", "Voltar") }}</li>
                <li class="next">{{ link_to("clientes/new", "Novo Cliente") }}</li>
            </ul>
        </nav>
    </div>
    <div class="page-header">
        <h1>Pesquisa de Clientes</h1>
    </div>
    {{ content() }}
    <div class="row">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nome</th>
                    <th>Morada</th>
                    <th>Telefone</th>
                    <th>Telemovel</th>
                    <th>Email</th>
                    <th>NIF</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            {% if page.items is defined %}
            {% for cliente in page.items %}
                <tr>
                    <td>{{ cliente.getId() }}</td>
                    <td>{{ cliente.getNome() }}</td>
                    <td>{{ cliente.getMorada() }}</td>
                    <td>{{ cliente.getTelefone() }}</td>
                    <td>{{ cliente.getTelemovel() }}</td>
                    <td>{{ cliente.getEmail() }}</td>
                    <td>{{ cliente.getNif() }}</td>
                    <td>{{ link_to("clientes/edit/"~cliente.getId(), "Editar") }}</td>
                    <td>{{ link_to("clientes/delete/"~cliente.getId(), "Eliminar") }}</td>
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
                    <li>{{ link_to("clientes/search", " << ") }}</li>
                    <li>{{ link_to("clientes/search?page="~page.before, " < ") }}</li>
                    <li>{{ link_to("clientes/search?page="~page.next, " > ") }}</li>
                    <li>{{ link_to("clientes/search?page="~page.last, " >> ") }}</li>
                </ul>
            </nav>
        </div>
    </div>
</div>