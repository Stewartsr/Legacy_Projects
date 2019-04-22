<?
if( isset($_POST['entry']))
//if($_POST)
{
  include 'connectvarsEECS.php'; 

  unset($_POST['entry']);
  
  $con = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
  if (!$con)
  {
    die('Could not connect: ' . mysql_error());
  }

  mysql_select_db(DB_NAME, $con);

  $userName = htmlspecialchars($_POST['userName']);
  $password = htmlspecialchars($_POST['password']);

  $SESSION["userName"] = 'Guest';
  
  if($con){    
	$result =mysql_query("SELECT 1 FROM members WHERE `userName` = '$userName' AND 'password' = '$password'");
if ($result && mysql_num_rows($result) > 0)

    {
  $SESSION["userName"] = $userName; 
   echo 'Welcome';
    }
else
    {
    echo 'Username/Password NOT Found';
    }
  
}
  mysql_close($con);
}
?>