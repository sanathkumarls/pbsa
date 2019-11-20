<?php
/**
 * Created by PhpStorm.
 * User: sanathls
 * Date: 20/11/19
 * Time: 3:22 PM
 */

require_once __DIR__."/../utilities/Database.php";

class C4
{
    function setC4($c41,$c41_path,$c42,$c42_path,$c43,$c43_path,$c44,$c44_path,$c45,$c45_path,$c4_total,$c4_id)
    {
        $db = new Database();
        $con = $db->open_connection();
        $query = "UPDATE `c4` SET `c41` = '$c41', `c41_path` = '$c41_path', `c42` = '$c42', `c42_path` = '$c42_path', `c43` = '$c43', `c43_path` = '$c43_path', `c44` = '$c44', `c44_path` = '$c44_path', `c45` = '$c45', `c45_path` = '$c45_path', `c4_total` = '$c4_total' WHERE `c4_id` = '$c4_id'";
        return $con->query($query);
    }
}