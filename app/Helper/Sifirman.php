<?php

    function identitas($data){
        if($data == "judulweb"){
            return "PKU Pantau Banjir";
        }
    }

    function base_url(){
        return URL::to('/')."/";
    }
