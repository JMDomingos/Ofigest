<?php echo $this->getContent(); ?>
<div align="center">
	<?php echo $this->tag->form(array('class' => 'form-search')); ?>
		<div align="left">
			<h2>Vamos criar a sua conta</h2>
		</div>
		<table class="signup">
			<tr>
				<td align="right"><?php echo $form->label('name'); ?></td>
				<td>
					<?php echo $form->render('name'); ?>
					<?php echo $form->messages('name'); ?>
				</td>
			</tr>
			<tr>
				<td align="right"><?php echo $form->label('email'); ?></td>
				<td>
					<?php echo $form->render('email'); ?>
					<?php echo $form->messages('email'); ?>
				</td>
			</tr>
			<tr>
				<td align="right"><?php echo $form->label('password'); ?></td>
				<td>
					<?php echo $form->render('password'); ?>
					<?php echo $form->messages('password'); ?>
				</td>
			</tr>
			<tr>
				<td align="right"><?php echo $form->label('confirmPassword'); ?></td>
				<td>
					<?php echo $form->render('confirmPassword'); ?>
					<?php echo $form->messages('confirmPassword'); ?>
				</td>
			</tr>
			
			<tr>
				<td align="right"></td>
				<td>
					<?php echo $form->render('terms'); ?> <?php echo $form->label('terms'); ?>
					<?php echo $form->messages('terms'); ?>
				</td>
			</tr>
			<tr>
				<td align="right"></td>
				<td><?php echo $form->render('Aderir'); ?></td>
			</tr>
		</table>
		<?php echo $form->render('csrf', array('value' => $this->security->getToken())); ?>
		<?php echo $form->messages('csrf'); ?>
	</form>
</div>