@extends('admin.master')


@section('content')

	<div class="container">
		<div class="row">

			<div class="col-md-6 col-md-offset-3" ><img src="{{ asset($student->pro_pic) }}" class="img-responsive img-thumbnail ml-5"></div>
		</div>
		<div class="row ml-5">
			<div>
				<table class="table table-bordered table-hover table-responsive-lg">
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

					<a href="{{ route('students.edit',$student->id) }}" class="btn btn-md btn-primary" title="Edit Students">Edit</a>

					<a href="{{ route('students.destroy',$student->id) }}" onclick="return confirm('Are You sure to delete!')" class="btn btn-danger"> Delete </a>

				</div>
				<br><br>

			</div>
		</div>

	</div>
@endsection
