<?php
/**
 * Created by PhpStorm.
 * User: sanathls
 * Date: 20/11/19
 * Time: 2:35 PM
 */

require_once __DIR__."/../utilities/Database.php";

class Pbsa
{
    function getPbsa($e_id,$year)
    {
        $db = new Database();
        $con = $db->open_connection();
        $query = "select * from pbsa where `e_id` = '$e_id' and `year` = '$year'";
        $result = $con->query($query);
        if($result->num_rows > 0)
            return $result;
        return false;
    }

    function createPbsa($e_id,$year)
    {
        $db = new Database();
        $con = $db->open_connection();
        $query = "INSERT INTO `pbsa` (`pbsa_id`, `e_id`, `year`, `is_saved`, `is_submitted`, `is_accepted`, `is_rejected`, `rejected_comments`, `emp_comments`, `timestamp`) VALUES (NULL, '$e_id', '$year', '0', '0', '0', '0', NULL, NULL, CURRENT_TIMESTAMP);";
        return $con->query($query);
    }

    function getPbsaCriteria($e_id,$year)
    {
        $db = new Database();
        $con = $db->open_connection();
        $query = "select * from pbsa p join c1 on p.pbsa_id = c1.c1_id join c2 on p.pbsa_id = c2.c2_id join c3 c32 on p.pbsa_id = c32.c3_id join c4 c42 on p.pbsa_id = c42.c4_id join c5 c52 on p.pbsa_id = c52.c5_id join c6 c62 on p.pbsa_id = c62.c6_id join c7 c72 on p.pbsa_id = c72.c7_id join c8 c82 on p.pbsa_id = c82.c8_id where p.e_id = '$e_id' and year = '$year'";
        $result = $con->query($query);
        if($result->num_rows > 0)
            return $result;
        return false;
    }

    function savePbsa($e_id,$year)
    {
        $db = new Database();
        $con = $db->open_connection();
        $query = "update pbsa set `is_saved` = 1 where `e_id` = '$e_id' and `year` = '$year'";
        return $con->query($query);
    }

    function submitPbsa($e_id,$year)
    {
        $db = new Database();
        $con = $db->open_connection();
        $query = "update pbsa set `is_submitted` = 1 where `e_id` = '$e_id' and `year` = '$year'";
        return $con->query($query);
    }

}