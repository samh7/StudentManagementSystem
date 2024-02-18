<?php
session_start();
include("php/config.php");
if (!isset($_SESSION["valid"])) {
  header("Location: sign_in.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Home</title>
  <link rel="stylesheet" href="../css/output.css" />
</head>

<body class="bg-light-blue-black">
  <header class="flex flex-row bg-blue-black text-white h-14 pt-3 px-3">

    <div class="text-lg font-extrabold"><a href="home.php">HOME</a></div>
    <div class="flex absolute  space-x-6 right-4">
      <div><a href="./search.php">Search</a></div>
      <div><a href="./log_out.php">Log Out</a></div>

    </div>
  </header>
  <main></main>
</body>

</html>