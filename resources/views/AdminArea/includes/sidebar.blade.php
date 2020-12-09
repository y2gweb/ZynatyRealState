<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
        <!-- Brand -->
        <div class="sidenav-header  align-items-center">
            <a class="navbar-brand" href="javascript:void(0)">
                <strong class="text-primary">Zynaty Real<br>Estate</strong>
            </a>
        </div>
        <div class="navbar-inner">
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                <!-- Nav items -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link {{ $curr_url=='home'?'active':'' }}" href="{{route('home')}}">
                            <i class="ni ni-tv-2 text-primary"></i>
                            <span class="nav-link-text">Dashboard</span>
                        </a>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('project.all')}}">
                            <i class="ni ni-album-2 text-primary"></i>
                            <span class="nav-link-text">Project Management</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link"
                            href="">
                            <i class="fas fa-envelope-open-text text-primary" aria-hidden="true"></i>
                            <span class="hide-menu">News & Events</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ in_array($curr_url,['users-all','users.show','users.edit'])?'active':'' }}" href="{{ route('users-all')}}">
                                <i class="fas fa-users-cog text-primary"></i>
                                <span class="nav-link-text">User Management</span>
                            </a>
                        </li>


                    <li class="nav-item">
                        <a class="nav-link {{ in_array($curr_url,['sliders.new','sliders.all','sliders.edit','sliders.view'])?'active':'' }}"
                            href="{{ route('sliders.all') }}">
                            <i class="ni ni-album-2 text-primary"></i>
                            <span class="hide-menu">Slider Management</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"
                            href="">
                            <i class="fas fa-envelope-open-text text-primary" aria-hidden="true"></i>
                            <span class="hide-menu">Project Request</span>
                        </a>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link {{ in_array($curr_url,['requests.all','requests.view'])?'active':'' }}"
                            href="{{ route('requests.all') }}">
                            <i class="fas fa-envelope-open-text text-primary" aria-hidden="true"></i>
                            <span class="hide-menu">Notification</span>
                        </a>
                    </li>



                </ul>

            </div>
        </div>
    </div>
</nav>
