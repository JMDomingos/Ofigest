{{ elements.getTabs() }}
<div align="row center-block">
    <div class="row">
        <nav>
            <ul class="pager">
                <li class="previous">{{ link_to("modelos", "Voltar") }}</li>
            </ul>
        </nav>
    </div>
    <div class="page-header">
        <h1>
            Editar este Modelo
        </h1>
    </div>
    {{ content() }}
    {{ form("modelos/save", "method":"post", "autocomplete" : "off", "class" : "form-horizontal") }}
    <div class="form-group">
        <label for="fieldId" class="col-sm-2 control-label">Id</label>
        <div class="col-sm-10">
            {{ text_field("id", "size" : 30, "class" : "form-control", "id" : "fieldId") }}
        </div>
    </div>
    <div class="form-group">
        <label for="fieldMarca" class="col-sm-2 control-label">Marca</label>
        <div class="col-sm-10">
            {# {{ text_field("marca", "type" : "numeric", "class" : "form-control", "id" : "fieldMarca") }} #}
            {{ select("marca", marcas, "using": ["id", "marca"], 'useEmpty': true, 'emptyText': '...',
            'emptyValue': '0', "class" : "form-control", "id" : "fieldMarca") }}
        </div>
    </div>
    <div class="form-group">
        <label for="fieldModelo" class="col-sm-2 control-label">Modelo</label>
        <div class="col-sm-10">
            {{ text_field("modelo", "size" : 30, "class" : "form-control", "id" : "fieldModelo") }}
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