<?= $this->getContent() ?>
<div class="row">
	<div align="center"  class="col-md-4">
		<?= $this->tag->form(['class' => 'form-search']) ?>
		<div  class="page-header" align="left">
			<h2>Entrar</h2>
		</div>
		<?= $form->render('email') ?><br>
		<?= $form->render('password') ?><br>
		<?= $form->render('Entrar') ?>
		<div align="center" class="remember">
			<?= $form->render('remember') ?>
			<?= $form->label('remember') ?>
		</div>
		<?= $form->render('csrf', ['value' => $this->security->getToken()]) ?>
		<hr>
		<div class="forgot">
			<?= $this->tag->linkTo(['session/forgotPassword', 'Esqueceu a sua password?']) ?>
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
			<?= $this->tag->linkTo(['session/signup', 'Criar conta', 'class' => 'btn btn-primary btn-large btn-success']) ?>
		</div>
	</div>
</div>