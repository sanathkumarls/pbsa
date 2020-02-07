<?php
/**
 * Copyright (c) 2020.  Sanath L S
 */

/**
 * Created by PhpStorm.
 * User: sanathls
 * Date: 20/11/19
 * Time: 3:22 PM
 */

require_once __DIR__."/../utilities/Database.php";

class C6
{
    function setC6($c61,$c61_path,$c62,$c62_path,$c63,$c63_path,$c64,$c64_path,$c6_total,$c6_id)
    {
        $db = new Database();
        $con = $db->open_connection();
        $query = "UPDATE `c6` SET `c61` = '$c61', `c61_path` = '$c61_path', `c62` = '$c62', `c62_path` = '$c62_path', `c63` = '$c63', `c63_path` = '$c63_path', `c64` = '$c64', `c64_path` = '$c64_path', `c6_total` = '$c6_total' WHERE `c6_id` = '$c6_id'";
        return $con->query($query);
    }
}