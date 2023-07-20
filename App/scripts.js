function cancel(){
    if (!confirm("Are you sure you want to cancel?\nYou will lose all progress")) {
        return false;
    }else{
        window.history.back();
    }

}
function confirm_reset() {
    return confirm("Are you sure you want to reset all text?");
}
function back(){
    if (confirm("Are you sure you want to go back?")) {
        window.history.back();
    }
}

function searchTable(){
    // Declare variables 
    var input, filter, table, tr, td, i;
    input = document.getElementsByClassName("search-input");
    input = input[0];
    filter = input.value.toUpperCase();
    table = document.getElementsByClassName("table-view");
    table = table[0];
    tr = table.getElementsByTagName("tr");
  
    // Loop through all table rows, and hide those who don't match the search query
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td") ; 
      for(j=0 ; j<td.length ; j++)
      {
        let tdata = td[j] ;
        if (tdata) {
          if (tdata.innerHTML.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
            break ; 
          } else {
            tr[i].style.display = "none";
          }
        } 
      }
    }
  }