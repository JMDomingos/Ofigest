{{ elements.getTabs() }}
<div align="row center-block">
    <div class="row">
        <nav>
            <ul class="pager">
                <li class="previous">{{ link_to("intervencoes_tipos", "Voltar") }}</li>
            </ul>
        </nav>
    </div>
    <div class="page-header">
        <h1>
            Criar novo Tipo de Intervenção
        </h1>
    </div>
    {{ content() }}
    {{ form("intervencoes_tipos/create", "method":"post", "autocomplete" : "off", "class" : "form-horizontal") }}
    <div class="form-group">
        <label for="fieldDescTipoIntervencao" class="col-sm-2 control-label">Descrição do Tipo de Intervenção</label>
        <div class="col-sm-10">
            {{ text_field("desc_tipo_intervencao", "size" : 30, "class" : "form-control", "id" : "fieldDescTipoIntervencao") }}
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            {{ submit_button('Guardar', 'class': 'btn btn-default') }}
        </div>
    </div>
    </form>
</div>