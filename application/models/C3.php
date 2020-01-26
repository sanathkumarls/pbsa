<?php
/**
 * Created by PhpStorm.
 * User: sanathls
 * Date: 20/11/19
 * Time: 3:22 PM
 */

require_once __DIR__."/../utilities/Database.php";

class C3
{
    function setC3($c31_1,$c31_2,$c31_3,$c31_4,$c31_5,$c31_path,$c32_1,$c32_2,$c32_3,$c32_4,$c32_5,$c32_6,$c32_7,$c32_8,$c32_9,$c32_10,$c32_11,$c32_12,$c32_13,$c32_14,$c32_15,$c32_16,$c32_17,$c32_18,$c32_19,$c32_path,$c3_total,$c3_id)
    {
        $db = new Database();
        $con = $db->open_connection();
        $query = "UPDATE `c3` SET `c31_1` = '$c31_1', `c31_2` = '$c31_2', `c31_3` = '$c31_3', `c31_4` = '$c31_4', `c31_5` = '$c31_5', `c31_path` = '$c31_path', `c32_1` = '$c32_1', `c32_2` = '$c32_2', `c32_3` = '$c32_3', `c32_4` = '$c32_4', `c32_5` = '$c32_5', `c32_6` = '$c32_6', `c32_7` = '$c32_7', `c32_8` = '$c32_8', `c32_9` = '$c32_9', `c32_10` = '$c32_10', `c32_11` = '$c32_11', `c32_12` = '$c32_12', `c32_13` = '$c32_13', `c32_14` = '$c32_14', `c32_15` = '$c32_15', `c32_16` = '$c32_16', `c32_17` = '$c32_17', `c32_18` = '$c32_18', `c32_19` = '$c32_19', `c32_path` = '$c32_path', `c3_total` = '$c3_total' WHERE `c3_id` = '$c3_id'";
        return $con->query($query);
    }
}