<div class="sidebar">
    <div class="logopanel">
        <h1>
            <a href="dashboard.html"></a>
        </h1>
    </div>
    <div class="sidebar-inner">
        <div class="sidebar-top">
            <form action="search-result.html" method="post" class="searchform" id="search-results">
                <input type="text" class="form-control" name="keyword" placeholder="Search...">
            </form>
        </div>
        <ul class="nav nav-sidebar">
            <li class=" nav-active active"><a href="dashboard.html"><i class="icon-home"></i><span data-translate="dashboard">Dashboard</span></a></li>
            <li class="nav-parent">
                <a href="#"><i class="icon-puzzle"></i><span data-translate="builder">Builder</span> <span class="fa arrow"></span></a>
                <ul class="children collapse">
                    <li><a target="_blank" href="../builder/admin-builder/index.html"> Admin</a></li>
                    <li><a href="../builder/page-builder/index.html"> Page</a></li>
                    <li><a href="ecommerce-pricing-table.html"> Pricing Table</a></li>
                </ul>
            </li>
            <li><a href="../frontend/one-page.html" target="_blank"><i class="fa fa-laptop"></i><span class="pull-right badge badge-primary hidden-st">New</span><span data-translate="Frontend">Frontend</span></a></li>
            <li class="nav-parent">
                <a href="#"><i class="icon-bulb"></i><span data-translate="Employees">Employees</span> <span class="fa arrow"></span></a>
                <ul class="children collapse">
                    <li><a href="{!! route('CreateEmployee') !!}"> Hire Employee</a></li>
                    <li><a href="{!! route('ShowEmployee') !!}">List Of Employees</a></li>
                </ul>
            </li>

        </ul>

    </div>
</div>