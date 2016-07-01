
{{ content() }}

<div class="page-header">
    <h2>Contatos</h2>
</div>

<p>Envie-nos uma mensagem a informar-nos como o podemos assistir.</p>
<p>Por favor seja o mais sucinto possivel de forma ajudar-nos a servi-lo da melhor forma.</p>

{{ form('contact/send', 'role': 'form') }}
    <fieldset>
        <div class="form-group">
            {{ form.label('name') }}
            {{ form.render('name', ['class': 'form-control']) }}
        </div>
        <div class="form-group">
            {{ form.label('email') }}
            {{ form.render('email', ['class': 'form-control']) }}
        </div>
        <div class="form-group">
            {{ form.label('comments') }}
            {{ form.render('comments', ['class': 'form-control']) }}
        </div>
        <div class="form-group">
            {{ submit_button('Enviar', 'class': 'btn btn-primary btn-large') }}
        </div>
    </fieldset>
</form>
