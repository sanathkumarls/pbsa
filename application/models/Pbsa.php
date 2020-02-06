<?php
/**
 * Created by PhpStorm.
 * User: sanathls
 * Date: 20/11/19
 * Time: 2:35 PM
 */

require_once __DIR__."/../utilities/Database.php";
require_once __DIR__."/../utilities/Constants.php";

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
        $query = "INSERT INTO `pbsa` (`pbsa_id`, `e_id`, `year` , `is_submitted`, `is_accepted`, `is_rejected`, `rejected_comments`, `emp_comments`, `timestamp`) VALUES (NULL, '$e_id', '$year', '0', '0', '0', NULL, NULL, CURRENT_TIMESTAMP);";
        return $con->query($query);
    }

    function getPbsaCriteria($e_id,$year)
    {
        $db = new Database();
        $con = $db->open_connection();
        $query = "select * from pbsa p join c1 on p.pbsa_id = c1.c1_id join c2 on p.pbsa_id = c2.c2_id join c3 on p.pbsa_id = c3.c3_id join c4 on p.pbsa_id = c4.c4_id join c5 on p.pbsa_id = c5.c5_id join c6 on p.pbsa_id = c6.c6_id join c7 on p.pbsa_id = c7.c7_id join c8 on p.pbsa_id = c8.c8_id where p.e_id = '$e_id' and year = '$year'";
        $result = $con->query($query);
        if($result->num_rows > 0)
            return $result;
        return false;
    }

    function savePbsa($e_id,$year,$emp_comments)
    {
        $db = new Database();
        $con = $db->open_connection();
        $query = "update pbsa set `emp_comments` = '$emp_comments' where `e_id` = '$e_id' and `year` = '$year'";
        return $con->query($query);
    }

    function submitPbsa($e_id,$year,$emp_comments,$role)
    {
        $db = new Database();
        $con = $db->open_connection();
        if(Constants::roleHod == $role)
            $query = "update pbsa set `is_submitted` = 1 , `emp_comments` = '$emp_comments', `rejected_comments` = '', `is_accepted` = '$role' where `e_id` = '$e_id' and `year` = '$year'";
        else
            $query = "update pbsa set `is_submitted` = 1 , `emp_comments` = '$emp_comments', `rejected_comments` = '' where `e_id` = '$e_id' and `year` = '$year'";
        return $con->query($query);
    }

    function getPbsaApprovalsHodFetch($email)
    {
        $db = new Database();
        $con = $db->open_connection();
        $query = "select count(*) as 'count' from pbsa where (`is_rejected` = 0 or `is_rejected` = 2) and `is_submitted` = 1 and `is_accepted` = 0 and `e_id` in (select employee.e_id from employee where `department` = (select department from employee where email = '$email'))";
        return $con->query($query);
    }

    function getPbsaApprovalsHod($email)
    {
        $db = new Database();
        $con = $db->open_connection();
        $query = "select * from pbsa where (`is_rejected` = 0 or `is_rejected` = 2) and `is_submitted` = 1 and `is_accepted` = 0 and `e_id` in (select employee.e_id from employee where `department` = (select department from employee where email = '$email')) order by `timestamp`";
        return $con->query($query);
    }

    function getPbsaApprovalsPrincipalFetch()
    {
        $db = new Database();
        $con = $db->open_connection();
        $query = "select count(*) as 'count' from pbsa where `is_submitted` = 1 and `is_accepted` = 2 ";
        return $con->query($query);
    }

    function getPbsaApprovalsPrincipal()
    {
        $db = new Database();
        $con = $db->open_connection();
        $query = "select * from pbsa where `is_submitted` = 1 and `is_accepted` = 2 order by `timestamp` ";
        return $con->query($query);
    }

    function checkPbsaSubmitted($e_id,$year)
    {
        $db = new Database();
        $con = $db->open_connection();
        $query = "select e_id from pbsa where `e_id` = '$e_id' and `year` = '$year' and `is_submitted` = 1";
        $result = $con->query($query);
        if($result->num_rows > 0)
            return true;
        return false;
    }

    function approvePbsa($e_id,$year,$role)
    {
        $db = new Database();
        $con = $db->open_connection();
        $query = "update pbsa set `is_accepted` = '$role' where  `e_id` = '$e_id' and `year` = '$year'";
        return $con->query($query);
    }

    function rejectPbsa($e_id,$year,$role,$comments)
    {
        $db = new Database();
        $con = $db->open_connection();
        $query = "update pbsa set `is_rejected` = '$role' , `is_submitted` = 0 , `rejected_comments` = '$comments' where  `e_id` = '$e_id' and `year` = '$year'";
        return $con->query($query);
    }

    function getIndividualPerformance($e_id)
    {
        $db = new Database();
        $con = $db->open_connection();
        $query = "select c1.c1_total,c2.c2_total,c3.c3_total,c4.c4_total,c5.c5_total,c6.c6_total,c7.c7_total,c8.c8_total,year,timestamp from pbsa p join c1 on p.pbsa_id = c1.c1_id join c2 on p.pbsa_id = c2.c2_id join c3 on p.pbsa_id = c3.c3_id join c4 on p.pbsa_id = c4.c4_id join c5 on p.pbsa_id = c5.c5_id join c6 on p.pbsa_id = c6.c6_id join c7 on p.pbsa_id = c7.c7_id join c8 on p.pbsa_id = c8.c8_id join employee e on p.e_id=e.e_id where p.`e_id` = '$e_id' and `is_accepted` = 3 and `is_active` = 1 order by year desc";
        return $con->query($query);
    }

    function getDepartmentPerformance($d_id)
    {
        $db = new Database();
        $con = $db->open_connection();

        $query = "select avg(c1_total) as 'c1_total',avg(c2_total) as 'c2_total',avg(c3_total) as 'c3_total',avg(c4_total) as 'c4_total',avg(c5_total) as 'c5_total',avg(c6_total) as 'c6_total',avg(c7_total) as 'c7_total',avg(c8_total) as 'c8_total',e.first_name,e.last_name,e.role,p.e_id from pbsa p join c1 on p.pbsa_id = c1.c1_id join c2 on p.pbsa_id = c2.c2_id join c3 on p.pbsa_id = c3.c3_id join c4 on p.pbsa_id = c4.c4_id join c5 on p.pbsa_id = c5.c5_id join c6 on p.pbsa_id = c6.c6_id join c7 on p.pbsa_id = c7.c7_id join c8 on p.pbsa_id = c8.c8_id join employee e on p.e_id=e.e_id where `is_accepted` = 3 and department = '$d_id' and `is_active` = 1 group by p.e_id ";
        return $con->query($query);
    }

    function getIndividualPerformanceYear($e_id,$year)
    {
        $db = new Database();
        $con = $db->open_connection();

        $query = "select c1.c1_total,c2.c2_total,c3.c3_total,c4.c4_total,c5.c5_total,c6.c6_total,c7.c7_total,c8.c8_total from pbsa p join c1 on p.pbsa_id = c1.c1_id join c2 on p.pbsa_id = c2.c2_id join c3 on p.pbsa_id = c3.c3_id join c4 on p.pbsa_id = c4.c4_id join c5 on p.pbsa_id = c5.c5_id join c6 on p.pbsa_id = c6.c6_id join c7 on p.pbsa_id = c7.c7_id join c8 on p.pbsa_id = c8.c8_id join employee e on p.e_id=e.e_id where p.`e_id` = '$e_id' and `year` = '$year' and `is_accepted` = 3 and `is_active` = 1";
        return $con->query($query);
    }

    function getIndividualDepartmentPerformanceYear($d_id)
    {
        $db = new Database();
        $con = $db->open_connection();

        $query = "select avg(c1_total) as 'c1_total',avg(c2_total) as 'c2_total',avg(c3_total) as 'c3_total',avg(c4_total) as 'c4_total',avg(c5_total) as 'c5_total',avg(c6_total) as 'c6_total',avg(c7_total) as 'c7_total',avg(c8_total) as 'c8_total',year from pbsa p join c1 on p.pbsa_id = c1.c1_id join c2 on p.pbsa_id = c2.c2_id join c3 on p.pbsa_id = c3.c3_id join c4 on p.pbsa_id = c4.c4_id join c5 on p.pbsa_id = c5.c5_id join c6 on p.pbsa_id = c6.c6_id join c7 on p.pbsa_id = c7.c7_id join c8 on p.pbsa_id = c8.c8_id join employee e on p.e_id=e.e_id where `is_accepted` = 3 and department = '$d_id' and `is_active` = 1 group by year ";
        return $con->query($query);
    }

    function getDepartmentPerformanceYear($d_id,$year)
    {
        $db = new Database();
        $con = $db->open_connection();

        $query = "select c1.c1_total,c2.c2_total,c3.c3_total,c4.c4_total,c5.c5_total,c6.c6_total,c7.c7_total,c8.c8_total,e.department,p.e_id,e.first_name,e.last_name,e.role from pbsa p join c1 on p.pbsa_id = c1.c1_id join c2 on p.pbsa_id = c2.c2_id join c3 on p.pbsa_id = c3.c3_id join c4 on p.pbsa_id = c4.c4_id join c5 on p.pbsa_id = c5.c5_id join c6 on p.pbsa_id = c6.c6_id join c7 on p.pbsa_id = c7.c7_id join c8 on p.pbsa_id = c8.c8_id join employee e on p.e_id=e.e_id where `is_accepted` = 3 and department = '$d_id' and year = '$year' group by p.e_id ";
        return $con->query($query);
    }



}
//for hod get pbsa where is_submitted =1 and is_rejected = (2 or 0) after approval set is_accepted = 2.
//after rejection by hod set is_submitted = 0 and is_rejected = 2

//for principal get pbsa where is_submitted = 1 and is_rejected = (3 or 0 or 2) and is_accepted = 2 after approval set is_accepted = 3.
//after rejection by principal set is_submitted=0 and is_rejected= 3.

//if is_submitted=0 and is_rejected!=0 then show rejected and comments.

//for mangement show pbsa if is_accepted = 3

//if is_submitted = 1 and is_accepted = 0 then display pending for approval by hod
// else if is_submitted = 1 and is_accepted = 2 then display approved by hod waiting for approval by principal.
// else if is_submitted = 1 and is_accepted = 3 then display pbsa approved by principal.

//*** if is_rejected value is other than 0 that means pbsa is submitted and rejected.