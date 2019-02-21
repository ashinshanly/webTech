function send (chatRoom, chatType, msgData) {
  				
	if (chatRoom.length == 0) {
    					
		document.getElementById("status").innerHTML = "Please give the name of chat rooom!";

    		return;

  	}

	if (msgData.length == 0) {
    					
		document.getElementById("status").innerHTML = "Please Type a message!";

    		return;

  	} else {

    		var xmlhttp = new XMLHttpRequest();

    		xmlhttp.onreadystatechange = function() {
      
			if (this.readyState == 4 && this.status == 200) {
        
				document.getElementById("status").innerHTML = this.responseText;
      			}    		
		};
    				
		xmlhttp.open("GET", "chatRoom.php?chatRoom="+chatRoom+"&msgSize="+"&type="+chatType+"&action=send"+"&message="+msgData, true);
    
		xmlhttp.send();
  	}
}

function receive (chatRoom, msgSize, chatType) {
  				
	if (chatRoom.length == 0) {
    					
		document.getElementById("status").innerHTML = "Please give the name of chat rooom!";

    		return;

  	} else {

    		var xmlhttp = new XMLHttpRequest();

    		xmlhttp.onreadystatechange = function() {
      
			if (this.readyState == 4 && this.status == 200) {
        
				document.getElementById("msgReceived").innerHTML = this.responseText;
      			}    		
		};
    				
		xmlhttp.open("GET", "chatRoom.php?chatRoom="+chatRoom+"&msgSize="+msgSize+"&type="+chatType+"&action=recieve"+"&message=", true);
    
		xmlhttp.send();
  	}
}

function clearHistory (chatRoom, chatType) {
  				
	if (chatRoom.length == 0) {
    					
		document.getElementById("status").innerHTML = "Please give the name of chat rooom!";

    		return;

  	} else {

    		var xmlhttp = new XMLHttpRequest();

    		xmlhttp.onreadystatechange = function() {
      
			if (this.readyState == 4 && this.status == 200) {
        
				document.getElementById("status").innerHTML = this.responseText;
      			}    		
		};
    				
		xmlhttp.open("GET", "chatRoom.php?chatRoom="+chatRoom+"&msgSize="+"&type="+chatType+"&action=clear"+"&message=", true);
    
		xmlhttp.send();
  	}
}


