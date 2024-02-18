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
                $reset_token = $_POST["reset_token"];
                if ($_SESSION["reset_token"] == $reset_token) {
                    echo '
                    <div class="mt-44">
                    <div class="text-lg font-extrabold text-green-600">
                      <p>Password Token Verified</p>
                    </div>
                    <br />
                    <a href="new_password.php"
                      ><button class="btn">Proceed To Reset Password</button></a
                    >
                    <a href="javascript:self.history.back()"
                      ><button class="btn">Go Back</button></a
                    >
                  </div>';
                }
                // if (empty($email)) {
                //   echo '
                //   <div class="mt-44">
                //   <div class="text-lg font-extrabold text-red-600">
                //     <p>Enter a valid Email Address</p>
                //   </div>
                //   <br />
                //   <a href="javascript:self.history.back()"
                //     ><button class="btn">Go Back</button></a
                //   >
                // </div>
                //   ';
                // } else {

                // }
            } else {
            ?>

                <form action="" method="POST">
                    <header class="font-extrabold text-lg">Verify Password Reset Token</header>
                    <div class="mb-3 mt-40">
                        <br />
                        <input class=" w-52 rounded-sm p-1" type="text" id="reset_token" name="reset_token" placeholder="Enter your password reset token" />
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
    <img width="300px" src="../assets//images/nature-dog.webp" alt="">
    </div>
</body>

</html>