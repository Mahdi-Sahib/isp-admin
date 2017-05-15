<?php

Route::group(['middleware' => 'admin'], function () {
    Route::get('isp-cpanel', 'HomeController@index');


    Route::get('isp-cpanel/customers/customer-table-one-view', 'CustomerController@CustomerTableOneView');
    Route::get('isp-cpanel/customers/customer-table-one-ajax', [
        'as'   => 'isp-cpanel.customers.customer-table-one-ajax',
        'uses' => 'CustomerController@CustomerTableOneAjax'
    ]);
    Route::resource('isp-cpanel/customers', 'CustomerController');
    Route::get('isp-cpanel/customer/customer_peek', 'CustomerController@Peek');
    Route::post('isp-cpanel/customer/customer_refill', 'RefillCustomerController@refillCustomer');

    // Route::get('isp-cpanel/customers/customer-refill-view', 'RefillCustomerController@CustomerRefillView');
    Route::get('isp-cpanel/customers/customer-refill-ajax/{id?}', [
        'as'   => 'isp-cpanel.customers.customer-refill-ajax',
        'uses' => 'RefillCustomerController@CustomerRefillAjax'
    ]);

    // Route::get('isp-cpanel/customers/customer-ticket-view', 'CustomerTicketController@CustomerTicketView');
    Route::get('isp-cpanel/customers/customer-ticket-ajax/{id?}', [
        'as'   => 'isp-cpanel.customers.customer-ticket-ajax',
        'uses' => 'CustomerTicketController@CustomerTicketAjax'
    ]);
    Route::post('isp-cpanel/customer/customer_ticket', 'CustomerTicketController@addAjax');
    Route::get('isp-cpanel/customer/customer_ticket/view', 'CustomerTicketController@viewAjax');
    Route::post('isp-cpanel/customer/customer_ticket/close_ticket', 'CustomerTicketController@closeTicket');


    Route::get('isp-cpanel/towers/towers-table-one-view', 'TowerController@TowersTableOneView');
    Route::get('isp-cpanel/towers/tower-table-one-ajax', [
        'as'   => 'isp-cpanel.towers.tower-table-one-ajax',
        'uses' => 'TowerController@TowerTableOneAjax'
    ]);
    Route::get('isp-cpanel/fibernode/fibernode-table-one-view', 'FiberNodeController@fibernodeTableOneView');
    Route::get('isp-cpanel/fibernode/fibernode-table-one-ajax', [
        'as'   => 'isp-cpanel.fibernode.fibernode-table-one-ajax',
        'uses' => 'FiberNodeController@fibernodeTableOneAjax'
    ]);
    Route::get('isp-cpanel/repeaternode/repeaternode-table-one-view', 'RepeaterNodeController@RepeaterNodeTableOneView');
    Route::get('isp-cpanel/repeaternode/repeaternode-table-one-ajax', [
        'as'   => 'isp-cpanel.repeaternode.repeaternode-table-one-ajax',
        'uses' => 'RepeaterNodeController@RepeaterNodeTableOneAjax'
    ]);
    Route::get('isp-cpanel/broadcast/broadcast-table-one-view', 'BroadcastController@BradcastTableOneView');
    Route::get('isp-cpanel/broadcast/broadcast-table-one-ajax', [
        'as'   => 'isp-cpanel.broadcast.broadcast-table-one-ajax',
        'uses' => 'BroadcastController@BroadcastTableOneAjax'
    ]);
    Route::get('isp-cpanel/link/link-table-one-view', 'LinkController@LinkTableOneView');
    Route::get('isp-cpanel/link/link-table-one-ajax', [
        'as'   => 'isp-cpanel.link.link-table-one-ajax',
        'uses' => 'LinkController@LinkTableOneAjax'
    ]);

    // Tower Ticket
    Route::get('isp-cpanel/tower/tower_ticket/view', 'TowerTicketController@viewAjax');
    Route::get('isp-cpanel/tower/tower_ticket/{id?}', [
        'as'   => 'isp-cpanel.tower.tower_ticket',
        'uses' => 'TowerTicketController@ticketTable'
    ]);

    Route::post('isp-cpanel/tower/tower_ticket', 'TowerTicketController@addAjax');
    Route::post('isp-cpanel/tower/tower_ticket/close_ticket', 'TowerTicketController@closeTicket');
    Route::post('isp-cpanel/tower/tower_ticket/update', 'TowerTicketController@updateAjax');
    Route::post('isp-cpanel/tower/tower_ticket/delete', 'TowerTicketController@deleteAjax');


    // connection_types
    Route::get('isp-cpanel/settings/connection_types', 'ConnectionTypeController@index');
    Route::post('isp-cpanel/settings/connection_types', 'ConnectionTypeController@add');
    Route::get('isp-cpanel/settings/connection_types/view', 'ConnectionTypeController@view');
    Route::post('isp-cpanel/settings/connection_types/update', 'ConnectionTypeController@update');
    Route::post('isp-cpanel/settings/connection_types/delete', 'ConnectionTypeController@delete');

    Route::get('isp-cpanel/tower/tower_ip', 'TowerIpController@tableAjax');
    Route::post('isp-cpanel/tower/tower_ip', 'TowerIpController@addAjax');
    Route::get('isp-cpanel/tower/tower_ip/view', 'TowerIpController@viewAjax');
    Route::post('isp-cpanel/tower/tower_ip/update', 'TowerIpController@updateAjax');
    Route::post('isp-cpanel/tower/tower_ip/delete', 'TowerIpController@deleteAjax');

    Route::get('isp-cpanel/tower/tower_broadcast', 'BroadcastController@tableAjax');
    Route::post('isp-cpanel/tower/tower_broadcast', 'BroadcastController@addAjax');
    Route::get('isp-cpanel/tower/tower_broadcast/view', 'BroadcastController@viewAjax');
    Route::post('isp-cpanel/tower/tower_broadcast/update', 'BroadcastController@updateAjax');
    Route::post('isp-cpanel/tower/tower_broadcast/delete', 'BroadcastController@deleteAjax');

    Route::get('isp-cpanel/tower/tower_link', 'TowerLinkController@tableAjax');
    Route::post('isp-cpanel/tower/tower_link', 'TowerLinkController@addAjaxNew');
    Route::get('isp-cpanel/tower/tower_link/view', 'TowerLinkController@viewAjax');
    Route::post('isp-cpanel/tower/tower_link/update', 'TowerLinkController@updateAjax');
    Route::post('isp-cpanel/tower/tower_link/delete', 'TowerLinkController@deleteAjax');

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


    Route::resource('isp-cpanel/towers', 'TowerController');
    Route::resource('isp-cpanel/fibernodes', 'FiberNodeController');
    Route::resource('isp-cpanel/fiberboxes', 'FiberBoxController');
    Route::resource('isp-cpanel/repeaters', 'RepeaterNodeController');



    Route::get('isp-cpanel/financial/product', 'ProductsController@index');
    Route::post('isp-cpanel/financial/product', 'ProductsController@add');
    Route::get('isp-cpanel/financial/product/view', 'ProductsController@view');
    Route::post('isp-cpanel/financial/product/update', 'ProductsController@update');
    Route::post('isp-cpanel/financial/product/delete', 'ProductsController@delete');

    Route::get('isp-cpanel/financial/balance_recharges/view', 'ProductsController@viewAjax');
    Route::get('isp-cpanel/financial/balance_recharges', 'BalanceRechargesController@BalanceRechargeTableView');
    Route::get('isp-cpanel/financial/balance_recharges_ajax', [
        'as'   => 'isp-cpanel.financial.balance_recharges_ajax',
        'uses' => 'BalanceRechargesController@BalanceRechargeTableAjax'
    ]);

    // financial
    Route::get('isp-cpanel/financial/supplier/view', 'SupplierController@view');
    Route::post('isp-cpanel/financial/supplier/update', 'SupplierController@update');
    Route::post('isp-cpanel/financial/supplier/delete', 'SupplierController@delete');

    Route::resource('isp-cpanel/financial/supplier', 'SupplierController');    Route::get('isp-cpanel/financial/supplier_table_ajax', [
        'as'   => 'isp-cpanel.financial.supplier',
        'uses' => 'SupplierController@SupplierTableAjax'
    ]);
    Route::resource('isp-cpanel/financial/supplier', 'SupplierController');

    Route::get('isp-cpanel/financial/supplier_balance_recharge_table_view', 'SupplierController@SupplierBalanceRechargeTableView');
    Route::get('isp-cpanel/financial/supplier_dashboard/{id?}', [
        'as'   => 'isp-cpanel.financial.supplier_balance_recharge_table_ajax',
        'uses' => 'SupplierController@SupplierBalanceRechargeTableAjax'
    ]);
    Route::post('isp-cpanel/financial/balance_recharges', 'BalanceRechargesController@add');

    // refill_cards
    Route::resource('isp-cpanel/financial/refill_cards', 'RefillCardController');
    Route::get('isp-cpanel/financial/refill_card_ajax', [
        'as'   => 'isp-cpanel.financial.refill_cards',
        'uses' => 'RefillCardController@RefillCardsTableAjax'
    ]);

    // Customer Transaction
    Route::resource('isp-cpanel/financial/customer_transaction', 'CustomerTransactionController');

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
