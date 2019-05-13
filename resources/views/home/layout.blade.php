<!DOCTYPE html>
<html lang="en">
<head>
    <title>MyNZWine</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- bootstrap links -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href="/home/static/huifont/1.0.9/iconfont.css" rel="stylesheet" type="text/css"/>

    <!-- social media icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/home/static/css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans" rel="stylesheet">

    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Merriweather" rel="stylesheet">

</head>

<body>
<!-- navigation starts -->
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="navbar-header">
        <button type="button-btn" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-main"
                aria-haspopup="true" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar" style="background-color: #fff"></span>
            <span class="icon-bar" style="background-color: #fff"></span>
            <span class="icon-bar" style="background-color: #fff"></span>
        </button>
        <!--logo-->
        <a class="navbar-brand" href="index.html"><img src="/home/static/images/logo.png" style="width: 65px"></a>
    </div>

    <!--register page-->
    <div class="container-login">
        @if(!Auth::guard('member')->user())
            <button onclick="document.getElementById('id01').style.display='block'"
                    style="width:auto; float: right; margin-right: 10px; margin-top: 12px"
                    class="login-button">Register
            </button>
        @else
            <img style="width:auto; float: right; margin-right: 10px; margin-top: 12px" src="{{Auth::guard('member')->user()->avatar}}" width="60px" height="40px"/>
        @endif
        <div id="id01" class="modal">
            <form class="modal-content animate" action="/register" method="post" enctype="multipart/form-data" id="myForm">
                <div class="imgcontainer">
                        <span onclick="document.getElementById('id01').style.display='none'" class="close"
                              title="Close Modal">&times;</span>
                </div>
                <div class="container-loginheader">
                    <h1>Register</h1>
                </div>


                <div class="container-details">
                    <a href="#"><img src="/home/static/images/login.png" style="height: 50px; width: 50px; float: left"></a>
                    <a href="#"> <label class="ui_button ui_button_primary" for="xFile"
                                        style="float: left; padding-top: 15px; padding-left: 20px">Upload your
                            picture</label></a>
                    <form><input type="file" id="xFile" name="avatar" style="position:absolute;clip:rect(0 0 0 0);">
                        <select name="title" class="select">
                            <option value="1">Mr.</option>
                            <option value="2">Mrs.</option>
                            <option value="3">Miss.</option>
                            <option value="4">Dr.</option>
                        </select>
                        <input type="text" placeholder="First Name:*" name="fname" required>
                        <input type="text" placeholder="Last Name:*" name="lname" required>
                        <input type="text" placeholder="E-mail:*" name="email" required>
                        <input type="text" placeholder="Phone:" name="phone">
                        <input type="password" placeholder="Enter Password:*" name="password" id="password" minlength="6" required>
                        <input type="password" placeholder="Confirm Password:*" name="password2" id="confirm_password" minlength="6"
                               required>
                        <input type="text" placeholder="Street:" name="address_street">
                        <input type="text" placeholder="Suburb:" name="address_suburb">
                        <input type="text" placeholder="Town/City:" name="address_city">
                        <input type="text" placeholder="Postcode:" name="postcode">
                        {{--                        <input type="text" placeholder="Country:" name="Country">--}}
                        <button type="submit" class="cancelbtn">Sign up</button>
                        <input type="button" onclick="myFunction()" value="Clear" class="clearbtn">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                    </form>
                </div>
                <!-- clear button -->
                <script>
                    function myFunction() {
                        document.getElementById("myForm").reset();
                    }
                </script>
                <!-- clear button end -->

                <!-- password match -->
                <script>
                    var password = document.getElementById("password"),
                        confirm_password = document.getElementById("confirm_password");

                    function validatePassword() {
                        if (password.value != confirm_password.value) {
                            confirm_password.setCustomValidity("Passwords Don't Match");
                        } else {
                            confirm_password.setCustomValidity('');
                        }
                    }

                    password.onchange = validatePassword;
                    confirm_password.onkeyup = validatePassword;
                </script>
            </form>
        </div>
        <script>
            var modal = document.getElementById('id01');
            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function (event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
        </script>
        <!--login page-->
        @if(!Auth::guard('member')->user())
            <button onclick="document.getElementById('id02').style.display='block'"
                    style="width:auto; float: right; margin-right: 20px; margin-top: 12px"
                    class="login-button">Login
            </button>
        @else
            <button style="width:auto; float: right; margin-right: 20px; margin-top: 12px" class="login-button"
                    onclick="window.location.href='/logout'"
            >Logout</button>
        @endif
        <div id="id02" class="modal">
            <form class="modal-content animate" action="/login" method="post">
                <div class="container-loginheader">
                    <h1>Member Login</h1>
                </div>
                <div class="container-details">
                    <label for="uname"><b>Email Address</b></label>
                    <input type="text" placeholder="Enter Email address" name="email" id="uname" required>
                    <label for="psw"><b>Password</b></label>
                    <input type="password" placeholder="Enter Password" name="password" id="psw" required>
                    <button type="submit" class="submit-button">Login</button>
                    <br>
                    <label>
                        <input type="checkbox" checked="checked" name="remember" value="1"> Remember me
                    </label>
                </div>
                <div class="container-pswd" style="background-color:#f1f1f1">
                    <button type="button" onclick="document.getElementById('id02').style.display='none'"
                            class="cancelbtn">Cancel
                    </button>
                    <span class="psw">Forgot <a href="#">password?</a></span>
                </div>
                {{csrf_field()}}
            </form>
        </div>
        <script>
            var modal = document.getElementById('id02');
            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function (event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
        </script>
    </div>

    <!--nav start-->
    <div class="collapse navbar-collapse" id="navbar-collapse-main">
        <ul class="nav navbar-nav navbar-right">
            <li><a href="/">Home</a></li>
            <li><a href="/wine">Wine</a></li>
            @if(Auth::guard('member')->user())
                <li><a href="/account/edit">My Account</a></li>
                <li><a href="wine/likes">My Collection</a></li>
            @endif
            <li><a href="about.html" style="padding-right: 65px">About</a></li>
        </ul>
    </div>

</nav>
<!-- navigation ends -->

<!--shopping cart-->
<div class="container-cart">
    <div><a href="cart.html"><img src="/home/static/images/shopingcart.png" style="width:50px; height:50px; float:right;"></a>
        <span class="quantity">0</span>
    </div>
</div>

@yield('content')


<!--footer start-->
<footer class="footer container-fluid text-center">
    <div class="wrap">
        <div class="footer-text">
            <h2>Get in touch</h2>
            <ul class="follow_icon">
                <li><a href="https://www.facebook.com/" style="opacity: 1;"><img src="/home/static/images/fb.png" alt=""></a></li>
                <li><a href="https://twitter.com/" style="opacity: 1;"><img src="/home/static/images/tw.png" alt=""></a></li>
                <li><a href="https://feedly.com/" style="opacity: 1;"><img src="/home/static/images/rss.png" alt=""></a></li>
                <li><a href="https://www.google.com/" style="opacity: 1;"><img src="/home/static/images/g+.png" alt=""></a></li>
            </ul>
            <div class="copy">
                <p>&copy; Copyright &copy; 2019. My NZ Wine All rights reserved.<a target="_blank" href=""></a></p>
            </div>
        </div>
    </div>
</footer>
<!--footer end-->

<script type="text/javascript">
    @if(session('msg'))
    alert("{{session('msg')}}");
            @elseif(count($errors->all()) > 0)
    var errorMsg = '';
    @foreach($errors->all() as $error)
        errorMsg += "{{$error}}<br/>";
    @endforeach
    alert(errorMsg);
    @endif


</script>



</body>
</html>
