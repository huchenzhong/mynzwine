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
    <title>Add Winery</title>
    <meta name="keywords" content="H-ui.admin v3.1,H-ui网站后台模版,后台模版下载,后台管理系统模版,HTML后台模版下载">
    <meta name="description" content="H-ui.admin v3.1，是一款由国人开发的轻量级扁平化网站后台模板，完全免费开源的网站后台管理系统模版，适合中小型CMS后台系统。">
</head>
<body>
<article class="page-container">
    <form class="form form-horizontal" id="form-admin-add" action="/admin/winery/winery-add" method="post" enctype="multipart/form-data">
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>Winery name：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="{{old('name')}}" id="adminName" name="name">
                <p id="nameError"></p>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>Phone: </label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="{{old('phone')}}" id="phone" name="phone">
                <p id="phoneError"></p>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>Email：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="email" class="input-text"  placeholder="@" id="email" value="{{old('email')}}" name="email">
                <p id="emailError"></p>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>Address: </label>
            <div class="formControls col-xs-8 col-sm-9 skin-minimal">
                <input type="text" class="input-text"  id="address" name="address" value="{{old('address')}}">
                <p id="addressError"></p>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>Full URL：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="url" class="input-text" value="{{old('url')}}" placeholder="http://" id="url" name="url">
                <p id="urlError"></p>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>Image: </label>
            <div class="formControls col-xs-8 col-sm-9">
                <input class="btn btn-success radius" type="button" id="filebutton" value="browser" onclick="browsefile.click()">
                <span id="filepath" style="color:red"></span>
                <input type="file" id="browsefile" style="visibility:hidden" onchange="filepath.innerText=this.value" name="image">
            </div>

        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3">Description：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <textarea name="desc" cols="" rows="" class="textarea"  placeholder="Some information about the winery..." dragonfly="true" onKeyUp="$.Huitextarealength(this,100)"></textarea>
                <p class="textarea-numberbar"><em class="textarea-length">0</em>/100</p>
            </div>
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
                name:{
                    required:true,
                    minlength:4,
                    maxlength:50
                },
                phone:{
                    isPhone:true,
                },
                email:{
                    email:true,
                },
                url:{
                    isUrl:true,
                }
            },
            onkeyup:false,
            focusCleanup:true,
            success:"valid",
            // submitHandler:function(form){
            //     $(form).ajaxSubmit({
            //         type: 'post',
            //         url: "xxxxxxx" ,
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
        @if($errors->has('name'))
        $('#nameError').html("{{$errors->first('name')}}").css({'color':'red','font-size':'12px'});
        @endif
        @if($errors->has('phone'))
        $('#phoneError').html("{{$errors->first('phone')}}").css({'color':'red','font-size':'12px'});
        @endif
        @if($errors->has('email'))
        $('#emailError').html("{{$errors->first('email')}}").css({'color':'red','font-size':'12px'});
        @endif
        @if($errors->has('address'))
        $('#addressError').html("{{$errors->first('address')}}").css({'color':'red','font-size':'12px'});
        @endif
    @elseif(session('msg'))
    layer.alert("{{session('msg')}}",{'title':'Success','icon':6});
    @endif


</script>
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>