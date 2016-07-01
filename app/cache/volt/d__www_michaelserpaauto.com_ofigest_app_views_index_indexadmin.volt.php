<?= $this->getContent() ?>
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
                <?php foreach ($marcacoes as $marcacao) { ?>
                    <tr>
                        <td><?= $marcacao->getData() ?></td>
                        <td><?= $marcacao->Clientes->getNome() ?></td>
                        <td><?= $marcacao->getMatricula() ?></td>
                        <td><?= $this->tag->linkTo(['manutencoes_agendadas/edit/' . $marcacao->getId(), 'Confirmar']) ?></td>
                    </tr>
                <?php } ?>

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
                <?php foreach ($unreadMessages as $mensagem) { ?>
                    <tr>
                        <td><?= $mensagem->getCreatedAt() ?></td>
                        <td><?= $mensagem->getNome() ?></td>
                        <td><?= $mensagem->getEmail() ?></td>
                        <td><?= $this->tag->linkTo(['contact/ler/' . $marcacao->getId(), 'Ler']) ?></td>
                    </tr>
                <?php } ?>

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