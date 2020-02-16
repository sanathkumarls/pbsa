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

class C4
{
    function setC4($c41_1_1,$c41_1_2,$c41_2_1,$c41_2_2,$c41_3_1,$c41_3_2,$c41_4_1,$c41_4_2,$c41_path,$c42_1_1,$c42_1_2,$c42_1_3,$c42_2_1,$c42_2_2,$c42_2_3,$c42_path,$c43_1,$c43_2,$c43_path,$c4_total,$c4_id)
    {
        $db = new Database();
        $con = $db->open_connection();
        $query = "UPDATE `c4` SET `c41_1_1` = '$c41_1_1',`c41_1_2` = '$c41_1_2',`c41_2_1` = '$c41_2_1',`c41_2_2` = '$c41_2_2',`c41_3_1` = '$c41_3_1',`c41_3_2` = '$c41_3_2',`c41_4_1` = '$c41_4_1',`c41_4_2` = '$c41_4_2', `c41_path` = '$c41_path', `c42_1_1` = '$c42_1_1', `c42_1_2` = '$c42_1_2', `c42_1_3` = '$c42_1_3', `c42_2_1` = '$c42_2_1', `c42_2_2` = '$c42_2_2', `c42_2_3` = '$c42_2_3', `c42_path` = '$c42_path', `c43_1` = '$c43_1', `c43_2` = '$c43_2', `c43_path` = '$c43_path', `c4_total` = '$c4_total' WHERE `c4_id` = '$c4_id'";
        return $con->query($query);
    }
}