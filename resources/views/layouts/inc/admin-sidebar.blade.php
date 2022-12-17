<div class="bg-white" id="sidebar-wrapper">
    <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom"><i
            class="fas fa-fork-knife me-2"></i>Xwan</div>
    <div class="list-group list-group-flush my-3">
        <a href="{{url('admin/dashboard')}}"  class="list-group-item list-group-item-action {{request()->path()==='admin/dashboard' ? 'active':''}} second-text fw-bold"><i
                class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
        <a href="{{url('admin/users')}}" class="list-group-item list-group-item-action {{request()->path()==='admin/users' ? 'active':''}} second-text fw-bold"><i
                class="fas fa-users me-2"></i>Users</a>
        <a href="{{url('admin/category')}}" class="list-group-item list-group-item-action  second-text fw-bold {{request()->path()==='admin/category' ? 'active':''}}"><i
                class="fas fa-list me-2"></i>Category</a>
        <a href="{{url('admin/posts')}}" class="list-group-item list-group-item-action second-text fw-bold {{request()->path()==='admin/posts' ? 'active':''}}"><i
                class="fas fa-paperclip me-2"></i>posts</a>
        
        <a href="{{url('admin/settings')}}" class="list-group-item list-group-item-action {{request()->path()==='admin/settings' ? 'active':''}} second-text fw-bold"><i
                class="fas fa-gear me-2"></i>Settings</a>


        <a href="{{url('/')}}" class="list-group-item list-group-item-action bg-transparent  second-text fw-bold"><i
                class="fas fa-home me-2"></i>Go to Home page</a>
      
        {{-- <a href="#" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"><i
                class="fas fa-power-off me-2"></i>Logout</a> --}}
    </div>
 </div>