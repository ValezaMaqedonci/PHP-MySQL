
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        html, body {
            height: 100%;
        }

        body {
            display: flex;
            align-items: center;
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #f5f5f5;
        }

        .form-signin {
            width: 100%;
            max-width: 330px;
            padding: 15px;
            margin: auto;
        }

        .form-floating {
            margin: 10px;
        }
    </style>
</head>

<body class="text-center">

<main class="form-signin">

    <form action="loginLogic.php" method="post">

        <img class="mb-4"
             src="https://getbootstrap.com/docs/5.1/assets/brand/bootstrap-logo.svg"
             width="72" height="57" alt="">

        <h1 class="h3 mb-3 fw-normal">Sign In</h1>

        <div class="form-floating">
            <input type="text"
                   class="form-control"
                   name="username"
                   placeholder="Username"
                   required>
            <label>Username</label>
        </div>

        <div class="form-floating">
            <input type="password"
                   class="form-control"
                   name="password"
                   placeholder="Password"
                   required>
            <label>Password</label>
        </div>

        <button class="w-100 btn btn-lg btn-primary"
                type="submit"
                name="submit">
            Sign In
        </button>

        <p class="mt-3">
            Don't have an account?
            <a href="index.php">Register</a>
        </p>

    </form>

</main>

</body>
</html>
