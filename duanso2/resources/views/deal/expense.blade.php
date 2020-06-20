<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Test Ajax</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet"/>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>
    <script>
        // In your Javascript (external .js resource or <script> tag)
        $(document).ready(function () {
            $('.js-example-basic-single').select2();
        });
    </script>
</head>
<body>
<form id="formLogin" method="post">
    @csrf

    <div>
        <input type="text" name="tienthu">
    </div>
    <div>
        <textarea name="description"></textarea>
    </div>

    <div>
        <button id="btnSubmit" type="submit">ok_ajax</button>
        <div id="conten"></div>
        <div id="contenget"></div>
    </div>
</form>
</body>
</html>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).ready(function () {

        $("#btnSubmit").click(function () {
            console.log(1)
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var data =  $('form#formLogin').serialize();

            $.ajax({
                "type": 'post',
                'cache': false,
                "url": 'revenue2',
                "data": data,
                "success": function (response) {
                    console.log(response);
                    $('#conten').html(response);
                }
            });
            return false
        });
    });
</script>
