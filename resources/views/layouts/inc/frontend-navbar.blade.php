{{-- new navbar --}}

<div class="sticky-top">


    <nav class="navbar navbar-expand-lg  navbar-scroll shadow-0" style="background-color: #ffede7;">
        <div class="container">
                {{-- @php
                    $setting=App\Models\Setting::find(1);   
                @endphp
                @if ($setting)
                        
                    
                    <img src="{{asset('uploads/settings/'.$setting->logo)}}" style="width:20px;" alt="" class="navbar-brand rounded">
                @endif --}}
            <a class="navbar-brand" href="{{url('/')}}">XWAN</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarExample01"
                aria-controls="navbarExample01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="d-flex justify-content-start align-items-center">
                <i class="fas fa-bars"></i>
                </span>
            </button>
            <div class="collapse navbar-collapse" id="navbarExample01">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item ">
                        <a class="nav-link px-3 {{request()->path()==='/' ? 'active':''}}" href="{{url('/')}}">Home</a>
                    </li>
                   

                    @php
                        $categories=App\Models\Category::where('navbar_status','0')->where('status','0')->get();
                    @endphp
                    
                        
                 @foreach ($categories as $catItem)
                    
                    <li class="nav-item">
                        <a class="nav-link px-3" href="{{url('kitchen/'.$catItem->slug)}}">{{$catItem->name}}</a>
                    </li>
                 @endforeach



                    <li class="nav-item">
                        <a class="nav-link px-3" href="{{route('home.about')}}">about us</a>
                    </li>
                   
                    <li class="nav-item">
                        <a class="nav-link px-3" href="{{route('contact.show')}}">contact us</a>
                    </li>

                    @auth


                        @if (Auth::user()->role == '1')
                        <li class="nav-item">

                            <a href="{{route('admin.dash')}}" class="nav-link px-3 btn-danger ">Dashboard</a>
                        </li>
                        @endif
                
                    <li class="nav-item">
                        <a class="nav-link px-3 btn-danger " href="{{route('logout')}}" onclick="event.preventDefault();document.getElementById('logout-form').submit()">
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
                            
                        <a href="{{route('login')}}" class="nav-link px-3 btn-danger ">Log-in</a>
                        @endif
                            
                    

                        
                        
                    </li>
                
                @endguest
                </ul>
        
                <ul class="navbar-nav flex-row">
                    <li class="nav-item">
                        <a class="nav-link pe-3" href="#!">
                        <i class="fab fa-youtube"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3" href="#!">
                        <i class="fab fa-facebook-f"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link ps-3" href="#!">
                        <i class="fab fa-instagram"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

</div>

{{-- end new navbar --}}
