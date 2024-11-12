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
        $a=$b=10;
         if($node->get('gamma')!=null){
            $a= $node->get('gamma');

         }
         if($node->get('delta')!=null){
            $b=$node->get('delta');

         }

        $c=$a+$b;


        //  now storing it and carrying it to the view
        $basket= KITE::getinstance('basket');
        $basket->set('a',$a);
        $basket->set('',$b);   
        $basket->set('',$c);
        
        KITE::render('add');
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
