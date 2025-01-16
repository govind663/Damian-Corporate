<div class="right-sidebar">
    <div class="sidebar-title">
        <h3 class="weight-600 font-16 text-blue">
            Layout Settings
            <span class="btn-block font-weight-400 font-12">User Interface Settings</span>
        </h3>
        <div class="close-sidebar" data-toggle="right-sidebar-close">
            <i class="icon-copy ion-close-round"></i>
        </div>
    </div>
    <div class="right-sidebar-body customscroll">
        <div class="right-sidebar-body-content">
            <h4 class="weight-600 font-18 pb-10">Header Background</h4>
            <div class="sidebar-btn-group pb-30 mb-10">
                <a href="javascript:void(0);" class="btn btn-outline-primary header-white active">White</a>
                <a href="javascript:void(0);" class="btn btn-outline-primary header-dark">Dark</a>
            </div>

            <h4 class="weight-600 font-18 pb-10">Sidebar Background</h4>
            <div class="sidebar-btn-group pb-30 mb-10">
                <a href="javascript:void(0);" class="btn btn-outline-primary sidebar-light">White</a>
                <a href="javascript:void(0);" class="btn btn-outline-primary sidebar-dark active">Dark</a>
            </div>

            <h4 class="weight-600 font-18 pb-10">Menu Dropdown Icon</h4>
            <div class="sidebar-radio-group pb-10 mb-10">
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="sidebaricon-1" name="menu-dropdown-icon"
                        class="custom-control-input" value="icon-style-1" checked="" />
                    <label class="custom-control-label" for="sidebaricon-1"><i
                            class="fa fa-angle-down"></i></label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="sidebaricon-2" name="menu-dropdown-icon"
                        class="custom-control-input" value="icon-style-2" />
                    <label class="custom-control-label" for="sidebaricon-2"><i
                            class="ion-plus-round"></i></label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="sidebaricon-3" name="menu-dropdown-icon"
                        class="custom-control-input" value="icon-style-3" />
                    <label class="custom-control-label" for="sidebaricon-3"><i
                            class="fa fa-angle-double-right"></i></label>
                </div>
            </div>

            <h4 class="weight-600 font-18 pb-10">Menu List Icon</h4>
            <div class="sidebar-radio-group pb-30 mb-10">
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="sidebariconlist-1" name="menu-list-icon"
                        class="custom-control-input" value="icon-list-style-1" checked="" />
                    <label class="custom-control-label" for="sidebariconlist-1"><i
                            class="ion-minus-round"></i></label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="sidebariconlist-2" name="menu-list-icon"
                        class="custom-control-input" value="icon-list-style-2" />
                    <label class="custom-control-label" for="sidebariconlist-2"><i class="fa fa-circle-o"
                            aria-hidden="true"></i></label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="sidebariconlist-3" name="menu-list-icon"
                        class="custom-control-input" value="icon-list-style-3" />
                    <label class="custom-control-label" for="sidebariconlist-3"><i
                            class="dw dw-check"></i></label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="sidebariconlist-4" name="menu-list-icon"
                        class="custom-control-input" value="icon-list-style-4" checked="" />
                    <label class="custom-control-label" for="sidebariconlist-4"><i
                            class="icon-copy dw dw-next-2"></i></label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="sidebariconlist-5" name="menu-list-icon"
                        class="custom-control-input" value="icon-list-style-5" />
                    <label class="custom-control-label" for="sidebariconlist-5"><i
                            class="dw dw-fast-forward-1"></i></label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="sidebariconlist-6" name="menu-list-icon"
                        class="custom-control-input" value="icon-list-style-6" />
                    <label class="custom-control-label" for="sidebariconlist-6"><i
                            class="dw dw-next"></i></label>
                </div>
            </div>

            <div class="reset-options pt-30 text-center">
                <button class="btn btn-danger" id="reset-settings">
                    Reset Settings
                </button>
            </div>
        </div>
    </div>
</div>

