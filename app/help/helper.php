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
        $connection_method = ['Unknown!','Wireless','LAN','Fiber Optic'];
    return array_combine($connection_method,$connection_method);
}

function wireless_type(){
        $connection_method = ['wireless 900 MHz','wireless 2.4 GHz','wireless 3 GHz','wireless 5.8 GHz','wireless 24 GHz','wireless 60 GHz','wireless 64/66 GHz','wireless 70/80 GHz'];
    return $connection_method;
}

// Tower Ticket Functions

function tower_ticket_category(){
        $ticket_priority = ['1'=>'Point/Tower','2'=>'Broadcast','3'=>'Link'];
    return $ticket_priority;
}

function tower_ticket_priority(){
    $ticket_priority = ['1'=>'Low','2'=>'Normal','3'=>'High','4'=>'Urgent'];
    return $ticket_priority;
}

function tower_ticket_status(){
        $ticket_status = ['1'=>'Open','2'=>'Closed'];
    return $ticket_status;
}

function ticket_for(){
    $ticket_status = ['wireless 900 MHz'=>'wireless 900 MHz','wireless 2.4 GHz'=>'wireless 2.4 GHz','wireless 3 GHz'=>'wireless 3 GHz','wireless 5.8 GHz'=>'wireless 5.8 GHz','wireless 24 GHz'=>'wireless 24 GHz','wireless 60 GHz'=>'wireless 60 GHz','wireless 64/66 GHz'=>'wireless 64/66 GHz','wireless 70/80 GHz'=>'wireless 70/80 GHz'];
    return $ticket_status;
}

