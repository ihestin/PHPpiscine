#!/usr/bin/php
<?PHP
echo "Entrez un nombre: ";
while ($buffer = fgets(STDIN))
{
	$buffer = trim($buffer);
	if (is_numeric($buffer))
		if ($buffer % 2 == 0)
			echo "Le chiffre ".$buffer." est Pair\n";
	    else
			echo "Le chiffre ".$buffer." est Impair\n";
	else
		echo "'".$buffer."' n'est pas un chiffre\n";
	echo "Entrez un nombre: ";
}
?>
