<?php

function channel_width(){
    $array = ['5','10','15','20','25','30','35','40','50','60','80','120','160'];
    return $array;
}

function authentication_method(){
    $array = ['EAP','WPA'];
    return $array;
}

function connection_method_value(){
    $array = ['Unknown!','Wireless','LAN','FTTX'];
    return $array;
}

function wireless_type(){
    $array = ['2.4 GHz (802.11b/g/n)','3.65 GHz (802.11y)','4.9 GHz (802.11j)','5 GHz (802.11a/h/j/n/ac)','5.9 GHz (802.11p)','24 GHz','60 GHz (802.11ad)'];
    return $array;
}

// Tower Ticket Functions

function tower_ticket_category(){
    $array = ['Point/Tower','Broadcast','Link'];
    return $array;
}

function tower_ticket_priority(){
    $array = ['Low','Normal','High','Urgent'];
    return $array;
}

function tower_ticket_status(){
    $array = ['Open','Closed'];
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

function fiber_core_count(){
    $array = ['Single Core','Dual Core','Quad Core','Octa Core'];
    return $array;
}
function fiber_type(){
    $array = ['Single Mode cable','Multi-Mode cable'];
    return $array;
}
