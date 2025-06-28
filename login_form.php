<?php
include_once 'classes/db1.php';
session_start();
?>

<!DOCTYPE HTML>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Campus Events</title>
    <style>
        span.error {
            color: red;
        }
        .form-control::placeholder {
            color: #ccc;
            font-style: italic;
        }
    </style>
    <?php require 'utils/styles.php'; ?>
</head>

<body>
    <?php require 'utils/header3.php'; ?>
    <div class="content">
        <div class="container">
            <div class="col-md-6 col-md-offset-3">
                <form method="POST">
                    <label for="username">UserName:</label><br>
                    <input type="text" id="username" name="name" class="form-control" placeholder="Enter Username" required><br>

                    <label for="password">Password:</label><br>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Enter Password" required><br>

                    <button type="submit" name="login" class="btn btn-default">Login</button>
                </form>
            </div>
        </div>
        <a class="btn btn-default" href="index.php"><span class="glyphicon glyphicon-circle-arrow-left"></span> Back</a>
    </div>
    <?php require 'utils/footer.php'; ?>
</body>

</html>

<?php
if (isset($_POST["login"])) {
    // Sanitize user input
    $myusername = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $mypassword = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

    // Fetch user from the database
    $stmt = $conn->prepare("SELECT password FROM users WHERE username = ?");
    $stmt->bind_param("s", $myusername);
    $stmt->execute();
    $stmt->store_result();

    // If the user exists
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($hashed_password);
        $stmt->fetch();

        // Verify the password
        if (password_verify($mypassword, $hashed_password)) {
            $_SESSION['username'] = $myusername;
            echo "<script>
                    alert('Login Successful');
                    window.location.href='adminPage.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Invalid credentials');
                    window.location.href='login_form.php';
                  </script>";
        }
    } else {
        echo "<script>
                alert('Invalid credentials');
                window.location.href='login_form.php';
              </script>";
    }

    $stmt->close();
}
?>
