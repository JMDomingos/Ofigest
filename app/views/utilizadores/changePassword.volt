{{ content() }}

<form method="post" autocomplete="off" action="{{ url("utilizadores/changePassword") }}">

    <div class="center scaffold">

        <h2>Alterar Password</h2>

        <div class="clearfix">
            <label for="password">Password</label>
            {{ form.render("password") }}
        </div>

        <div class="clearfix">
            <label for="confirmPassword">Confirme a Password</label>
            {{ form.render("confirmPassword") }}
        </div>

        <div class="clearfix">
            {{ submit_button("Alterar a Password", "class": "btn btn-primary") }}
        </div>

    </div>

</form>