<?php
include 'lang.php';
include 'db.php';
  $lan='';
  if(isset($_GET['lan']) && $_GET['lan']=='en' || !isset($_GET['lan'])){
    $lan ='en';
  }elseif(isset($_GET['lan']) && $_GET['lan']=='bn'){
    $lan='bn';
  }elseif(isset($_GET['lan']) && $_GET['lan']=='hi'){
    $lan='hi';
  }else{
    $lan='ar';
  } ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHP Multi Language</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  </head>
  <body>


    <!-- Bootstrap menu -->
    <nav class="navbar navbar-expand-lg bg-light">
      <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="#"><?php echo $nav[$lan]['0'] ?></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#"><?php echo $nav[$lan]['1'] ?></a>
              </li>
              <li class="nav-item">
                <a class="nav-link"><?php echo $nav[$lan]['2'] ?></a>
              </li>
              <li class="nav-item">
                <a class="nav-link"><?php echo $nav[$lan]['3'] ?></a>
              </li>
              <li class="nav-item">

                <?php
                  $en='';
                  $bn='';
                  $hi='';
                  $ar='';
                  if(isset($_GET['lan']) && $_GET['lan']=='en' || !isset($_GET['lan'])){
                    $en ='selected';
                  }elseif(isset($_GET['lan']) && $_GET['lan']=='bn'){
                    $bn='selected';
                  }elseif(isset($_GET['lan']) && $_GET['lan']=='hi'){
                    $hi='selected';
                  }else{
                    $ar='Selected';
                  }
                ?>
              <select onchange="lan_set()" name="Language" id="lan" class="form-control">
                  <option value="en" <?php echo $en?> >EN</option>
                  <option value="bn" <?php echo $bn?> >BN</option>
                  <option value="hi" <?php echo $hi?> >HI</option>
                  <option value="ar" <?php echo $ar?> >AR</option>
              </select>

              </li>
          </ul>
        </div>
      </div>
    </nav>

    
    <!-- Bootstra menu end -->
    <div class="container mt-5">
      <div class="row">
        <?php 
        $sql = "SELECT * FROM post WHERE lan_type='$lan' ";
        $stmt= $db->query($sql);
        while ($row = $stmt->fetch()) {
         
        


        ?>
        <div class="col-md-3">
          <div class="card" style="width: 18rem;">
            <div class="card-body">
              <h5 class="card-title"><?php echo $row['title']?></h5>
              <p class="card-text"><?php echo $row['descr']?></p>
            </div>
          </div>
        </div>
      <?php } ?>
      </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script type="text/javascript">
        function lan_set(){

          var language = $('#lan').val();
          var path =  $(location).attr("href");
          window.location.href="http://localhost/PHP_Multi_Lang/?lan="+language;

        }
    </script>
  </body>
</html>