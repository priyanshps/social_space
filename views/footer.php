
<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  

    <!-- Log in Model -->
    <div class="modal fade" id="loginHolder" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title justify-content-center" id="exampleModalLabel">Log-in</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form>
                <div class="form-group">
                  <input type="email" class="form-control" id="userEmail" aria-describedby="emailHelp" placeholder="Email">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control" id="userPassword" placeholder="Password">
                </div>
                <div class="form-group ">
                  <small id="emailHelp" class="form-text text-muted">Forgot Password <a>Click Here</a></small>
                </div>
                
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" id="toggleLogin" class="btn btn-primary">Login</button>
            </div>
          </div>
        </div>
      </div>

      <!-- Create Account Model -->
      <div class="modal fade" id="createAccount" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form>
                <div class="form-group">
                  <input type="email" class="form-control" id="regEmail" aria-describedby="emailHelp" placeholder="Email">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control" id="regPassword" placeholder="Password">
                </div> 
                <div class="form-group">
                  <input type="password" class="form-control" id="regPassword2" aria-describedby="emailHelp" placeholder="re-Type password">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" id="regUsername" aria-describedby="emailHelp" placeholder="username">
                </div>
                  
                <div class="form-group">
                  <input type="date" class="form-control" id="regDate" aria-describedby="emailHelp" placeholder="Date of Birth">
                </div>
                
              </form>
            </div>
            <div class="modal-footer">
            
                <button id="toggleCreate" type="button" class="btn btn-primary">Create Account</button>
            </div>
          </div>
        </div>
      </div>


  


<script>

// Create Account Ajax 
$("#toggleCreate").click(function(){

    //alert("hi");    
    
    $.ajax({
        type: "POST",
        url: "action.php?action=insertUser",
        data: "email="+$("#regEmail").val() + "&password="+$("#regPassword").val() 
        + "&password2="+$("#regPassword2").val() + "&username="+$("#regUsername").val()
        + "&date="+$("#regDate").val(),
        success: function(result)
        {
            if(result == 1)
            {
              window.location.href="index.php?page=timeline";
            }
            else(result != 1)
            {
              alert(result);
            }
        }

    })

});

// Login Ajax


$("#toggleLogin").click(function(){


  $.ajax({
        type: "POST",
        url: "action.php?action=loginUser",
        data: "email="+$("#userEmail").val() + "&password="+$("#userPassword").val(),
        success: function(result)
        {
            if(result == 1)
            {
              window.location.href="index.php?page=timeline";
            }
            else(result != 1)
            {
              alert(result);
            }
            alert(result);
        }

     })



});

$(".addUser").click(function(){
  var id= $(this).attr("data-userid");

  $.ajax({

    type: "POST",
    url: "action.php?action=addFriend",
    data: "userid="+ id,
    success: function(result)
    {
      alert(result);
    }



  })


})
$(".viewUser").click(function(){
  var id= $(this).attr("data-userid");

$.ajax({

    type: "POST",
    url: "action.php?action=view",
    data: "userid="+ id,
    success: function(result)
    {
      window.location.href="profileUser.php?id="+id;
    }  



  })


})


$(".unfriend").click(function(){
  var id= $(this).attr("data-userid");

  $.ajax({

    type: "POST",
    url: "action.php?action=unFriend",
    data: "userid="+ id,
    success: function(result)
    {
      alert(result);
    }



  })


})

$(".editPost").click(function(){
  var id= $(this).attr("data-postid");

  $.ajax({

    type: "POST",
    url: "views/editpost.php",
    data: "postid="+id,
    success: function(result) 
    {
       window.location.href="index.php?page="+id; 
    }



  })



})  

$(".commentBtn").click(function(){

  var post_id=$(this).attr('data_postid');
  var user_id=$(this).attr('data_userid');
  $.ajax({

    type: "POST",
    url: "action.php?action=addComment",
    data: "comment="+$(".commentTxt").val() + "&post_id="+post_id + "&user_id="+user_id,
    success: function(result) 
    {
       alert(result); 
    }    


  })



})
$(".editBtn").click(function(){

  var comment_id=$(this).attr('comment_id');
  $.ajax({

  type: "POST",
  url: "action.php?action=editComment",
  data: "comment="+$(".editTxt").val() + "&comment_id="+comment_id,
  success: function(result) 
  {
    alert(result); 
  }    


  })
  

})

$(".delBtn").click(function(){

  var comment_id=$(this).attr('comment_id');
  
  $.ajax({

  type: "POST",
  url: "action.php?action=deleteComment",
  data: "comment_id="+comment_id,
  success: function(result) 
  {
    alert(result); 
  }    


  })


})

$("#updateProfileBtn").click(function(){

  $email=$('#updateEmail').val();
  $username=$('#updateUsername').val();
  $dob=$('#updateDOB').val();
  var id=$(this).attr('dataid');

  $.ajax({
    type: "POST",
    url: "action.php?action=updateProfile",
    data: "email="+$email +"&username="+$username +"&dob="+$dob+"&id="+id,
    success:function(result)
    {
      alert(result)
    }


  })


})

$("#deleteProfileBtn").click(function(){
  var id=$(this).attr('dataid');

  $.ajax({
    type: "POST",
    url: "action.php?action=deleteProfile",
    data: "id="+id,
    success:function(result)
    {
      alert(result)
    }


  })

})












</script>













</body>
</html>