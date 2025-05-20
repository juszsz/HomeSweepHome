<?php 
function  check_login($con)
{
    if(isset($_SESSION['accountid']))
    {
        $id = $_SESSION ['accountid'];
        $query = "SELECT  * FROM account WHERE accountid = $id limit 1";

        $result = mysqli_query($con, $query);
        if($result &&  mysqli_num_rows($result)> 0)
        {
            $user_data = mysqli_fetch_assoc($result);
            return $user_data;
        }
    }
    header("Location:Login.php");
    die;
}
?>