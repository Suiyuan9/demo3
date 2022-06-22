<div class="card-body">
    
        
            <div id="example1_wrapper" class="dataTable_wrapper dt boostrap4">
    <table id="example1" class="table table-bordered table-striped" id=userListing>
        <thead>
            <tr>
                <th  class="col-sm-1">UUID</th>
                <th class="col-sm-3">Agent Line</th>
                <th class="col-1">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($agents as $agent)
            <tr>
                <td>{{ $agent->uuid }}</td>
                <td>{{ $agent->line }}</td>  
                <td style="float:right;border:none">
                    <form action="{{ route('agent.destroy',$agent->id) }}" method="POST" style="margin: 0%">
   
                        <a class="btn-sm btn-info" href="{{ route('agent.show',$agent->id) }}">View</a>
        
                        <a class="btn-sm btn-primary" href="{{ route('agent.edit',$agent->id) }}">Edit</a>
       
                        @csrf
                        @method('DELETE')
          
                        <button type="submit" class="btn-xs btn-danger" id="deleteUser">Delete</button>
                    </form>
                  
                </td>
            </tr>
                
            @endforeach
        </tbody>
    </table>
    {!! $agents->withQueryString()->links('pagination::bootstrap-5') !!}
            
        </div>
    
</div>


  