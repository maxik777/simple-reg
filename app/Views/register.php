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

<script>
   if ($('#recaptcha').hasClass('was-validated')){
       $('.captcha-validation').show();
   }
</script>
