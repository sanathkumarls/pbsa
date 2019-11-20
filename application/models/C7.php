<?php
/**
 * Created by PhpStorm.
 * User: sanathls
 * Date: 20/11/19
 * Time: 3:22 PM
 */

require_once __DIR__."/../utilities/Database.php";

class C7
{
    function setC7($c71,$c71_path,$c72,$c72_path,$c73,$c73_path,$c74,$c74_path,$c7_total,$c7_id)
    {
        $db = new Database();
        $con = $db->open_connection();
        $query = "UPDATE `c7` SET `c71` = '$c71', `c71_path` = '$c71_path', `c72` = '$c72', `c72_path` = '$c72_path', `c73` = '$c73', `c73_path` = '$c73_path', `c74` = '$c74', `c74_path` = '$c74_path', `c7_total` = '$c7_total' WHERE `c7_id` = '$c7_id'";
        return $con->query($query);
    }
}