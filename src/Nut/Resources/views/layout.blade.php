<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title></title>

        <link rel='stylesheet' href="{{ asset('src/Nut/Main/reset.css') }}">
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel='stylesheet' href="{{ asset('src/Nut/bootstrap/bootstrap.css') }}">
        <link rel='stylesheet' href="{{ asset('src/Nut/Application/loader.css') }}">
        <link rel='stylesheet' href="{{ asset('src/Nut/Template/Template.css') }}">
        <link rel='stylesheet' href="{{ asset('src/Nut/Main/main.css') }}">
        <link rel="stylesheet" href="{{ asset('src/Nut/vendor/font-awesome/font-awesome/css/font-awesome.min.css') }}">

        @section('styles')

        @show

    </head>
    <body>

        <div class="page-loader">
            <div class="loading">
                <div class="loading-spin"></div>
            </div>
        </div>

        @section('body')

        @show
        <script src="{{ asset('src/Nut/jquery/jquery.js') }}"></script>
        <script src="{{ asset('src/Nut/jquery/jquery.cookie.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>


        <script src="{{ asset('src/Nut/Template/Template.js') }}"></script>
        <script src="{{ asset('src/Nut/Application/Application.js') }}"></script>
        <script src="{{ asset('src/Nut/Application/Api.js') }}"></script>
        <script src="{{ asset('src/Nut/Application/Client.js') }}"></script>
        <script src="{{ asset('src/Nut/Application/Cookies.js') }}"></script>

        <!-- Main Application -->
        <script>

            var App = new Application();

            App.getApi().setUrl("{{ env('API_URL') }}");
            App.getApi().setClientId("{{ env('API_CLIENT_ID') }}");
            App.getApi().setClientSecret("{{ env('API_CLIENT_SECRET') }}");
            App.getApi().updateTokenFromStorage();
            App.setRoute("/{{ Route::current()->uri }}");


        </script>

        <!-- Authentication -->
        <script src="{{ asset('src/Nut/Auth/AuthServiceProvider.js') }}"></script>
        <script src="{{ asset('src/Nut/Auth/AuthService.js') }}"></script>
        <script src="{{ asset('src/Nut/Auth/AuthManager.js') }}"></script>
        <script src="{{ asset('src/Nut/Auth/AuthEvent.js') }}"></script>

        <script>

            App.addProviders([
                AuthServiceProvider,
            ]);

        </script>


        <!-- Load all Service Providers -->
        @section('scripts')

        @show

        <!-- Sort of middleware -->
        <script>
            var middleware = function() {
                this.name = 'middleware';
                this.initialize = function(self, next) {

                    if(App.getRoute() != "/login" && !App.get('auth').getUser()) {
                        App.redirectTo("/login");
                    }

                    next();
                };
            };

            App.addProviders({middleware});
        </script>


        <!-- Loader -->
        <script>
            var loader = function() {
                this.name = 'loader';
                this.initialize = function(self, next) {

                    $('.page-loader').remove();

                    next();
                };
            };

            App.addProviders({loader});
        </script>

        <!-- Initialize -->
        <script>

            $(document).ready(function() {
                 App.init();
            });
        </script>

    </body>
</html>
