@extends('frontend.master')

@section('content')

<div class="container wrapper">
    <form action="{{route('order.place')}}" method="post">
        @csrf
    <div class="row">
        <div class="col-md-3">

        </div>

        <div class="col-md-6 col-sm-6 col-xs-12 col-md-pull-6 col-sm-pull-6">
            <!--SHIPPING METHOD-->
            <div class="panel panel-info">
                <div class="panel-heading">Address</div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="col-md-12">
                            <h4>Shipping Address</h4>
                        </div>
                    </div>
                    
                    <div class="form-group">
                       
                        <div class="span1"></div>
                        <div class="col-md-6 col-xs-12">
                            <strong> Name:</strong>
                            <input type="text" name="name" class="form-control" value="{{auth()->user()->name}}" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12"><strong>Address:</strong></div>
                        <div class="col-md-12">
                            <input type="text" name="address" class="form-control" value="" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12"><strong>City:</strong></div>
                        <div class="col-md-12">
                            <input type="text" name="city" class="form-control" value="" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12"><strong>State:</strong></div>
                        <div class="col-md-12">
                            <input type="text" name="state" class="form-control" value="" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12"><strong>Zip / Postal Code:</strong></div>
                        <div class="col-md-12">
                            <input type="text" name="zip_code" class="form-control" value="" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12"><strong>Phone Number:</strong></div>
                        <div class="col-md-12"><input type="text" name="phone_number" class="form-control" value="" /></div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12"><strong>Email Address:</strong></div>
                        <div class="col-md-12"><input type="text" name="email_address" class="form-control" value="{{auth()->user()->email}}" /></div>
                    </div>
                </div>
            </div>
            <!--SHIPPING METHOD END-->
            <!--CREDIT CART PAYMENT-->
            <div class="panel panel-info">
                
                <div class="panel-body">
                    
                   
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <button type="submit" class="btn btn-primary btn-submit-fix">Place Order</button>
                        </div>
                    </div>
                </div>
            </div>
            <!--CREDIT CART PAYMENT END-->
        </div>

        <div class="col-md-3">

        </div>
    </div>
    </form>

</div>

@endsection