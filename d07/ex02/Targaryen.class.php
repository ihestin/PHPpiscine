<?php
  class Targaryen{

 	public function resistsFire() {
		return False;
	}
 	
 	public function getBurned(){
 		if ($this->resistsFire()){
 			return "Daenerys emerges naked but unharmed";
 		}
 		return "Viserys burns alive";
  	}

  }
?>
