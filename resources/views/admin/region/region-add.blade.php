<!--_meta 作为公共模版分离出去-->
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="Bookmark" href="/favicon.ico" >
    <link rel="Shortcut Icon" href="/favicon.ico" />
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
    <!--/meta 作为公共模版分离出去-->

    <link href="/admin/lib/webuploader/0.1.5/webuploader.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="page-container">
    <form action="/admin/region/region-add" method="post" class="form form-horizontal" id="form-article-add">
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>Region Name：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="{{old('name')}}" id="" name="name">
                <p id="nameError"></p>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>Postage：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" name="postage" id="" value="{{old('postage')}}" class="input-text" style="width:90%">
                NZD
                <p id="postageError"></p>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">Description：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <textarea name="desc" cols="" rows="" class="textarea"  placeholder="Descript the wine..." datatype="*10-100" onKeyUp="$.Huitextarealength(this,200)"></textarea>
            </div>
        </div>

        <div class="row cl">
            <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
                <input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;Submit&nbsp;&nbsp;">
            </div>
        </div>
        {{csrf_field()}}
    </form>
</div>

<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/admin/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/admin/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/admin/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="/admin/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/admin/lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="/admin/lib/jquery.validation/1.14.0/jquery.validate.js"></script>
<script type="text/javascript" src="/admin/lib/jquery.validation/1.14.0/validate-methods.js"></script>
<script type="text/javascript" src="/admin/lib/jquery.validation/1.14.0/messages_zh.js"></script>
<script type="text/javascript" src="/admin/lib/webuploader/0.1.5/webuploader.min.js"></script>
<script type="text/javascript" src="/admin/lib/ueditor/1.4.3/ueditor.config.js"></script>
<script type="text/javascript" src="/admin/lib/ueditor/1.4.3/ueditor.all.min.js"> </script>
<script type="text/javascript" src="/admin/lib/ueditor/1.4.3/lang/zh-cn/zh-cn.js"></script>


<script type="text/javascript">
    var date = new Date();
    for(var i = date.getFullYear()-10;i<=date.getFullYear();i++){
        var newOption = $("<option>"+i+"</option>");
        newOption.attr('value',i);
        $("#vintage").append(newOption);
    }
</script>

<script type="text/javascript">
    @if(count($errors) > 0)
        @if($errors->has('name'))
            $('#nameError').html("{{$errors->first('name')}}").css({'color':'red','font-size':'12px'});
        @endif
        @if($errors->has('price'))
            $('#postageError').html("{{$errors->first('postage')}}").css({'color':'red','font-size':'12px'});
        @endif
    @elseif(session('msg'))
    layer.alert("{{session('msg')}}",{'title':'Success','icon':6});
    @endif
</script>
</body>
</html>

