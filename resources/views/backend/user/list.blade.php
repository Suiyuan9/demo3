<div class="card-body">
    
        
            <div id="example1_wrapper" class="dataTable_wrapper dt boostrap4">
    <table id="example1" class="table table-bordered table-striped" id=userListing>
        <thead>
            <tr>
                <th  class="col-sm-1">No</i></th>
                <th class="col-sm-1">@sortablelink('name','User Name')</th>
                <th class="col-sm-1">@sortablelink('email','User email')</th>
                <th class="col-sm-1">User image</th>
                <th class="col-1">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td><img src="../public/images/{{ ($user->image) }}" height="45px" width="50px"></td>      
                <td style="float:right;border:none">
                  
   
                        <a class="btn-sm btn-info" href="{{ route('user.show',$user->id) }}">View</a>
        
                        <a class="btn-sm btn-primary" href="{{ route('user.edit',$user->id) }}">Edit</a>
       
                        
                  
                </td>
            </tr>
                
            @endforeach
        </tbody>
    </table>
    {!! $users->withQueryString()->links('pagination::bootstrap-5') !!}
            
        </div>
    
</div>


  