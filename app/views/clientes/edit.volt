{{ elements.getTabs() }}
<div align="row center-block">
    <div class="row">
        <nav>
            <ul class="pager">
                <li class="previous">{{ link_to("clientes", "Voltar") }}</li>
            </ul>
        </nav>
    </div>
    <div class="page-header">
        <h1>
            Editar Cliente
        </h1>
    </div>
    {{ content() }}
    {{ form("clientes/save", "method":"post", "autocomplete" : "off", "class" : "form-horizontal") }}
    <div class="form-group">
        <label for="fieldNome" class="col-sm-2 control-label">Nome</label>
        <div class="col-sm-10">
            {{ text_field("nome", "size" : 30, "class" : "form-control", "id" : "fieldNome") }}
        </div>
    </div>
    <div class="form-group">
        <label for="fieldMorada" class="col-sm-2 control-label">Morada</label>
        <div class="col-sm-10">
            {{ text_field("morada", "size" : 30, "class" : "form-control", "id" : "fieldMorada") }}
        </div>
    </div>
    <div class="form-group">
        <label for="fieldTelefone" class="col-sm-2 control-label">Telefone</label>
        <div class="col-sm-10">
            {{ text_field("telefone", "type" : "numeric", "class" : "form-control", "id" : "fieldTelefone") }}
        </div>
    </div>
    <div class="form-group">
        <label for="fieldTelemovel" class="col-sm-2 control-label">Telemovel</label>
        <div class="col-sm-10">
            {{ text_field("telemovel", "type" : "numeric", "class" : "form-control", "id" : "fieldTelemovel") }}
        </div>
    </div>
    <div class="form-group">
        <label for="fieldEmail" class="col-sm-2 control-label">Email</label>
        <div class="col-sm-10">
            {{ text_field("email", "size" : 30, "class" : "form-control", "id" : "fieldEmail") }}
        </div>
    </div>
    <div class="form-group">
        <label for="fieldNif" class="col-sm-2 control-label">NIF</label>
        <div class="col-sm-10">
            {{ text_field("NIF", "type" : "numeric", "class" : "form-control", "id" : "fieldNif") }}
        </div>
    </div>
    {{ hidden_field("id") }}
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            {{ submit_button('Guardar', 'class': 'btn btn-default') }}
        </div>
    </div>
    </form>
</div>