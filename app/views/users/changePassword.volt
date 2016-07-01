{{ content() }}

<form method="post" autocomplete="off" action="{{ url("users/changePassword") }}" class="form-horizontal">

    <div class="page-header">
        <h1>Altere a sua Password</h1>
    </div>
    <div class="form-group">
        <label for="password" class="col-sm-4 control-label">Password</label>
        <div class="col-sm-8">
            {{ form.render("password") }}
        </div>
    </div>
    <div class="form-group">
        <label for="confirmPassword" class="col-sm-4 control-label">Confirme a Password</label>
        <div class="col-sm-8">
            {{ form.render("confirmPassword") }}
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-4 col-sm-8">
            <?php echo $this->tag->submitButton(array("Alterar Password", "class" => "btn btn-primary")) ?>
        </div>
    </div>
    {#
    <div class="center scaffold">
        <h2>Altere a sua Password</h2>
        <div class="clearfix">
            <label for="password">Password</label>
            {{ form.render("password") }}
        </div>
        <div class="clearfix">
            <label for="confirmPassword">Confirme a Password</label>
            {{ form.render("confirmPassword") }}
        </div>
        <div class="clearfix">
            {{ submit_button("Alterar Password", "class": "btn btn-primary") }}
        </div>
    </div>
    #}

</form>
