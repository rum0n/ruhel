

<link href="{{ asset('frontEnd/css/bootstrap.css') }}" rel="stylesheet">

<div class="container">
	<div class="row">
		<h3 style="color: blue;">{{ Session::get('message') }}</h3>
		@if($errors->all())
        	<div class="alert alert-danger">
                @foreach($errors->all() as $error)
                 <li>{{$error}}</li>  
                @endforeach
      		</div>
    	@endif

    	<div class="row">
            <div class="col-md-6 col-md-offset-3 mb-5" ><img src="{{ asset($student->pro_pic) }}" class="img-responsive img-thumbnail mb-5"></div>
        </div>
		
    	<table class="table table-bordered table-hover table-primary">
    		<tr>
                <th>Name</th><td>{{ $student->name }}</td>
            </tr>
            <tr>
                <th>Batch</th><td>{{ $student->batch }}</td>
            </tr>
            <tr>
                <th>Description</th><td>{{ $student->description }}</td>
            </tr>
        </table>
        <div>
			<center>

				<a href="{{ route('students.edit',$student->id) }}" class="btn btn-primary" title="Edit Students">Edit</a>

				<a href="{{ route('students.destroy',$student->id) }}" onclick="return confirm('Are You sure to delete!')" class="btn btn-danger"> Delete </a>
                
			</center>
		</div>
		<br><br>

	</div>
</div>
