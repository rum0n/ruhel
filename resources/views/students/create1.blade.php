@extends('layouts.app')

@section('content')


<div class="container">
		<div class="row">

			<div class="col-lg-12">
				@if($errors->all())
	            	<div class="alert alert-danger">
		                @foreach($errors->all() as $error)
		                 <li>{{$error}}</li>  
		                @endforeach
              		</div>
            	@endif
				<h3 style="color: blue;">{{ Session::get('message') }}</h3>

				<form action="{{ route('students.store') }}" method="post" enctype="multipart/form-data">
					@csrf

					<div class="form-group">
						<label>Student Name</label>
						<input class="form-control" type="text" name="name" placeholder="Enter Student Name">
					</div>

					<div class="form-group">
						<label>Batch</label>
						<input class="form-control" type="text" name="batch" placeholder="Student Batch no.">
					</div>

					<div class="form-group">
						<label>Profile Picture</label>
						<input class="form-control" type="file" name="student_pic">
					</div>

					<div class="form-group">
						<label>Description</label>
						<textarea class="form-control" placeholder="Enter Student Description" name="description"></textarea>
					</div>
					
					<div class="form-group">
						<input type="submit" value="Add Student" class="btn btn-block btn-primary" >
					</div>

				</form>

			</div>
		</div>
	</div>

	@endsection
	<script type="text/javascript" src="/path/to/toastr.js"></script>