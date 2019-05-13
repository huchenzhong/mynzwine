@extends('home.layout')

@section('content')
    <div class="container marketing">
        <div class="row">
            <div style="margin-top: 50px; margin-bottom:50px; text-align:center">
                <form class="search" action="/action_page.php">
                    <input type="text" placeholder="Enter wine name you want to search for.." name="search">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
        </div>
    </div>

    <div class="container marketing">
        @foreach($data as $val)
            <div class="col-md-4 " style="margin-top: 50px; margin-bottom:50px; text-align:center" onload="test()">
                <div class="shadow">
                    <img class="img-circle " src="{{$val->image}}" width="150px" height="200px">
                        <span class="Hui-iconfont Hui-iconfont-like2"
                              style="position: absolute;font-size: 28px; cursor: pointer;color:red"
                              onclick="wine_toggle(this,{{$val->id}})"></span>
                    <h2>{{$val->winery->name}}<br/>{{$val->name}}<br/>{{$val->varietal->name}}</h2>
                    <p>{{$val->desc}}</p>
                    <br>
                    <p> Price: ${{$val->price}} </p>
                    <br>
                    <button class="link-2">Add to Cart</button>
                    <button class="link-2">Comments</button>
                    <table id ="czy" style="margin-top: 20px;margin-left: 150px">
                        <tr>
                            <td>★</td><td>★</td><td>★</td><td>★</td><td>★</td>
                        </tr>
                    </table>

                </div>
            </div>
        @endforeach
        <div style="margin: auto;width: 200px" >{{$data->links()}}</div>

    </div>

    <script type="text/javascript">

        function wine_toggle(obj,id) {
            //alert("/wine/like-toggle/"+id);
            $.get("/wine/like-toggle/"+id,function(data){
                var className = $(obj).attr("class");
                if (className == "Hui-iconfont Hui-iconfont-like") {
                    $(obj).attr("class", "Hui-iconfont Hui-iconfont-like2");
                }
                else{
                    $(obj).attr("class","Hui-iconfont Hui-iconfont-like");
                }
            });
        }

    </script>

@endsection





