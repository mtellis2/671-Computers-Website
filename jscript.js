$('.dropdown-toggle').dropdown();


$('#divNewNotifications li').on('click', function() {
    $('#dropdown_title').html($(this).find('a').html());
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
				 //Put result table into document  at tableplace spot 
				 document.getElementById("allCustBody").innerHTML = this.responseText;
			 }
		 };
		 //Get the query result 
		 xmlhttp.open("GET", "ShowAllCustomers.php", true);
		 xmlhttp.send();
 }
 