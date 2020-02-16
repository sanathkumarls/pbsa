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

class C7
{
    function setC7($c71_1_1,$c71_1_2,$c71_1_3,$c71_2_1,$c71_2_2,$c71_2_3,$c71_path,$c72_1_1,$c72_1_2,$c72_1_3,$c72_2_1,$c72_2_2,$c72_2_3,$c72_path,$c73_1,$c73_2,$c73_path,$c74,$c74_path,$c7_total,$c7_id)
    {
        $db = new Database();
        $con = $db->open_connection();
        $query = "UPDATE `c7` SET `c71_1_1` = '$c71_1_1', `c71_1_2` = '$c71_1_2', `c71_1_3` = '$c71_1_3', `c71_2_1` = '$c71_2_1', `c71_2_2` = '$c71_2_2', `c71_2_3` = '$c71_2_3', `c71_path` = '$c71_path', `c72_1_1` = '$c72_1_1', `c72_1_2` = '$c72_1_2', `c72_1_3` = '$c72_1_3', `c72_2_1` = '$c72_2_1', `c72_2_2` = '$c72_2_2', `c72_2_3` = '$c72_2_3', `c72_path` = '$c72_path', `c73_1` = '$c73_1', `c73_2` = '$c73_2', `c73_path` = '$c73_path', `c74` = '$c74', `c74_path` = '$c74_path', `c7_total` = '$c7_total' WHERE `c7_id` = '$c7_id'";
        return $con->query($query);
    }
}