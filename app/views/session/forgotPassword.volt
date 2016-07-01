{{ content() }}
<div align="center" class="well">
	{{ form('class': 'form-search') }}
	<div align="left">
		<h2>Vamos recuperar a sua Password</h2>
	</div>
			{{ form.render('email') }}
			{{ form.render('Enviar') }}
		<hr>
	</form>
</div>