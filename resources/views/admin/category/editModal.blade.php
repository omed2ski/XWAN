  <!-- Modal -->
  <div class="modal fade" id="edit{{$cateItem->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">edit category</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

           
            <!-- form begin -->
          <form action="{{route('category.update',$cateItem)}}" method="POST" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="mb-3">
                <label >Category name</label>
                <input type="text" name="name" value="{{$cateItem->name}}" class="form-control">
            </div>

            <div class="mb-3">
                <label >Slug</label>
                <input type="text" name="slug" value="{{$cateItem->slug}}" class="form-control">
            </div>

            <div class="mb-4">
                <label class="col-form-label">description</label>
                <textarea name="description"  class="form-control mySummernote" rows="5" >{!! $cateItem->description !!}</textarea>
            </div>

            <div class="mb-3">
                <label >image</label>
                <input type="file" name="image"  class="form-control">
            </div>

            <h6>SEO tags</h6>
          

            <div class="col-md-6 mb-3">
                <label class="col-form-label">Meta Title</label>
                <input type="text" name="meta_title" value="{{$cateItem->meta_title}}" class="form-control ">
            </div>
            

            <div class="mb-3">
                <label class="col-form-label">Meta description</label>
                <textarea name="meta_description"   rows="3" class="form-control mySummernote"> {!! $cateItem->meta_description !!}</textarea>
            </div>
                
            <div class="mb-3">
                <label class="col-form-label">Meta keyword</label>
                <textarea name="meta_keyword" class="form-control mySummernote" rows="3" >{!! $cateItem->meta_keyword !!}</textarea>
            </div>

            <h6>Status mode</h6>
            <div class="row">

                <div class="col-md-4 mb-3">
                    
                    <div class="form-check form-switch">
                         <label class="form-check-label"  for="flexSwitchCheckDefault1">Navbar status</label> 
                        <input  class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault1" name="navbar_status" {{$cateItem->navbar_status =='1' ? 'checked':''}}>
                    </div>
                </div>
                
                <div class="col-md-4 mb-3">
                    
                    <div class="form-check form-switch">

                        <label class="form-check-label" for="flexSwitchCheckDefault">status</label>
                        <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" name="status" {{$cateItem->status == '1' ? 'checked':''}} >
                    </div>
                </div>
                <div class="col-md-3">
                    <button class="btn btn-primary" type="submit">update</button>
                </div>
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