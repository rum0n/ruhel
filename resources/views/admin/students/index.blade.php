
@extends('admin.master')

@push('css')

@endpush

@section('content')


<div class="container">
	<div class="row mt-1">
      <div class="col-md-12">

		{{--@if($errors->all())--}}
        	{{--<div class="alert alert-danger">--}}
                {{--@foreach($errors->all() as $error)--}}
                 {{--<li>{{$error}}</li>  --}}
                {{--@endforeach--}}
      		{{--</div>--}}
    	{{--@endif--}}

    	{{--@if(session('message'))--}}
          {{--<div class="alert alert-success">--}}
          {{--{{session('message')}}--}}
          {{--</div>--}}
        {{--@endif--}}

        <div class="content-panel">
            <div class="mt-3 mb-3">
                <a href="{{ route('students.create') }}" class="btn btn-md btn-primary"><i class="fa fa-plus"></i> <b> STUDENT</b></a>

            </div>

            <div class="mt-3 mb-3">
                <h1>Ajax</h1>
                <a href="{{ route('ajax') }}" class="btn btn-md btn-primary"> <b> Ajax Search</b></a>
                <a href="{{ route('ajax.add') }}" class="btn btn-md btn-info"> <b> Ajax Add</b></a>

            </div>

          <table class="table table-striped table-advance table-hover">

            <h4><i class="fa fa-angle-right"></i> Advanced Table</h4>
            <hr>

            <thead>
              <tr>
                <th>S.I</th>
                <th class="hidden-phone"><i class="fa fa-user"></i> Name</th>
                <th>Batch</th>
                <th>Contact</th>
                <th>Picture</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody id="search_result">

                @foreach($students as $x)
                  <tr>
                    <td>{{ $loop->index+1 }}</td>
                    <td>{{ $x->name }}</td>
                    <td>{{ $x->batch }}</td>
                    <td>{{ $x->description }}</td>
                    <td>
                    	<img src="{{ asset('images/'.$x->pro_pic) }}" class="img-responsive img-thumbnail" width="150">
                    </td>
                      {{--<td>--}}
                          {{--<button class="deleteRecord" data-id="{{ $x->id }}" >Delete Record</button>--}}
                          {{--<span type="hidden" id="pic" data-name="{{ $x->pro_pic }}"></span>--}}
                      {{--</td>--}}
                    <td><span class="label label-info label-mini">Active</span></td>

                    <td>
                        <sapn style="display: -webkit-box;;" >
                           <a href="{{ route('students.show',$x->id) }}" class="btn btn-success btn-xs ml-1" title="See Students details"><i class="fa fa-eye"></i></a>

                           <a href="{{ route('students.edit',$x->id) }}" class="btn btn-success btn-xs ml-0" title="Edit Students"><i class="fa fa-edit"></i></a>

                            <form id="delete-form-{{ $x->id }}" action="{{ route('students.destroy',$x->id) }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>

                            <button class="btn btn-danger btn-xs ml-0" type="button" onclick="deletePost( {{ $x->id }} )">
                                <i class="fa fa-trash-alt"></i>
                            </button>
                            <form id="delete-form-{{ $x->id }}" action="{{ route('students.destroy',$x->id) }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>

                        </sapn>
                    </td>



                  </tr>
                @endforeach  
            </tbody>
          </table>
          
        </div>
        <!-- /content-panel -->
      </div>
      <!-- /col-md-12 -->
    </div>
</div>

@endsection

@push('js')
<script src="https://unpkg.com/sweetalert2@7.19.1/dist/sweetalert2.all.js"></script>

<script type="text/javascript">
    function deletePost(id) {
        swal({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger',
            buttonsStyling: false,
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
            event.preventDefault();
            document.getElementById('delete-form-'+id).submit();
        } else if (
                // Read more about handling dismissals
        result.dismiss === swal.DismissReason.cancel
        ) {
            swal(
                    'Cancelled',
                    'Your data is safe :)',
                    'error'
            )
        }
    })
    }
</script>

{{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>--}}
{{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>--}}

{{--<script>--}}

    {{--$(".deleteRecord").click(function(){--}}
        {{--var id = $(this).data("id");--}}
        {{--var token = $("meta[name='csrf-token']").attr("content");--}}

        {{--$.ajax(--}}
                {{--{--}}
                    {{--url: "pic/"+id,--}}
                    {{--type: 'DELETE',--}}
                    {{--data: {--}}
                        {{--"id": id,--}}
                        {{--"_token": token,--}}
                    {{--},--}}
                    {{--success: function (){--}}
                        {{--console.log("it Works");--}}
                    {{--}--}}
                {{--});--}}

    {{--});--}}
{{--</script>--}}

@endpush