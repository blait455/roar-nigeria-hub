    <aside id="leftsidebar" class="sidebar">

        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                @can('edit-users')
                    <li class="header">MAIN NAVIGATION</li>
                    <li class="{{ Request::is('admin/dashboard') ? 'active' : '' }}">
                        <a href="{{ route('admin.dashboard') }}">
                            <i class="material-icons">dashboard</i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="{{ Request::is('admin/sliders*') ? 'active' : '' }}">
                        <a href="{{ route('admin.sliders.index') }}">
                            <i class="material-icons">burst_mode</i>
                            <span>Sliders</span>
                        </a>
                    </li>
                    <li class="{{ Request::is('admin/events*') ? 'active' : '' }}">
                        <a href="{{ route('admin.events.index') }}">
                            <i class="material-icons">home</i>
                            <span>Events</span>
                        </a>
                    </li>
                    {{-- <li class="{{ Request::is('admin/features*') ? 'active' : '' }}">
                        <a href="{{ route('admin.features.index') }}">
                            <i class="material-icons">star</i>
                            <span>Features</span>
                        </a>
                    </li> --}}

                    <li class="{{ Request::is('admin/aspect*') ? 'active' : '' }}">
                        <a href="{{ route('admin.aspect.index') }}">
                            <i class="material-icons">gamepad</i>
                            <span>Aspects</span>
                        </a>
                    </li>

                    <li class="{{ Request::is('admin/startup*') ? 'active' : '' }}">
                        <a href="{{ route('admin.startup.index') }}">
                            <i class="material-icons">storefront</i>
                            <span>Startups</span>
                        </a>
                    </li>

                    <li class="{{ Request::is('admin/testimonials*') ? 'active' : '' }}">
                        <a href="{{ route('admin.team.index') }}">
                            <i class="material-icons">people_outline</i>
                            <span>Management Team</span>
                        </a>
                    </li>

                    <li class="{{ Request::is('admin/testimonials*') ? 'active' : '' }}">
                        <a href="{{ route('admin.about.index') }}">
                            <i class="material-icons">info</i>
                            <span>About</span>
                        </a>
                    </li>

                    <li class="{{ Request::is('admin/background*') ? 'active' : '' }}">
                        <a href="{{ route('admin.background.index') }}">
                            <i class="material-icons">airplay</i>
                            <span>Backgrounds</span>
                        </a>
                    </li>
                    <li class="{{ Request::is('admin/partners*') ? 'active' : '' }}">
                        <a href="{{ route('admin.partners.index') }}">
                            <i class="material-icons">view_carousel</i>
                            <span>Partners</span>
                        </a>
                    </li>

                    {{-- <li class="{{ Request::is('admin/galleries*') ? 'active' : '' }}">
                        <a href="{{ route('admin.album') }}">
                            <i class="material-icons">view_list</i>
                            <span>Gallery</span>
                        </a>
                    </li> --}}

                    <li class="header">Applications</li>
                    <li class="{{ Request::is('admin/incubation*') ? 'active' : '' }}">
                        <a href="{{ route('admin.incubation.index') }}">
                            <i class="material-icons">hotel_class</i>
                            <span>Incubation</span>
                        </a>
                    </li>
                    <li class="{{ Request::is('admin/wdts*') ? 'active' : '' }}">
                        <a href="{{ route('admin.wdts.index') }}">
                            <i class="material-icons">code</i>
                            <span>WDTS</span>
                        </a>
                    </li>
                @endcan

                @can('edit-users')
                <li class="header">Blog</li>
                <li class="{{ Request::is('admin/categories*') ? 'active' : '' }}">
                    <a href="{{ route('admin.categories.index') }}">
                        <i class="material-icons">category</i>
                        <span>Categories</span>
                    </a>
                </li>
                <li class="{{ Request::is('admin/tags*') ? 'active' : '' }}">
                    <a href="{{ route('admin.tags.index') }}">
                        <i class="material-icons">label</i>
                        <span>Tags</span>
                    </a>
                </li>
                <li class="{{ Request::is('admin/posts*') ? 'active' : '' }}">
                    <a href="{{ route('admin.posts.index') }}">
                        <i class="material-icons">library_books</i>
                        <span>Posts</span>
                    </a>
                </li>

                <li class="header">Permissions</li>
                <li class="{{ Request::is('admin/users*') ? 'active' : '' }}">
                    <a href="{{ route('admin.users.index') }}">
                        <i class="material-icons">perm_identity</i>
                        <span>Users</span>
                    </a>
                </li>
                <li class="{{ Request::is('admin/roles*') ? 'active' : '' }}">
                    <a href="{{ route('admin.roles.index') }}">
                        <i class="material-icons">supervisor_account</i>
                        <span>Roles</span>
                    </a>
                </li>
                @endcan

                @can('manage-users')
                <li class="header"> </li>
                <li class="{{ Request::is('admin/settings*') ? 'active' : '' }}">
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">settings</i>
                        <span>Settings</span>
                    </a>
                    <ul class="ml-menu">
                        <li class="{{ Request::is('admin/settings') ? 'active' : '' }}">
                            <a href="{{ route('admin.settings') }}">
                                <span>Settings</span>
                            </a>
                        </li>
                        <li class="{{ Request::is('admin/changepassword') ? 'active' : '' }}">
                            <a href="{{ route('admin.changepassword') }}">
                                <span>Change Password</span>
                            </a>
                        </li>
                        <li class="{{ Request::is('admin/profile') ? 'active' : '' }}">
                            <a href="{{ route('admin.profile') }}">
                                <span>Profile</span>
                            </a>
                        </li>
                        {{-- <li class="{{ Request::is('admin/message*') ? 'active' : '' }}">
                            <a href="{{ route('admin.message') }}">
                                <span>Message</span>
                            </a>
                        </li> --}}
                    </ul>
                </li>
                @endcan
            </ul>
        </div>
        <!-- #Menu -->

    </aside>
