 <!-- Navigation-->
 <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#!">Start Bootstrap</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="#!">{{__('Home')}}</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">{{__('About')}}</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Categories</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @foreach ($headerCategories as $category)
                                <li>
                                    <a class="dropdown-item" href="  {{ route('products.under.category',$category->id) }}">{{$category->name}}</a>
                                </li>
                                @endforeach
                               
                                
                            </ul>
                        </li>
                    </ul>
                  
                        <a class="btn btn-outline-dark" href="{{route('cart.view')}}">
                            <i class="bi-cart-fill me-1"></i>
                            Cart
                            <span class="badge bg-dark text-white ms-1 rounded-pill">
                                @if(session()->has('vcart'))
                                    {{ count(session()->get('vcart')) }}
                                @else
                                0
                                @endif
                            </span>
                        </a>
                  

                @guest
                    <a href="{{route('customer.login')}}" style="margin-left:5px ;">Login</a>
                    <span style="padding: 5px;">|</span>
                    <a href="{{route('customer.registration')}}">Registration</a>
                @endguest

                @auth
                <a href="{{route('customer.logout')}}">Logout </a> |
                <a href="{{route('profile.view')}}"> {{auth()->user()->name}} ({{ auth()->user()->role }})</a>
                @endauth

                <select onchange="window.location.href=this.value;" name="" id="" class="form-control" style="width: min-content; margin-left:10px;">
                    <option @if(session()->get('locale')=='en') selected @endif value="{{route('change.lang','en')}}">
                      EN
                    </option>
                    <option @if(session()->get('locale')=='bn') selected @endif value="{{route('change.lang','bn')}}"> 
                        BN
                    </option>
                    <option @if(session()->get('locale')=='ar') selected @endif value="{{route('change.lang','ar')}}">
                         AR
                    </option>
                </select>

                </div>
            </div>
        </nav>