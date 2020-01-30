<!doctype html>
<html lang="en">
  <head>
    <title>Social Space</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet"  href="style.css">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <a class="navbar-brand" >Social Space</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Right Nav -->
        <div class="collapse navbar-collapse " id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item ">
              <a class="nav-link" href="index.php?page=addFriends">Add friends</a></a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="index.php?page=timeline">Timeline</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="index.php?page=chat ">Messenger</a>
            </li>
          </ul>
        </div>

        <!-- Left Nav -->
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
          <ul class="navbar-nav">
          <?php  if (isset($_SESSION['id'])) {?>
            <li class="nav-item">
            <a class="nav-link" href="index.php?page=profile"> <?php echo $_SESSION['email']; ?></a>
              </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?function=logout">Logout</a>
              </li>
            <?php } else { ?>  
              <li class="nav-item">
                <a class="nav-link" href="index.php?page=create" data-toggle="modal" data-target="#createAccount">Create New Account</a>
              </li>
              <li class="nav-item">
                <a class="nav-link"  data-toggle="modal" data-target="#loginHolder">Login</a>
              </li>
              <?php }?>

          </ul>
        </div>
      </nav>  
      <hr>  


     
      <!-- 
              <li class="nav-item">
                <a class="nav-link" href="?page=create" data-toggle="modal" data-target="#createAccount">Create New Account</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="modal" data-target="#loginHolder">Login</a>
              </li>

       -->


   