<?php
require_once("db.php");
require_once("component.php");

$con = createDatabase();

//create button click
  //user clicks button named create is a POST
if(isset($_POST['create'])){
  createData();
}

// create button onclick Update operation
if(isset($_POST['update'])){
  updateData();
}

// create button onclick Update operation
if(isset($_POST['delete'])){
  deleteData();
}

// the user clicks Delete ALL
if(isset($_POST['deleteall'])){
  deleteAll();
  // must create again (that is, the table) or errors will appear on screen
  createDatabase();
}
//read button click - use here for testing. the real works on index.php
  //user clicks button named create is a POST
//if(isset($_POST['read'])){
//  getData();
//}

//CRUD   **Create**
function createData(){
  //process value
  $bookname= textboxValue('book_name');
  $bookpublisher = textboxValue('book_publisher');
  $bookprice = textboxValue('book_price');
  //validate variables and insert into table
  if($bookname && $bookpublisher && $bookprice){
    $sql = "
    INSERT INTO books(book_name, book_publisher, book_price)
    VALUES('$bookname','$bookpublisher','$bookprice');
    ";

    //execute query
    if(mysqli_query($GLOBALS['con'],$sql)){
      TextNode("success","Record Successfully Inserted.");
    } else { TextNode("error","error inserting"); }
  } else {
    TextNode("error","Error: Textboxes cannot be empty.");
  }
} // end function

// CRUD  **READ data from DB**
function getData(){
  $sql= "SELECT * FROM books";

  $result= mysqli_query($GLOBALS['con'],$sql);

  if(mysqli_num_rows($result)>0){
    return $result;
    //next lines show text on top of page, for testing
    //while($row=mysqli_fetch_assoc($result)){
    //  echo "Id: ".$row['id']."-BookName: ".$row['book_name'];
    //}
  }
} // end function


// CRUD  **UPDATE data to DB**
function updateData(){
  //get values from form
  $bookid = textboxValue("book_id");
  $bookname = textboxValue("book_name");
  $bookpublisher = textboxValue("book_publisher");
  $bookprice = textboxValue("book_price");
  //echo($bookid.'|'.$bookname.'|'.$bookpublisher.'|'.$bookprice);
  // if fields not empty then create query and update DATABASE
  if($bookid && $bookname && $bookpublisher && $bookprice){
    $sql = "
          UPDATE books SET book_name='$bookname',book_publisher='$bookpublisher',book_price='$bookprice' WHERE id='$bookid';
    ";
    if(mysqli_query($GLOBALS['con'],$sql)){
      TextNode("success","Data successfully updated.");
    } else {
        TextNode("error","An error occurred updating data.");
      }
  }else {
    TextNode("error","You cannot have empty fields.");
    }
} //end function

// CRUD  **DELETE record in DB**
function deleteData(){
  $bookid = (int)textboxValue("book_id"); //convert to integer

  $sql = "DELETE FROM books WHERE id=$bookid;";
  if(mysqli_query($GLOBALS['con'], $sql)){
    TextNode("success", "The record has been deleted for ever.");
  }else { TextNode("error", "Unable to delete record.");}
}//end function

// CRUD **DELETE ALL** records, frist create the button if there are more than 3 records
function deleteBtn(){
  $result = getData();
  $i = 0;
  if($result){
    while($row = mysqli_fetch_assoc($result)){
      $i++;
      if($i>3){
        buttonElement("btn-deleteall","btn btn-danger", "<i class='fas fa-trash'></i> Delete All", "deleteall", "");
        return;
      }
    }
  }
} // end function
// now the function that deletes EVERYTHING from MySQL
function deleteAll(){
  $sql = "DROP TABLE books";
  if(mysqli_query($GLOBALS['con'], $sql)){
    TextNode("success", "All records have been lost, oh boy...");
  } else {
    TextNode("error", "Phew!, something went wrong deleting all records.");
  }

} // end function


// show the NEXT id for a book, when form is Empty
function setID(){
  $getid = getData();
  $id = 0;
  if($getid){
    while($row = mysqli_fetch_assoc($getid)){
      $id = $row['id'];
    }
  }
  return($id+1);
}

function textboxValue($value){
  //$textbox = mysqli_real_escape_string($con);
  // $con gives error, variable is not in this fann_get_cascade_activation_functions
  // so you call GLOBLAS
  $textbox = mysqli_real_escape_string($GLOBALS['con'],trim($_POST[$value]));
  if(empty($textbox)){
    return false;
  } else {
    return $textbox;  }
}

// messages
function TextNode($classname, $msg){
  $element = "<h6 class='$classname'>$msg</h6>";
  echo $element;
}
?>
