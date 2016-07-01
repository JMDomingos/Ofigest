<div class="row">
    <nav>
        <ul class="pager">
            <li class="previous">{{ link_to("manutencoes/search", "Voltar") }}</li>
        </ul>
    </nav>
</div>
<div class="page-header">
    <h1>
        Editar esta Intervenção
    </h1>
    {% if manutencao is defined %}
        <h3>
            manutenção em {{ manutencao.getData() }} no
            {{ manutencao.veiculos.modelos.marcas.getMarca() }}
            {{ manutencao.veiculos.modelos.getModelo() }}
            ( {{ manutencao.veiculos.getMatricula() }} )
            de {{ manutencao.clientes.getnome() }}
        </h3>
    {% endif %}
</div>
{{ content() }}
{{ form("intervencoes/save", "method":"post", "autocomplete" : "off", "class" : "form-horizontal") }}
{#
<div class="form-group">
    <label for="fieldId" class="col-sm-2 control-label">Id</label>
    <div class="col-sm-10">
        {{ text_field("id", "type" : "numeric", "class" : "form-control", "id" : "fieldId") }}
    </div>
</div>
<div class="form-group">
    <label for="fieldIdManutencoes" class="col-sm-2 control-label">Id Of Manutencoes</label>
    <div class="col-sm-10">
        {{ text_field("id_manutencoes", "type" : "numeric", "class" : "form-control", "id" : "fieldIdManutencoes") }}
    </div>
</div>
#}
<div class="form-group">
    <label for="fieldIdTipoIntervencao" class="col-sm-2 control-label">Tipo</label>
    <div class="col-sm-10">
        {{ select("id_tipo_intervencao", intervencoes_tipos, "using": ["id_tipo_intervencao", "desc_tipo_intervencao"],
        'useEmpty': true, 'emptyText': '...', 'emptyValue': '',  "class" : "form-control", "id" : "fieldIdTipoIntervencao") }}
    </div>
</div>
<div class="form-group">
    <label for="fieldDescIntervencao" class="col-sm-2 control-label">Descrição</label>
    <div class="col-sm-10">
        {{ text_field("desc_intervencao", "size" : 30, "class" : "form-control", "id" : "fieldDescIntervencao") }}
    </div>
</div>
<div class="form-group">
    <label for="fieldDataIntervencao" class="col-sm-2 control-label">Data</label>
    <div class="col-sm-10" id="datepicker">
        {{ text_field("data_intervencao", "size" : 30, "class" : "form-control", "id" : "fieldDataIntervencao") }}
    </div>
</div>
<div class="form-group">
    <label for="fieldCustoIntervencao" class="col-sm-2 control-label">Custo</label>
    <div class="col-sm-10">
        {{ text_field("custo_intervencao", "size" : 30, "class" : "form-control", "id" : "fieldCustoIntervencao") }}
    </div>
</div>
{{ hidden_field("id") }}
<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        {{ submit_button('Salvar', 'class': 'btn btn-default') }}
    </div>
</div>

</form>
