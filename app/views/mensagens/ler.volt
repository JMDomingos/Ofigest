<div align="row center-block">
    <div class="row">
        <nav>
            <ul class="pager">
                <li class="previous">{{ link_to("mensagens/index", "Voltar") }}</li>
                <li class="next"></li>
            </ul>
        </nav>
    </div>
    <div class="page-header">
        <h1>Ler Mensagem</h1>
    </div>
    {{ content() }}
    <div class="row">
        <table class="table">
            <tbody>
                <tr>
                    <th>Data</th>
                    <td>{{ mensagem.getCreatedAt() }}</td>
                </tr>
                <tr>
                    <th>Nome</th>
                    <td>{{ mensagem.getNome() }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td><a href="mailto:{{ mensagem.getEmail() }}">{{ mensagem.getEmail() }}</a></td>
                </tr>
                <tr>
                    <th>Mensagem</th>
                    <td>{{ mensagem.getMensagem() }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>