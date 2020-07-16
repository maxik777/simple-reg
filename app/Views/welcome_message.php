<!doctype html>
<html class="h-100" lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel = "stylesheet" type = "text/css"
          href="/bootstrap-4.5.0-dist/css/bootstrap.css"/>
    <script src="/bootstrap-4.5.0-dist/js/bootstrap.min.js"></script>
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <script src="/js/jquery.js"></script>
    <title>Document</title>
</head>
<body class="h-100">
    <div class="container h-100">
        <div class="row h-100 justify-content-center align-items-center">
                <!-- form card login with validation feedback -->
                <div class="card card-outline-secondary w-50">
                    <div class="card-header">
                        <h3 class="mb-0">Register</h3>
                    </div>
                    <div class="card-body">
                        <form action="/" method="post" class="needs-validation" role="form" autocomplete="off" id="loginForm" novalidate>
                            <?= csrf_field() ?>
                            <div class="errors">
                            </div>
                            <div class="form-group <?= \Config\Services::validation()->showError('username') ? $cssValid : ''; ?>">
                                <label for="uname1">Username</label>
                                <input type="text" class="form-control" name="username" id="uname1" required="">
                                <div class="invalid-feedback"> <?= \Config\Services::validation()->showError('username') ; ?></div>
                            </div>
                            <div class="form-group <?= \Config\Services::validation()->showError('email') ? $cssValid : ''; ?>">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" id="email1" required="">
                                <div class="invalid-feedback"> <?= \Config\Services::validation()->showError('email'); ?></div>
                            </div>

                            <div id="recaptcha" class="form-group <?= \Config\Services::validation()->showError('g-recaptcha-response') ? $cssValid : ''; ?>">
                                <div class="mb-3 g-recaptcha" data-sitekey="6LeHnLEZAAAAADvQsFst78Wjrqzj1677XeUDYgsW"></div>
                                <div class="invalid-feedback captcha-validation"> <?= \Config\Services::validation()->showError('g-recaptcha-response'); ?></div>
                            </div>

                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-success btn-lg float-right" id="btnLogin">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
        </div>
    </div>
</body>
</html>

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
