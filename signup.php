<style>
    .error_message {
        color: #FF0000;
    }
</style>
<?php
session_start(); // Start a session

require_once("db_connection.php");

$errorMessage = "";
$fullNameError = "";
$emailError = "";
$passwordError = "";
$confirmPasswordError = "";
$loginError1="";

$fullName = "";
$email = "";
$password = "";
$confirmPassword = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullName = $_POST["fullName"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirmPassword"];

    $sqlCheckEmail = "SELECT id FROM users WHERE email = ?";
    $stmtCheckEmail = mysqli_prepare($conn, $sqlCheckEmail);
    mysqli_stmt_bind_param($stmtCheckEmail, "s", $email);
    mysqli_stmt_execute($stmtCheckEmail);
    mysqli_stmt_store_result($stmtCheckEmail);

    if (mysqli_stmt_num_rows($stmtCheckEmail) > 0) {
        $errorMessage = "Email address already exists. Please use a different email.";
    } else {
        if (empty($fullName)) {
            $fullNameError = "Full name is required.";
        } else {
            $fullName = test_Data_input($fullName);
            /*checking if only containintg lertters */
            if (!preg_match("/^[a-zA-Z-' ]*$/", $fullName)) {
                $nameErr = "Only letters and white space allowed";
            }

        }
        if (empty($email)) {
            $emailError = "Email address is required.";
        } else {
            // check if the e-mail address is well-formed and well structured
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format";
            }
        }

        if (empty($password)) {
            $passwordError = "Password is required.";
        } elseif ($password !== $confirmPassword) {
            $passwordError = "Passwords do not match.";
            $confirmPasswordError = "Passwords do not match.";
        } else {
            if (!preg_match('/^(?=.*[A-Z])(?=.*[0-9])(?=.*[^a-zA-Z0-9]).{6,}$/', $password)) {
                $password = test_Data_input($password);
            } else {
                $passwordError = "invalid:Password must contain at least one uppercase letter, one digit, one unique character, and be at least 6 characters long.";
            }

        }

        if (empty($confirmPassword)) {
            $confirmPasswordError = "Confirm password is required.";
        } else {
            if (!preg_match('/^(?=.*[A-Z])(?=.*[0-9])(?=.*[^a-zA-Z0-9]).{6,}$/', $confirmPassword)) {
                $confirmPassword = test_Data_input($confirmPassword);
            } else {
                $confirmPasswordError = "invalid:Password must contain at least one uppercase letter, one digit, one unique character, and be at least 6 characters long.";
            }

        }

        if (empty($fullNameError) && empty($emailError) && empty($passwordError) && empty($confirmPasswordError)) {
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);

            $sqlInsertPassword = "INSERT INTO passwords (password_hash) VALUES (?)";
            $stmtInsertPassword = mysqli_prepare($conn, $sqlInsertPassword);
            mysqli_stmt_bind_param($stmtInsertPassword, "s", $passwordHash);

            if (mysqli_stmt_execute($stmtInsertPassword)) {
                $passwordId = mysqli_insert_id($conn);
                mysqli_stmt_close($stmtInsertPassword);

                $sqlInsertUser = "INSERT INTO users (username, email, password_id) VALUES (?, ?, ?)";
                $stmtInsertUser = mysqli_prepare($conn, $sqlInsertUser);
                mysqli_stmt_bind_param($stmtInsertUser, "ssi", $fullName, $email, $passwordId);

                if (mysqli_stmt_execute($stmtInsertUser)) {
                    // Store user data in session
                    $_SESSION['user_id'] = mysqli_insert_id($conn); // Store the user's ID
                    $_SESSION['user_full_name'] = $fullName; // Store the user's full name

                    header("Location: profile.php"); // Redirect to the profile page
                    exit();
                } else {
                    $errorMessage = "Error inserting user: " . mysqli_error($conn);
                }

                mysqli_stmt_close($stmtInsertUser);
            } else {
                $errorMessage = "Error inserting password: " . mysqli_error($conn);
            }
        }
    }

    mysqli_stmt_close($stmtCheckEmail);

}
function test_Data_input($data)
{
    $data = stripcslashes($data);
    $data = trim($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login & Signup Form</title>
    <link rel="stylesheet" href="signups.css" />
    <link rel="stylesheet" href="dashboards.css" />
    <link rel="icon" href="images/logo2.png" type="image/x-icon">
    <script defer src="JS_index4.js"></script>
</head>

<body>
    <header>
        <h1>Welcome to MST Coin Auction</h1>
    </header>
    <nav>
        <ul>
            <li style="display: inline;"><a href="index.php">Home</a></li>
            <li style="display: inline;"><a href="adminsign.php">Admin</a></li>
        </ul>
    </nav>
    <section class="wrapper">
        <div class="form signup">
            <header>Signup</header>
            <p><span class="error_message ">* required field</span></p>
            <form action="signup.php" id="signupForm" method="post">



                <input type="text" name="fullName" id="fullName" placeholder="Full name" required
                    value="<?php echo $fullName; ?>" />
                <div class="error_message">*
                    <?php echo $fullNameError; ?>
                    <br>
                </div>

                <input type="email" name="email" value="<?php echo $email; ?>" id="email" placeholder="Email address"
                    required />

                <div class="error_message">*
                    <?php echo $emailError; ?>
                    <br>
                </div>


                <input type="password" name="password" id="password" placeholder="Password" required />
                <div class="error_message">*
                    <?php echo $passwordError; ?>
                    <br>
                </div>


                <input type="password" name="confirmPassword" id="confirmPassword" placeholder="Confirm Password"
                    required />
                <div class="error_message">*
                    <?php echo $confirmPasswordError; ?>
                    <br>
                </div>


                <div class="checkbox">
                    <input type="checkbox" id="signupCheck" required />
                    <label for="signupCheck">I accept all terms & conditions</label>
                </div>
                <input type="submit" value="Signup" />
            </form>

        </div>

        <div class="form login">
            <header>Login</header>
            <form action="login1.php" id="loginForm" method="post">
                <input type="email" name="loginEmail" id="loginEmail" placeholder="Email address" required />
                <input type="password" name="loginPassword" id="loginPassword" placeholder="Password" required />
                <a href="forgot_password.php">Forgot password?</a>
                <div class="error_message">
                    <?php echo $loginError1; ?>
                    <br>
                </div>
                <input type="submit" value="Login" />
            </form>
        </div>
    </section>
</body>

</html>