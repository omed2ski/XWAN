  <!-- Modal -->
  <div class="modal fade" id="edit{{$item->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Update User</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

            

           
            <div class="mb-3">
                <label >Full name</label>
                <p class="form-control">{{$item->name}}</p>
            </div>
            <div class="mb-3">
                <label >Email</label>
                <p class="form-control">{{$item->email}}</p>
            </div>
            <div class="mb-3">
                <label >Created At</label>
                <p class="form-control">{{$item->created_at->format('d/m/y')}}</p>
            </div>
            
            <!-- form begin -->
            <form action="{{route('users.update',$item)}}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="input-group-text" for="inputSelect">Role As</label>
                <select name="role" required id="inputSelect" class="form-select">
                    <option value="1" {{$item->role =='1' ? 'selected':''}}>Admin</option>
                    <option value="0" {{$item->role =='0' ? 'selected':''}}>User</option>
                    <option value="2" {{$item->role =='2' ? 'selected':''}}>blogger</option>
                </select>
                
            </div>

            

            <div class="mb-3">
                
                
                <button class="btn btn-primary" type="submit">update</button>
                
            </div>
           
            

            
           </form>
            <!-- form end -->
            
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            {{-- <button type="button" class="btn btn-primary" type="submit">Add</button> --}}
        </div>
      <!-- form end -->
      </div>
    </div>
  </div>
  <!-- end of modal --> 