<?php echo $this->getContent(); ?>
<div class="jumbotron">
    <h1>Bem vindo ao OfiGest</h1>
    <p>O OfiGest é uma aplicação revolucionária para gerir oficinas com o objetivo de melhorar a relação
        Cliente/Oficina utilizando a Internet.
    </p>
    <p>
        Esta ferramenta facilita o fluxo de trabalho das Oficinas, permitindo controlar o agendamento de manutenções,
        em colaboração direta com o Cliente, nos nossos planos para o futuro permitiremos adicionar lembretes por
        Email e SMS, evitando atrasos nas manutenções e nas inspeções das viaturas.
    </p>
    <p><?php echo $this->tag->linkTo(array('session/signup', 'Subscrever', 'class' => 'btn btn-primary btn-large btn-success')); ?></p>
</div>
<div class="row">
    <div class="col-md-4">
        <h2>Facilite o fluxo de trabalho</h2>
        <p>Os benifícios são mutúos, os nossos Clientes ao utilizar esta ferramenta, têm acesso em tempo real
            ao estado das suas viaturas, através do computador ou mesmo do telémovel, podem agendar e controlar
            as suas manutenções e reparações em hórarios mutuamente benéficos.</p>
    </div>
    <div class="col-md-4">
        <h2>Agendamento e lembretes</h2>
        <p>Facilita a vida á Oficina e ao Cliente, criando lembretes automáticos das manutenções e inspeções dos
            veículos, que podem ser consultadas pela Oficina para programar as próximas semanas de trabalho e pode,
            opcinalmente, informar o Cliente por Email ou SMS da necessidade de inspecionar a sua viatura.</p>
    </div>
    <div class="col-md-4">
        <h2>Serviço móvel</h2>
        <p>Destacamo-nos com o nosso serviço móvel, fornecemos aos nossos clientes a prestação de serviços de
            mecânica que vão ao seu encontro, onde estiver.</p>
        <p>Poupe nas deslocações à Oficina, agende connosco, ganhe tempo e poupe contrangimentos. Fazemos o serviço
        enquanto voçê trabalha, faz o almoço ou vai á praia.</p>
    </div>
</div>
