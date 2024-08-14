<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-header">ADMIN PANEL</li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-solid fa-align-justify"></i>
                <p>
                    Posts
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview"
                style="display: none; height: 129.547px; padding-top: 0px; margin-top: 0px; padding-bottom: 0px; margin-bottom: 0px;">
                <li class="nav-item">
                    <a href="{{route('admin.post.index')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>All Posts</p>
                        <span class="badge badge-info right">{{$postsCount}}</span>
                    </a>
                </li>
                @if(auth()->user()->can('create posts'))
                    <li class="nav-item">
                        <a href="{{route('admin.post.create')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Create new Post</p>
                        </a>
                    </li>
                @endif
            </ul>
        </li>
    </ul>
</nav>
