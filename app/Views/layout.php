<!doctype html>
<html class="h-100" lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel = "stylesheet" type = "text/css"
          href="/css/style.css"/>
    <link rel = "stylesheet" type = "text/css"
          href="/bootstrap-4.5.0-dist/css/bootstrap.css"/>
    <script src="/bootstrap-4.5.0-dist/js/bootstrap.min.js"></script>
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <script src="/js/jquery.js"></script>
    <title>Document</title>

    <script>
        if ($('#recaptcha').hasClass('was-validated'))
        {
            $('.captcha-validation').show();
        }
    </script>

    <style>
        .errors{
            color: red;
        }
        .g-recaptcha{
            width: 100%;
        }
    </style>

</head>
<body class="h-100">
    <div class="content-container">
        <?= $content ?>
    </div>
</body>
</html>
