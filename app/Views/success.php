<html>
<head>
    <title>My Form</title>
    <link rel = "stylesheet" type = "text/css"
          href="/css/success.css"/>
    <script src="/js/jquery.js"></script>
</head>
<body>

<p><?= anchor('/', 'Back') ?></p>

<h2>Registered users</h2>
<div class="content">
    <table>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Email</th>
        </tr>
        <?php foreach ($registered_users as $user):?>
            <tr>
                <td><?=$user->id?></td>
                <td><?=$user->username?></td>
                <td><?=$user->email?></td>
            </tr>
        <?php endforeach;?>
    </table>
</div>
</body>
</html>

