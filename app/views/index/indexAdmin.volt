{{ content() }}
<div class="page-header">
    <h2>Administração do Ofigest</h2>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="jumbotron">
            <h3>Agendamentos por confirmar</h3>
            <table class="table-condensed table-striped">
                <thead>
                <tr>
                    <th>Data</th>
                    <th>Cliente</th>
                    <th>Viatura</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                {% for marcacao in marcacoes %}
                    <tr>
                        <td>{{ marcacao.getData() }}</td>
                        <td>{{ marcacao.Clientes.getNome() }}</td>
                        <td>{{ marcacao.getMatricula() }}</td>
                        <td>{{ link_to("manutencoes_agendadas/edit/"~marcacao.getId(), "Confirmar") }}</td>
                    </tr>
                {% endfor %}

                </tbody>
            </table>
        </div>
    </div>
    <div class="col-md-6">
        <div class="jumbotron">
            <h3>Novos Contatos</h3>
            <table class="table-condensed table-striped">
                <thead>
                <tr>
                    <th>Data</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                {% for mensagem in unreadMessages %}
                    <tr>
                        <td>{{ mensagem.getCreatedAt() }}</td>
                        <td>{{ mensagem.getNome() }}</td>
                        <td>{{ mensagem.getEmail() }}</td>
                        <td>{{ link_to("contact/ler/"~marcacao.getId(), "Ler") }}</td>
                    </tr>
                {% endfor %}

                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="jumbotron">
            <h3>Lembretes</h3>
        </div>
    </div>
    <div class="col-md-6">
        <div class="jumbotron">
            <h3>Estatisticas de utilização</h3>
        </div>
    </div>
</div>