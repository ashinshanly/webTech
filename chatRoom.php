<?php
   	function stream_fifo_open ($fifoPath, $operation) {
        
        	$fifo = fopen($fifoPath, $operation) or die("Unable to open file!");

		return $fifo;
    	}

	class FIFOCommunication {

		public $chatRoom;

		public $msgSize; 
    
		public $readHead;

		public $writeHead;   	

		public function __construct ($_chatRoom = NULL, $_msgSize = 0, $_type = NULL, $_action = NULL) {

			$this->chatRoom = $_chatRoom;
			
			$this->msgSize = $_msgSize; 

			if ($_type === "primary") {

				if ($_action === "send") {

					$this->writeHead = stream_fifo_open ('temp'.$this->chatRoom.'write.txt', 'w');

				} else if ($_action === "recieve"){

					$this->readHead = stream_fifo_open ('temp'.$this->chatRoom.'read.txt', 'r');
				}

			} else {

				if ($_action === "send") {

					$this->writeHead = stream_fifo_open ('temp'.$this->chatRoom.'read.txt', 'w');

				} else if ($_action === "recieve"){

					$this->readHead = stream_fifo_open ('temp'.$this->chatRoom.'write.txt', 'r');
				}
			}
	
		}

		public function receive () {

			$result = fread($this->readHead, $this->msgSize);

			fclose($this->writeHead);

			fclose($this->readHead);
		
			echo $result;
		}

		public function send ($msgToSend) {

			fwrite($this->writeHead, $msgToSend);

			fclose($this->writeHead);

			fclose($this->readHead);
		}

		public function clear () {

			unlink('temp'.$this->chatRoom.'write.txt');

			unlink('temp'.$this->chatRoom.'read.txt');

			echo 'chat history cleared';
		}
	}

	$_chatRoom = $_REQUEST["chatRoom"];

	$_msgSize = $_REQUEST["msgSize"];

	$_type = $_REQUEST["type"];

	$_action = $_REQUEST["action"];

	$_message = $_REQUEST["message"];

	$chatObj = new FIFOCommunication($_chatRoom, $_msgSize, $_type, $_action);

	if ($_action === "send") {

		$chatObj->send($_message);

		echo 'message send';

	} else if ($_action === "recieve") {

		$chatObj->receive();

	} else if ($_action === "clear") {

		$chatObj->clear();
	}
?>
