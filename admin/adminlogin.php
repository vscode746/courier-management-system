<!-- admin logIn page and login logic -->
<?php

session_start();
if (isset($_SESSION['uid'])) {

    header('location: dashboard.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
</head>

<body bgcolor="#faffdb">
    <h3><a href="../index.php" style="float: right; margin-right:100px; color:#ff3396">BackToHome</a></h3><br>
    <h1 align='center' style="color: #00BCD4;font-size:60px">Admin Login</h1>
    <h4 align='center' style="color: #cc33ff;font-weight: bold;font-size:25px">Enter Email_id/Password</h4>
    <form action="adminlogin.php" method="POST" style="margin: auto;">
        <table align="center">
            <tr>
                <td>Email_ID:</td>
                <td><input type="email" name="uname" placeholder="Enter username/email-Id" required
                        style="width: 300px; height: 33px;"></td>
            </tr>
            <tr>
                <td><br></td>
            </tr>
            <tr>
                <td>Password:</td>
                <td><input type=" password" name="pass" placeholder="Enter your password" required
                        style="width: 300px; height: 33px;"></td>
            </tr>
            <tr>
                <td colspan=" 2">
                    <hr>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" name="login" value="Login"
                        style="background-color: blue; border-radius: 15px; width: 140px; height: 50px;cursor:pointer; color:white;">
                </td>
            </tr>
        </table>
    </form>
</body>

</html>

<?php

include('../dbconnection.php');
if (isset($_POST['login'])) {
    $ademail = $_POST['uname'];
    $password = $_POST['pass'];
    $qry = "SELECT * FROM `adlogin` WHERE `email`='$ademail' AND `password`='$password'";
    $run = mysqli_query($dbcon, $qry);
    $row = mysqli_num_rows($run);
    if ($row < 1) {
        ?>
<script>
alert("Only admin can login..");
window.open('adminlogin.php', '_self');
</script><?php
    }
    else {
        $data = mysqli_fetch_assoc($run);
        $id = $data['a_id'];
        $_SESSION['uid'] = $id;
        header('location:dashboard.php');
    }
}
?>