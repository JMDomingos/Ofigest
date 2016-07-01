<div class="row">
    <nav>
        <ul class="pager">
            <li class="previous">{{ link_to("manutencoes/index", "Voltar") }}</li>
            <li class="next">{{ link_to("manutencoes/new", "Criar ") }}</li>
        </ul>
    </nav>
</div>
<div class="page-header">
    <h1>Pesquisa de Manutenções</h1>
</div>
{{ content() }}
<div class="row">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th>Data</th>
                <th>Cliente</th>
                <th>Matrícula</th>
                <th>Inspecionado Até</th>
                <th>Kilometragem</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        {% if page.items is defined %}
        {% for manutencoe in page.items %}
            <tr>
                <td>{{ manutencoe.getId() }}</td>
                <td>{{ manutencoe.getData() }}</td>
                <td>{{ manutencoe.getIdCliente() }} - {{ manutencoe.clientes.getNome() }}</td>
                <td>{{ manutencoe.getIdVeiculo() }} -
                    {{ manutencoe.veiculos.modelos.marcas.getMarca() }} -
                    {{ manutencoe.veiculos.modelos.getModelo() }}</td>
                <td>{{ manutencoe.getInspecionadoAte() }}</td>
                <td>{{ manutencoe.getKilometragem() }}</td>
                <td>{{ link_to("manutencoes/edit/"~manutencoe.getId(), "Editar") }}</td>
                <td>{{ link_to("manutencoes/delete/"~manutencoe.getId(), "Eliminar") }}</td>
            </tr>
            <tr>
                <td colspan="8">
                    <table class="table table-bordered table-striped">
                            <thead>
                            <th>Tipo de Intervencao</th>
                            <th>Descrição da Intervenção</th>
                            <th>Data</th>
                            <th>Custo</th>
                            <th colspan="2">{{ link_to("intervencoes/new/"~manutencoe.getId(), "Nova Intervencao") }}</th>
                        </thead>
                        {% if manutencoe.intervencoes|length is 0 %}
                        <tbody>
                            <td colspan="6">
                                <div class="alert alert-info">Não existem intervenções nesta manutenção.</div>
                            </td>
                        </tbody>
                        {% else %}
                        {% for intervencao in manutencoe.intervencoes %}
                        <tbody>
                            <td>{{ intervencao.intervencoesTipos.getDescTipoIntervencao() }}</td>
                            <td>{{ intervencao.getDescIntervencao() }}</td>
                            <td>{{ intervencao.getDataIntervencao() }}</td>
                            <td>{{ intervencao.getCustoIntervencao() }}</td>
                            <td>{{ link_to("intervencoes/edit/" ~ intervencao.id, 'Editar') }}</td>
                            <td>{{ link_to("intervencoes/delete/" ~ intervencao.id, 'Eliminar') }}</td>
                        </tbody>
                        {% endfor %}
                        {% endif %}
                    </table>
                </td>
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
                <li>{{ link_to("manutencoes/search", " << ") }}</li>
                <li>{{ link_to("manutencoes/search?page="~page.before, " < ") }}</li>
                <li>{{ link_to("manutencoes/search?page="~page.next, " > ") }}</li>
                <li>{{ link_to("manutencoes/search?page="~page.last, " >> ") }}</li>
            </ul>
        </nav>
    </div>
</div>
