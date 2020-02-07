
@extends('admin.master')

@push('css')

@endpush

@section('content')
    <div class="container">
        <div class="row">
            <h1>Ajax Form</h1>
            <form id="register" action="#">
                Name:<input type="text" name="" id="name"><br>
                Blood Group:<input type="text" name="" id="bgroup"><br>
                Donation date:<input type="text" name="" id="dont_date"><br>
                Address:<input type="text" name="" id="addr"><br>

                <input type="submit" value="Save" name="" id="save" class="btn btn-primary">
            </form>

            <div id="postContent">
            </div>
        </div>
    </div>
@endsection

@push('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script>
    $(document ).ready(function() {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token()}}"
            }
        });

//        $('#save').click(function(){

        $("#save").on("click", function (e) {
            e.preventDefault();

            var name = $('#name').val();
            var bgroup = $('#bgroup').val();
            var dont_date = $('#dont_date').val();
            var address = $('#addr').val();

            var abc = 'name='+name+'&bg='+bgroup+'&donat_date='+dont_date+'&address='+address;

            $.ajax({
                type:"POST",
                url:"{{ route('ajax.store') }}",
                data:abc,
                success:function(data){
                    console.log(data);
                    $('#postContent').html(data);
                }
            });

        });
    });
</script>
@endpush















