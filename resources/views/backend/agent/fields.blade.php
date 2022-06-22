<section class="content">
    <div class="container">
        
        

      
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- jquery validation -->
          <div class="card card-primary">
            <div class="card-header">
              
              @if (isset($agent))
              <h3 class="card-title">Edit User :{{ $agent->name }}</h3>
              @else <h3 class="card-title">Add New Agent</h3>
              @endif
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form id="quickForm">
              <div class="card-body">
                
                 
                <div class="form-group">
                  <div class="row  justify-content-between" > 
                    <div class="col-md-6">
                    <label >UUID</label>
                    </div>
                    <div class="col-md-6">
                      <label>Line</label>
                  </div>
                  </div>
                
                
                  <!--input-->
                  
                    <div class="row  mb-2 justify-content-between" >
                    
                      <div class="col-md-6">
                      
                         @if (isset($agent))
                         <input type="uuid" name="uuid" class="form-control" placeholder="Enter UUID" value="{{ $agent->uuid }}" required autocomplete="uuid" autofocus >
                         <span class="text-danger">@error('uuid') {{ $errors->first('uuid') }} @enderror</span>
                       </div>
                      
                       <div class="col-md-6">
                         <input type="line" name="line" class="form-control @error('line') is-invalid @enderror" placeholder="Enter the Line" value="{{ $agent->line }}"  >
                         <span class="text-danger">@error('line') {{ $errors->first('line') }} @enderror</span>
                     </div>
                         @else

                         <input type="uuid" name="uuid" class="form-control" placeholder="Enter uuid" value="{{ old('uuid') }}" required autocomplete="uuid" autofocus >
                        <span class="text-danger">@error('uuid') {{ $errors->first('uuid') }} @enderror</span>
                      </div>
                      <div class="col-md-6">
                        <input type="line" name="line" class="form-control @error('line') is-invalid @enderror"   placeholder="Enter the line" value="{{ old('line') }}" required autocomplete="line" autofocus>
                        <span class="text-danger">@error('line') {{ $errors->first('line') }} @enderror</span>
                    </div>     
                         @endif
                       
                        
                  
                    </div>
                  </div>

              </div>
              <!-- /.card-body -->
              <div class="card-footer">
              
                 <div class="row " >
                  <div class="col-md-10">
                  <a class="btn  btn-info btn-lg " style="float:right;"   href="{{ route('agent.index') }}">Back</a>
               
                  </div>
                  @if(isset($agent))
                  <a href="" class="btn  btn-warning btn-lg " style="float:right;margin-right:1%;"  >Clear</a>
                  @else
                  <a href="{{ route('agent.create') }}" class="btn  btn-warning btn-lg " style="float:right;margin-right:1%;"  >Clear</a>
                  @endif
                 
                  @if (isset($agent))
                  <button type="submit" class="btn btn-success" id="submitForm" style="float:right;font-size:19px">Submit</button>
                 
                  
                 
                  @else
                  <button type="submit" class="btn btn-success" id="submitButton" style="float:right;font-size:19px">Submit</button>
                  @endif
                
                 </div>
              </div>
            </form>
          </div>
          <!-- /.card -->
          </div>
        <!--/.col (left) -->
        <!-- right column -->
        <div class="col-md-6">

        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>

  
  