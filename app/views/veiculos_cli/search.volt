<div align="row center-block">
    <div class="row">
        <nav>
            <ul class="pager">
                <li class="previous">
                    {# {{ link_to("veiculos_cli/index", '<span class="glyphicon glyphicon-search"></span> Pesquisar') }} #}
                </li>
                <li class="next">{{ link_to("veiculos_cli/new", '<span class="glyphicon glyphicon-plus"></span> Nova Viatura ') }}</li>
            </ul>
        </nav>
    </div>
    <div class="page-header">
        <h3>As suas Viaturas</h3>
    </div>
    {{ content() }}
    <div class="row">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Matricula</th>
                    <th>Marca / Modelo</th>
                    {#
                    <th>Num. do Quadro</th>
                    <th>Ano</th>
                    <th>Mes</th>
                    <th>Cor</th>
                    <th>Tam. Pneus</th>
                    #}
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
                    {#
                    <td>{{ veiculo.getNQuadro() }}</td>
                    <td>{{ veiculo.getAno() }}</td>
                    <td>{{ veiculo.getMes() }}</td>
                    <td>{{ veiculo.getCor() }}</td>
                    <td>{{ veiculo.getTamanhoPneus() }}</td>
                    #}
                    <td>{{ link_to("veiculos_cli/edit/"~veiculo.getMatricula(), '<span class="glyphicon glyphicon-pencil"></span> Editar') }}</td>
                    <td>{{ link_to("veiculos_cli/delete/"~veiculo.getMatricula(), '<span class="glyphicon glyphicon-remove"></span> Eliminar') }}</td>
                </tr>
            {% endfor %}
            {% endif %}
            </tbody>
        </table>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <p class="pagination" style="line-height: 1.42857;padding: 6px 12px;">
                {{ page.current~"/"~page.total_pages }}
            </p>
        </div>
        <div class="col-sm-8">
            <nav>
                <ul class="pagination">
                    <li>{{ link_to("veiculos_cli/search", " <i class='glyphicon glyphicon-fast-backward'></i> ") }}</li>
                    <li>{{ link_to("veiculos_cli/search?page="~page.before, " <i class='glyphicon glyphicon-step-backward'></i> ") }}</li>
                    <li>{{ link_to("veiculos_cli/search?page="~page.next, " <i class='glyphicon glyphicon-step-forward'></i> ") }}</li>
                    <li>{{ link_to("veiculos_cli/search?page="~page.last, " <i class='glyphicon glyphicon-fast-forward'></i> ") }}</li>
                </ul>
            </nav>
        </div>
    </div>
</div>