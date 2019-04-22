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
  $firstName = htmlspecialchars($_POST['firstName']);
  $lastName = htmlspecialchars($_POST['lastName']);
  $city = htmlspecialchars($_POST['city']);
  $state = htmlspecialchars($_POST['state']);
  $address = htmlspecialchars($_POST['address']);
  $zip = htmlspecialchars($_POST['zip']);
  $password = htmlspecialchars($_POST['password']);

  $query = "INSERT INTO `Members` (`userName`, `firstName`, `lastName`, `city`, `state`, `address`, `zip`, `password`) VALUES ('$userName', '$firstName', '$lastName', '$city', '$state', '$address', '$zip', '$password');";

  mysql_query($query);
  if(mysql_errno() == 1062){
    echo "<script type='text/javascript'>alert('Duplicate key submitted, try a different username') </script>";
  }else{
    echo "<p>Submission recorded!</p>";
  }

  mysql_close($con);
}
?>