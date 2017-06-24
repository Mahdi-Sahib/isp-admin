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
                           <!-- Status -->
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

            <li class="header">{{ Carbon\Carbon::now()  }}</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="active"><a href="{{ url('isp-cpanel/customers/refill_dashboard') }}"><i class='fa fa-dashboard'></i> <span> Refill Dashboard</span>
                    <small class="label pull-right bg-green">3</small></a></li>
            <li class="active"><a href="{{ url('isp-cpanel/customers/ticket_dashboard') }}"><i class='fa fa-pie-chart'></i> <span> Ticket Dashboard</span>
                    <small class="label pull-right bg-green">3</small></a></li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i> <span>{{ trans('layout.crm') }}</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('isp-cpanel/customers/create') }}"><i class="fa fa-user-plus"></i> New Customer<small class="label pull-right bg-blue">new</small></a></li>
                    <li><a href="{{ url('isp-cpanel/customers') }}"><i class="fa fa-users"></i> {{ trans('layout.all-customers') }}<small class="label pull-right bg-green">{{ App\Customer::count() }}</small></a></li>
                    <li><a href="{{ url('isp-cpanel/customers/customer_ticket') }}"><i class="fa fa-wheelchair"></i> Open Ticket's<small class="label pull-right bg-yellow">{{ App\CustomerTicket::where('status','1')->count() }}</small></a></li>
                    <li><a href="{{ url('isp-cpanel/customers/unpaid') }}"><i class="fa fa-money"></i> Unpaid Card<small class="label pull-right bg-red">{{ App\RefillCustomer::where('payment_status','1')->count() }}</small></a></li>
                </ul>
            </li>

            <!-- --------------------------------------------------------------------------------- -->

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-gears"></i> <span> Hardware Dashboard</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('isp-cpanel/fttx/olt') }}"><i class="fa fa-navicon"></i> FTTX Dashboard</a></li>
                    <li><a href="{{ url('isp-cpanel/towers') }}"><i class="fa fa-map-signs"></i> Point's Dashboard</a></li>
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
                        </ul>
                    </li>
                    <li><a href="{{ url('isp-cpanel/financial/supplier') }}"><i class="fa fa-hospital-o"></i> Supplier</a></li>
                    <li><a href="{{ url('isp-cpanel/financial/product') }}"><i class="fa fa-cube"></i> Product</a></li>
                    <li><a href="{{ url('isp-cpanel/financial/refill_cards') }}"><i class="fa fa-cube"></i> Refill Cards</a></li>
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
