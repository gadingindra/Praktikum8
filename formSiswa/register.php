<?php
    require_once "auth.php";

    if (isset($_POST['submit'])) {
        $user = $_POST['username'];
        $email = $_POST['email'];
        $pass = $_POST['password'];

        if (empty($user) || empty($pass)) {
            $error_message = "USERNAME atau PASSWORD tidak boleh kosong!";
        } else if (register($user, $email, $pass)) {
            header('Location: login.php');
            exit();
        }
    }
?>

<!DOCTYPE html>
<html>

<head>
    <title>Registrasi | Data Peserta Didik </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style text="text/css">
        body {
            width: 100%;
            background-image: url(assets/bg-blue.jpeg);
            background-size: cover;
            background-position: center;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">
                        <h4>Registrasi</h4>
                    </div>
                    <div class="card-body">

                        <?php if (isset($error_message)) : ?>
                            <div><?php echo $error_message ?></div>
                        <?php endif; ?>

                        <form method="POST" action="">
                            <div class="form-group mb-4">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" name="username">
                            </div>
                            <div class="form-group mb-4">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" id="email" name="email">
                            </div>
                            <div class="form-group mb-4">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                            <button type="submit" class="btn btn-primary form-control" id="submit" name="submit">Sign Up</button>
                        </form>
                        <div class="mt-3 text-center">
                            <p>Sudah punya akun? <a href="login">Login sekarang!</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<footer>
    <reserved-by></reserved-by>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"></script>
</footer>

</html>