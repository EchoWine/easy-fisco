<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title></title>

        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel='stylesheet' href="{{ asset('src/Nut/bootstrap/bootstrap.css') }}">
        <link rel='stylesheet' href="{{ asset('src/Nut/Application/loader.css') }}">
        <link rel='stylesheet' href="{{ asset('src/Nut/Template/Template.css') }}">

        @section('styles')

        @show
    </head>
    <body>

        <div class="page-loader">
            <div class="loading">
                <div class="loading-spin"></div>
                <span>Loading...</span>
            </div>
        </div>

        @section('body')

        @show

        <script src="{{ asset('src/Nut/jquery/jquery.js') }}"></script>
        <script src="{{ asset('src/Nut/jquery/jquery.cookie.js') }}"></script>

        <script src="{{ asset('src/Nut/Template/Template.js') }}"></script>
        <script src="{{ asset('src/Nut/Application/Application.js') }}"></script>
        <script src="{{ asset('src/Nut/Application/Api.js') }}"></script>
        <script src="{{ asset('src/Nut/Application/Client.js') }}"></script>
        <script src="{{ asset('src/Nut/Application/Cookies.js') }}"></script>

        <script>

            var App = new Application();

            App.getApi().setUrl("{{ env('API_URL') }}");
            App.getApi().setClientId("{{ env('API_CLIENT_ID') }}");
            App.getApi().setClientSecret("{{ env('API_CLIENT_SECRET') }}");
            App.getApi().updateTokenFromStorage();


        </script>

        <!-- Load all Service Providers -->
        @section('scripts')

        @show

        <script>
            var loader = function() {
                this.name = 'loader';
                this.initialize = function(next) {

                    $('.page-loader').remove();
                };
            };
            
            App.addProviders({loader})

            $(document).ready(function(){


                App.init();
            });
        </script>

    </body>
</html>
