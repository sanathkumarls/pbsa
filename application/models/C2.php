<?php
/**
 * Created by PhpStorm.
 * User: sanathls
 * Date: 20/11/19
 * Time: 3:22 PM
 */

require_once __DIR__."/../utilities/Database.php";

class C2
{
    function setC2($c21,$c21_path,$c22,$c22_path,$c23,$c23_path,$c24,$c24_path,$c2_total,$c2_id)
    {
        $db = new Database();
        $con = $db->open_connection();
        $query = "UPDATE `c2` SET `c21` = '$c21', `c21_path` = '$c21_path', `c22` = '$c22', `c22_path` = '$c22_path', `c23` = '$c23', `c23_path` = '$c23_path', `c24` = '$c24', `c24_path` = '$c24_path', `c2_total` = '$c2_total' WHERE `c2_id` = '$c2_id'";
        return $con->query($query);
    }
}