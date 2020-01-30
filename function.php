<?php
    
    //session_start();
    include("classes/config.php");

    

    //logout
    if (isset($_GET['function'])=='logout')
    {
        session_unset();
    }
    function hello()
    {
        echo "hello";
    }
    function strlimit($string)
    {
        $string = strip_tags($string);
        if (strlen($string) > 500) {

            // truncate string
            $stringCut = substr($string, 0, 500);
            $endPoint = strrpos($stringCut, ' ');

            //if the string doesn't contain any space then it will cut without word basis.
            $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
            $string .= '...';
        }
        return $string;
    }
    //Objects
    function insertPost()
    {
        
        $postObj=new posts();
        if(isset($_POST['postbtn']))
        {
             $content=htmlentities($_POST['post']);
                if(isset($_FILES['upload_image']))
                {

                   
                    $upload_image=$_FILES['upload_image']['name'];
                    $image_tmp=$_FILES['upload_image']['tmp_name'];
                    $random_number=rand(1,100);
                    $upload_image=$random_number.$upload_image;
                    if(strlen($content)>255)
                    {
                        echo "<script>(' words limit 255 '); </script>";
                    }
                    else
                    {
                        if(strlen($upload_image)>=1 && strlen($content)>=1)
                        {
                            $folder="Images/".$upload_image;
                            move_uploaded_file($image_tmp,$folder);
                            
                            $insert=$postObj->insert($_SESSION['id'],$content,$folder);
                            //$_SESSION['id'],$content,$upload_image

                        }
                        else if(strlen($upload_image)>=1 && $content== "")
                        {
                            $folder="Images/".$upload_image;
                            move_uploaded_file($image_tmp,$folder);
                            $content=" ";
                            $insert=$postObj->insert($_SESSION['id'],$content,$folder);
                            //$_SESSION['id'],$content,$upload_image

                        }
                       
                    }
                }
            
            
        }

         
    }
    function uupdatePost()
    {
        
        $postObj=new posts();
        if(isset($_POST['postbtn']))
        {
             $content=htmlentities($_POST['post']);
                if(isset($_FILES['upload_image']))
                {

                   
                    $upload_image=$_FILES['upload_image']['name'];
                    $image_tmp=$_FILES['upload_image']['tmp_name'];
                    $random_number=rand(1,100);
                    $upload_image=$random_number.$upload_image;
                    if(strlen($content)>255)
                    {
                        echo "<script>(' words limit 255 '); </script>";
                    }
                    else
                    {
                        if(strlen($upload_image)>=1 && strlen($content)>=1)
                        {
                            $folder="Images/".$upload_image;
                            move_uploaded_file($image_tmp,$folder);
                            
                            $insert=$postObj->insert($_SESSION['id'],$content,$folder);
                            //$_SESSION['id'],$content,$upload_image

                        }
                        else if(strlen($upload_image)>=1 && $content== "")
                        {
                            $folder="Images/".$upload_image;
                            move_uploaded_file($image_tmp,$folder);
                            $content=" ";
                            $insert=$postObj->insert($_SESSION['id'],$content,$folder);
                            //$_SESSION['id'],$content,$upload_image

                        }
                       
                    }
                }
            
            
        }

         
    }


    function displayPost($id)
    {
        $postObj=new posts();
        $result=$postObj->display($id);

             

        foreach($result as $post)
        {
            $comments=$postObj->showComments($post['post_id']);
            $button=" ";
            if($post['user_id']==$_SESSION['id'])
            {
                $button=' <a href="#" class="badge badge-info">Edit</a>';
            }
            echo 
            '
            <div class="row">
            <div class="col-md-2"></div>
            <div class="col">
            <div class="card mb-2">
            <div class="card-header">Username id '.$post['user_id'].' <span class="text-muted"> <small> Posted at '.$post['post_date'].'</small> </span> 
            
            
            '.$button.'
            
            </div>
            <img   style="" src="'.$post['image'].'" class="card-img-top " alt="...">
            <div class="card-body">
                 
                
                <p class="card-text">'.$post['content'].'.</p>
                
            </div>
                <div class="card-footer pd-0">
                    <div class="input-group mb-3">
                        <input type="text" class=" commentTxt form-control" placeholder="Add Comment" aria-label="Recipient"s username" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                        <button data_postid='.$post['post_id'].' data_userid='.$_SESSION['id'].' class="commentBtn btn btn-outline-success btn-sm" type="button">Add</button>
                        <button class="btn btn-outline-secondary btn-sm" type="button" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">show</button>
                    </div>
                </div>
                <div class="collapse" id="collapseExample">
                    <div class="card card-body">';
                    commentText($post["post_id"]);


                    echo '
                    </div>
                    </div>
    
                </div>
                </div>
                </div>
            
                <div class="col-md-2"> </div>
            </div>
            <hr>
    
                
                    
                    
                    ';
        }



    }

    function displayFriends()
    {
        
        $user=new users();
        $userData=$user->read();
       
        
        
        foreach($userData as $userInfo)
        {
            echo '
                <tbody>
                    
                        <tr>
                            <th scope="row">'.$userInfo['id'].'</th>
                            <td>'.$userInfo['username'].'</td>
                            <td>'.$userInfo['email'].'</td>
                                <td>
                                <div class="btn-group btn-group-sm" role="group">
                                    <button data-userId= '.$userInfo['id'].'  type="button" class="addUser btn btn-outline-info">Add</button>
                                    <a data-userId= '.$userInfo['id'].' class="viewUser btn btn-link" >view </a>
                                </div>
                                </td>
                            </tr>
                            <tr>
            ';
        }

        


    }


    function displayGroups()
    {
        echo 
        '   <h4><strong>Groups</strong></h4>
            <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                Cras justo odio
                <span class="badge badge-primary badge-pill">Join</span>
                </li>
                
            </ul>
        ';
    }
    function yourFriends($id)
    {
        
        $user=new friend();
        $userData=$user->readFriend($id);
       
        
        
        foreach($userData as $userInfo)
        {
            echo '
                <tbody>
                    
                        <tr>
                            <th scope="row">'.$userInfo['id'].'</th>
                            <td>'.$userInfo['username'].'</td>
                            <td>'.$userInfo['email'].'</td>
                                <td>
                                <div class="btn-group btn-group-sm" role="group">
                                    <button data-userId= '.$userInfo['id'].'  type="button" class="unfriend btn btn-outline-info">Unfriend</button>
                                    <a data-userId= '.$userInfo['id'].' class="viewUser btn btn-link" >view </a>
                                </div>
                                </td>
                            </tr>
                            <tr>
            ';
        }


        

        


    }



    function  displayPostUser($id)
    {
        $postObj=new posts();
        $result=$postObj->profile($id);
        

             

        foreach($result as $post)
        {
            $button=" ";
            $comments=$postObj->showComments($post['post_id']);
            if($post['user_id']==$_SESSION['id'])
            {
                $button=' <a data-postId= '.$post['post_id'].' class="editPost badge badge-info">Edit</a>';
            }
            echo 
            '
            <div class="row">
            <div class="col-md-2"></div>
            <div class="col">
            <div class="card mb-2">
            <div class="card-header">Username id '.$post['user_id'].' <span class="text-muted"> <small> Posted at '.$post['post_date'].'</small> </span> 
            
            
            '.$button.'
            
            </div>
            <img   style="" src="'.$post['image'].'" class="card-img-top " alt="...">
            <div class="card-body">
                 
                
                <p class="card-text">'.$post['content'].'.</p>
                
            </div>
                <div class="card-footer pd-0">
                    <div class="input-group mb-3">
                        <input type="text" class="commentTxt form-control" placeholder="Add Comment" aria-label="Recipient"s username" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                        <button data_postid='.$post['post_id'].' data_userid='.$post['user_id'].' class="commentBtn btn btn-outline-success btn-sm" type="button">Add</button>
                        <button class="show btn btn-outline-secondary btn-sm" type="button" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">show</button>
                    </div>
                </div>
                <div class="collapse" id="collapseExample">
                    <div class="card card-body">';
                        commentText($post["post_id"]);

                     echo '
                     </div>
                     </div>
     
                 </div>
                 </div>
                 </div>
             
                 <div class="col-md-2"> </div>
             </div>
             <hr>
     
                 
                     
                     
                     ';
                
        }

        
    
    }
    


    function displayOne($postid)
    {
        $postObj=new posts();
        $result=$postObj->displayOne($postid);

            echo 
            '
            <div class="row">
            <div class="col-md-2"></div>
            <div class="col">
            <div class="card mb-2">
            <div class="card-header">post id '.$result['post_id'].' <span class="text-muted"> <small> Posted at '.$result['post_date'].'</small> </span> 
            
            
            <form method="POST" enctype="multipart/form-data">
            
            </div>
            
                <div class="card-body"> 
                <img   style="" src="'.$result['image'].'" class="card-img-top " alt="...">
                <textarea class="form-control mt-2" name="post" rows="3">'.$result['content'].'</textarea>
                <small><input class="mt-3" type="file" name="uploadfile" size="30"/>'.$result['image'].'</small>
                
            </div>
                <div class="card-footer">
                <button  name="update" class="btn btn-outline-primary mt-3">Update</button>
                <button name="delete" class="btn btn-outline-danger mt-3">Delete</button>
                </div>
                
            
            </div>
            </div>
            </div>
            </form>
        
            <div class="col-md-2"> </div>
             </div>
        <hr>

            ';

        $folder="Images/";
        if(isset($_POST['update']))
        {
            if(isset($_FILES['uploadfile']))
            {
                $content=htmlentities($_POST['post']);
                $uploadfile = $_FILES['uploadfile']['name'];
                $image_tmp=$_FILES['uploadfile']['tmp_name'];
                $random_number=rand(1,100);
                 $uploadfile=$random_number.$uploadfile;
                if(strlen($content)>255)
                {
                    echo "<script>(' words limit 255 '); </script>";
                }
                else
                {
                    if(strlen($uploadfile)>=1 && strlen($content)>=1)
                    {
                        echo $folder="Images/".$uploadfile;
                        move_uploaded_file($image_tmp,$folder);
                        $update=$postObj->update($result['post_id'],$_SESSION['id'],$content,$folder);
                    }
                    else
                    {

                    }

                }


            }
        }
        



            if(isset($_POST['delete']))
            {
                 
                
                $update=$postObj->delete($result['post_id']);
            


            }   




        



    }
    function  commentText($postid)
    {
        $postObj=new posts();
        $comments=$postObj->showComments($postid);
        
            echo '
                <div class="card">
                    <div class="card-body">';
                   foreach($comments as $comment)
                   {
                    echo '<p><strong> User Id  <span>'.$comment['user_id'].' :</span>  </strong> <span> '.
                            $comment['comment_text'].
                            '</span> '; 
                           if($_SESSION['id']==$comment['user_id']) 
                           {
                            echo'<input type="text" class="editTxt" placeholder="'.$comment['comment_text'].'"><button name="edit" comment_id='.$comment['comment_id'].' class="editBtn badge badge-secondary">Edit</button>
                            <button name="edit" comment_id='.$comment['comment_id'].' class="delBtn badge badge-danger">Delete</button>
                            </p>';

                           }

                   } 
                   
                    
        echo '
               
        
        </div>
        </div>
    ';             
       

    }
    function searchFriends($searchtxt)
    {
        $user=new users();
        $userInfos=$user->find($searchtxt);
        
        
        foreach($userInfos as $userInfo)
        {   
            echo '
                    <tbody>
                        
                            <tr>
                                <th scope="row">'.$userInfo['id'].'</th>
                                <td>'.$userInfo['username'].'</td>
                                <td>'.$userInfo['email'].'</td>
                                    <td>
                                    <div class="btn-group btn-group-sm" role="group">
                                        <button data-userId= '.$userInfo['id'].'  type="button" class="addUser btn btn-outline-info">Add</button>
                                        <a data-userId= '.$userInfo['id'].' class="viewUser btn btn-link" >view </a>
                                    </div>
                                    </td>
                                </tr>
                                <tr>
                ';
        }
    }

    function displayProfile($id)
    {
        $user=new users();
        $userProfile=$user->readById($id);
        echo 
        '
                
        <div class="card text-center" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">'.$userProfile['username'].'</h5>
            <h6 class="card-subtitle mb-2 text-muted">'.$userProfile['email'].'</h6>
            <p class="card-text">'.$userProfile['dob'].'</p>            
        </div>
        </div>  
        
        ';
    }

    function editProfile($userid)
    {
        $user=new users();
        $userProfile=$user->readById($userid);
        echo '
        <form>
        <div class="form-group">
          <label for="exampleFormControlInput1">Email address</label>
          <input type="email" class="form-control" id="updateEmail" placeholder="'.$userProfile['email'].'">
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput1">Username</label>
          <input type="email" class="form-control" id="updateUsername" placeholder="'.$userProfile['username'].'">
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput1">DOB</label>
          <input type="date" class="form-control" id="updateDOB" >
        </div>
        
        <button type="button" dataid='.$userProfile['id'].' id="updateProfileBtn" class="btn btn-outline-info">Update</button>
        <button type="button" dataid='.$userProfile['id'].' id="deleteProfileBtn" class="btn btn-outline-danger">Delete</button>

        
      </form>

        
        ';
    }



    

            
            

       
    

?>