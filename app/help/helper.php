<?php

function channel_width(){
        $channel_width = ['5','10','15','20','25','30','35','40','50','60','80','120','160'];
    return array_combine($channel_width,$channel_width);
}

function authentication_method(){
        $authentication_method = ['EAP','WPA'];
    return array_combine($authentication_method,$authentication_method);
}

function connection_method(){
        $connection_method = ['Unknown!','Wireless','LAN','FTTX'];
    return array_combine($connection_method,$connection_method);
}


function connection_method_value(){
    $array = ['0'=>'Unknown!','1'=>'Wireless','2'=>'LAN','3'=>'FTTX'];
    return $array;
}

function wireless_type(){
    $array = ['wireless 900 MHz','wireless 2.4 GHz','wireless 3 GHz','wireless 5.8 GHz','wireless 24 GHz'];
    return $array;
}

// Tower Ticket Functions

function tower_ticket_category(){
    $array = ['1'=>'Point/Tower','2'=>'Broadcast','3'=>'Link'];
    return $array;
}

function tower_ticket_priority(){
    $array = ['1'=>'Low','2'=>'Normal','3'=>'High','4'=>'Urgent'];
    return $array;
}

function tower_ticket_status(){
    $array = ['1'=>'Open','2'=>'Closed'];
    return $array;
}

function splitting_level(){
    $array = ['Single Splitting','Two-level Splitting','Multi-level Splitting'];
    return $array;
}

function splitting_method(){
    $array = ['FBT SPLITTER','PLC SPLITTER'];
    return $array;
}

function splitting_ratio_level(){
    $array = ['1×4','1×8','1×16','1×32','1×64'];
    return $array;
}

function olt_type(){
    $array = ['G-PON','E-PON'];
    return $array;
}

function adaptor_type(){
    $array = ['SC / APC','FC / PAC','SC / PC','FC / PC'];
    return $array;
}
