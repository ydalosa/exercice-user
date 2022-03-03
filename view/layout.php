<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous" defer></script>
</head>
<body>

<header>
    <div class="container">
        <a href="http://localhost/exercice-user/home" class="btn btn-primary">Home</a>
        <a href="http://localhost/exercice-user/login" class="btn btn-primary">Login</a>
        <a href="http://localhost/exercice-user/logout" class="btn btn-primary">Logout</a>
        <a href="http://localhost/exercice-user/register" class="btn btn-primary">Register</a>
        <a href="http://localhost/exercice-user/dashboard" class="btn btn-primary">Dashboard</a>
    </div>
</header>
<hr>

<?= $content ?>

<footer>
    <h1>footer</h1>
</footer>
</body>
</html>