<div class="container mainContainer">
    
    <div class="row">
        
        <div class="col-md-7  mainContainer">
            
        <h5> <strong>Edit Profile </strong></h5>
        <?php
           $userid=$_SESSION['id'];
           editProfile($userid);
    
        ?>
        </div>
        <div class="col-md-2 mainContainer">
            
        <h5> <strong> Profile Details </strong></h5>
        <?php
           $postid=$_SESSION['id'];
           displayProfile($postid);
    
        ?>
        </div>



        
  </div>
</div> 