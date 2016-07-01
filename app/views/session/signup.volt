{{ content() }}
<div align="center">
	{{ form('class': 'form-search') }}
		<div align="left">
			<h2>Vamos criar a sua conta</h2>
		</div>
		<table class="signup">
			<tr>
				<td align="right">{{ form.label('name') }}</td>
				<td>
					{{ form.render('name') }}
					{{ form.messages('name') }}
				</td>
			</tr>
			<tr>
				<td align="right">{{ form.label('email') }}</td>
				<td>
					{{ form.render('email') }}
					{{ form.messages('email') }}
				</td>
			</tr>
			<tr>
				<td align="right">{{ form.label('password') }}</td>
				<td>
					{{ form.render('password') }}
					{{ form.messages('password') }}
				</td>
			</tr>
			<tr>
				<td align="right">{{ form.label('confirmPassword') }}</td>
				<td>
					{{ form.render('confirmPassword') }}
					{{ form.messages('confirmPassword') }}
				</td>
			</tr>
			{# //Vai levar os campos no formulário de registo???
			morada
			telefone
			telemovel
			NIF
			#}
			<tr>
				<td align="right"></td>
				<td>
					{{ form.render('terms') }} {{ form.label('terms') }}
					{{ form.messages('terms') }}
				</td>
			</tr>
			<tr>
				<td align="right"></td>
				<td>{{ form.render('Aderir') }}</td>
			</tr>
		</table>
		{{ form.render('csrf', ['value': security.getToken()]) }}
		{{ form.messages('csrf') }}
	</form>
</div>