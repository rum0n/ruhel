<!DOCTYPE html>
<html>
<head>
    <title>Ajax</title>
    {{--<meta name="csrf-token" content="{{ csrf_token() }}">--}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

    <h1>Ajax Form</h1>
    <form id="register" action="#">
        {{--<input type="hidden" name="_token" value="{{csrf_token()}}">--}}

        Name:<input type="text" name="" id="firstname"><br>
        Last Name:<input type="text" name="" id="lastname"><br>

        <input type="submit" value="Register" name="" id="save">
    </form>

<div id="postContent"></div>

    <script>
        $(document ).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            });

            $('#save').click(function(){

                var fname = $('#firstname').val();
                var lname = $('#lastname').val();
                var abc = 'fn='+fname+'&ln='+lname;

                $.ajax({
                    type:"POST",
                    url:"register",
                    data:abc,
                    success:function(data){
                        console.log(data);
                        $('#postContent').html(data);
                    }
                });

            });
        });
    </script>

</body>


</html>