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
    <link rel="stylesheet" type="text/css" href="/admin/static/h-ui/css/H-ui.min.css" />
    <link rel="stylesheet" type="text/css" href="/admin/static/h-ui.admin/css/H-ui.admin.css" />
    <link rel="stylesheet" type="text/css" href="/admin/lib/Hui-iconfont/1.0.8/iconfont.css" />
    <link rel="stylesheet" type="text/css" href="/admin/static/h-ui.admin/skin/default/skin.css" id="skin" />
    <link rel="stylesheet" type="text/css" href="/admin/static/h-ui.admin/css/style.css" />
    <!--[if IE 6]>
    <script type="text/javascript" src="/admin/lib/DD_belatedPNG_0.0.8a-min.js" ></script>
    <script>DD_belatedPNG.fix('*');</script>
    <![endif]-->
    <title>Add Admin</title>
    <meta name="keywords" content="H-ui.admin v3.1,H-ui网站后台模版,后台模版下载,后台管理系统模版,HTML后台模版下载">
    <meta name="description" content="H-ui.admin v3.1，是一款由国人开发的轻量级扁平化网站后台模板，完全免费开源的网站后台管理系统模版，适合中小型CMS后台系统。">
</head>
<body>
<article class="page-container">
    <form class="form form-horizontal" id="form-admin-add" action="/admin/admin/admin-add" method="post">
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>Username：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="{{old('username')}}" placeholder="" id="adminName" name="username">
                <p id="usernameError"></p>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>Password：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="password" class="input-text" autocomplete="off" id="password" name="password">
                <p id="passwordError"></p>
            </div>

        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>Confirm Password：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="password" class="input-text" autocomplete="off"  id="password2" name="password2">
                <p id="password2Error"></p>
            </div>

        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>Gender：</label>
            <div class="formControls col-xs-8 col-sm-9 skin-minimal">
                <div class="radio-box">
                    <input name="gender" type="radio" id="sex-1" value="1" checked>
                    <label for="sex-1">Male</label>
                </div>
                <div class="radio-box">
                    <input type="radio" id="sex-2" name="gender" value="2">
                    <label for="sex-2">Female</label>
                </div>
                <div class="radio-box">
                    <input type="radio" id="sex-2" name="gender" value="3">
                    <label for="sex-2">Secret</label>
                </div>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>Phone：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" id="phone" name="mobile" value="{{old('mobile')}}">
                <p id="mobileError"></p>
            </div>

        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>Email：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" placeholder="@" name="email" id="email" value="{{old('email')}}">
                <p id="emailError"></p>
            </div>

        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3">Role：</label>
            <div class="formControls col-xs-8 col-sm-9"> <span class="select-box" style="width:150px;">
			<select class="select" name="role" size="1">
				<option value="2">Admin</option>
				<option value="1">Super Admin</option>
			</select>
			</span> </div>
        </div>
        <div class="row cl">
            <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
                <input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;Submit&nbsp;&nbsp;">
            </div>
        </div>
        {{csrf_field()}}
    </form>
</article>

<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/admin/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/admin/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/admin/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="/admin/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/admin/lib/jquery.validation/1.14.0/jquery.validate.js"></script>
<script type="text/javascript" src="/admin/lib/jquery.validation/1.14.0/validate-methods.js"></script>
<script type="text/javascript" src="/admin/lib/jquery.validation/1.14.0/messages_zh.js"></script>
<script type="text/javascript">
    $(function(){
        $('.skin-minimal input').iCheck({
            checkboxClass: 'icheckbox-blue',
            radioClass: 'iradio-blue',
            increaseArea: '20%'
        });

        $("#form-admin-add").validate({
            rules:{
                adminName:{
                    required:true,
                    minlength:4,
                    maxlength:16
                },
                password:{
                    required:true,
                },
                password2:{
                    required:true,
                    equalTo: "#password"
                },
                sex:{
                    required:true,
                },
                phone:{
                    required:true,
                    isPhone:true,
                },
                email:{
                    required:true,
                    email:true,
                },
                adminRole:{
                    required:true,
                },
            },
            onkeyup:false,
            focusCleanup:true,
            success:"valid",
            // submitHandler:function(form){
            //     $(form).ajaxSubmit({
            //         type: 'post',
            //         url: "/admin/admin/admin-add",
            //         success: function(data){
            //             layer.msg('添加成功!',{icon:1,time:1000});
            //         },
            //         error: function(XmlHttpRequest, textStatus, errorThrown){
            //             layer.msg('error!',{icon:1,time:1000});
            //         }
            //     });
            //     var index = parent.layer.getFrameIndex(window.name);
            //     parent.$('.btn-refresh').click();
            //     parent.layer.close(index);
            // }
        });
    });
</script>

<script type="text/javascript">
    @if(count($errors) > 0)
        @if($errors->has('username'))
            $('#usernameError').html("{{$errors->first('username')}}");
            $('#usernameError').css({'color':'red','font-size':'12px'});
        @endif
        @if($errors->has('password'))
            $('#passwordError').html("{{$errors->first('password')}}");
            $('#passwordError').css({'color':'red','font-size':'12px'});
        @endif
        @if($errors->has('password2'))
            $('#password2Error').html("{{$errors->first('password2')}}");
            $('#password2Error').css({'color':'red','font-size':'12px'});
        @endif
        @if($errors->has('mobile'))
            $('#mobileError').html("{{$errors->first('mobile')}}");
            $('#mobileError').css({'color':'red','font-size':'12px'});
        @endif
        @if($errors->has('email'))
            $('#emailError').html("{{$errors->first('email')}}");
            $('#emailError').css({'color':'red','font-size':'12px'});
        @endif
    @elseif(session('msg'))
        layer.alert("{{session('msg')}}",{'title':'Success','icon':6});
    @endif


</script>
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>
