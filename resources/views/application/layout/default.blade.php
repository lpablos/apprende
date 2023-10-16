<!doctype html>
<html>
    <head>
        @include('application.includes.head')
    </head>
    
    <body>
        <!-- site -->
        <div class="site">
            
            <!-- mobile site__header -->
            @include('application.includes.headers')
            <!-- desktop site__header / end -->
            <!-- site__body -->
            <div class="site__body">
                @yield('content')
            </div>
            <!-- site__body / end -->
            <!-- site__footer -->
            @include('application.includes.footer')
            <!-- site__footer / end -->
        </div>
        <!-- site / end -->
        @include('application.includes.site_end')
        <!-- js -->
        @include('application.includes.javascripts')  
</body>
</html>