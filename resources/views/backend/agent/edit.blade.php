@extends('backend.layouts.heade1')

@section('content')
<div class="content-wrapper" style="margin-left: 0">
    <!-- Content Header (Page header) -->
    <section class="content-header" >
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h1>Edit Agent <span style="font-size:18px;color:#869099">P000006</span></h1>
          </div>
          
        </div>
        <div class="row">
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-left">
                  {{ Breadcrumbs::render() }}
                </ol>
              </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <form action="{{ route('agent.update',$agent->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
@include('backend.agent.fields')


    </form>

</div>
@include('backend.footerJS.create')



@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])

  @include('sweetalert::alert')
  
@endsection
