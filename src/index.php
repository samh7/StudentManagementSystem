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
      include("./models/student.php");
      include("./php/config.php");
      if (isset($_POST["submit"])) {
        $u_name = $_POST["username"];
        $email = $_POST["email"];
        $registration = $_POST["registration"];
        $phone_number = $_POST["phone_number"];
        if (!ctype_digit($phone_number) || strlen($_POST["password"]) < 4) {
          echo '
          <div class="mt-44">
          <div class="text-lg font-extrabold text-red-600">
          <p>Phone Number cannot have letters!</p>
          and
          <p>Password must have more that 3 letters!</p>
          </div>
          <br />
          <a href="javascript:self.history.back()"
            ><button class="btn">Go Back</button></a
          >
        </div>
          ';
        } else {
          $address = $_POST["address"];
          if (empty($u_name) || empty($email) || empty($registration) || empty($phone_number) || empty($address) || empty($_POST["password"])) {
            echo '
          <div class="mt-44">
          <div class="text-lg font-extrabold text-red-600">
            <p>All the fields are required!</p>
          </div>
          <br />
          <a href="javascript:self.history.back()"
            ><button class="btn">Go Back</button></a
          >
        </div>
          ';
          } else {
            $password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);
            $student = new Student($registration, $u_name, $address, $phone_number, $email);
            $verify_query_email = mysqli_query($conn, "SELECT * FROM student where Email = '$email'") or die("Select Error");
            $verify_query_reg = mysqli_query($conn, "SELECT * FROM student where Registration = '$registration'") or die("Select Error");
            $verify_query_phone = mysqli_query($conn, "SELECT * FROM student where PhoneNumber = '$phone_number'") or die("Select Error");
            // $row = mysqli_fetch_array($verify_query);
            // $PasswordHash = $row["PasswordHash"];
            // echo password_verify( "admin", $password_hash) == true;
            if (mysqli_num_rows($verify_query_email) != 0 || mysqli_num_rows($verify_query_reg) != 0 || mysqli_num_rows($verify_query_phone) != 0) {
              echo '
          <div class="mt-44">
          <div class="text-lg font-extrabold text-red-600">
            <p>The email address or registration number or phone number is used, Try another One Please!</p>
          </div>
          <br />
          <a href="javascript:self.history.back()"
            ><button class="btn">Go Back</button></a
          >
        </div>
          ';
            } else {
              $query = mysqli_query($conn, $student->GetInsertSqlQuery() . "," . "'$password_hash')") or die("Insert Error!");
              echo '
          <div class="mt-44">
      <div class="text-lg font-extrabold text-green-600">
        <p>Sign Up Successful!</p>
      </div>
      <br />
      <a href="sign_in.php"
        ><button class="btn">Proceed To Sign In</button></a
      >
    </div>
          ';
            }
          }
          //       if (mysqli_num_rows($query) != 0) {
          //         echo "<div class='message'>
          //         <p>This email is used, Try another One Please!</p>
          //     </div> <br>";
          //         echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button>";
          //       } else {
          //         mysqli_query($conn, "INSERT INTO users(Username, Email, Age, PasswordHash)
          // VALUES('$username', '$email', '$age', '$password_HASH' )") or die("Error Occurred");
          //         echo "<div class='message'>
          //       <p>Registration successfully!</p>
          //   </div> <br>";
          //         echo "<a href='index.php'><button class='btn'>Login Now</button>";
          //       }
        }
      } else {

      ?>
        <form action="" method="POST">
          <header class="font-extrabold text-lg">WELCOME</header>
          <div class="mb-3 mt-3">
            <label for="username">Username</label>
            <br />
            <input class="rounded-sm p-1 w-52 " type="text" id="username" name="username" placeholder="Enter a username" />
          </div>
          <div class="mb-3">
            <label for="email">Email</label>
            <br />
            <input class=" w-52 rounded-sm p-1" type="email" id="email" name="email" placeholder="Enter an email" />
          </div>
          <div class="mb-3">
            <label for="registration">Registration</label>
            <br />
            <input class=" w-52 rounded-sm p-1" type="text" id="registration" name="registration" placeholder="Enter a registration" />
          </div>
          <div class="mb-3">
            <label for="phone_number">Phone Number</label>
            <br />
            <input class=" w-52 rounded-sm p-1" type="text" id="phone_number" name="phone_number" placeholder="Enter a Phone Number" />
          </div>
          <div class="mb-3">
            <label for="address">Address</label>
            <br />
            <input class=" w-52 rounded-sm p-1" type="text" id="address" name="address" placeholder="Enter an address" />
          </div>
          <div class="mb-3">
            <label for="password">Password</label>
            <br />
            <input class=" w-52 rounded-sm p-1" type="password" id="password" name="password" placeholder="Enter a password" />
          </div>
          <div class="flex justify-center">
            <input type="submit" name="submit" id="submit" value="Sign Up" class="bg-black w-52  text-white mr-10 h-10 rounded-lg">
          </div>
        </form>
        <div class="mt-4">
          Already a Member?
          <a class="text-sm text-blue-500" href="./sign_in.php">Sign in</a>
        </div>
    </div>
  <?php } ?>
  </div>
  <img width="300px" src="../assets/images/nature-dog.webp" alt="">
  </div>
</body>

</html>