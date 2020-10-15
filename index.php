<?php
  require_once("php/operation.php");
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8"><meta name="viewport",
      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum.scale=1.0">
      <link rel="icon" type="image/png" href="http://localhost/favicon.ico">
    <title>CRUD with php tutorial</title>
    <!-- fontawesome link -->
    <script src="https://kit.fontawesome.com/b9f3764d52.js" crossorigin="anonymous"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <!-- Tutorial css custom style.css -->
    <link rel="stylesheet"  href="mystyle.css" >
  </head>
  <body>

    <main>
      <div class="container text-center">
        <h1 class="py-4 bg-dark text-light rounded"><i class="fas fa-swatchbook"></i> Alf's Book Store</h1>
      </div>

        <!-- now, create input elements, using php, since code repeats -->
      <div class="d-flex justify-content-center">
          <form class="w-50" action="" method="post">
            <div class="pt-2">
              <?php
                  inputElement('<i class="fas fa-id-badge"></i>',"Book ID", "book_id", setID());
               ?>
            </div>
            <div class="pt-2">
              <?php
                  inputElement('<i class="fas fa-book"></i>',"Book Name", "book_name", "");
               ?>
            </div>
            <div class="row pt-2">
              <div class="col">
                <?php  inputElement('<i class="fas fa-people-carry"></i>',"Publisher", "book_publisher", "");   ?>
              </div>
              <div class="col">
                <?php  inputElement('<i class="fas fa-dollar-sign"></i>',"Price", "book_price", "");   ?>
              </div>
            </div>

            <!-- now buttons also with php-->
            <div class="d-flex justify-content-center">
              <?php
                buttonElement("btn-create", "btn btn-success", "<i class='fas fa-plus'></i>", "create", "dat-toggle='tooltip' data-placement='bottom' title='Create'");
                buttonElement("btn-read", "btn btn-primary", "<i class='fas fa-sync'></i>", "read", "dat-toggle='tooltip' data-placement='bottom' title='Read'");
                buttonElement("btn-update", "btn btn-light border", "<i class='fas fa-pen-alt'></i>", "update", "dat-toggle='tooltip' data-placement='bottom' title='Update'");
                buttonElement("btn-delete", "btn btn-danger", "<i class='fas fa-trash-alt'></i>", "delete", "dat-toggle='tooltip' data-placement='bottom' title='Delete'");
                deleteBtn();
              ?>
            </div>
          </form>
        </div>
        <!-- Bootstrap table -->
        <div class="d-flex">
                      <!-- I had to put  table-responsive or else size will go outside screen -->
            <table class="table table-striped table-dark table-responsive">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Book Name</th>
                        <th>Publisher</th>
                        <th>Book Price</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody id="tbody">
                  <?php
                    if(isset($_POST['read'])){
                      $result = getData();
                      if($result){
                        while($row=mysqli_fetch_assoc($result)){?>
                          <tr>
                            <td data-id="<?php echo $row['id']; ?>"><?php echo $row['id'];?></td>
                            <td data-id="<?php echo $row['id']; ?>"><?php echo $row['book_name'];?></td>
                            <td data-id="<?php echo $row['id']; ?>"><?php echo $row['book_publisher'];?></td>
                            <td data-id="<?php echo $row['id']; ?>"><?php echo '$'.$row['book_price'];?></td>
                            <td><i class="fas fa-edit btnedit"  data-id="<?php echo $row['id']; ?>"></i></td>
                          </tr>
                  <?php
                        }
                      }
                    }
                  ?>
                </tbody>
            </table>
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
    <script src="php/main.js">

    </script>
  </body>
</html>
