<?php
/**
 * Created by PhpStorm.
 * User: sanathls
 * Date: 10/11/19
 * Time: 7:37 PM
 */

require_once __DIR__."/../utilities/Database.php";

class Role
{
    function getRoleName($id)
    {
        $db = new Database();
        $con = $db->open_connection();

        $query = "select * from role where `r_id` = '$id'";

        $result=$con->query($query);
        if($result->num_rows > 0)
        {
            $row = $result->fetch_assoc();
            return $row['r_name'];
        }
        return "";
    }
}