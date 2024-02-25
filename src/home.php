<?php
session_start();
include("php/config.php");
if (!isset($_SESSION["valid"])) {
  header("Location: sign_in.php");
}
$email = $_SESSION["email"];
$query = mysqli_query($conn, "SELECT * FROM student where Email = '$email'") or die("Select Error");
$row = mysqli_fetch_array($query);
$username = $row["Username"];
$reg_no = $row["Registration"];
$address = $row["Address"];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Home</title>
  <link rel="stylesheet" href="../css/output.css" />
  <style>
    .sep-width {
      max-width: 1000px;
    }
  </style>
</head>

<body class="bg-light-blue-black">
  <header class="flex flex-row bg-blue-black text-white h-14 pt-3 px-3">

    <div class="text-lg font-extrabold"><a href="home.php">Dashboard</a></div>
    <div class="flex absolute  space-x-6 right-4">
      <div><a href="./search.php">Search</a></div>
      <div><a href="./log_out.php">Log Out</a></div>
    </div>
  </header>
  <main class="mt-4">
    <div class="ml-4 text-lg font-extrabold">
      <span class="flex justify-center ">
        <!-- Welcome back -->
        Basic Information
        <?php
        // echo $username;
        ?>
      </span>
      <div class="flex justify-center">
        <div class="w-20 h-20 bg-black rounded-full">
        </div>

        <div class="ml-10 flex ">
          <div class="flex flex-col">
            <span class="text-nowrap font-bold">
              Reg. No.
            </span><span class="font-bold">
              Name
            </span><span class="font-bold">
              Email
            </span>
          </div>
          <div class="flex flex-col">
            <span class="ml-10 font-normal text-green-950"> <?php echo $reg_no; ?> </span>
            <span class="ml-10 font-normal text-green-950"> <?php echo $username; ?> </span>
            <span class="ml-10 font-normal text-green-950"> <?php echo $email; ?> </span>

          </div>
        </div>

        <div class="ml-10 flex  ">
          <div class="flex flex-col">
            <span class="font-bold">
              Address
            </span><span class="font-bold">
              Date of Birth
            </span><span class="font-bold">
              Campus
            </span>
          </div>

          <div class="flex flex-col">
            <span class="ml-10 font-normal text-green-950"> <?php echo $address; ?> </span>
            <span class="ml-10 font-normal text-green-950"> 01/01/1997 </span>
            <span class="ml-10 font-normal text-green-950"> Main </span>

          </div>
        </div>
      </div>

      <div class="flex ml-4 mt-7 justify-center">
        <button class=" bg-red-500 rounded-md h-14 mr-10 w-52">Get Catering Token</button>
        <button class=" bg-green-600 rounded-md h-14 w-52">Get Academic Calender</button>
      </div>
      <div class="sep-width mx-20 my-6 bg-gray-700 h-1">
      </div>
      <div class="flex justify-center ">
        <div class="ml-10 flex">
          <div class="flex flex-col">
            <span class="font-bold">
              Current Programme
            </span><span class="font-bold">
              Attempted Units
            </span><span class="font-bold">
              Registered Units
            </span>
          </div>
          <div class="flex flex-col">
            <span class="ml-10 font-normal text-green-950"> B.SE </span>
            <span class="ml-10 font-normal text-green-950"> 38 </span>
            <span class="ml-10 font-normal text-green-950"> 9 </span>

          </div>

          <div class="ml-10 flex">
            <div class="flex flex-col">
              <span class="font-bold">
                Total Billed
              </span><span class="font-bold">
                Total Paid
              </span><span class="font-bold">
                Fee Balance
              </span>
            </div>
            <div class="flex flex-col">
              <span class="ml-10 font-normal text-green-950"> 210,100.23 </span>
              <span class="ml-10 font-normal text-green-950"> 210,100.23 </span>
              <span class="ml-10 font-normal text-green-950"> 0.0 </span>
            </div>
          </div>

        </div>
      </div>
      <div class="mx-20 sep-width my-6 bg-gray-700 h-1">
  </main>
  <style>
    footer{
      position: absolute;
      bottom: 0%;
    }
  </style>
  <footer class=" flex justify-center  bg-blue-black text-white h-10 pt-3 px-3 w-full">
    &copy; All rights reserved.
  </footer>
</body>

</html>