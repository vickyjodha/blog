    
  <!-- Search Widget -->
  <div class="card my-4">
          <h5 class="card-header">Search</h5>
          <div class="card-body">
            
            <form class="input-group" action="" method="GET">
              <input type="text" class="form-control" name="search" value="{{request()->query('search')}}" placeholder="Search for...">
              <div class="input-group-addon">
                <span class="input-group-text "><i class="ti-search"></i>go</span>
              </div>
              
              </form>
           
          </div>
        </div>
       <div class="card my-4">
          <h5 class="card-header">Categories</h5>
          <div class="card-body">
            <div class="row">
              
                <ul class="list-unstyled mb-0">
                  @foreach($categories as $categorie)
                  <li>
                    <a href="{{route('blog.categories',$categorie->id)}}">{{$categorie->name  }}</a>
                  </li>
                  @endforeach
                  
                 
                </ul>
              
              
            </div>
          </div>
        </div>
        <div class="card my-4">
          <h5 class="card-header">Tages</h5>
          <div class="card-body">
            <div class="row">
              
                <ul class="list-unstyled mb-0">
                  @foreach($tages as $tage)
                  <li>
                    <a href="{{route('blog.tages',$tage->id)}}">{{$tage->name  }}</a>
                  </li>
                  @endforeach
                  
                 
                </ul>
              
              
            </div>
          </div>
        </div>

      

<!-- Side Widget -->
<div class="card my-4">
          <h5 class="card-header">Side Widget</h5>
          <div class="card-body">
            You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
          </div>
        </div>

      </div>

    </div>
    <!-- /.row -->