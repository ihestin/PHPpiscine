<?PHP
  
function ft_is_sort($array)
{
	$artmp = $array;
	sort($artmp);
	return ($artmp === $array);
}
?>
