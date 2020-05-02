<!doctype html>

<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>
            Laravel Broadcast Redis Socket io
        </title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>

    <body>

        <div class="container">
            <div style="padding-bottom:20px;"></div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <textarea class="form-control" name="message" id="message"></textarea>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <button class="btn btn-primary" onclick="sendMessage()">
                            Send
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </body>

    <script type="text/javascript">
        window.laravel_echo_hostname = '{{ env('LARAVEL_ECHO_HOSTNAME') }}';
    </script>
    <script src="{{ env('LARAVEL_ECHO_HOSTNAME') }}/socket.io/socket.io.js" type="text/javascript"></script>
    <script src="{{ mix('js/app.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
        function sendMessage() {
            jQuery.ajax({
                url : '{{ url('hit') }}',
                method : 'post',
                data : 'message=' + jQuery('#message').val(),
                headers : {
                    'X-CSRF-TOKEN' : '{{ csrf_token() }}'
                },
                success : function(r) {
                    console.log(r);
                }
            })
        }
    </script>

</html>