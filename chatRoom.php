<?php

   	function stream_fifo_open ($fifoPath, $mode, $operation) {
        
		if (! file_exists($fifoPath)) {             

			posix_mkfifo($fifoPath, $mode);
        	} 

        	$fifo = fopen($fifoPath, $operation);

		return $fifo;
    	}

	interface Communication {
    
		public function receive();

    		public function send();

		public function clear();
	}

	class FIFOCommunication implements Communication {

		public $chatRoom;
    
		public $readHead;

		public $writeHead; 

		public $msgSize;   		

		public $msgToSend;

		public $msgReceived;

 		public function __construct ($_chatRoom, $_msgSize) {

			$chatRoom = $_chatRoom;
			
			$msgSize = $_msgSize; 

			$msgReceived = '';

			$msgToSend = '';	

			$readHead = stream_fifo_open ($chatRoom.'read', '7777', 'r');

			$writeHead = stream_fifo_open ($chatRoom.'write', '7777', 'w');
	
		}

		public function receive () {
			
			$msgReceived = fread($readHead, $msgSize);
		}

		public function send () {

			fwrite($writeHead, $msgToSend);
		}

		public function clear () {

			$msgToSend = '';

			$msgReceived = '';
		}
	}

	$_chatRoom = $_REQUEST["chatRoom"];

	$_msgSize = $_REQUEST["msgSize"];

	$chatObj = new FIFOCommunication($_chatRoom, 2);

	//echo $_chatRoom.$_msgSize.$fifo;
	
	$chatObj->send('Hi I am ezudheen');

	//$result = $chatObj->receive();

	echo $result;
?>
