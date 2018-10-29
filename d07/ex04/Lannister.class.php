<?php
   class Lannister{

   	public function sleep_out($gens){
   		print("Let's do this." .PHP_EOL);
   	}

   	public function sleep_in($gens){
   		print("Not event if I'm drunk !" .PHP_EOL);
   	}
   	
   	public function sleepWith($gens){
   		if (get_parent_class($gens) !== 'Lannister')
   			$this->sleep_out($gens);
   		else
   			$this->sleep_in($gens);
   	}
   }
?>
