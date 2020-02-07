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

class C1
{
    function setC1($c11,$c11_path,$c12,$c12_path,$c1_total,$c1_id)
    {
        $db = new Database();
        $con = $db->open_connection();
        $query = "UPDATE `c1` SET `c11` = '$c11', `c11_path` = '$c11_path', `c12` = '$c12', `c12_path` = '$c12_path', `c1_total` = '$c1_total' WHERE `c1_id` = '$c1_id';";
        return $con->query($query);
    }
}


