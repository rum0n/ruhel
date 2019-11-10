
<link href="{{ asset('frontEnd/css/bootstrap.css') }}" rel="stylesheet">

<link href="{{ asset('frontEnd') }}/font-awesome/css/font-awesome.css" rel="stylesheet" />
<!-- Custom styles for this template -->
<link href="{{ asset('frontEnd') }}/css/style.css" rel="stylesheet">
<link href="{{ asset('frontEnd') }}/css/style-responsive.css" rel="stylesheet">



<div class="container">
	<div class="row mt">
      <div class="col-md-12">

		@if($errors->all())
        	<div class="alert alert-danger">
                @foreach($errors->all() as $error)
                 <li>{{$error}}</li>  
                @endforeach
      		</div>
    	@endif

    	@if(session('message'))
          <div class="alert alert-success">
          {{session('message')}}
          </div>
        @endif

        <div class="content-panel">
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
            <tbody>

                @foreach($students as $x)
                  <tr>
                    <td>{{ $loop->index+1 }}</td>
                    <td>{{ $x->name }}</td>
                    {{-- <td class="hidden-phone">{{ $x->name }}</td> --}}
                    <td>{{ $x->batch }}</td>
                    <td>{{ $x->description }}</td>
                    <td>
                    	<img src="{{ asset($x->pro_pic) }}" class="img-responsive img-thumbnail" width="100">
                    </td>
                    <td><span class="label label-info label-mini">Active</span></td>
                    <td>
           	<sapn style="display: block ruby;" >
					   <a href="{{ route('students.show',$x->id) }}" class="btn btn-success btn-xs" title="See Students details"><i class="fa fa-eye"></i></a>

					   <a href="{{ route('students.edit',$x->id) }}" class="btn btn-success btn-xs" title="Edit Students"><i class="fa fa-check"></i></a>
					   
					   <form  action="{{ route('students.destroy',$x->id) }}" method="POST">
							@csrf
							@method('DELETE')
							<button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Are You sure to delete!')" ><i class="fa fa-trash-o "></i></button>
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