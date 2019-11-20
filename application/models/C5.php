<?php
/**
 * Created by PhpStorm.
 * User: sanathls
 * Date: 20/11/19
 * Time: 3:22 PM
 */

require_once __DIR__."/../utilities/Database.php";

class C5
{
    function setC5($c51_1,$c51_2,$c51_3,$c51_path,$c52,$c52_path,$c53,$c53_path,$c5_total,$c5_id)
    {
        $db = new Database();
        $con = $db->open_connection();
        $query = "UPDATE `c5` SET `c51_1` = '$c51_1', `c51_2` = '$c51_2', `c51_3` = '$c51_3', `c51_path` = '$c51_path', `c52` = '$c52', `c52_path` = '$c52_path', `c53` = '$c53', `c53_path` = '$c53_path', `c5_total` = '$c5_total' WHERE `c5_id` = '$c5_id'";
        return $con->query($query);
    }
}