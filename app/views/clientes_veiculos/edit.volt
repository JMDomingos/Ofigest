{{ elements.getTabs() }}
<div align="row center-block">
    <div class="row">
        <nav>
            <ul class="pager">
                <li class="previous">{{ link_to("clientes_veiculos", "Voltar") }}</li>
            </ul>
        </nav>
    </div>
    <div class="page-header">
        <h1>
            Editar Cliente/Veiculo
        </h1>
    </div>
    {{ content() }}
    {{ form("clientes_veiculos/save", "method":"post", "autocomplete" : "off", "class" : "form-horizontal") }}
    <div class="form-group">
        <label for="fieldIdCliente" class="col-sm-2 control-label">Id Of Cliente</label>
        <div class="col-sm-10">
            {#{{ text_field("id_cliente", "type" : "numeric", "class" : "form-control", "id" : "fieldIdCliente") }}#}
            {{ select("id_cliente", clientes, "using": ["id", "nome"], 'useEmpty': true,
            'emptyText': '...', 'emptyValue': '',  "class" : "form-control", "id" : "fieldIdCliente") }}
        </div>
    </div>
    <div class="form-group">
        <label for="fieldIdVeiculo" class="col-sm-2 control-label">Id Of Veiculo</label>
        <div class="col-sm-10">
            {#{{ text_field("id_veiculo", "size" : 30, "class" : "form-control", "id" : "fieldIdVeiculo") }}#}
            {{ select("id_veiculo", veiculos, "using": ["matricula", "oModelo"], 'useEmpty': true,
            'emptyText': '...', 'emptyValue': '', "class" : "form-control", "id" : "fieldIdVeiculo") }}
        </div>
    </div>
    <div class="form-group">
        <label for="fieldData" class="col-sm-2 control-label">Data</label>
        <div class="col-sm-10" id="datepicker">
            {{ text_field("data", "size" : 30, "class" : "form-control", "id" : "fieldData") }}
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