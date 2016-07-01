{{ elements.getTabs() }}
<div align="row center-block">
    <div class="page-header">
        <h1>
            Pesquisar Veiculos
        </h1>
        <p>
            {{ link_to("veiculos/new", "Criar Veiculo") }}
        </p>
    </div>
    {{ content() }}
    {{ form("veiculos/search", "method":"post", "autocomplete" : "off", "class" : "form-horizontal") }}
    <div class="form-group">
        <label for="fieldMatricula" class="col-sm-2 control-label">Matricula</label>
        <div class="col-sm-10">
            {{ text_field("matricula", "size" : 30, "class" : "form-control", "id" : "fieldMatricula") }}
        </div>
    </div>
    {# #}
    <div class="form-group">
        <label for="fieldMarca" class="col-sm-2 control-label">Marca</label>
        <div class="col-sm-10">
            {{ select("marca", marcas, "using": ["id", "marca"], "useEmpty":true, 'emptyText':'...',
                    'emptyValue':'', "class" : "form-control", "id" : "fieldIdMarca") }}
        </div>
    </div>
    <div class="form-group">
        <label for="fieldModelo" class="col-sm-2 control-label">Modelo</label>
        <div class="col-sm-10">
            {{ select("modelo", modelos, "using": ["id", "oModelo"], 'useEmpty': true, 'emptyText':'...',
                    'emptyValue':'', "class" : "form-control", "id" : "fieldIdModelo") }}
        </div>
    </div>

    <div class="form-group">
        <label for="fieldNQuadro" class="col-sm-2 control-label">Num. do Quadro</label>
        <div class="col-sm-10">
            {{ text_field("n_quadro", "size" : 30, "class" : "form-control", "id" : "fieldNQuadro") }}
        </div>
    </div>
    {#
    <div class="form-group">
        <label for="fieldAno" class="col-sm-2 control-label">Ano</label>
        <div class="col-sm-10">
            {{ text_field("ano", "type" : "numeric", "class" : "form-control", "id" : "fieldAno") }}
        </div>
    </div>
    <div class="form-group">
        <label for="fieldMes" class="col-sm-2 control-label">Mes</label>
        <div class="col-sm-10">
            {{ text_field("mes", "type" : "numeric", "class" : "form-control", "id" : "fieldMes") }}
        </div>
    </div>
    <div class="form-group">
        <label for="fieldCor" class="col-sm-2 control-label">Cor</label>
        <div class="col-sm-10">
            {{ text_field("cor", "size" : 30, "class" : "form-control", "id" : "fieldCor") }}
        </div>
    </div>
    #}
    <div class="form-group">
        <label for="fieldTamanhoPneus" class="col-sm-2 control-label">Tamanho Of Pneus</label>
        <div class="col-sm-10">
            {{ text_field("tamanho_pneus", "size" : 30, "class" : "form-control", "id" : "fieldTamanhoPneus") }}
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            {{ submit_button('Pesquisar', 'class': 'btn btn-default') }}
        </div>
    </div>
    </form>
</div>