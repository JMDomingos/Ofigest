<div align="row center-block">
    <div class="row">
        <nav>
            <ul class="pager">
                <li class="previous"><?php echo $this->tag->linkTo(array('mensagens/index', 'Voltar')); ?></li>
                <li class="next"></li>
            </ul>
        </nav>
    </div>
    <div class="page-header">
        <h1>Ler Mensagem</h1>
    </div>
    <?php echo $this->getContent(); ?>
    <div class="row">
        <table class="table">
            <tbody>
                <tr>
                    <th>Data</th>
                    <td><?php echo $mensagem->getCreatedAt(); ?></td>
                </tr>
                <tr>
                    <th>Nome</th>
                    <td><?php echo $mensagem->getNome(); ?></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td><a href="mailto:<?php echo $mensagem->getEmail(); ?>"><?php echo $mensagem->getEmail(); ?></a></td>
                </tr>
                <tr>
                    <th>Mensagem</th>
                    <td><?php echo $mensagem->getMensagem(); ?></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>