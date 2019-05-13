@extends("home.layout")

@section('content')
    <form action="/account/edit" method="post" id="profile" enctype="multipart/form-data">
        <div class="padding">
            <div class="container">
                <div class="row row-content">
                    <div class="text-center">
                        <a href="#"><img src="{{Auth::guard('member')->user()->avatar}}" style="height: 50px; width: 50px; float: left"></a>
                        <a href="#"> <label class="ui_button ui_button_primary" for="avatar"
                                            style="float: left; padding-top: 15px; padding-left: 20px">Upload your picture</label></a>

                        <input type="text" placeholder="First Name:*" name="fname" required
                            value="{{Auth::guard('member')->user()->fname}}">
                        <input type="text" placeholder="Last Name:*" name="lname" required
                               value="{{Auth::guard('member')->user()->lname}}">
                        <input type="text" placeholder="Phone:" name="phone"
                               value="{{Auth::guard('member')->user()->phone}}">
                        <input type="text" placeholder="Street:" name="address_street"
                               value="{{Auth::guard('member')->user()->address_street}}">
                        <input type="text" placeholder="Suburb:" name="address_suburb"
                               value="{{Auth::guard('member')->user()->address_suburb}}">
                        <input type="text" placeholder="Town/City:" name="address_city"
                               value="{{Auth::guard('member')->user()->address_city}}">
                        <input type="text" placeholder="Postcode:" name="postcode"
                               value="{{Auth::guard('member')->user()->postcode}}">
                        <input type="file" id="avatar" name="avatar" style="display: none">
                        <input type="submit" class="cancelbtn" value="Update"></input>
                        <input type="reset" value="Clear" class="clearbtn">
                    </div>
                    {{csrf_field()}}

                </div>
            </div>
        </div>
    </form>
@endsection