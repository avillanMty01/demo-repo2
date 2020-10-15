
  let id = $("input[name*='book_id']");
  id.attr("readonly","readonly");

$(".btnedit").click(e =>{
  //console.log(e);   //for debugging
  //most recomended ---->  console.log(e.target.getAttribute("data-id"));
  let textvalues = displayData(e);   //get data from row clicked

  //assign html fields to variables using jquery

  let bookname = $("input[name*='book_name']");
  let bookpublisher = $("input[name*='book_publisher']");
  let bookprice = $("input[name*='book_price']");

  //asign their data, from array
  id.val(textvalues[0]);
  bookname.val(textvalues[1]);
  bookpublisher.val(textvalues[2]);
  bookprice.val(textvalues[3].replace("$", ""));
  // now the user can edit the record, next do an update to MySQL, by clicking the "pen" update icon
  // this is done in php, in operations.php

  // now, go to the top of the page
  window.scrollTo({ top: 0, behavior: 'smooth' });
});

//get data by data-id
// we use jquery $("id element element")   instead of js  getelementbyid()
// to get values from the table
// e.target.dataset.id get the element dataset id (which was clicked)
function displayData(e){
  let id = 0;
  const td = $("#tbody tr td");
  let textvalues = [];

  for(const value of td){
    if(value.dataset.id == e.target.dataset.id){
      textvalues[id++] = value.textContent;
    }
  }
  return textvalues;
} //end function
