<?php
    
    
    include("classes/config.php");

    //user objects 
    try
    {
        $userObj=new users();
        $postObj=new posts();
      
    }
    catch(Throwable $e)
    {
        echo "Error   ".get_class($e).' on line'.$e->getLine().' of '.$e->getFile().' : '.$e->getMessage();
                
    }    



    // Insert User Data 

    if($_GET["action"]=="insertUser")
    {
       
        $email=$_POST['email'];
        $password=$_POST['password'];
        $password2=$_POST['password2'];
        $username=$_POST['username'];
        $dob=$_POST['date'];
        
        $error="";
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
        {
            $error="Invalid email format";
        }
        else if(!$password && !$password2)
        {
            if($password !=$password2)
            {
                $error="An Passwords needs to be same";
            }
            
        }
        else if(!$username)
        {
            $error="An username empty";
        }
        else if(!$dob)
        {
            $error="Please Entry Your Data Of birth ";
        }
        if($error != "")
        {
            echo $error;
            exit();
        }
        else
        {
            $hash=md5($password.$dob);
            $userNum=$userObj->readByUsername($email);
           
            // Cheaking if username already exist in table 

            if($userNum == 0)
            {
                
                $user=$userObj->add($username,$hash,$email,$dob);
                echo 1;
    

            }
            else
            {
                $error= "already exits";
            }
        }
        if($error != "")
        {
            echo $error;
            exit();
        }


        
        
    }

    if($_GET["action"] == "loginUser")
    {
       
        $email=$_POST['email'];
        $password=$_POST['password'];
        $user=$userObj->readByUsername($email);   
        
        $hash=md5($password.$user['dob']);
        if($hash == $user['password'])
        {
            $_SESSION['id']=$user['id'];
            $_SESSION['email']=$user['email'];
            echo 1;
        }
        else
        {
            echo 0;
        }


    }   
    if($_GET["action"] == "addFriend")
    {
       
        $friendId=$_POST['userid'];
        $userId=$_SESSION['id'];
        try
        {
            $friend=new friend();
            $result=$friend->insert($userId,$friendId);
        }
        catch(Throwable $e)
        {
            echo $e;
        }


    }
    
    if($_GET["action"] == "unFriend")
    {
       
        
        $friendId=$_POST['userid'];
        $userId=$_SESSION['id'];
        //print_r($friendId);
        try
        {
            $friend=new friend();
            $result=$friend->delete($userId,$friendId);
        }
        catch(Throwable $e)
        {
            echo $e;
        }


    }
   
    
    //action=addComment

    if($_GET["action"]=="addComment")
    {
        $userId=$_POST['user_id'];
        $postId=$_POST['post_id'];
        $text=$_POST['comment'];
        try
        {
            $post=new posts();
            $postComment=$post->insertComment($userId,$postId,$text);
        }
        catch(Throwable $e)
        {
            echo $e;
        }
        
        
    }

    if($_GET["action"]=="viewFriend")
    {
        print_r($_POST);
        
    }
    if($_GET["action"] == "view")
    {
        header("location:profileUser.php");
    }

    if($_GET["action"]=="editComment")
    {
        
        $commentText=$_POST['comment'];
        $commentId=$_POST['comment_id'];
        try
        {
            $post=new posts();
            $postComment=$post->updateComment($commentId,$commentText);
        }
        catch(Throwable $e)
        {
            echo $e;
        }


    }
    if($_GET["action"]=="deleteComment")
    {
        print_r($_POST);
        
        $commentId=$_POST['comment_id'];
        try
        {
            $post=new posts();
            $postComment=$post->deleteComment($commentId);
        }
        catch(Throwable $e)
        {
            echo $e;
        }


    }
    
    if($_GET["action"]=="updateProfile")
    {
       // print_r($_POST);
        $email=$_POST['email'];
        $name=$_POST['username'];
        $dob=$_POST['dob'];
        $id=$_POST['id'];
        echo $email;
        try
        {
            $user=new users();
            $userUpdate=$user->userUpdate($name,$email,$dob,$id);
        }
        catch(Throwable $e)
        {
            echo $e;
        }
    }
    if($_GET["action"]=="deleteProfile")
    {
        print_r($_POST);
        $id=$_POST['id'];
        try
        {
            $user=new users();
            $userUpdate=$user->userDelete($id);
        }
        catch(Throwable $e)
        {
            echo $e;
        }
        session_unset();
    }

    



?>