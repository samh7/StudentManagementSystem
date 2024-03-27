<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Index</title>
  <link rel="stylesheet" href="output.css" />
  <link rel="stylesheet" href="styles.css" />
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
      include("./php/config.php");
      if (isset($_POST["submit"])) {
        $email = $_POST["email"];
        $registration = $_POST["registration"];
        if (empty($email) && empty($registration)) {
          echo '
          <div class="mt-44">
          <div class="text-lg font-extrabold text-red-600">
            <p>Enter either an Email address or a Registration number</p>
          </div>
          <br />
          <a href="javascript:self.history.back()"
            ><button class="btn">Go Back</button></a
          >
        </div>
          ';
        } else if (empty($email)) {
          $query = mysqli_query($conn, "SELECT * FROM student where Registration = '$registration'") or die("Select Error");
          $row = mysqli_fetch_array($query);
          $password_verify = password_verify($_POST["password"], $row["PasswordHash"]);
          echo $password_verify;

          if ($password_verify == true) {
            // $_SESSION["username"] = $row["Username"];
            $_SESSION["email"] = $row["Email"];
            $_SESSION["address"] = $row["Address"];
            $_SESSION["phone_number"] = $row["PhoneNumber"];
            $_SESSION["registration"] = $row["Registration"];
            $_SESSION["valid"] = true;
            header("Location: home.php");
          } else {
            echo '
            <div class="mt-44">
            <div class="text-lg font-extrabold text-red-600">
              <p>Invalid Login Details</p>
            </div>
            <br />
            <a href="javascript:self.history.back()"
              ><button class="btn">Go Back</button></a
            >
          </div>
            ';
          }
        } else {
          $query = mysqli_query($conn, "SELECT * FROM student where Email = '$email'") or die("Select Error");
          $row = mysqli_fetch_array($query);
          $password_verify = password_verify($_POST["password"], $row["PasswordHash"]);
          echo $password_verify;
          if ($password_verify == true) {
            $_SESSION["email"] = $row["Email"];
            $_SESSION["address"] = $row["Address"];
            $_SESSION["phone_number"] = $row["PhoneNumber"];
            $_SESSION["registration"] = $row["Registration"];
            $_SESSION["valid"] = true;
            header("Location: home.php");
          } else {
            echo '
            <div class="mt-44">
            <div class="text-lg font-extrabold text-red-600">
              <p>Invalid Login Details</p>
            </div>
            <br />
            <a href="javascript:self.history.back()"
              ><button class="btn">Go Back</button></a
            >
          </div>
            ';
          }
        }
      } else {
      ?>

        <form action="" method="POST">
          <header class="font-extrabold text-lg">WELCOME BACK</header>
          <div class="mb-3 mt-20">
            <label for="email">Email</label>
            <br />
            <input class=" w-52 rounded-sm p-1" type="email" id="email" name="email" placeholder="Enter an email" />
          </div>
          <div class="text-lg font-extrabold">OR</div>
          <div class="mb-5">
            <label for="registration">Registration</label>
            <br />
            <input class=" w-52 rounded-sm p-1" type="text" id="registration" name="registration" placeholder="Enter a registration" />
          </div>
          <div class="mb-3">
            <label for="password">Password</label>
            <br />
            <input class=" w-52 rounded-sm p-1" type="password" id="password" name="password" placeholder="Enter a password" />
          </div>
          <div class="flex justify-center">
            <input type="submit" name="submit" id="submit" value="Sign In" class="bg-black w-52  text-white mr-10 h-10 rounded-lg">
          </div>
        </form>
        <div class="mt-4">
          Don't have an account?
          <a class="text-sm text-blue-500" href="./index.php">Sign Up</a>
        </div>
        <div class="mt-4">
          Forgot Password?
          <a class="text-sm text-blue-500" href="./reset_password.php">Reset Password</a>
        </div>
    </div>

  <?php } ?>
  </div>
  <img width="300px" src="nature-dog.webp" alt="">
  </div>
</body>

</html>