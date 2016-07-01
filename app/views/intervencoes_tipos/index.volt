{{ elements.getTabs() }}
<div align="row center-block">
    <div class="page-header">
        <h1>
            Pesquisar Tipos de Intervenções
        </h1>
        <p>
            {{ link_to("intervencoes_tipos/new", "Criar Tipo de intervenção") }}
        </p>
    </div>
    {{ content() }}
    {{ form("intervencoes_tipos/search", "method":"post", "autocomplete" : "off", "class" : "form-horizontal") }}
    {#
    <div class="form-group">
        <label for="fieldIdTipoIntervencao" class="col-sm-2 control-label">Id Of Tipo Of Intervencao</label>
        <div class="col-sm-10">
            {{ text_field("id_tipo_intervencao", "type" : "numeric", "class" : "form-control", "id" : "fieldIdTipoIntervencao") }}
        </div>
    </div>
    #}
    <div class="form-group">
        <label for="fieldDescTipoIntervencao" class="col-sm-2 control-label">Tipo de Intervenção</label>
        <div class="col-sm-10">
            {{ text_field("desc_tipo_intervencao", "size" : 30, "class" : "form-control", "id" : "fieldDescTipoIntervencao") }}
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            {{ submit_button('Pesquisar', 'class': 'btn btn-default') }}
        </div>
    </div>

    </form>
</div>