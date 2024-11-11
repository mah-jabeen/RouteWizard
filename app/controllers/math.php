<?php
class math
{

    function main()
    {
        echo "this is math main function";
    }
    function add()
    {
        $node= KITE::getinstance('node');
        $a= $node->get('gamma');
        $b=$node->get('delta');
        $c=$a+$b;
        echo "the additon of $a and $b is $c";
    }

    function multi()
    {
        echo "this is multiply";
    }

    function sub()
    {
        echo "this is subtract";
    }
}
