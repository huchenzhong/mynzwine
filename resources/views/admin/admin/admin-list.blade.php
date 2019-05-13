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
    <title>Admin List</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> Homepage <span class="c-gray en">&gt;</span> Admins <span class="c-gray en">&gt;</span> Admin List <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
    <div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> Bulk Delete</a> <a href="javascript:;" onclick="admin_add('Add Admin','/admin/admin/admin-add','800','450')" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> Add Admin</a></span></div>
    <table class="table table-border table-bordered table-bg" id="list">
        <thead>
        <tr>
            <th scope="col" colspan="9">Admin List</th>
        </tr>
        <tr class="text-c">
            <th width="25"><input type="checkbox" name="" value=""></th>
            <th width="40">ID</th>
            <th width="130">Username</th>
            <th width="120">Phone</th>
            <th width="180">Email</th>
            <th width="70">Role</th>
            <th width="130">Create Time</th>
            <th width="100">Active</th>
            <th width="100">Modify</th>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $val)
        <tr class="text-c">
            <td><input type="checkbox" value="1" name="" class="delcheck"></td>
            <td>{{$val->id}}</td>
            <td>{{$val->username}}</td>
            <td>{{$val->mobile}}</td>
            <td>{{$val->email}}</td>
            <td>
                @if($val->role_id == 1)
                    Super Admin
                @else
                    Admin
                @endif
            </td>
            <td>{{$val->created_at}}</td>
            <td class="td-status">
                @if($val->status == 2)
                    <span class="label label-success radius">Enabled</span>
                @else
                    <span class="label radius">Disabled</span>
                @endif
            </td>
            <td class="td-manage">
                @if($val->status == 2)
                    <a style="text-decoration:none" onClick="admin_stop(this,{{$val->id}})" href="javascript:;" title="disable"><i class="Hui-iconfont">&#xe631;</i></a> <a title="编辑" href="javascript:;" onclick="admin_edit('管理员编辑','/admin/admin/admin-edit/{{$val->id}}','{{$val->id}}','800','500')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a> <a title="删除" href="javascript:;" onclick="admin_del(this,'{{$val->id}}')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a>
                @else
                    <a style="text-decoration:none" onClick="admin_start(this,{{$val->id}})" href="javascript:;" title="enable"><i class="Hui-iconfont">&#xe615;</i></a> <a title="编辑" href="javascript:;" onclick="admin_edit('管理员编辑','/admin/admin/admin-edit/{{$val->id}}','{{$val->id}}','800','500')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a> <a title="删除" href="javascript:;" onclick="admin_del(this,'{{$val->id}}')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a>
                @endif
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
<br/><br/>
<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/admin/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/admin/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/admin/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="/admin/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/admin/lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="/admin/lib/datatables/1.10.0/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="/admin/lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript">
    /*
        参数解释：
        title	标题
        url		请求的url
        id		需要操作的数据id
        w		弹出层宽度（缺省调默认值）
        h		弹出层高度（缺省调默认值）
    */
    /*管理员-增加*/

    function admin_add(title,url,w,h){
        layer_show(title,url,w,h);
    }
    /*管理员-删除*/
    function admin_del(obj,id){
        layer.confirm('Are you sure to delete this admin?',function(index){
            $.get("/admin/admin/admin-delete/"+id,function(data){
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

    /*管理员-编辑*/
    function admin_edit(title,url,id,w,h){
        layer_show(title,url,w,h);
    }
    /*管理员-停用*/
    function admin_stop(obj,id){
        layer.confirm('Are you sure to disable this admin？',function(index){
            //此处请求后台程序，下方是成功后的前台处理……
            $.get('/admin/admin/admin-toggle/'+id,function(){

            });
            $(obj).parents("tr").find(".td-manage").prepend('<a id="enableLink" href="javascript:;" title="enable" style="text-decoration:none"><i class="Hui-iconfont">&#xe615;</i></a>');
            $("#enableLink").attr("onclick","admin_start(this,"+id+")");
            $(obj).parents("tr").find(".td-status").html('<span class="label label-default radius">Disabled</span>');
            $(obj).remove();
            layer.msg('Disabled!',{icon: 5,time:1000});

        });
    }

    /*管理员-启用*/
    function admin_start(obj,id){
        layer.confirm('Are you sure to enable this admin？',function(index){
            //此处请求后台程序，下方是成功后的前台处理……

            $.get('/admin/admin/admin-toggle/'+id,function(){

            });
            $(obj).parents("tr").find(".td-manage").prepend('<a id="disableLink" href="javascript:;" title="disable" style="text-decoration:none"><i class="Hui-iconfont">&#xe631;</i></a>');
            $("#disableLink").attr("onclick","admin_stop(this,"+id+")");
            $(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">Enabled</span>');
            $(obj).remove();
            layer.msg('Enabled!', {icon: 6,time:1000});



        });
    }


    //delete many records
    function datadel(){
        // select all the checked item's id,put them into an array
        var checkedIds = [];
        $(".delcheck:checked").parents('tr').find("td:eq(1)").each(function(index){
            checkedIds[index] = $(this).html();
        });

        layer.confirm("Are you sure to delete all the selected records?",function (index) {
            $.get("/admin/admin/admin-deleteMany?checkedIds="+checkedIds,function (data) {
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

<script type="text/javascript">
    $(function(){
        $("#list").dataTable({
            "aoColumnDefs": [ { "bSortable": false, "aTargets": [ 0 ] }],
            "aaSorting":[[1,'asc']],
            "language":{
                "sProcessing":"Processing",
                "sLengthMenu": "show _MENU_ results",
                "sZeroRecords": "No matched result",
                "sInfo": "show _START_ to _END_ ，in total _TOTAL_ results",
                "sInfoEmpty": "show 0 to 0 ，in total 0 result",
                "sSearch": "Search:",
                "sEmptyTable": "Empty Table",
                "sLoadingRecords": "Loading...",
                "oPaginate": {
                    "sFirst": "First Page",
                    "sPrevious": "Previous",
                    "sNext": "Next",
                    "sLast": "Last Page"
                },
                "oAria": {
                    "sSortAscending": ": Order as ascend",
                    "sSortDescending": ": Order as descend"
                }
            }
        });
    })

</script>
</body>
</html>
