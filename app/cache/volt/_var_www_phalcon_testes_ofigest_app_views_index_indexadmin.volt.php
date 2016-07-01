<?php echo $this->getContent(); ?>
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
                        <td><?php echo $marcacao->getData(); ?></td>
                        <td><?php echo $marcacao->Clientes->getNome(); ?></td>
                        <td><?php echo $marcacao->getMatricula(); ?></td>
                        <td><?php echo $this->tag->linkTo(array('manutencoes_agendadas/edit/' . $marcacao->getId(), 'Confirmar')); ?></td>
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
                        <td><?php echo $mensagem->getCreatedAt(); ?></td>
                        <td><?php echo $mensagem->getNome(); ?></td>
                        <td><?php echo $mensagem->getEmail(); ?></td>
                        <td><?php echo $this->tag->linkTo(array('contact/ler/' . $marcacao->getId(), 'Ler')); ?></td>
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