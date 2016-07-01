<div class="row">
    <nav>
        <ul class="pager">
            <li class="previous">{{ link_to("utilizadores", "Go Back") }}</li>
        </ul>
    </nav>
</div>

<div class="page-header">
    <h1>
        Editar utilizadores
    </h1>
</div>

{{ content() }}

{{ form("utilizadores/save", "method":"post", "autocomplete" : "off", "class" : "form-horizontal") }}

<div class="form-group">
    <label for="fieldNome" class="col-sm-2 control-label">Nome</label>
    <div class="col-sm-10">
        {{ text_field("nome", "size" : 30, "class" : "form-control", "id" : "fieldNome") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldEmail" class="col-sm-2 control-label">Email</label>
    <div class="col-sm-10">
        {{ text_field("email", "size" : 30, "class" : "form-control", "id" : "fieldEmail") }}
    </div>
</div>


{{ hidden_field("id") }}

<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        {{ submit_button('Send', 'class': 'btn btn-default') }}
    </div>
</div>

</form>
