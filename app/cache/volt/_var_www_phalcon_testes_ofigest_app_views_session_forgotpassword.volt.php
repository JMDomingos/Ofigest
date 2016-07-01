<?php echo $this->getContent(); ?>
<div align="center" class="well">
	<?php echo $this->tag->form(array('class' => 'form-search')); ?>
	<div align="left">
		<h2>Vamos recuperar a sua Password</h2>
	</div>
			<?php echo $form->render('email'); ?>
			<?php echo $form->render('Enviar'); ?>
		<hr>
	</form>
</div>