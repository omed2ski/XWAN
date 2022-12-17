  <!-- Modal -->
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Post</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

           
            <!-- form begin -->
          <form action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputSelect">Category</label>
                <select name="category_id" id="inputSelect" class="form-select">
                    @foreach ($category as $catItem)
                        
                    <option value="{{$catItem->id}}">{{$catItem->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="">Post Name</label>
                <input type="text" name="name"  class="form-control">
            </div>

            <div class="mb-3">
                <label for="">Slug</label>
                <input type="text" name="slug"  class="form-control">
            </div>

            <div class="mb-3">
                <label for="">Cover</label>
                <input type="file" name="cover_img" required class="form-control">
            </div>

            <div class="mb-3">
                <label for="">Description</label>
                <textarea name="description"   rows="4" class="form-control mySummernote"></textarea>
            </div>
            <div class="mb-3">
                <label for="">Video</label>
                <input type="file" name="yt_link"  class="form-control">
                    @if ($errors->has('yt_link'))
                        <p>
                            {{$errors->first('yt_link')}}
                        </p>
                    @endif
            </div>

            <h4>SEO tags</h4>
            <div class="mb-3">
                <label for="">Meta Title</label>
                <input type="text" name="meta_title"  class="form-control">
            </div>
            <div class="mb-3">
                <label for="">Meta Description</label>
                <textarea name="meta_description"  rows="4" class="form-control mySummernote"></textarea>
            </div>
            <div class="mb-3">
                <label for="">Meta keyword</label>
                <textarea name="meta_keyword"  rows="4" class="form-control mySummernote"></textarea>
            </div>

            <h4>status</h4>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <div class="form-check form-switch">

                        <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" name="status"  >
                        <label class="form-check-label" for="flexSwitchCheckDefault">status</label>
                    </div>
                    
                    
                </div>
                <div class="col-md-3">
                   
                        
                        <button class="btn btn-primary btn-sm float-end" type="submit">Add</button>
                    
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