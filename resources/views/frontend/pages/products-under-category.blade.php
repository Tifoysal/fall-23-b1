@extends('frontend.master')

@section('content')

<div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">

@if($productsUnderCategory->count()>0)
    @foreach ($productsUnderCategory as $product)

                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Sale badge-->
                            <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div>
                            <!-- Product image-->
                            
                            <a href="{{route('single.product',$product->id)}}">
                                <img class="card-img-top" src="{{url('/uploads/'.$product->image)}}" alt="..." />
                                <!-- Product details-->
                                <div class="card-body p-4">
                                    <div class="text-center">
                                        <!-- Product name-->
                                        <h5 class="fw-bolder">{{$product->name}}</h5>
                                        <!-- Product reviews-->
                                        <div class="d-flex justify-content-center small text-warning mb-2">
                                            <div class="bi-star-fill"></div>
                                            <div class="bi-star-fill"></div>
                                            <div class="bi-star-fill"></div>
                                            <div class="bi-star-fill"></div>
                                            <div class="bi-star-fill"></div>
                                        </div>
                                        <!-- Product price-->
                                        <!-- <span class="text-muted text-decoration-line-through">$20.00</span> -->
                                        {{ $product->price }} .BDT
                                    </div>
                                </div>
                            </a>

                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="{{route('add.toCart',$product->id)}}">Add to cart</a></div>
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="{{route('buy.now',$product->id)}}">Buy Now</a></div>
                            </div>
                        </div>
                    </div>   
                @endforeach

                @else

                    <h1>No product found.</h1>
                @endif


</div>
@endsection