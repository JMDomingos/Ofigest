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
        {{ stylesheet_link('css/232/bootstrap.css') }}
        {{ stylesheet_link('css/232/bootstrap-responsive.css') }}
        {{ stylesheet_link('css/232/datepicker.css') }}
        {{ stylesheet_link('css/vokuro.style.css') }}
        <meta name="description" content="Software de gestão de oficina">
        <meta name="author" content="José M. Domingos">
    </head>
    <body>
        {{ content() }}
        {{ javascript_include('js/232/jquery.js') }}
        {{ javascript_include('js/232/bootstrap.js') }}
        {{ javascript_include('js/232/bootstrap-datepicker.js') }}
        {{ javascript_include('js/utils.js') }}
        <script>
            $('#sandbox-container input').datepicker({
                format: "yyyy-mm-dd",
                todayBtn: "linked",
                clearBtn: true,
                language: "pt",
                daysOfWeekDisabled: "0,6",
                daysOfWeekHighlighted: "0,6",
                todayHighlight: true
            });
        </script>
    </body>
</html>
