{{-- <div class="global-navbar">
    <div class="container">
        <div class="row">
            <div class="col-md-4 d-none d-sm-none d-md-inline"></div>
            <div class="col-md-4 d-none d-sm-none d-md-inline">
                @php
                 $setting=App\Models\Setting::find(1);   
                @endphp
                @if ($setting)
                    
                <img src="{{asset('uploads/settings/'.$setting->logo)}}" alt="logo" class="w-100 ">
                @endif
            </div>
        </div>
    </div>
</div> --}}

<div class="sticky-top">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">

            @php
                 $setting=App\Models\Setting::find(1);   
                @endphp
                @if ($setting)
                    
                {{-- <img src="{{asset('uploads/settings/'.$setting->logo)}}" alt="logo" class="w-100 "> --}}
                <img src="{{asset('uploads/settings/'.$setting->logo)}}" style="width:50px;" alt="" class="navbar-brand">
                @endif


            <a href="{{url('/')}}" class="navbar-brand d-inline d-sm-inline d-md-none"> XWAN</a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                
                
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link"  href="{{url('/')}}">Home</a>
                    </li>
                  
                
                    
                    @php
                        $categories=App\Models\Category::where('navbar_status','0')->where('status','0')->get();
                    @endphp
                    
                        
                    @foreach ($categories as $catItem)
                    
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('kitchen/'.$catItem->slug)}}">{{$catItem->name}}</a>
                    </li>
                    @endforeach


                    <li class="nav-item">
                        <a class="nav-link"  href="{{route('home.about')}}">About-Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"  href="{{route('contact.show')}}">contact-Us</a>
                    </li>
                   


                    @auth


                        @if (Auth::user()->role == '1')
                        <a href="{{route('admin.dash')}}" class="nav-link btn-danger ">Dashboard</a>
                        @endif
                    
                        <li class="nav-item">
                            <a class="nav-link btn-danger " href="{{route('logout')}}" onclick="event.preventDefault();document.getElementById('logout-form').submit()">
                                Log-out
                            </a>

                            <form id="logout-form" action="{{route('logout')}}" method="post" class="d-none">
                            @csrf
                            </form>
                        </li>
                    @endauth
                    @guest
                        <li class="nav-item">
                            @if (request()->path()!=='login')
                                
                             <a href="{{route('login')}}" class="nav-link btn-danger ">Log-in</a>
                            @endif
                                
                           

                            
                            
                        </li>
                    
                    @endguest

                    {{-- 1=admin ,0=normal user --}}
                    {{-- @if(Auth::check() && Auth::user()->role == '1')
                    <li class="nav-item">

                            
                        <a href="{{route('admin.dash')}}" class="nav-link btn-danger ">Dashboard</a>
                        
                    </li>
                    @endif --}}
                </ul>

                
            
            </div>
        </div>
      </nav>

 </div>
