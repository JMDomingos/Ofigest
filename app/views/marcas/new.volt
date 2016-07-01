{{ elements.getTabs() }}
<div align="row center-block">
    <div class="row">
        <nav>
            <ul class="pager">
                <li class="previous">{{ link_to("marcas", "Voltar") }}</li>
            </ul>
        </nav>
    </div>
    <div class="page-header">
        <h1>
            Criar uma nova Marca
        </h1>
    </div>
    {{ content() }}
    {{ form("marcas/create", "method":"post", "autocomplete" : "off", "class" : "form-horizontal") }}
    {#
    <div class="form-group">
        <label for="fieldId" class="col-sm-2 control-label">Id</label>
        <div class="col-sm-10">
            {{ text_field("id", "type" : "numeric", "class" : "form-control", "id" : "fieldId") }}
        </div>
    </div>
    #}
    <div class="form-group">
        <label for="fieldMarca" class="col-sm-2 control-label">Marca</label>
        <div class="col-sm-10">
            {{ text_field("marca", "size" : 30, "class" : "form-control", "id" : "fieldMarca") }}
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            {{ submit_button('Guardar', 'class': 'btn btn-default') }}
        </div>
    </div>
    </form>
</div>
