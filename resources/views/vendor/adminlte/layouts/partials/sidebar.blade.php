<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{ Gravatar::get($user->email) }}" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->name }}</p>
                    5         <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('layout.online') }}</a>
                </div>
            </div>
    @endif

    <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="{{ trans('layout.search') }}..."/>
                <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">

            <li class="header">{{ trans('layout.header') }}</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="active"><a href="{{ url('home') }}"><i class='fa fa-dashboard'></i> <span>{{ trans('layout.dashboard-customers') }}</span>
                    <small class="label pull-right bg-green">3</small></a></li>
            <li class="active"><a href="{{ url('home1') }}"><i class='fa fa-pie-chart'></i> <span>{{ trans('layout.dashboard-sales') }}</span>
                    <small class="label pull-right bg-green">3</small></a></li>
            <li class="active"><a href="{{ url('home2') }}"><i class='fa fa-warning'></i> <span >{{ trans('layout.dashboard-tickets') }}</span>
                    <small class="label pull-right bg-green">7</small>
                    <small class="label pull-right bg-red">16</small>
                </a></li>
            <li class="active"><a href="{{ url('home3') }}"><i class='fa fa-area-chart'></i> <span>{{ trans('layout.dashboard-devices') }}</span>
                    <small class="label pull-right bg-blue">3</small></a></li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i> <span>{{ trans('layout.crm') }}</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('isp-cpanel/customers/create') }}"><i class="fa fa-user-plus"></i> {{ trans('layout.new-customers') }}<small class="label pull-right bg-green">new</small></a></li>
                    <li><a href="{{ url('isp-cpanel/customers') }}"><i class="fa fa-user-md"></i> {{ trans('layout.all-customers') }}<small class="label pull-right bg-green">1452</small></a></li>
                    <li><a href="{{ url('isp-cpanel/customers/ticket') }}"><i class="fa fa-wheelchair"></i> {{ trans('layout.ticket-customers') }}<small class="label pull-right bg-green">new</small></a></li>
                    <li><a href="{{ url('isp-cpanel/customers/invoice') }}"><i class="fa fa-user-plus"></i> {{ trans('layout.customers-invoices') }}<small class="label pull-right bg-green">new</small></a></li>
                    <li><a href="{{ url('isp-cpanel/customers/dashboard') }}"><i class="fa fa-user-plus"></i> {{ trans('layout.dashboard-customers') }}<smal ></smal></a></li>
                </ul>
            </li>

            <!-- --------------------------------------------------------------------------------- -->
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-gears"></i> <span> Financial</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="#"><i class="fa fa-money"></i> Sales<i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('isp-cpanel/financial/balance_recharges') }}"><i class="fa fa-money"></i> Buy refill Balance</a></li>
                            <li><a href="{{ url('isp-cpanel/repeaters') }}"><i class="fa fa-navicon"></i> repeater Node Table</a></li>
                            <li><a href="{{ url('isp-cpanel/repeaters') }}"><i class="fa fa-navicon"></i> repeater Node Ticket's</a></li>
                        </ul>
                    </li>
                    <li><a href="{{ url('isp-cpanel/financial/supplier') }}"><i class="fa fa-hospital-o"></i> Supplier</a></li>
                    <li><a href="{{ url('isp-cpanel/financial/product') }}"><i class="fa fa-cube"></i> Product</a></li>
                    <li><a href="{{ url('isp-cpanel/financial/refill_cards') }}"><i class="fa fa-cube"></i> Refill Cards</a></li>
                    <li><a href="{{ url('isp-cpanel/financial/inventory') }}"><i class="fa fa-cubes"></i> Inventory<small class="label pull-right bg-green">new</small></a></li>
                </ul>
            </li>

            <!-- --------------------------------------------------------------------------------- -->

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-gears"></i> <span>{{ trans('layout.node-manager') }}</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="#"><i class="fa fa-navicon"></i> {{ trans('layout.fiber-node') }}<i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('isp-cpanel/fibernodes/create') }}"><i class="fa fa-navicon"></i> {{ trans('layout.new-fiber-node') }}</a></li>
                            <li><a href="{{ url('isp-cpanel/fibernodes/fibernodes-table-one-view') }}"><i class="fa fa-navicon"></i> {{ trans('layout.fiber-node-table') }}</a></li>
                            <li><a href="{{ url('admin/fibernode/ticket') }}"><i class="fa fa-navicon"></i> {{ trans('layout.fiber-node-tickets') }}</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-navicon"></i> Repeater Node<i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('isp-cpanel/repeaters/create') }}"><i class="fa fa-navicon"></i> New repeater Node</a></li>
                            <li><a href="{{ url('isp-cpanel/repeaters') }}"><i class="fa fa-navicon"></i> repeater Node Table</a></li>
                            <li><a href="{{ url('isp-cpanel/repeaters') }}"><i class="fa fa-navicon"></i> repeater Node Ticket's</a></li>
                        </ul>
                    </li>
                </ul>
            </li>

            <!-- --------------------------------------------------------------------------------- -->

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-gears"></i> <span> End Point </span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="#"><i class="fa fa-map-signs"></i> Wireless Point <i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('isp-cpanel/towers/create') }}"><i class="fa fa-map-signs"></i> New Point</a></li>
                            <li><a href="{{ url('isp-cpanel/towers/towers-table-one-view') }}"><i class="fa fa-map-signs"></i> Points Table</a></li>
                            <li><a href="{{ url('isp-cpanel/towers/ticket') }}"><i class="fa fa-map-signs"></i> Points Ticket's</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-wifi"></i> Broadcast <i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('isp-cpanel/broadcasts/create') }}"><i class="fa fa-signal"></i> New Broadcast</a></li>
                            <li><a href="{{ url('isp-cpanel/broadcasts/broadcast-table-one-view') }}"><i class="fa fa-signal"></i> Broadcast Table</a></li>
                            <li><a href="{{ url('isp-cpanel/broadcasts/ticket') }}"><i class="fa fa-signal"></i> Broadcast Ticket's</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-navicon"></i> Fiber BOX<i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('isp-cpanel/fiberboxs/create') }}"><i class="fa fa-navicon"></i> Fiber BOX</a></li>
                            <li><a href="{{ url('isp-cpanel/fiberboxs/fiberboxs-table-one-view') }}"><i class="fa fa-navicon"></i> Fiber BOX Table</a></li>
                            <li><a href="{{ url('isp-cpanel/fiberboxs/ticket') }}"><i class="fa fa-navicon"></i> Fiber BOX Ticket's</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-navicon"></i> Link's Out<i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('isp-cpanel/links/create') }}"><i class="fa fa-navicon"></i> New Link</a></li>
                            <li><a href="{{ url('isp-cpanel/links/links-table-one-view') }}"><i class="fa fa-navicon"></i> Link's Table</a></li>
                            <li><a href="{{ url('isp-cpanel/links') }}"><i class="fa fa-navicon"></i> Link's Ticket's</a></li>
                        </ul>
                    </li>
                </ul>
            </li>

            <!-- --------------------------------------------------------------------------------- -->

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-gears"></i> <span> Financial</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="#"><i class="fa fa-map-signs"></i> Sales <i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('isp-cpanel/invoice/create') }}"><i class="fa fa-map-signs"></i> New Invoice</a></li>
                            <li><a href="{{ url('isp-cpanel/invoice/invoices-table-one-view') }}"><i class="fa fa-map-signs"></i> Invoice Table</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-map-signs"></i> WareHouse <i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('isp-cpanel/warehouse/create') }}"><i class="fa fa-map-signs"></i> New WareHouse</a></li>
                            <li><a href="{{ url('isp-cpanel/warehouse/warehouse-table-one-view') }}"><i class="fa fa-map-signs"></i> Invoice WareHouse</a></li>
                        </ul>
                    </li>
                </ul>
            </li>

            <!-- --------------------------------------------------------------------------------- -->

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-wrench"></i> <span> Setting</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="#"><i class="glyphicon glyphicon-log-in"></i> BASIC INPUT<i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('isp-cpanel/settings/connection_types') }}"><i class="glyphicon glyphicon-transfer"></i> Connection Types</a></li>
                            <li><a href="{{ url('isp-cpanel/settings/devices') }}"><i class="fa fa-plug"></i> Devices</a></li>
                            <li><a href="{{ url('isp-cpanel/settings/address') }}"><i class="fa fa-map-o"></i> Address</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-user-secret"></i> Members management<i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('isp-cpanel/setting/members-list') }}"><i class="fa fa-users"></i> Members list</a></li>
                            <li><a href="{{ url('isp-cpanel/setting/members-validities') }}"><i class="fa fa-check-square-o"></i> Members Validities</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-wrench"></i> Site Settings<i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('isp-cpanel/device/create') }}"><i class="glyphicon glyphicon-cog"></i> Site Settings</a></li>
                            <li><a href="{{ url('isp-cpanel/device/create') }}"><i class="glyphicon glyphicon-user"></i> Profile</a></li>

                        </ul>
                    </li>
                </ul>
            </li>


        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
