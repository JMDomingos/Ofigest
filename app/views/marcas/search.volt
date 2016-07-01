{{ elements.getTabs() }}
<div align="row center-block">
    <div class="row">
        <nav>
            <ul class="pager">
                <li class="previous">{# {{ link_to("marcas/index", "Go Back") }} #}</li>
                <li class="next">{{ link_to("marcas/new", "Nova Marca") }}</li>
            </ul>
        </nav>
    </div>
    <div class="page-header">
        <h1>Marcas de Veiculos</h1>
    </div>
    {{ content() }}
    <div class="row">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Marca</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            {% if page.items is defined %}
            {% for marca in page.items %}
                <tr>
                    <td>{{ marca.getId() }}</td>
                    <td>{{ marca.getMarca() }}</td>
                    <td>{{ link_to("marcas/edit/"~marca.getId(), "Editar") }}</td>
                    <td>{{ link_to("marcas/delete/"~marca.getId(), "Eliminar") }}</td>
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
                    <li>{{ link_to("marcas/search", " << ") }}</li>
                    <li>{{ link_to("marcas/search?page="~page.before, " < ") }}</li>
                    <li>{{ link_to("marcas/search?page="~page.next, " > ") }}</li>
                    <li>{{ link_to("marcas/search?page="~page.last, " >> ") }}</li>
                </ul>
            </nav>
        </div>
    </div>
</div>