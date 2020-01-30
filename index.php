<?php


include("function.php");
  
include("views/header.php");

if(isset($_SESSION['id']))
{
  $page=$_GET['page'];  

  if($page == 'profile')
  {
      include("views/profile.php");
  }

  else if($page == 'yourfriends')
  {
      include("views/yourfriends.php");
  }
  else if($page == 'timeline')
  {
      include("views/timeline.php");
  }

  else if($page == 'addFriends')
  {
      include("views/addFriends.php");
  }
  else if($page == 'viewUser')
  {
      include("profileUser.php");
  }
  else if(is_numeric($page))
  {
      include("views/editpost.php");
  }
  
  
  
  else if($page == 'editprofile')
  {
      include("views/editprofile.php");
  }
  else
  {
      include("views/timeline.php");
  }
}
else
{
  echo "login First";
}

  

  
include("views/footer.php");



?>