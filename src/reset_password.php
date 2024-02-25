<?php
session_start();
include("php/config.php");
include("php/mailer.php");
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
        $email = $_POST["email"];
        if (empty($email)) {
          echo '
          <div class="mt-44">
          <div class="text-lg font-extrabold text-red-600">
            <p>Enter a valid Email Address</p>
          </div>
          <br />
          <a href="javascript:self.history.back()"
            ><button class="btn">Go Back</button></a
          >
        </div>
          ';
        } else {
          $query = mysqli_query($conn, "SELECT * FROM student where Email = '$email'") or die("Select Error");
          $row = mysqli_fetch_array($query);
          if (empty($row)) {
            echo '
          <div class="mt-44">
          <div class="text-lg font-extrabold text-red-600">
            <p>Enter a valid Email Address</p>
          </div>
          <br />
          <a href="javascript:self.history.back()"
            ><button class="btn">Go Back</button></a
          >
        </div>';
          } else {
            $mailer = new Mailer();
            $password_reset_token = $mailer->ResetPassword($email);
            $_SESSION["reset_token"] = $password_reset_token;
            $_SESSION["email"] = "$email";
            $_SESSION["valid_p"] = true;
            header("Location: verify_password_reset_token.php");
          }
        }
      }
      ?>

      <form action="" method="POST">
        <header class="font-extrabold text-lg">Password Reset</header>
        <div class="mb-3 mt-40">
          <br />
          <input class=" w-52 rounded-sm p-1" type="text" id="email" name="email" placeholder="Enter your email address" />
        </div>
        <div class="flex justify-center">
          <input type="submit" name="submit" id="submit" value="Search" class="bg-black w-52  text-white mr-10 h-10 rounded-lg">
        </div>
        <div class="flex justify-start">
          <button class="bg-green-900 w-16 mt-10  text-white mr-10 h-10 rounded-lg">
            <a href="javascript:self.history.back()">Go Back</a>
          </button>
        </div>
      </form>
    </div>
  </div>
  <img width="300px" src="../assets//images/nature-dog.webp" alt="">
  </div>
</body>

</html>