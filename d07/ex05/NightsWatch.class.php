<?php

   class NightsWatch implements IFighter {
   		private $soldat;

   		public function recruit($person){
   			if ( $person instanceof IFighter )
				$this->soldat[] = $person;
   		}

   		public function fight(){
			foreach ($this->soldat as $key => $val) {
				$val->fight();
			}
		}
   }

?>
