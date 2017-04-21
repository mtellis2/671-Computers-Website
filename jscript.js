$('.dropdown-toggle').dropdown();


$('#divNewNotifications li').on('click', function() {
    $('#dropdown_title').html($(this).find('a').html());
    });

$(document).ready(function() {
    $('#inventoryButton').click(function() {
      event.stopPropagation();
      queryInventory($('#inventoryType').val());
      //alert($('#inventoryType').val());
      //foo($('#formValueId').val());
      return false;
  });
});

	 /*
    Query the database using getquery.php file.
	String str is the specific query to be called..
	The query is displayed in the calling HTML document.

	Utilizes AJAX (xmlhttp) to dynamically update HTML page without reloading it.
 */
 function queryAllCustomers(){
		 if(window.XMLHttpRequest){
			 xmlhttp = new XMLHttpRequest();
		 } else{
			 //For older IE (5, 6)
			 xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		 }
		 xmlhttp.onreadystatechange = function(){
			 if(this.readyState == 4 && this.status == 200){
				 //Put result table into document  at allCustBody spot
				 document.getElementById("adminTable").innerHTML = this.responseText;
				 //document.getElementById("adminHeader").innerHTML= "Customers";
			 }
		 };
		 //Get the query result
		 xmlhttp.open("GET", "ShowAllCustomers.php", true);
		 xmlhttp.send();
 }

 function queryAllDefaultSystems(){
		 if(window.XMLHttpRequest){
			 xmlhttp = new XMLHttpRequest();
		 } else{
			 //For older IE (5, 6)
			 xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		 }
		 xmlhttp.onreadystatechange = function(){
			 if(this.readyState == 4 && this.status == 200){
				 //Put result table into document  at allCustBody spot
				 document.getElementById("adminTable").innerHTML = this.responseText;
				// document.getElementById("adminHeader").innerHTML= "Default Systems";
			 }
		 };
		 //Get the query result
		 xmlhttp.open("GET", "showAllDefaults.php", true);
		 xmlhttp.send();
 }

 function queryInventory(str){
    if(window.XMLHttpRequest){
      xmlhttp = new XMLHttpRequest();
    } else{
      //For older IE (5, 6)
      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function(){
      if(this.readyState == 4 && this.status == 200){
        //Put result table into document  at allCustBody spot
        document.getElementById("inventoryTable").innerHTML = this.responseText;
        //document.getElementById("adminHeader").innerHTML= "Customers";
      }
    };
    //Get the query result
    xmlhttp.open("GET", "getInventory.php?inventoryType=" + str, true);
    xmlhttp.send();
 }

 /*function highlight(e) {
    if (selected[0]) selected[0].className = '';
    e.target.parentNode.className = 'selected';
  }

  var table = document.getElementById('searchTable'),
      selected = table.getElementsByClassName('selected');
  table.onclick = highlight;


  function fnselect(){
    //alert($("tr.selected td:first").html());
		var itemNumber = $("tr.selected td:first").html();

    //alert($("tr.selected" ).html());
		//alert($("tr.selected td:first" ).html());
	}*/
