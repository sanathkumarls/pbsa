<?php
/**
 * Created by PhpStorm.
 * User: sanathls
 * Date: 09/11/19
 * Time: 2:14 AM
 */

$objLogout = new LogoutController();
$objLogout->logout();

class LogoutController
{
    function logout()
    {
        session_start();
        session_destroy();
        echo '<script>alert("Logged Out Successfully"); window.location.href="../views/index.php"</script>';
    }
}