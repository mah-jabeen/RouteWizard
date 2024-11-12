<?php

$basket= KITE::getinstance("basket"); 
print_r( $basket );
?>

<h1> This is addition page</h1>
<p> you have given the numbers <?php echo $basket->get('a'); ?> and <?php $basket->get('b'); ?> </p>
<p> <b> The sum is <?php echo $baskets->get('c') ?></b></p>