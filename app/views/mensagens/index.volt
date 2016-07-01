<div align="row center-block">
    <div class="page-header">
        <h1>Mensagens</h1>
    </div>
    {{ content() }}
    <div class="row">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Data</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            {% if page.items is defined %}
            {% for mensagens in page.items %}
                <tr {% if mensagens.getReadAt() is null %}
                    class="alert-info"
                {% endif %}>
                    <td>{{ mensagens.getCreatedAt() }}</td>
                    <td>{{ mensagens.getNome() }}</td>
                    <td>{{ mensagens.getEmail() }}</td>
                    <td>{{ link_to("mensagens/ler/"~mensagens.getId(), "Ler Mensagem") }}</td>
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