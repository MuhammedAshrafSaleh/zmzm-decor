<div class="side-menu-fixed" style="padding-top: 1rem;">
    <div class="scrollbar side-menu-bg">
        <ul class="nav navbar-nav side-menu" id="sidebarnav">
            <li>
                <a href="javascript:void(0);" data-toggle="collapse" data-target="#home">
                    <div class="pull-left"><i class="ti-calendar"></i><span class="right-nav-text">الوجه الرئيسية</span>
                    </div>
                    <div class="pull-right"><i class="ti-plus"></i></div>
                    <div class="clearfix"></div>
                </a>
                <ul id="home" class="collapse" data-parent="#sidebarnav">
                    <li> <a href="{{ route('home.index') }}">كل الواجهات</a> </li>
                    <li> <a href="{{ route('home.create') }}"> اضافة واجهة </a> </li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0);" data-toggle="collapse" data-target="#about">
                    <div class="pull-left"><i class="ti-calendar"></i><span class="right-nav-text">كلمة رئيس
                            المجلس</span></div>
                    <div class="pull-right"><i class="ti-plus"></i></div>
                    <div class="clearfix"></div>
                </a>
                <ul id="about" class="collapse" data-parent="#sidebarnav">
                    <li> <a href="{{ route('about.index') }}">اجزاء القسم </a> </li>
                    <li> <a href="{{ route('about.create') }}"> اضافة كلمة </a> </li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0);" data-toggle="collapse" data-target="#services">
                    <div class="pull-left"><i class="ti-calendar"></i><span class="right-nav-text">خدمات زمزم
                            للديكور</span></div>
                    <div class="pull-right"><i class="ti-plus"></i></div>
                    <div class="clearfix"></div>
                </a>
                <ul id="services" class="collapse" data-parent="#sidebarnav">
                    <li> <a href="{{ route('services.index') }}">كل الخدمات</a> </li>
                    <li> <a href="{{ route('services.create') }}"> اضافة خدمة </a> </li>
                    <li> <a href="{{ route('services_projects.index') }}">كل المشروعات الخدمية</a> </li>
                    <li> <a href="{{ route('services_projects.create') }}">اضافة مشروع</a> </li>
                    <li> <a href="{{ route('services_images.index') }}">عرض كل الصور الخدمية</a></li>
                    <li> <a href="{{ route('services_images.create') }}">اضافة صورة</a> </li>
                </ul>
            </li>
            <li>
                <a href="{{ route('guarantee.index') }}"><i class="ti-comments"></i><span
                        class="right-nav-text">الضمان</span></a>
            </li>
            <li>
                <a href="javascript:void(0);" data-toggle="collapse" data-target="#projects">
                    <div class="pull-left"><i class="ti-calendar"></i><span class="right-nav-text">مشروعات زمزم</span>
                    </div>
                    <div class="pull-right"><i class="ti-plus"></i></div>
                    <div class="clearfix"></div>
                </a>
                <ul id="projects" class="collapse" data-parent="#sidebarnav">
                    <li> <a href="{{ route('projects.index') }}"> كل المشروعات </a> </li>
                    <li> <a href="{{ route('projects.create') }}"> اضافة مشروع </a> </li>
                    <li> <a href="{{ route('projects.create_image') }}"> اضافة صور للمشروع </a> </li>
                    {{-- <li> <a href="{{ route('projects.all_images') }}"> عرض كل الصور </a> </li> --}}
                </ul>
            </li>
            <li>
                <a href="javascript:void(0);" data-toggle="collapse" data-target="#current__works">
                    <div class="pull-left"><i class="ti-calendar"></i><span class="right-nav-text">الأعمال
                            الحالية</span></div>
                    <div class="pull-right"><i class="ti-plus"></i></div>
                    <div class="clearfix"></div>
                </a>
                <ul id="current__works" class="collapse" data-parent="#sidebarnav">
                    <li> <a href="{{ route('current-works.index') }}">كل الاعمال الحالية</a> </li>
                    <li> <a href="{{ route('current-works.create') }}"> اضافة </a> </li>
                </ul>
            </li>
            <li>
                <a href="{{ route('footer.index') }}"><i class="ti-comments"></i><span class="right-nav-text"> قوائم
                        الانتقالات</span></a>
            </li>
            <li>
                <a href="{{ route('logo.update') }}"><i class="ti-comments"></i><span class="right-nav-text">لوجو زمزم
                        للديكور</span></a>
            </li>
            <li>
                <a href="{{ route('headings.index') }}"><i class="ti-comments"></i><span
                        class="right-nav-text">العنواين الرئيسية</span></a>
            </li>

        </ul>
    </div>
</div>
