    <div class="content">
        <div class="form-container">
            <link rel = "stylesheet" type = "text/css"
                  href="/css/style.css"/>
            <script src="https://www.google.com/recaptcha/api.js"></script>
            <h2><?= esc($title); ?></h2>

            <?= \Config\Services::validation()->listErrors(); ?>

            <form action="/home/register" method="post">
                <?= csrf_field() ?>

                <label for="username">Username</label>
                <input type="input" name="username" /><br />

                <label for="email">Email</label>
                <input name="email" /><br />

                <div class="g-recaptcha" data-sitekey="6LeHnLEZAAAAADvQsFst78Wjrqzj1677XeUDYgsW"></div>

                <input class="submit" type="submit" name="submit" value="Register" />
            </form>
        </div>
    </div>



