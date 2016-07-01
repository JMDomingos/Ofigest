<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <?= $this->tag->getTitle() ?>
        <?= $this->tag->stylesheetLink('css/bootstrap.min.css') ?>
        <?= $this->tag->stylesheetLink('css/vokuro.style.css') ?>
        <?= $this->tag->stylesheetLink('css/datepicker.css') ?>
        <?= $this->tag->stylesheetLink('css/navbar-custom.css') ?>
        <?= $this->assets->outputCss() ?>
        <meta name="description" content="Software de gestão de oficina">
        <meta name="author" content="José M. Domingos">
        
        <link rel="shortcut icon" href="/OfiGest/public/favicon.ico">
    </head>
    <body>
        <?= $this->getContent() ?>
        <?= $this->tag->javascriptInclude('js/jquery.min.js') ?>
        <?= $this->tag->javascriptInclude('js/bootstrap.min.js') ?>
        <?= $this->tag->javascriptInclude('js/utils.js') ?>
        <?= $this->tag->javascriptInclude('js/bootstrap-datepicker.js') ?>
        <?= $this->tag->javascriptInclude('js/bootstrap-datepicker.pt.min.js') ?>
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
