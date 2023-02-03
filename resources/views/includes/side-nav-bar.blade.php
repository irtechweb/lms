<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true"
     data-img="{{url('/')}}/theme/app-assets/images/backgrounds/02.jpg">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto"><a class="navbar-brand" href="{{ route('index') }}">
                {{-- <img class="brand-logo" --}}
                                                                                                  {{-- alt="Boatek logo" src="{{ asset('public/theme/app-assets/images/logo/logo.png') }}" /> --}}
                    <h3 class="brand-text">Speak2Impact</h3>
                </a></li>
            <li class="nav-item d-md-none"><a class="nav-link close-navbar"><i class="ft-x"></i></a></li>
        </ul>
    </div>
    <div class="navigation-background"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" nav-item">
                <a href="{{ route('admin.index') }}"><i class="la la-home"></i>
                    <span class="menu-title" data-i18n="">
                        Dashboard
                    </span>
                </a>
            </li>
            <li class=" nav-item">
                <a href="{{ route('subscription.list') }}"><i class="la la-plus"></i>
                    <span class="menu-title" data-i18n="">
                        Subscriptions
                    </span>
                </a>
             <ul class="menu-content">
                <li class="navigation-divider"></li>
                    <li>
                        <a href="{{route('subscription.add')}}">
                            <span class="menu-title" data-i18n="">
                                Add New Plan
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('subscription.list')}}">
                            <span class="menu-title" data-i18n="">
                                All Plans
                            </span>
                        </a>
                    </li>

                </ul>
            </li>  
 <li class=" nav-item">
                <a href="#"><i class="la la-mobile"></i>
                    <span class="menu-title" data-i18n="">
                        Webinars
                    </span>
                </a>
             <ul class="menu-content">
                <li class="navigation-divider"></li>
                    <li>
                        <a href="{{route('webinar.add')}}">
                            <span class="menu-title" data-i18n="">
                                Add Webinar
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('webinar.list')}}">
                            <span class="menu-title" data-i18n="">
                                Webinar Listing
                            </span>
                        </a>
                    </li>

                </ul>
            </li>


            {{-- <li class="site-menu-item {{ request()->is('instructor-course-*') ? 'active' : '' }}">
                <a href="{{ route('instructor.course.list') }}">
                    <i class="site-menu-icon fas fa-chalkboard" aria-hidden="true"></i>
                    <span class="site-menu-title">Courses</span>
                </a>
            </li> --}}


            

            <li class=" nav-item">
                <a href="#">
                    <i class="ft-users"></i>
                    <span class="menu-title" data-i18n="">
                        Courses
                    </span>
                </a>
                <ul class="menu-content">
                    <li class="navigation-divider"></li>
                    <li>
                        <a class="menu-item" href="{{ route('instructor.course.list') }}">All</a>
                    </li>

                    <li>
                        <a class="menu-item" href="{{ route('instructor.course.info') }}">Add Course</a>
                    </li>
                    
                </ul>
            </li>
            </li>

<!-- 
            <li class=" nav-item">
                <a href="#">
                    <i class="ft-users"></i>
                    <span class="menu-title" data-i18n="">
                        Chapters
                    </span>
                </a>
                <ul class="menu-content">
                    <li class="navigation-divider"></li>
                    <li>
                        <a class="menu-item" href="{{ route('instructor.course.list') }}">All</a>
                    </li>

                    <li>
                        <a class="menu-item" href="{{ route('instructor.course.info') }}">Add Chapter</a>
                    </li>
                    
                </ul>
            </li>
            </li> -->



            <li class=" nav-item">
                <a href="#">
                    <i class="ft-users"></i>
                    <span class="menu-title" data-i18n="">
                        Categories
                    </span>
                </a>
                <ul class="menu-content">
                    <li class="navigation-divider"></li>
                    <li>
                        <a class="menu-item" href="{{ route('admin.categories')}}">All</a>
                    </li>

                    <li>
                        <a class="menu-item" href="{{ route('admin.categoryForm') }}">Add Category</a>
                    </li>
                    
                </ul>
            </li>
            </li>



            


            <li class=" nav-item">
                <a href="#">
                    <i class="ft-users"></i>
                    <span class="menu-title" data-i18n="">
                        Studends
                    </span>
                </a>
                <ul class="menu-content">
                    <li class="navigation-divider"></li>
                    <li>
                        <a class="menu-item" href="{{ route('students.index') }}">All</a>
                    </li>

                </ul>
                </li>
            </li>
            {{-- <li class=" nav-item">
                <a href="#">
                    <i class="ft-share-2"></i>
                    <span class="menu-title" data-i18n="">
                        Posts
                    </span>
                </a>
                <ul class="menu-content">
                    <li class="navigation-divider"></li>
                    <li>
                        <a class="menu-item"
                           href="{{ route('admin.posts.index', ['type' => 'reported']) }}">Reported</a>
                    </li>
                    <li>
                        <a class="menu-item"
                           href="{{ route('admin.posts.index', ['type' => 'blocked']) }}">Blocked</a>
                    </li>

                </ul>
            </li> --}}
            {{-- <li class=" nav-item">
                <a href="#">
                    <i class="ft-share-2"></i>
                    <span class="menu-title" data-i18n="">
                        Stories
                    </span>
                </a>
                <ul class="menu-content">
                    <li class="navigation-divider"></li>
                    <li>
                        <a class="menu-item"
                           href="{{ route('admin.stories.index', ['type' => 'reported']) }}">Reported</a>
                    </li>
                    <li>
                        <a class="menu-item"
                           href="{{ route('admin.stories.index', ['type' => 'blocked']) }}">Blocked</a>
                    </li>

                </ul>
            </li> --}}
            </li>
            {{-- <li class=" nav-item">
                <a href="#">
                    <i class="la la-dollar"></i>
                    <span class="menu-title" data-i18n="">
                        Revenue
                    </span>
                </a>
                <ul class="menu-content">
                    <li class="navigation-divider"></li>
                    <li>
                        <a class="menu-item"
                           href="{{ route('admin.revenues.earning', ['type' => 'blocked']) }}">Earning</a>
                    </li>
                </ul>
            </li> --}}
            </li>
            {{-- <li class=" nav-item">
                <a href="#">
                    <i class="ft-flag"></i>
                    <span class="menu-title" data-i18n="">
                        Countries
                    </span>
                </a>
                <ul class="menu-content">
                    <li class="navigation-divider"></li>
                    <li>
                        <a class="menu-item" href="{{ route('admin.countryListing') }}">List of Countries</a>
                    </li>
                </ul>
            </li> --}}
            <li class=" nav-item">
                <a href="#">
                    <i class="ft-settings"></i>
                    <span class="menu-title" data-i18n="">
                        Settings
                    </span>
                </a>
                <ul class="menu-content">
                    {{-- <li class="navigation-divider"></li>
                    <li>
                        <a class="menu-item" href="{{ route('admin.messageCodes') }}">Message Codes</a>
                    </li>
                    <li>
                        <a class="menu-item" href="{{ route('admin.settings.index') }}">System Settings</a>
                    </li> --}}

                </ul>
            </li>
            </li>

        </ul>
    </div>
</div>
