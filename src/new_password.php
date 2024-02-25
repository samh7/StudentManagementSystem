<?php
session_start();
include("php/config.php");
if (!isset($_SESSION["valid_p"])) {
    header("Location: sign_in.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Index</title>
    <link rel="stylesheet" href="../css/output.css" />
    <link rel="stylesheet" href="../css/styles.css" />
    <style>
        .min-width {
            min-width: 360px;
        }

        .min-height {
            min-height: 540px;
        }
    </style>
</head>

<body class="flex bg-blue-black justify-center mt-10">
    <div class="flex flex-row space-x-10 bg-light-blue-black  h-64 min-width min-height shadow">
        <div class="pl-20">
            <?php
            if (isset($_POST["submit"])) {
                $password1 = $_POST["password"];
                $password2 = $_POST["password2"];
                if (empty($password1) || empty($password2) || strcmp($password1, $password2) != 0) {
                    echo '
                    <div class="mt-44">
                    <div class="text-lg font-extrabold text-red-600">
                      <p>All fields are required  or Passwors do not match!</p>
                    </div>
                    <br />
                    <a href="javascript:self.history.back()"
                      ><button class="btn">Go Back</button></a
                    >
                  </div>';
                } else {
                    $email = $_SESSION["email"];
                    $password_hash =  password_hash($password1, PASSWORD_DEFAULT);
                    mysqli_query($conn, "UPDATE student SET PasswordHash='$password_hash' WHERE Email = '$email'") or die("Update Error!");
                    echo '
                    <div class="mt-44">
                    <div class="text-lg font-extrabold text-green-600">
                      <p>Password Reset Successful!</p>
                    </div>
                    <br />
                    <a href="sign_in.php"
                      ><button class="btn">Sign In</button></a
                    >
                  </div>
                  ';
                }
            } else {
            ?>

                <form action="" method="POST">
                    <header class="font-extrabold text-lg">New Password </header>
                    <div class="mb-3 mt-40">
                        <br />
                        <input class=" w-52 rounded-sm p-1" type="text" id="password" name="password" placeholder="Enter your password" />
                    </div>
                    <div class="mb-3 ">
                        <br />
                        <input class=" w-52 rounded-sm p-1" type="text" id="password2" name="password2" placeholder="Enter your password again" />
                    </div>

                    <div class="flex justify-center">
                        <input type="submit" name="submit" id="submit" value="Reset" class="bg-black w-52  text-white mr-10 h-10 rounded-lg">
                    </div>
                    <div class="flex justify-start">
                        <button class="bg-green-900 w-16 mt-10  text-white mr-10 h-10 rounded-lg">
                            <a href="javascript:self.history.back()">Go Back</a>
                        </button>
                    </div>
                </form>

            <?php } ?>
        </div>
    </div>
    <img width="300px" src="../assets//images/nature-dog.webp" alt="">
    </div>
</body>

</html>