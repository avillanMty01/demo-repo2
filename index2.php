<?php
  require_once("php/component.php")
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8"><meta name="viewport",
      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum.scale=1.0">
    <title>CRUD with php tutorial</title>
    <!-- fontawesome link -->
    <script src="https://kit.fontawesome.com/b9f3764d52.js" crossorigin="anonymous"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <!-- Tutorial css custom style.css -->
    <link rel="stylesheet"  href="style.css" >
  </head>
  <body>

    <main>
      <div class="container text-center">
        <h1 class="py-4 bg-dark text-light rounded"><i class="fas fa-swatchbook"></i> Alf's Book Store</h1>

        <div class="d-flex justify-content-center">
            <form action="" method="post" class="w-50">
              <div class=\"py-2\">
                <?php
                  inputElement("<i class='fas fa-id-badge'","Book ID", "book_id","");
                 ?>
               </div>
               <div class=\"py-2\">
                 <?php
                   inputElement("<i class='fas fa-book'","Book Name", "book_name","");
                  ?>
              </div>
            </form>
        </div>
      </div>
    </main>


    <?php
       echo "Welcome to the tutorial"

    ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>
