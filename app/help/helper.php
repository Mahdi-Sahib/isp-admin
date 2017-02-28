<?php

function channel_width(){
        $channel_width = ['5'=>'5','10'=>'10','15'=>'15','20'=>'20','25'=>'25','30'=>'30','35'=>'35','40'=>'40','50'=>'50','60'=>'60','80'=>'80','120'=>'120','160'=>'160'];
    return $channel_width;
}

function authentication_method(){
        $authentication_method = ['EAP'=>'EAP','WPA'=>'WPA'];
    return $authentication_method;
}

function connection_method(){
        $connection_method = ['Unknown!'=>'Unknown!','Wireless'=>'Wireless','LAN'=>'LAN','Fiber Obtic'=>'Fiber Obtic'];
    return $connection_method;
}

function wireless_type(){
        $connection_method = ['wireless 900 MHz'=>'wireless 900 MHz','wireless 2.4 GHz'=>'wireless 2.4 GHz','wireless 3 GHz'=>'wireless 3 GHz','wireless 5.8 GHz'=>'wireless 5.8 GHz','wireless 24 GHz'=>'wireless 24 GHz','wireless 60 GHz'=>'wireless 60 GHz','wireless 64/66 GHz'=>'wireless 64/66 GHz','wireless 70/80 GHz'=>'wireless 70/80 GHz'];
    return $connection_method;
}

// Ticket Functions

function ticket_category(){
        $ticket_category = ['wireless 900 MHz'=>'wireless 900 MHz','wireless 2.4 GHz'=>'wireless 2.4 GHz','wireless 3 GHz'=>'wireless 3 GHz','wireless 5.8 GHz'=>'wireless 5.8 GHz','wireless 24 GHz'=>'wireless 24 GHz','wireless 60 GHz'=>'wireless 60 GHz','wireless 64/66 GHz'=>'wireless 64/66 GHz','wireless 70/80 GHz'=>'wireless 70/80 GHz'];
    return $ticket_category;
}

function ticket_priority(){
        $ticket_priority = ['wireless 900 MHz'=>'wireless 900 MHz','wireless 2.4 GHz'=>'wireless 2.4 GHz','wireless 3 GHz'=>'wireless 3 GHz','wireless 5.8 GHz'=>'wireless 5.8 GHz','wireless 24 GHz'=>'wireless 24 GHz','wireless 60 GHz'=>'wireless 60 GHz','wireless 64/66 GHz'=>'wireless 64/66 GHz','wireless 70/80 GHz'=>'wireless 70/80 GHz'];
    return $ticket_priority;
}

function ticket_status(){
        $ticket_status = ['wireless 900 MHz'=>'wireless 900 MHz','wireless 2.4 GHz'=>'wireless 2.4 GHz','wireless 3 GHz'=>'wireless 3 GHz','wireless 5.8 GHz'=>'wireless 5.8 GHz','wireless 24 GHz'=>'wireless 24 GHz','wireless 60 GHz'=>'wireless 60 GHz','wireless 64/66 GHz'=>'wireless 64/66 GHz','wireless 70/80 GHz'=>'wireless 70/80 GHz'];
    return $ticket_status;
}

function ticket_for(){
    $ticket_status = ['wireless 900 MHz'=>'wireless 900 MHz','wireless 2.4 GHz'=>'wireless 2.4 GHz','wireless 3 GHz'=>'wireless 3 GHz','wireless 5.8 GHz'=>'wireless 5.8 GHz','wireless 24 GHz'=>'wireless 24 GHz','wireless 60 GHz'=>'wireless 60 GHz','wireless 64/66 GHz'=>'wireless 64/66 GHz','wireless 70/80 GHz'=>'wireless 70/80 GHz'];
    return $ticket_status;
}
