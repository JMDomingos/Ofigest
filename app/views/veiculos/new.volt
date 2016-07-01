{{ elements.getTabs() }}
<div align="row center-block">
    <div class="row">
        <nav>
            <ul class="pager">
                <li class="previous">{{ link_to("veiculos", "Voltar") }}</li>
            </ul>
        </nav>
    </div>
    <div class="page-header">
        <h1>
            Criar novo Veiculo
        </h1>
    </div>
    {{ content() }}
    {{ form("veiculos/create", "method":"post", "autocomplete" : "off", "class" : "form-horizontal") }}
    <div class="form-group">
        <label for="fieldMatricula" class="col-sm-2 control-label">Matricula</label>
        <div class="col-sm-10">
            {{ text_field("matricula", "size" : 30, "class" : "form-control", "id" : "fieldMatricula") }}
        </div>
    </div>
    <div class="form-group">
        <label for="fieldMarca" class="col-sm-2 control-label">Marca</label>
        <div class="col-sm-10">
            {{ select("id_marca", marcas, "using": ["id", "marca"], "useEmpty":true, 'emptyText':'...',
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
        <label for="fieldNQuadro" class="col-sm-2 control-label">N Of Quadro</label>
        <div class="col-sm-10">
            {{ text_field("n_quadro", "size" : 30, "class" : "form-control", "id" : "fieldNQuadro") }}
        </div>
    </div>

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

    <div class="form-group">
        <label for="fieldTamanhoPneus" class="col-sm-2 control-label">Tamanho Of Pneus</label>
        <div class="col-sm-10">
            {{ text_field("tamanho_pneus", "size" : 30, "class" : "form-control", "id" : "fieldTamanhoPneus") }}
        </div>
    </div>


    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            {{ submit_button('Save', 'class': 'btn btn-default') }}
        </div>
    </div>

    </form>
</div>