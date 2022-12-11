<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('home') }}" class="brand-link">
        <img src="{{ asset('/assets/backend') }}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">EPEC</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu"
                data-accordion="false">

                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item {{ request()->routeIs('admin.page.*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->routeIs('admin.page.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-newspaper"></i>
                        <p>
                            Pages
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.page.index') }}"
                                class="nav-link {{ request()->routeIs('admin.page.index') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-file-alt"></i>
                                <p>Page List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.page.create') }}"
                                class="nav-link {{ request()->routeIs('admin.page.create') ? 'active' : '' }}">

                                <i class="nav-icon fas fa-plus"></i>
                                <p>Add New Page</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ request()->routeIs('admin.concern.*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->routeIs('admin.concern.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-handshake"></i>
                        <p>
                            Sister Concerns
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.concern.index') }}"
                                class="nav-link {{ request()->routeIs('admin.concern.index') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-th-large"></i>
                                <p>Concern List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.concern.create') }}"
                                class="nav-link {{ request()->routeIs('admin.concern.create') ? 'active' : '' }}">

                                <i class="nav-icon fas fa-plus"></i>
                                <p>Add New</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ request()->routeIs('admin.slider.*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->routeIs('admin.slider.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-photo-video"></i>
                        <p>
                            Banner Slider
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.slider.index') }}"
                                class="nav-link {{ request()->routeIs('admin.slider.index') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-image"></i>
                                <p>Slider List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.slider.create') }}"
                                class="nav-link {{ request()->routeIs('admin.slider.create') ? 'active' : '' }}">

                                <i class="nav-icon fas fa-plus"></i>
                                <p>Add Slider</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ request()->routeIs('admin.role.*') ? 'menu-open' : '' }}">
                    <a href="{{ route('admin.role.index') }}"
                        class="nav-link {{ request()->routeIs('admin.role.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user-tag"></i>
                        <p>
                            Team Member Role
                        </p>
                    </a>
                </li>
                <li class="nav-item {{ request()->routeIs('admin.team.*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->routeIs('admin.team.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users-cog"></i>
                        <p>
                            Team Member
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.team.index') }}"
                                class="nav-link {{ request()->routeIs('admin.team.index') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-users"></i>
                                <p>Team Member List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.team.create') }}"
                                class="nav-link {{ request()->routeIs('admin.team.create') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-plus"></i>
                                <p>Add Team Member</p>
                            </a>
                        </li>
                    </ul>
                </li>
                
                <li class="nav-item {{ request()->routeIs('admin.project.*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->routeIs('admin.project.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-parking"></i>
                        <p>
                            Project
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.project.index') }}"
                                class="nav-link {{ request()->routeIs('admin.project.index') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-th"></i>
                                <p>Project List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.project.create') }}"
                                class="nav-link {{ request()->routeIs('admin.project.create') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-plus"></i>
                                <p>Add Project</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ request()->routeIs('admin.phase.*') ? 'menu-open' : '' }}">
                    <a href="{{ route('admin.phase.index') }}"
                        class="nav-link {{ request()->routeIs('admin.phase.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-layer-group"></i>
                        <p>
                            Phase
                        </p>
                    </a>
                </li>
                <li class="nav-item {{ request()->routeIs('admin.category.*') ? 'menu-open' : '' }}">
                    <a href="{{ route('admin.category.index') }}"
                        class="nav-link {{ request()->routeIs('admin.category.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tags"></i>
                        <p>
                            Category
                        </p>
                    </a>
                </li>
                <li class="nav-item {{ request()->routeIs('admin.location.*') ? 'menu-open' : '' }}">
                    <a href="{{ route('admin.location.index') }}"
                        class="nav-link {{ request()->routeIs('admin.location.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-map-marker-alt"></i>
                        <p>
                            Location
                        </p>
                    </a>
                </li>
                <li class="nav-item {{ request()->routeIs('admin.type.*') ? 'menu-open' : '' }}">
                    <a href="{{ route('admin.type.index') }}"
                        class="nav-link {{ request()->routeIs('admin.type.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-thumbtack"></i>
                        <p>
                            Project Type
                        </p>
                    </a>
                </li>
                <li class="nav-item {{ request()->routeIs('admin.section.index') ? 'menu-open' : '' }}">
                    <a href="{{ route('admin.section.index') }}"
                        class="nav-link {{ request()->routeIs('admin.section.index') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-directions"></i>
                        <p>
                            Home Sections
                        </p>
                    </a>
                </li>

                <li class="nav-item {{ request()->routeIs('admin.award.index') ? 'menu-open' : '' }}">
                    <a href="{{ route('admin.award.index') }}"
                        class="nav-link {{ request()->routeIs('admin.award.index') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-award"></i>
                        <p>
                            Awards
                        </p>
                    </a>
                </li>
                <li class="nav-item {{ request()->routeIs('admin.client.index') ? 'menu-open' : '' }}">
                    <a href="{{ route('admin.client.index') }}"
                        class="nav-link {{ request()->routeIs('admin.client.index') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user-shield"></i>
                        <p>
                            Clients
                        </p>
                    </a>
                </li>


                <li class="nav-item {{ request()->routeIs('admin.message.index') ? 'menu-open' : '' }}">
                    <a href="{{ route('admin.message.index') }}"
                        class="nav-link {{ request()->routeIs('admin.message.index') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-sms"></i>
                        <p>
                            Visitor Messages
                        </p>
                    </a>
                </li>

                <li class="nav-item {{ request()->routeIs('admin.gallery.index') ? 'menu-open' : '' }}">
                    <a href="{{ route('admin.gallery.index') }}"
                        class="nav-link {{ request()->routeIs('admin.gallery.index') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-image"></i>
                        <p>
                            Gallery
                        </p>
                    </a>
                </li>


                <li class="nav-item {{ request()->routeIs('admin.service.*') ? 'menu-open' : '' }}">
                    <a href="{{ route('admin.service.index') }}"
                        class="nav-link {{ request()->routeIs('admin.service.*') ? 'active' : '' }}">
                        <i class="nav-icon fab fa-servicestack"></i>
                        <p>
                            Services & Solutions
                        </p>
                    </a>
                </li>

                <li class="nav-item {{ request()->routeIs('admin.testimonial.*') ? 'menu-open' : '' }}">
                    <a href="{{ route('admin.testimonial.index') }}"
                        class="nav-link {{ request()->routeIs('admin.testimonial.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-comments"></i>
                        <p>
                            Testimonial
                        </p>
                    </a>
                </li>

                <li class="nav-item {{ request()->routeIs('admin.contact.*') ? 'menu-open' : '' }}">
                    <a href="{{ route('admin.contact.index') }}"
                        class="nav-link {{ request()->routeIs('admin.contact.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-address-book"></i>
                        <p>
                            Contact
                        </p>
                    </a>
                </li>

                <li class="nav-item {{ request()->routeIs('admin.setting.*') ? 'menu-open' : '' }}">
                    <a href="{{ route('admin.setting.index') }}"
                        class="nav-link {{ request()->routeIs('admin.setting.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>
                            Settings
                        </p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
