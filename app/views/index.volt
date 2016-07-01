<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        {#
        The above 3 meta tags *must* come first in the head;
        any other head content must come *after* these tags
        #}
        {{ get_title() }}
        {{ stylesheet_link('css/bootstrap.min.css') }}
        {{ stylesheet_link('css/vokuro.style.css') }}
        {{ stylesheet_link('css/datepicker.css') }}
        {{ stylesheet_link('css/navbar-custom.css') }}
        {{ assets.outputCss() }}
        <meta name="description" content="Software de gestão de oficina">
        <meta name="author" content="José M. Domingos">
        {# mudar por um ico fx #}
        <link rel="shortcut icon" href="/OfiGest/public/favicon.ico">
    </head>
    <body>
        {{ content() }}
        {{ javascript_include('js/jquery.min.js') }}
        {{ javascript_include('js/bootstrap.min.js') }}
        {{ javascript_include('js/utils.js') }}
        {{ javascript_include('js/bootstrap-datepicker.js') }}
        {{ javascript_include('js/bootstrap-datepicker.pt.min.js') }}
        <script>
            $('#datepicker input').datepicker({
                format: "yyyy-mm-dd",
                todayBtn: "linked",
                clearBtn: true,
                language: "pt",
                daysOfWeekDisabled: "0,6",
                daysOfWeekHighlighted: "0,6",
                todayHighlight: true,
                autoclose: true
            });
        </script>
    </body>
</html>
