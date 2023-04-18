<?php

function GetRandArr(){
    $arr=[];

    for($i=0;$i<10;$i++){
        $item=rand(1,10);

        while(true){
            if(in_array($item,$arr)){
                $item=rand(1,10);
            }
            else{
                break;
            }
        }

        $arr[]=$item;
        
    }


    return $arr;
}