<div class="left-side-bar">
    <div class="brand-logo">
        <a href="{{ route('admin.dashboard') }}">
            <img src="{{ asset('/frontend/assets/img/logo/logo.png') }}" alt="" class="dark-logo" />
            <img src="{{ asset('/frontend/assets/img/logo/logo-1.png') }}" alt="" class="light-logo" />
        </a>
        <div class="close-sidebar" data-toggle="left-sidebar-close">
            <i class="ion-close-round"></i>
        </div>
    </div>
    <div class="menu-block customscroll">
        <div class="sidebar-menu">
            <ul id="accordion-menu">
                <li>
                    <a href="{{ route('admin.dashboard') }}" class="dropdown-toggle no-arrow {{ (Route::currentRouteName() === 'admin.dashboard') ? 'active' : '' }}">
                        <span class="micon fa fa-desktop"></span>
                        <span class="mtext">Dashboard</span>
                    </a>
                </li>

                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon bi bi-house"></span>
                        <span class="mtext">Home</span>
                    </a>
                    <ul class="submenu
                        {{ (Route::currentRouteName() === 'banner.index') || (Route::currentRouteName() === 'banner.create') || (Route::currentRouteName() === 'banner.edit')
                        || (Route::currentRouteName() === 'category.index') || (Route::currentRouteName() === 'category.create') || (Route::currentRouteName() === 'category.edit')
                        || (Route::currentRouteName() === 'project.index') || (Route::currentRouteName() === 'project.create') || (Route::currentRouteName() === 'project.edit')
                        || (Route::currentRouteName() === 'project-details.index') || (Route::currentRouteName() === 'project-details.create') || (Route::currentRouteName() === 'project-details.edit')
                        || (Route::currentRouteName() === 'service.index') || (Route::currentRouteName() === 'service.create') || (Route::currentRouteName() === 'service.edit')
                        || (Route::currentRouteName() === 'service-details.index') || (Route::currentRouteName() === 'service-details.create') || (Route::currentRouteName() === 'service-details.edit')
                        ? 'show' : '' }}">
                        <li>
                            <a href="{{ route('banner.index') }}" class="{{ (Route::currentRouteName() === 'banner.index') || (Route::currentRouteName() === 'banner.create') || (Route::currentRouteName() === 'banner.edit') ? 'active' : '' }}">
                                Banner
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('category.index') }}" class="{{ (Route::currentRouteName() === 'category.index') || (Route::currentRouteName() === 'category.create') || (Route::currentRouteName() === 'category.edit') ? 'active' : '' }}">
                                Category
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('project.index') }}" class="{{ (Route::currentRouteName() === 'project.index') || (Route::currentRouteName() === 'project.create') || (Route::currentRouteName() === 'project.edit') ? 'active' : '' }}">
                                Projects
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('project-details.index') }}" class="{{ (Route::currentRouteName() === 'project-details.index') || (Route::currentRouteName() === 'project-details.create') || (Route::currentRouteName() === 'project-details.edit') ? 'active' : '' }}">
                                Project Details
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('testimonial.index') }}" class="{{ (Route::currentRouteName() === 'testimonial.index') || (Route::currentRouteName() === 'testimonial.create') || (Route::currentRouteName() === 'testimonial.edit') ? 'active' : '' }}">
                                Testimonial
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('companyInformation.index') }}" class="{{ (Route::currentRouteName() === 'companyInformation.index') || (Route::currentRouteName() === 'companyInformation.create') || (Route::currentRouteName() === 'companyInformation.edit') ? 'active' : '' }}">
                                Company Information
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="dropdown ">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon bi bi-info-circle"></span>
                        <span class="mtext">About Us</span>
                    </a>
                    <ul class="submenu
                        {{ (Route::currentRouteName() === 'introduction.index') || (Route::currentRouteName() === 'introduction.create') || (Route::currentRouteName() === 'introduction.edit')
                        || (Route::currentRouteName() === 'showroom.index') || (Route::currentRouteName() === 'showroom.create') || (Route::currentRouteName() === 'showroom.edit')
                        || (Route::currentRouteName() === 'manufacturing-facility.index') || (Route::currentRouteName() === 'manufacturing-facility.create') || (Route::currentRouteName() === 'manufacturing-facility.edit')
                        || (Route::currentRouteName() === 'vision.index') || (Route::currentRouteName() === 'vision.create') || (Route::currentRouteName() === 'vision.edit')
                        || (Route::currentRouteName() === 'team.index') || (Route::currentRouteName() === 'team.create') || (Route::currentRouteName() === 'team.edit')
                        || (Route::currentRouteName() === 'team-member.index') || (Route::currentRouteName() === 'team-member.create') || (Route::currentRouteName() === 'team-member.edit')
                        || (Route::currentRouteName() === 'international-associates.index') || (Route::currentRouteName() === 'international-associates.create') || (Route::currentRouteName() === 'international-associates.edit')
                        ? 'show' : '' }}">
                        <li>
                            <a href="{{ route('introduction.index') }}" class="{{ (Route::currentRouteName() === 'introduction.index') || (Route::currentRouteName() === 'introduction.create') || (Route::currentRouteName() === 'introduction.edit') ? 'active' : '' }}">
                                <span class="mtext">Introduction</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('showroom.index') }}" class="{{ (Route::currentRouteName() === 'showroom.index') || (Route::currentRouteName() === 'showroom.create') || (Route::currentRouteName() === 'showroom.edit') ? 'active' : '' }}">
                                <span class="mtext">Showroom</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('manufacturing-facility.index') }}" class="{{ (Route::currentRouteName() === 'manufacturing-facility.index') || (Route::currentRouteName() === 'manufacturing-facility.create') || (Route::currentRouteName() === 'manufacturing-facility.edit') ? 'active' : '' }}">
                                <span class="mtext">Manufacturing Facility</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('vision.index') }}" class="{{ (Route::currentRouteName() === 'vision.index') || (Route::currentRouteName() === 'vision.create') || (Route::currentRouteName() === 'vision.edit') ? 'active' : '' }}">
                                <span class="mtext">Vision</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('team.index') }}" class="{{ (Route::currentRouteName() === 'team.index') || (Route::currentRouteName() === 'team.create') || (Route::currentRouteName() === 'team.edit') ? 'active' : '' }}">
                                <span class="mtext">Team</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('team-member.index') }}" class="{{ (Route::currentRouteName() === 'team-member.index') || (Route::currentRouteName() === 'team-member.create') || (Route::currentRouteName() === 'team-member.edit') ? 'active' : '' }}">
                                <span class="mtext">Team Member</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('international-associates.index') }}" class="{{ (Route::currentRouteName() === 'international-associates.index') || (Route::currentRouteName() === 'international-associates.create') || (Route::currentRouteName() === 'international-associates.edit') ? 'active' : '' }}">
                                <span class="mtext">International Associates</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="dropdown ">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon bi bi-briefcase"></span>
                        <span class="mtext">Services</span>
                    </a>
                    <ul class="submenu {{ (Route::currentRouteName() === 'our-services.index') || (Route::currentRouteName() === 'our-services.create') || (Route::currentRouteName() === 'our-services.edit') ? 'show' : '' }}">
                        <li>
                            <a href="{{ route('our-services.index') }}" class="{{ (Route::currentRouteName() === 'our-services.index') || (Route::currentRouteName() === 'our-services.create') || (Route::currentRouteName() === 'our-services.edit') ? 'active' : '' }}">
                                <span class="mtext">Our Services</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="dropdown ">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon bi bi-shop"></span>
                        <span class="mtext">Manage Store</span>
                    </a>
                    <ul class="submenu
                        {{ (Route::currentRouteName() === 'product-category.index') || (Route::currentRouteName() === 'product-category.create') || (Route::currentRouteName() === 'product-category.edit')
                        || (Route::currentRouteName() === 'product-sub-category.index') || (Route::currentRouteName() === 'product-sub-category.create') || (Route::currentRouteName() === 'product-sub-category.edit')
                        || (Route::currentRouteName() === 'product-colors.index') || (Route::currentRouteName() === 'product-colors.create') || (Route::currentRouteName() === 'product-colors.edit')
                        || (Route::currentRouteName() === 'product.index') || (Route::currentRouteName() === 'product.create') || (Route::currentRouteName() === 'product.edit')
                        || (Route::currentRouteName() === 'product-image.index') || (Route::currentRouteName() === 'product-image.create') || (Route::currentRouteName() === 'product-image.edit')
                        ? 'show' : '' }}">
                        <li>
                            <a href="{{ route('product-category.index') }}" class="{{ (Route::currentRouteName() === 'product-category.index') || (Route::currentRouteName() === 'product-category.create') || (Route::currentRouteName() === 'product-category.edit') ? 'active' : '' }}">
                                <span class="mtext">Product Category</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('product-sub-category.index') }}" class="{{ (Route::currentRouteName() === 'product-sub-category.index') || (Route::currentRouteName() === 'product-sub-category.create') || (Route::currentRouteName() === 'product-sub-category.edit') ? 'active' : '' }}">
                                <span class="mtext">Product Sub Category</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('product-colors.index') }}" class="{{ (Route::currentRouteName() === 'product-colors.index') || (Route::currentRouteName() === 'product-colors.create') || (Route::currentRouteName() === 'product-colors.edit') ? 'active' : '' }}">
                                <span class="mtext">Product Color</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('product.index') }}" class="{{ (Route::currentRouteName() === 'product.index') || (Route::currentRouteName() === 'product.create') || (Route::currentRouteName() === 'product.edit') ? 'active' : '' }}">
                                <span class="mtext">Product</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('product-faq.index') }}" class="{{ (Route::currentRouteName() === 'product-faq.index') || (Route::currentRouteName() === 'product-faq.create') || (Route::currentRouteName() === 'product-faq.edit') ? 'active' : '' }}">
                                <span class="mtext">FAQ</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="{{ route('awards-media.index') }}" class="dropdown-toggle no-arrow {{ (Route::currentRouteName() === 'awards-media.index') || (Route::currentRouteName() === 'awards-media.create') || (Route::currentRouteName() === 'awards-media.edit') ? 'active' : '' }}">
                        <span class="micon fa fa-trophy"></span>
                        <span class="mtext">Awards & Media</span>
                    </a>
                </li>


                {{-- <li class="dropdown {{ (Route::currentRouteName() === 'blog-category.index') || (Route::currentRouteName() === 'blog-category.create') || (Route::currentRouteName() === 'blog-category.edit') || (Route::currentRouteName() === 'blogs.index') || (Route::currentRouteName() === 'blogs.create') || (Route::currentRouteName() === 'blogs.edit') ? 'show' : '' }}">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon bi bi-file-post"></span>
                        <span class="mtext">Blog</span>
                    </a>
                    <ul class="submenu">
                        <li>
                            <a href="{{ route('blog-category.index') }}" class="{{ (Route::currentRouteName() === 'blog-category.index') || (Route::currentRouteName() === 'blog-category.create') || (Route::currentRouteName() === 'blog-category.edit') ? 'active' : '' }}">
                                <span class="mtext">Blog Category</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('blogs.index') }}" class="{{ (Route::currentRouteName() === 'blogs.index') || (Route::currentRouteName() === 'blogs.create') || (Route::currentRouteName() === 'blogs.edit') ? 'active' : '' }}">
                                <span class="mtext">Blog</span>
                            </a>
                        </li>
                    </ul>
                </li> --}}

                <li class="dropdown {{ (Route::currentRouteName() === 'careers.index') || (Route::currentRouteName() === 'careers.create') || (Route::currentRouteName() === 'careers.edit')  ? 'show' : '' }}">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon bi bi-briefcase"></span>
                        <span class="mtext">Career</span>
                    </a>
                    <ul class="submenu">
                        <li>
                            <a href="{{ route('careers.index') }}" class="{{ (Route::currentRouteName() === 'careers.index') || (Route::currentRouteName() === 'careers.create') || (Route::currentRouteName() === 'careers.edit') ? 'active' : '' }}">
                                <span class="mtext">Career</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('about-careers.index') }}" class="{{ (Route::currentRouteName() === 'about-careers.index') || (Route::currentRouteName() === 'about-careers.create') || (Route::currentRouteName() === 'about-careers.edit') ? 'active' : '' }}">
                                <span class="mtext">About Career</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('job-position.index') }}" class="{{ (Route::currentRouteName() === 'job-position.index') || (Route::currentRouteName() === 'job-position.create') || (Route::currentRouteName() === 'job-position.edit') ? 'active' : '' }}">
                                <span class="mtext">Job Position</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('job-position-details.index') }}" class="{{ (Route::currentRouteName() === 'job-position-details.index') || (Route::currentRouteName() === 'job-position-details.create') || (Route::currentRouteName() === 'job-position-details.edit') ? 'active' : '' }}">
                                <span class="mtext">Job Position Details</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('applied-job-application.list') }}" class="{{ (Route::currentRouteName() === 'applied-job-application.list') || (Route::currentRouteName() === 'applied-job-application.details') ? 'active' : '' }}">
                                <span class="mtext">Applied Job Application</span>
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
    </div>
</div>
<div class="mobile-menu-overlay"></div>
