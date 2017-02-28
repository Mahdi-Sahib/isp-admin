<?php

Route::group(['middleware' => 'admin'], function () {
    Route::get('isp-cpanel', 'HomeController@index');


    Route::get('isp-cpanel/customers/customer-table-one-view', 'CustomerController@CustomerTableOneView');
    Route::get('isp-cpanel/customers/customer-table-one-ajax', [
        'as'   => 'isp-cpanel.customers.customer-table-one-ajax',
        'uses' => 'CustomerController@CustomerTableOneAjax'
    ]);
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

    Route::get('isp-cpanel/tower/tower_ticket', [
        'as'   => 'isp-cpanel.tower.tower_ticket',
        'uses' => 'TowerTicketController@ticketTable'
    ]);

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

    Route::resource('isp-cpanel/customers', 'CustomerController');
    Route::resource('isp-cpanel/towers', 'TowerController');
    Route::resource('isp-cpanel/fibernodes', 'FiberNodeController');
    Route::resource('isp-cpanel/fiberboxes', 'FiberBoxController');
    Route::resource('isp-cpanel/repeaters', 'RepeaterNodeController');


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
