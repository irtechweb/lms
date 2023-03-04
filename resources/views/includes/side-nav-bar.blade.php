<style>
    .main-menu.menu-fixed {
        z-index:unset;
    }
</style>
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
                        <a href="{{route('subscription.list')}}">
                            <span class="menu-title" data-i18n="">
                                All Plans
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('subscription.add')}}">
                            <span class="menu-title" data-i18n="">
                                Add New Plan
                            </span>
                        </a>
                    </li>

                </ul>
            </li>  
            <li class=" nav-item">
                <a href="#"><i class="la la-mobile"></i>
                    <span class="menu-title" data-i18n="">
                        Orders
                    </span>
                </a>
             <ul class="menu-content">
                    <li class="navigation-divider"></li>
                    <li>
                        <a href="{{route('subscriptions.orders')}}">
                            <span class="menu-title" data-i18n="">
                               Subscriptions
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('coach.orders')}}">
                            <span class="menu-title" data-i18n="">
                                Booking Credits
                            </span>
                        </a>
                    </li>

                </ul>
            </li>
            <li class=" nav-item">
                <a href="#"><i class="la la-mobile"></i>
                    <span class="menu-title" data-i18n="">
                        Reports
                    </span>
                </a>
                <ul class="menu-content">
                    <li class="navigation-divider"></li>
                    <!-- <li>
                        <a href="{{route('access.course')}}">
                            <span class="menu-title" data-i18n="">
                                Free Users Tracking
                            </span>
                        </a>
                    </li> -->
                    <li>
                        <a href="{{route('user.activity')}}">
                            <span class="menu-title" data-i18n="">
                                Users Activity Logs
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('user.logs')}}">
                            <span class="menu-title" data-i18n="">
                                 User Logs
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
                        <a href="{{route('webinar.list')}}">
                            <span class="menu-title" data-i18n="">
                                All Webinars
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('webinar.add')}}">
                            <span class="menu-title" data-i18n="">
                                Add New Webinar
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
                        <a class="menu-item" href="{{ route('instructor.course.list') }}">All Courses</a>
                    </li>

                    <li>
                        <a class="menu-item" href="{{ route('instructor.course.info') }}">Add New Course</a>
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
                        <a class="menu-item" href="{{ route('admin.categories')}}">All Categories</a>
                    </li>

                    <li>
                        <a class="menu-item" href="{{ route('admin.categoryForm') }}">Add New Category</a>
                    </li>
                    
                </ul>
            </li>
            </li>



            


            <li class=" nav-item">
                <a href="#">
                    <i class="ft-users"></i>
                    <span class="menu-title" data-i18n="">
                        Students
                    </span>
                </a>
                <ul class="menu-content">
                    <li class="navigation-divider"></li>
                    <li>
                        <a class="menu-item" href="{{ route('students.index') }}">All Students</a>
                    </li>
                    <li>
                        <a href="{{route('students.create')}}">
                            <span class="menu-title" data-i18n="">
                                Add New Student
                            </span>
                        </a>
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
                     <li class="navigation-divider"></li>
                    <li>
                        <a class="menu-item" href="{{ route('showSiteContent') }}">CMS Pages</a>
                    </li>
                    <!-- {{-- <li>
                        <a class="menu-item" href="{{ route('setting') }}">Social Link Settings</a>
                    </li>  --}}
                    <li class="navigation-divider"></li>
                    {{-- <li>
                        <a class="menu-item" href="{{ route('admin.messageCodes') }}">Message Codes</a>
                    </li> --}} -->
                    <li>
                        <a class="menu-item" href="{{ route('settings.index') }}">General Settings</a>
                    </li>

                </ul>
            </li>
            </li>

        </ul>
    </div>
</div>
