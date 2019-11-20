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

//select * from pbsa p join employee e on p.e_id=e.e_id where e.email='$email' and p.year='$year'
}