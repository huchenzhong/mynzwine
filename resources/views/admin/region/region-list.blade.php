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
    <title>Region List</title>
    <link rel="stylesheet" href="/admin/lib/zTree/v3/css/zTreeStyle/zTreeStyle.css" type="text/css">
</head>
<body class="pos-r">
<div>
    <nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> Homepage <span class="c-gray en">&gt;</span> Products <span class="c-gray en">&gt;</span> Region List <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="refresh" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
    <div class="page-container">
        <div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> Bulk Delete</a> <a class="btn btn-primary radius" onclick="region_add('Add Region','/admin/region/region-add')" href="javascript:;"><i class="Hui-iconfont">&#xe600;</i> Add Region</a></span></div>
        <div class="mt-20">
            <table class="table table-border table-bordered table-bg table-hover table-sort">
                <thead>
                <tr class="text-c">
                    <th width="40"><input name="" type="checkbox" value=""></th>
                    <th width="40">ID</th>
                    <th width="100">Region Name</th>
                    <th width="70">Postage</th>
                    <th>Description</th>
                    <th width="60">Active</th>
                    <th width="100">Modify</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $val)
                    <tr class="text-c va-m">
                        <td><input name="" type="checkbox" class="delcheck"></td>
                        <td>{{$val->id}}</td>
                        <td>{{$val->name}}</td>
                        <td>{{$val->postage}}</td>
                        <td class="text-l">{{$val->desc}}</td>
                        <td class="td-status">
                            @if($val->active == 2)
                                <span class="label label-success radius">Available</span>
                            @else
                                <span class="label label-danger radius">Not Available</span>
                            @endif
                        </td>
                        <td class="td-manage">
                            @if($val->is_soldout == 2)
                                <a style="text-decoration:none" onClick="region_stop(this,{{$val->id}})" href="javascript:;" title="disable"><i class="Hui-iconfont">&#xe6de;</i></a>
                                <a style="text-decoration:none" class="ml-5" onClick="region_edit('Region Edit','/admin/region/region-edit/{{$val->id}}','{{$val->id}}')" href="javascript:;" title="Edit"><i class="Hui-iconfont">&#xe6df;</i></a>
                                <a style="text-decoration:none" class="ml-5" onClick="region_del(this,'{{$val->id}}')" href="javascript:;" title="Delete"><i class="Hui-iconfont">&#xe6e2;</i></a>
                            @else
                                <a style="text-decoration:none" onClick="region_start(this,{{$val->id}})" href="javascript:;" title="enable"><i class="Hui-iconfont">&#xe6dc;</i></a>
                                <a style="text-decoration:none" class="ml-5" onClick="region_edit('Region Edit','/admin/region/region-edit/{{$val->id}}','{{$val->id}}')" href="javascript:;" title="Edit"><i class="Hui-iconfont">&#xe6df;</i></a>
                                <a style="text-decoration:none" class="ml-5" onClick="region_del(this,'{{$val->id}}')" href="javascript:;" title="Delete"><i class="Hui-iconfont">&#xe6e2;</i></a>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/admin/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/admin/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/admin/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="/admin/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/admin/lib/zTree/v3/js/jquery.ztree.all-3.5.min.js"></script>
<script type="text/javascript" src="/admin/lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="/admin/lib/datatables/1.10.0/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="/admin/lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript">
    var setting = {
        view: {
            dblClickExpand: false,
            showLine: false,
            selectedMulti: false
        },
        data: {
            simpleData: {
                enable:true,
                idKey: "id",
                pIdKey: "pId",
                rootPId: ""
            }
        },
        callback: {
            beforeClick: function(treeId, treeNode) {
                var zTree = $.fn.zTree.getZTreeObj("tree");
                if (treeNode.isParent) {
                    zTree.expandNode(treeNode);
                    return false;
                } else {
                    //demoIframe.attr("src",treeNode.file + ".html");
                    return true;
                }
            }
        }
    };




    $(document).ready(function(){
        var t = $("#treeDemo");
        t = $.fn.zTree.init(t, setting, zNodes);
        //demoIframe = $("#testIframe");
        //demoIframe.on("load", loadReady);
        var zTree = $.fn.zTree.getZTreeObj("tree");
        //zTree.selectNode(zTree.getNodeByParam("id",'11'));
    });

    $('.table-sort').dataTable({
        "aaSorting": [[ 1, "desc" ]],//默认第几个排序
        "bStateSave": true,//状态保存
        "aoColumnDefs": [
            {"orderable":false,"aTargets":[0]}// 制定列不参与排序
        ]
    });
    /*产品-添加*/
    function region_add(title,url){
        var index = layer.open({
            type: 2,
            title: title,
            content: url
        });
        layer.full(index);
    }


    /*产品-下架*/
    function region_stop(obj,id){
        layer.confirm('Diable this region？',function(index){
            $.get('/admin/region/region-toggle/'+id,function(){

            });
            $(obj).parents("tr").find(".td-manage").prepend('<a id="enableLink" href="javascript:;" title="selling" style="text-decoration:none"><i class="Hui-iconfont">&#xe6dc;</i></a>');
            $("#enableLink").attr("onClick","region_start(this,"+id+")");
            $(obj).parents("tr").find(".td-status").html('<span class="label label-danger radius">Not Available</span>');
            $(obj).remove();
            layer.msg('Disabled!',{icon: 5,time:1000});

        });
    }

    /*产品-发布*/
    function region_start(obj,id){
        layer.confirm('Enable this region?',function(index){
            $.get('/admin/region/region-toggle/'+id,function(){

            });
            $(obj).parents("tr").find(".td-manage").prepend('<a id="disableLink" href="javascript:;" title="sold out" style="text-decoration:none"><i class="Hui-iconfont">&#xe6de;</i></a>');
            $("#disableLink").attr("onClick","region_stop(this,"+id+")");
            $(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">Available</span>');
            $(obj).remove();
            layer.msg('Enabled!', {icon: 6,time:1000});
        });
    }


    /*产品-编辑*/
    function region_edit(title,url,id){
        var index = layer.open({
            type: 2,
            title: title,
            content: url
        });
        layer.full(index);
    }

    /*产品-删除*/
    function region_del(obj,id){
        layer.confirm('Are you sure to delete this region?',function(index){
            $.get("/admin/region/region-delete/"+id,function(data){
                if(data == 1) {
                    $(obj).parents("tr").remove();
                    layer.msg('Delete Success', {icon: 1, time: 1000});
                }
                else{
                    layer.msg('Fail to delete',{icon:2,time:1000});
                }
            });
        });
    }


    //delete many records
    function datadel(){
        // select all the checked item's id,put them into an array
        var checkedIds = [];
        $(".delcheck:checked").parents('tr').find("td:eq(1)").each(function(index){
            checkedIds[index] = $(this).html();
        });

        layer.confirm("Are you sure to delete all the selected regions?",function (index) {
            $.get("/admin/region/region-deleteMany?checkedIds="+checkedIds,function (data) {
                if(data == 1){
                    $(".delcheck:checked").parents("tr").remove();
                    layer.msg('Delete Success', {icon: 1, time: 1000});
                }
                else{
                    layer.msg('Fail to delete',{icon:2,time:1000});
                }

            })
        });
    }
</script>
</body>
</html>

