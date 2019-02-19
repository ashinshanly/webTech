function creatChatRoom (chatRoom, msgSize) {
  				
	if (chatRoom.length == 0) {
    					
		document.getElementById("status").innerHTML = "Please Give a Name";

    		return;

  	} else {

    		var xmlhttp = new XMLHttpRequest();

    		xmlhttp.onreadystatechange = function() {
      
			if (this.readyState == 4 && this.status == 200) {
        
				document.getElementById("status").innerHTML = this.responseText;
      			}    		
		};
    				
		xmlhttp.open("GET", "chatRoom.php?chatRoom="+chatRoom+"&msgSize="+msgSize, true);
    
		xmlhttp.send();
  	}
}
