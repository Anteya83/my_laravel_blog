<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->

        <li class="nav-header">Admin Panel</li>

        <li class="nav-item">
            <a href="{{asset('pages/kanban.html')}}" class="nav-link">
                <i class="nav-icon fas fa-align-justify"></i>
                <p>
                    Articles
                    <span class="badge badge-info right">{{$published_articles->total()}}</span>
                </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-search"></i>
                <p>
                    Search
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{asset('pages/search/simple.html')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Simple Search</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{asset('pages/search/enhanced.html')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Enhanced</p>
                    </a>
                </li>
            </ul>
        </li>

    </ul>
</nav>
