
<div class="container mainContainer">
    <div class="row">
        <div class="col-md-8  mainContainer">
        
        <!-- Post Display View -->

            
        <?php displayPost('public',$_SESSION['id']);?>
        
        
        </div>
        <div class="col-md-4 mainContainer">
        
        <form method="POST"  enctype="multipart/form-data">
                <div class="form-group">
                
                    <textarea class="form-control" name="post" rows="3"></textarea>
                    
                    <div class="mt-2">
                    <small><input type="file" name="upload_image" size="30"/></small>
                    <button  name="postbtn" class="btn btn-primary btn-sm" >Create Post</button>   
                    <div>                    
                </div>
                
        </form>
        <?php insertPost();?>    
        </div>
    </div>
</div>


