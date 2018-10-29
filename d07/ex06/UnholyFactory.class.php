<?php

include_once('Fighter.class.php');

class UnholyFactory {

	private $_s = array();

	public function absorb( $sol ){
		if ( $sol instanceof Fighter ) {
			if (in_array($sol, $this->_s))
				print( '(Factory already absorbed a fighter of type '.$sol.')' . PHP_EOL );
			else {
				$this->_s[] = $sol;
				print( '(Factory absorbed a fighter of type '.$sol. ')' . PHP_EOL );
			}
		}
		else
			print( "(Factory can't absorb this, it's not a fighter)" . PHP_EOL);
	}

	public function fabricate($sol){
        foreach ($this->_s as $value) {
           	if ($value ==  $sol){
            	print("(Factory fabricates a fighter of type " . $sol . ")" . PHP_EOL);
                return (clone $value);
            }
        }
        print("(Factory hasn't absorbed any fighter of type " . $sol . ")" . PHP_EOL);
            return null;
    }
}

?>
