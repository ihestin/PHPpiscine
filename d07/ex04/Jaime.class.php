
<?php
  
  Class Jaime extends Lannister{

   	public function sleep_in($gens){
   		if (get_class($gens) === "Cersei")
			print("With pleasure, but only in a tower in Winterfell, then".PHP_EOL);
		else
	   		print("Not event if I'm drunk !" .PHP_EOL);
   	}

  }

?>
