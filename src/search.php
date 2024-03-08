<!DOCTYPE html>
<?php
session_start();
include("php/config.php");
if (!isset($_SESSION["valid"])) {
  header("Location: sign_in.php");
}
?>
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
      if (isset($_POST["submit"])) {
        $registration = $_POST["registration"];
        $query = mysqli_query($conn, "SELECT * FROM student where Registration = '$registration'") or die("Select Error");
        $row = mysqli_fetch_array($query);
        if (empty($row)) {
          echo '
          <div class="mt-44">
          <div class="text-lg font-extrabold text-red-600">
            <p>No Student Found with that Registration Number</p>
          </div>
          <br />
          <a href="javascript:self.history.back()"
            ><button class="btn">Go Back</button></a
          >
        </div>
          ';
        } else {
          $phone_number = $row["PhoneNumber"];
          echo "
          <div class=\"mt-44\">
          <div class=\"text-lg\">
            <p class=\"font-extrabold underline\">Registration: $registration</p>
            <p>Phone Number: $phone_number</p>
          </div>
          <br />
          <a href=\"javascript:self.history.back()\"
            ><button class=\"btn\">Go Back</button></a
          >
        </div>
          ";
        }
      } else {
      ?>

        <form action="" method="POST">
          <header class="font-extrabold text-lg">Contact Search</header>
          <div class="mb-3 mt-40">
            <br />
            <input class=" w-52 rounded-sm p-1" type="text" id="registration" name="registration" placeholder="Enter the user's registration" />
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
      <?php } ?>
    </div>
  </div>
  <img width="300px" src="nature-dog.webp" alt="">
  </div>
</body>

</html>