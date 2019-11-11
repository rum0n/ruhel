@extends('layouts.app')

@section('content')


<div class="container">
		<div class="row">

			<div class="col-lg-12">
				
				<h3 style="color: blue;">{{ Session::get('message') }}</h3>
				@if($errors->any())
		            <div class="alert alert-danger">
		                @foreach($errors->all() as $e)
		                 <li>{{$e}}</li>  
		                @endforeach
		             
		            </div>
		         @endif

				<form action="{{ route('students.update',$student->id) }}" method="post" enctype="multipart/form-data">
					@csrf
					@method('PUT')

					<div class="form-group">
						<label>Student Name</label>
						<input class="form-control" value="{{ $student->name }}" type="text" name="name" placeholder="Enter Student Name">
					</div>

					<div class="form-group">
						<label>Batch</label>
						<input class="form-control" value="{{ $student->batch }}" type="text" name="batch" placeholder="Student Batch no.">
					</div>

					<div class="form-group">
						<label>Profile Picture</label>
						<input class="form-control" type="file" name="student_pic">
					</div>

					<div class="form-group">
						<label>Description</label>
						<textarea class="form-control" placeholder="Enter Student Description" name="description">{{ $student->description }}</textarea>
					</div>

					<div class="form-group">
						<input type="submit" value="Save Changes" class="btn btn-block btn-primary" >
					</div>
				</form>
			</div>
		</div>
	</div>

	@endsection