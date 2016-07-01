<?php echo $this->getContent(); ?>
<div class="row">
	<div align="center"  class="col-md-4">
		<?php echo $this->tag->form(array('class' => 'form-search')); ?>
		<div  class="page-header" align="left">
			<h2>Entrar</h2>
		</div>
		<?php echo $form->render('email'); ?><br>
		<?php echo $form->render('password'); ?><br>
		<?php echo $form->render('Entrar'); ?>
		<div align="center" class="remember">
			<?php echo $form->render('remember'); ?>
			<?php echo $form->label('remember'); ?>
		</div>
		<?php echo $form->render('csrf', array('value' => $this->security->getToken())); ?>
		<hr>
		<div class="forgot">
			<?php echo $this->tag->linkTo(array('session/forgotPassword', 'Esqueceu a sua password?')); ?>
		</div>
		</form>
	</div>
	<div class="col-md-8">
		<div class="page-header">
			<h2>Ainda não criou uma conta?</h2>
		</div>
		<p>Crie uma conta para usufruir destas e outras vantagens:</p>
		<ul>
			<li>Acesso completo ao historial de manutenção do(s) seu(s) automóvel(eis)</li>
			<li>Lembretes opcionais automáticos de manutenções e inspeções, introduza os dados dos seus veiculos</li>
			<li>Agende as suas manutenções com facilidade e rapidez no nosso sistema de reservas</li>
		</ul>
		<div class="clearfix center">
			<?php echo $this->tag->linkTo(array('session/signup', 'Criar conta', 'class' => 'btn btn-primary btn-large btn-success')); ?>
		</div>
	</div>
</div>