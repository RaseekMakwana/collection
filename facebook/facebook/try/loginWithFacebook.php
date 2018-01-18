<!DOCTYPE html>
<html>
    <head>
        <title>Facebook Login JavaScript Example</title>
        <meta charset="UTF-8">
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    </head>
    <body>

        <div id="fb-root"></div>
        <script>

            (function (d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id))
                    return;
                js = d.createElement(s);
                js.id = id;
                js.src = 'https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.11&appId=318344788669486';
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));

            $(document).ready(function () {
                checkstatus();
            });

            function login() {
                FB.login(function (response) {
                    if (response.authResponse) {
                        $('#login_btn').hide();
                        $('#logout_btn').show();
                        console.log(response);
                        FB.api('/me', function (response) {
                            console.log('Good to see you, ' + response.name + '.');
                        });
                    } else {
                        console.log('User cancelled login or did not fully authorize.');
                    }
                });
            }

            function logout() {
                FB.logout(function (response) {
                    $('#login_btn').show();
                    $('#logout_btn').hide();
                });
            }
        </script>

        <a href="javascript:void(0)" onclick="login()" id="login_btn">Login</a>
        <a href="javascript:void(0)" onclick="logout()" id="logout_btn">Logout</a>
    </body>
</html>