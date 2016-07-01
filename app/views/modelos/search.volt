{{ elements.getTabs() }}
<div align="row center-block">
    <div class="row">
        <nav>
            <ul class="pager">
                <li class="previous">{{ link_to("modelos/index", "Voltar") }}</li>
                <li class="next">{{ link_to("modelos/new", "Novo Modelo") }}</li>
            </ul>
        </nav>
    </div>
    <div class="page-header">
        <h1>Pesquisa de Modelos</h1>
    </div>
    {{ content() }}
    <div class="row">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            {% if page.items is defined %}
            {% for modelo in page.items %}
                <tr>
                    <td>{{ modelo.getId() }}</td>
                    <td>{{ modelo.getMarca() }} - {{ modelo.marcas.getMarca() }}</td>
                    <td>{{ modelo.getModelo() }}</td>
                    <td>{{ link_to("modelos/edit/"~modelo.getId(), "Editar") }}</td>
                    <td>{{ link_to("modelos/delete/"~modelo.getId(), "Eliminar") }}</td>
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
                    <li>{{ link_to("modelos/search", " << ") }}</li>
                    <li>{{ link_to("modelos/search?page="~page.before, " < ") }}</li>
                    <li>{{ link_to("modelos/search?page="~page.next, " > ") }}</li>
                    <li>{{ link_to("modelos/search?page="~page.last, " >> ") }}</li>
                </ul>
            </nav>
        </div>
    </div>
</div>