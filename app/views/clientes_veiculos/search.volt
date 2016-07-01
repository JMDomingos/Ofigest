{{ elements.getTabs() }}
<div align="row center-block">
    <div class="row">
        <nav>
            <ul class="pager">
                <li class="previous">{{ link_to("clientes_veiculos/index", "Voltar") }}</li>
                <li class="next">{{ link_to("clientes_veiculos/new", "Associar nova Viatura ") }}</li>
            </ul>
        </nav>
    </div>

    <div class="page-header">
        <h1>Resultado da Pesquisa</h1>
    </div>
    {{ content() }}
    <div class="row">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Cliente</th>
                    <th>Viatura</th>
                    <th>Data</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            {% if page.items is defined %}
            {% for clientes_veiculo in page.items %}
                <tr>
                    <td>{{ clientes_veiculo.getIdCliente() }} - {{ clientes_veiculo.clientes.getNome() }}</td>
                    <td>{{ clientes_veiculo.getIdVeiculo() }} -
                        {{ clientes_veiculo.veiculos.modelos.marcas.getMarca() }} -
                        {{ clientes_veiculo.veiculos.modelos.getModelo() }}
                    </td>
                    <td>{{ clientes_veiculo.getData() }}</td>
                    <td>{{ link_to("clientes_veiculos/edit/"~clientes_veiculo.getIdCliente(), "Editar") }}</td>
                    <td>{{ link_to("clientes_veiculos/delete/"~clientes_veiculo.getIdCliente(), "Eliminar") }}</td>
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
                    <li>{{ link_to("clientes_veiculos/search", " << ") }}</li>
                    <li>{{ link_to("clientes_veiculos/search?page="~page.before, " < ") }}</li>
                    <li>{{ link_to("clientes_veiculos/search?page="~page.next, " > ") }}</li>
                    <li>{{ link_to("clientes_veiculos/search?page="~page.last, " >> ") }}</li>
                </ul>
            </nav>
        </div>
    </div>
</div>