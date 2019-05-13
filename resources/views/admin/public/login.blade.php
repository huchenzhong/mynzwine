<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <!--[if lt IE 9]>
    <script type="text/javascript" src="/admin/lib/html5shiv.js"></script>
    <script type="text/javascript" src="/admin/lib/respond.min.js"></script>
    <![endif]-->
    <link href="/admin/static/h-ui/css/H-ui.min.css" rel="stylesheet" type="text/css" />
    <link href="/admin/static/h-ui.admin/css/H-ui.login.css" rel="stylesheet" type="text/css" />
    <link href="/admin/static/h-ui.admin/css/style.css" rel="stylesheet" type="text/css" />
    <link href="/admin/lib/Hui-iconfont/1.0.8/iconfont.css" rel="stylesheet" type="text/css" />
    <!--[if IE 6]>
    <script type="text/javascript" src="/admin/lib/DD_belatedPNG_0.0.8a-min.js" ></script>
    <script>DD_belatedPNG.fix('*');</script>
    <![endif]-->
    <title>Admin Login</title>
    <meta name="keywords" content="H-ui.admin v3.1,H-ui网站后台模版,后台模版下载,后台管理系统模版,HTML后台模版下载">
    <meta name="description" content="H-ui.admin v3.1，是一款由国人开发的轻量级扁平化网站后台模板，完全免费开源的网站后台管理系统模版，适合中小型CMS后台系统。">
</head>
<body>
<input type="hidden" id="TenantId" name="TenantId" value="" />
<div class="header"></div>
<div class="loginWraper">
    <div id="loginform" class="loginBox">
        <form class="form form-horizontal" action="/admin/public/check" method="post">
            <div class="row cl">
                <label class="form-label col-xs-3"><i class="Hui-iconfont">&#xe60d;</i></label>
                <div class="formControls col-xs-8">
                    <input id="" name="username" type="text" placeholder="Username" class="input-text size-L">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-3"><i class="Hui-iconfont">&#xe60e;</i></label>
                <div class="formControls col-xs-8">
                    <input id="" name="password" type="password" placeholder="Password" class="input-text size-L">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-3"><i class="Hui-iconfont">&#xe63f;</i></label>
                <div class="formControls col-xs-8">
                    <input class="input-text size-L" type="text" placeholder="Captcha" name="captcha" style="width:150px;">
                    <img src="{{captcha_src()}}"> <a id="kanbuq" href="javascript:;">change a picture</a> </div>
            </div>
            <div class="row cl">
                <div class="formControls col-xs-8 col-xs-offset-3">
                    <label for="online">
                        <input type="checkbox" name="online" id="online" value="1">
                        keep me login</label>
                </div>
            </div>
            {{csrf_field()}}
            <div class="row cl">
                <div class="formControls col-xs-8 col-xs-offset-3">
                    <input name="" type="submit" class="btn btn-success radius size-L" value="&nbsp;Sign in&nbsp;">
                    <input name="" type="reset" class="btn btn-default radius size-L" value="&nbsp;Cancel&nbsp;">
                </div>
            </div>
        </form>
    </div>
</div>
<div class="footer">Copyright Mynzwine</div>
<script type="text/javascript" src="/admin/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/admin/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="/admin/lib/layer/2.4/layer.js"></script>
<script type="text/javascript">
    $(function(){
        var src = $("img").attr("src");
        $("#kanbuq").click(function(){
            $("img").attr("src",src+"&_="+Math.random());
        })
    })

    @if(count($errors) > 0)
        var allError = "";
        @foreach($errors->all() as $error)
            allError += "{{$error}} <br/>";
        @endforeach
        layer.alert(allError,{title:"Errors",icon:5});
    @endif


</script>

</body>
</html>
