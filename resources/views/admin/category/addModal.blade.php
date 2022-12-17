  <!-- Modal -->
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Add category</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

           
            <!-- form begin -->
          <form action="{{route('category.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label >Category name</label>
                <input type="text" name="name" class="form-control">
            </div>

            <div class="mb-3">
                <label >Slug</label>
                <input type="text" name="slug" class="form-control">
            </div>

            <div class="mb-4">
                <label class="col-form-label">description</label>
                <textarea name="description"  rows="5" class="form-control mySummernote"></textarea>
            </div>

            <div class="mb-3">
                <label >Image</label>
                <input type="file" name="image" required class="form-control">
            </div>

            <h6>SEO tags</h6>
          

            <div class="col-md-6 mb-3">
                <label class="col-form-label">Meta Title</label>
                <input type="text" name="meta_title" class="form-control ">
            </div>
            

            <div class="mb-3">
                <label class="col-form-label">Meta description</label>
                <textarea name="meta_description"  rows="3" class="form-control mySummernote"></textarea>
            </div>
                
            <div class="mb-3">
                <label class="col-form-label">Meta keyword</label>
                <textarea name="meta_keyword"  rows="3" class="form-control mySummernote"></textarea>
            </div>

            <h6>Status mode</h6>
            <div class="row">

                <div class="col-md-4 mb-3">
                    
                    <label class="form-check-label" for="flexSwitchCheckDefault">Navbar status</label>
                    <input class="form-check-input" type="checkbox"  id="flexSwitchCheckDefault" name="navbar_status" >
                    
                    
                </div>
                
                <div class="col-md-4 mb-3">
                    

                        <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault1" name="status" >
                        <label class="form-check-label" for="flexSwitchCheckDefault1">Status</label>
                   
                </div>
                <div class="col-md-3">
                    <button class="btn btn-primary" type="submit">Add</button>
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