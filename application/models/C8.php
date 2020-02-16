<?php
/**
 * Copyright (c) 2020.  Sanath L S
 */

/**
 * Created by PhpStorm.
 * User: sanathls
 * Date: 20/11/19
 * Time: 3:23 PM
 */

require_once __DIR__."/../utilities/Database.php";

class C8
{
    function setC8($c81_1_1,$c81_1_2,$c81_2_1,$c81_2_2,$c81_3_1,$c81_3_2,$c81_path,$c82,$c82_path,$c83,$c83_path,$c84_1,$c84_2,$c84_path,$c85_1,$c85_2,$c85_3,$c85_4,$c85_path,$c86,$c86_path,$c87_1,$c87_2,$c87_3,$c87_path,$c8_total,$c8_id)
    {
        $db = new Database();
        $con = $db->open_connection();
        $query = "UPDATE `c8` SET `c81_1_1` = '$c81_1_1', `c81_1_2` = '$c81_1_2', `c81_2_1` = '$c81_2_1', `c81_2_2` = '$c81_2_2', `c81_3_1` = '$c81_3_1', `c81_3_2` = '$c81_3_2', `c81_path` = '$c81_path', `c82` = '$c82', `c82_path` = '$c82_path', `c83` = '$c83', `c83_path` = '$c83_path', `c84_1` = '$c84_1', `c84_2` = '$c84_2', `c84_path` = '$c84_path', `c85_1` = '$c85_1', `c85_2` = '$c85_2', `c85_3` = '$c85_3', `c85_4` = '$c85_4', `c85_path` = '$c85_path', `c86` = '$c86', `c86_path` = '$c86_path', `c87_1` = '$c87_1', `c87_2` = '$c87_2', `c87_3` = '$c87_3', `c87_path` = '$c87_path', `c8_total` = '$c8_total' WHERE `c8_id` = '$c8_id'";
        return $con->query($query);
    }
}