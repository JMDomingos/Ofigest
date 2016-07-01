<div class="page-header">
    <h1>
        Pesquisar Manutenções efetuadas
    </h1>
    <p>
        {{ link_to("manutencoes/new", "Novo registo de Manutenção") }} |
        {{ link_to("manutencoes/newFromAgenda", "Novo registo Agendado") }}
    </p>
</div>
{{ content() }}
{{ form("manutencoes/search", "method":"post", "autocomplete" : "off", "class" : "form-horizontal") }}
{#
<div class="form-group">
    <label for="fieldId" class="col-sm-2 control-label">Id</label>
    <div class="col-sm-10">
        {{ text_field("id", "type" : "numeric", "class" : "form-control", "id" : "fieldId") }}
    </div>
</div>
<div class="form-group">
    <label for="fieldData" class="col-sm-2 control-label">Data</label>
    <div class="col-sm-10">
        {{ text_field("data", "type" : "date", "class" : "form-control", "id" : "fieldData") }}
    </div>
</div>
#}
<div class="form-group">
    <label for="fieldIdCliente" class="col-sm-2 control-label">Cliente</label>
    <div class="col-sm-10">
        {# {{ text_field("id_cliente", "type" : "numeric", "class" : "form-control", "id" : "fieldIdCliente") }} #}
        {{ select("id_cliente", clientes, "using": ["id", "nome"], 'useEmpty': true,
            'emptyText': '...', 'emptyValue': '',  "class" : "form-control", "id" : "fieldIdCliente") }}
    </div>
</div>
<div class="form-group">
    <label for="fieldIdVeiculo" class="col-sm-2 control-label">Veiculo</label>
    <div class="col-sm-10">
        {# {{ text_field("id_veiculo", "size" : 30, "class" : "form-control", "id" : "fieldIdVeiculo") }} #}
        {{ select("id_veiculo", veiculos, "using": ["matricula", "oModelo"], 'useEmpty': true,
            'emptyText': '...', 'emptyValue': '', "class" : "form-control", "id" : "fieldIdVeiculo") }}
    </div>
</div>
{#
<div class="form-group">
    <label for="fieldInspecionadoAte" class="col-sm-2 control-label">Inspecionado Of Ate</label>
    <div class="col-sm-10">
        {{ text_field("inspecionado_ate", "type" : "date", "class" : "form-control", "id" : "fieldInspecionadoAte") }}
    </div>
</div>
<div class="form-group">
    <label for="fieldKilometragem" class="col-sm-2 control-label">Kilometragem</label>
    <div class="col-sm-10">
        {{ text_field("kilometragem", "type" : "numeric", "class" : "form-control", "id" : "fieldKilometragem") }}
    </div>
</div>
#}
<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        {{ submit_button('Pesquisar', 'class': 'btn btn-default') }}
    </div>
</div>
{{ end_form() }}
{# </form> #}