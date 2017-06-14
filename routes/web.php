<?php

Route::group(['middleware' => 'admin'], function () {
    Route::get('isp-cpanel', 'HomeController@index');

    #start########## customer #######################

    // ---------  customers Ajax tables  ------------
    Route::get('isp-cpanel/customers/customer-refill-table/{id?}', 'RefillCustomerController@CustomerRefillAjax');
    Route::get('isp-cpanel/customers/customer-ticket-table/{id?}', 'CustomerTicketController@CustomerTicketAjax');
    Route::get('isp-cpanel/customers/customer-table', 'CustomerController@CustomerTableOneAjax');
    Route::get('isp-cpanel/customers/customer_ticket/open_ticket', 'CustomerTicketController@OpenTickets');

    // ---------  customers Ajax tables  ------------


    // xxxxxxxxxxx
    Route::get('customer_peek', 'CustomerController@Peek');


    Route::get('isp-cpanel/customers/customer_refill/view', 'RefillCustomerController@viewAjax');
    Route::post('isp-cpanel/customers/customer_refill', 'RefillCustomerController@refillCustomer');
    Route::post('isp-cpanel/customers/debt_repayment', 'RefillCustomerController@repayment');

    // unpaid
    Route::get('isp-cpanel/customers/unpaid', 'RefillCustomerController@unpaid');
    Route::get('isp-cpanel/customers/unpaid-table', 'RefillCustomerController@unpaidTable');
    //  xxxxxxxxxxx

    Route::get('isp-cpanel/customers/customer_ticket/view', 'CustomerTicketController@viewAjax');
    Route::get('isp-cpanel/customers/customer_ticket', 'CustomerTicketController@home');
    Route::post('isp-cpanel/customers/customer_ticket/add', 'CustomerTicketController@addAjax');
    Route::post('isp-cpanel/customers/customer_ticket/hint', 'CustomerTicketController@addHint');
    Route::post('isp-cpanel/customers/customer_ticket/close_ticket', 'CustomerTicketController@closeTicket');




    Route::resource('isp-cpanel/customers', 'CustomerController');





    #end###############################customer#########################################


    #################################################   towers    #################################################

    Route::get('isp-cpanel/towers/tower-table', 'TowerController@TowerTableOneAjax');


    Route::get('isp-cpanel/tower/tower_ip', 'TowerIpController@tableAjax');
    Route::post('isp-cpanel/tower/tower_ip', 'TowerIpController@addAjax');
    Route::get('isp-cpanel/tower/tower_ip/view', 'TowerIpController@viewAjax');
    Route::post('isp-cpanel/tower/tower_ip/update', 'TowerIpController@updateAjax');
    Route::post('isp-cpanel/tower/tower_ip/delete', 'TowerIpController@deleteAjax');

    Route::get('isp-cpanel/tower/tower_broadcast/ajax_table/{id?}', 'BroadcastController@BroadcastTable');
    Route::get('isp-cpanel/tower/tower_broadcast', 'BroadcastController@broadcast_view_crud');
    Route::post('isp-cpanel/tower/tower_broadcast', 'BroadcastController@addAjax');
    Route::get('isp-cpanel/tower/tower_broadcast/view', 'BroadcastController@viewAjax');
    Route::post('isp-cpanel/tower/tower_broadcast/update', 'BroadcastController@updateAjax');
    Route::post('isp-cpanel/tower/tower_broadcast/delete', 'BroadcastController@deleteAjax');

    // link
    Route::get('isp-cpanel/tower/tower_link/view', 'TowerLinkController@viewAjax');
    Route::get('isp-cpanel/tower/tower_link', 'TowerLinkController@tableAjax');
    Route::post('isp-cpanel/tower/tower_link', 'TowerLinkController@addAjaxNew');
    Route::post('isp-cpanel/tower/tower_link/update', 'TowerLinkController@updateAjax');
    Route::post('isp-cpanel/tower/tower_link/delete', 'TowerLinkController@deleteAjax');


    // Tower Ticket
    Route::get('isp-cpanel/tower/tower_ticket/view-ticket', 'TowerTicketController@viewAjax');
    Route::get('isp-cpanel/tower/tower_ticket/{id?}', 'TowerTicketController@ticketTable');
    Route::post('isp-cpanel/tower/tower_ticket', 'TowerTicketController@addAjax');
    Route::post('isp-cpanel/tower/tower_ticket/close_ticket', 'TowerTicketController@closeTicket');
    Route::resource('isp-cpanel/towers', 'TowerController');
    ##############################################################################################

    ############################################  settings  ############################################
    // connection_types
    Route::get('isp-cpanel/settings/connection_types', 'ConnectionTypeController@index');
    Route::post('isp-cpanel/settings/connection_types', 'ConnectionTypeController@add');
    Route::get('isp-cpanel/settings/connection_types/view', 'ConnectionTypeController@view');
    Route::post('isp-cpanel/settings/connection_types/update', 'ConnectionTypeController@update');
    Route::post('isp-cpanel/settings/connection_types/delete', 'ConnectionTypeController@delete');



    Route::get('isp-cpanel/settings/devices', 'DeviceController@index');
    Route::post('isp-cpanel/settings/devices', 'DeviceController@add');
    Route::get('isp-cpanel/settings/devices/view', 'DeviceController@view');
    Route::post('isp-cpanel/settings/devices/update', 'DeviceController@update');
    Route::post('isp-cpanel/settings/devices/delete', 'DeviceController@delete');

    Route::get('isp-cpanel/settings/address', 'AddressHelperController@index');
    Route::post('isp-cpanel/settings/address', 'AddressHelperController@add');
    Route::get('isp-cpanel/settings/address/view', 'AddressHelperController@view');
    Route::post('isp-cpanel/settings/address/update', 'AddressHelperController@update');
    Route::post('isp-cpanel/settings/address/delete', 'AddressHelperController@delete');

    ##############################################################################################


    ############################################  settings  ############################################

    // ---------  product  ------------
    Route::get('isp-cpanel/financial/product', 'ProductsController@index');
    Route::post('isp-cpanel/financial/product', 'ProductsController@add');
    Route::get('isp-cpanel/financial/product/view', 'ProductsController@view');
    Route::post('isp-cpanel/financial/product/update', 'ProductsController@update');
    Route::post('isp-cpanel/financial/product/delete', 'ProductsController@delete');
    // ---------  product  ------------


    // ---------  balance_recharges  ------------
    Route::get('isp-cpanel/financial/balance_recharges_table', 'BalanceRechargesController@BalanceRechargeTable');
    Route::resource('isp-cpanel/financial/balance_recharges', 'BalanceRechargesController');
    // ---------  balance_recharges  ------------


    // ---------  supplier  ------------
    Route::resource('isp-cpanel/financial/supplier', 'SupplierController');
    Route::get('isp-cpanel/financial/supplier/view', 'SupplierController@view');
    Route::post('isp-cpanel/financial/supplier/update', 'SupplierController@update');
    Route::post('isp-cpanel/financial/supplier/delete', 'SupplierController@delete');
    Route::get('isp-cpanel/financial/supplier_table', 'SupplierController@SupplierTableAjax');
    Route::resource('isp-cpanel/financial/supplier', 'SupplierController');
    // ---------  supplier  ------------



    Route::get('isp-cpanel/financial/supplier_balance_recharge_table_view', 'SupplierController@SupplierBalanceRechargeTableView');
    Route::get('isp-cpanel/financial/supplier_dashboard/{id?}', 'SupplierController@SupplierBalanceRechargeTableAjax');

    // refill_cards
    Route::resource('isp-cpanel/financial/refill_cards', 'RefillCardController');
    Route::get('isp-cpanel/financial/refill_card_table', 'RefillCardController@RefillCardsTableAjax');


    // Customer Transaction
    ##############################################################################################

    // FTTX - olt
    Route::resource('isp-cpanel/fttx/olt', 'OltController');
    Route::get('isp-cpanel/fttx/table', 'OltController@table');





    ##############################################################################################
});

Route::group(['middleware' => 'auth'], function () {
    //    Route::get('/link1', function ()    {
//        // Uses Auth Middleware
//    });

    Route::get('/', function () {
        return view('welcome');
    });
    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes
});
