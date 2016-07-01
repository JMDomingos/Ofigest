{{ elements.getTabs() }}
<div align="row center-block">
    <div class="row">
        <nav>
            <ul class="pager">
                <li class="previous">{{ link_to("veiculos/index", "Voltar") }}</li>
                <li class="next">{{ link_to("veiculos/new", "Criar ") }}</li>
            </ul>
        </nav>
    </div>
    <div class="page-header">
        <h1>Veiculos</h1>
    </div>
    {{ content() }}
    <div class="row">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Matricula</th>
                    <th>Marca / Modelo</th>
                    <th>Num. do Quadro</th>
                    <th>Ano</th>
                    <th>Mes</th>
                    <th>Cor</th>
                    <th>Tam. Pneus</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            {% if page.items is defined %}
            {% for veiculo in page.items %}
                <tr>
                    <td>{{ veiculo.getMatricula() }}</td>
                    <td>{{ veiculo.getModelo() }} - {{ veiculo.modelos.marcas.getMarca() }} - {{ veiculo.modelos.getModelo() }}</td>
                    <td>{{ veiculo.getNQuadro() }}</td>
                    <td>{{ veiculo.getAno() }}</td>
                    <td>{{ veiculo.getMes() }}</td>
                    <td>{{ veiculo.getCor() }}</td>
                    <td>{{ veiculo.getTamanhoPneus() }}</td>
                    <td>{{ link_to("veiculos/edit/"~veiculo.getMatricula(), "Editar") }}</td>
                    <td>{{ link_to("veiculos/delete/"~veiculo.getMatricula(), "Eliminar") }}</td>
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
                    <li>{{ link_to("veiculos/search", " << ") }}</li>
                    <li>{{ link_to("veiculos/search?page="~page.before, " < ") }}</li>
                    <li>{{ link_to("veiculos/search?page="~page.next, " > ") }}</li>
                    <li>{{ link_to("veiculos/search?page="~page.last, " >> ") }}</li>
                </ul>
            </nav>
        </div>
    </div>
</div>