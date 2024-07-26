<!DOCTYPE html>
<!--[if IE 8]> <html class="ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!-->
<html lang="en"> <!--<![endif]-->

<head>
    <meta charset="utf-8">
    <title>Diana’s jewelry</title>
    <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
    <link rel="stylesheet" media="all" href="{{ asset('css/style.css') }}">
    <!--[if lt IE 9]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
 <![endif]-->
</head>

<body>

    <header id="header">
        <div class="container">
            <a href="/" id="logo" title="Diana’s jewelry">Diana’s jewelry</a>
            <div class="right-links">
                <ul class="p-0">
                    @if (isset(auth()->user()->cart))
                        <li><a href="/cart"><span
                                    class="ico-products"></span>{{ count(auth()->user()->cart->items) . ' products, $' . Illuminate\Support\Number::format(auth()->user()->cart->total_amount) }}</a>
                        </li>
                    @endif
                    {{-- <li><a href="#"><span class="ico-account"></span>Account</a></li> --}}
                    <li><a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();"><span
                                class="ico-signout"></span>Sign out</a></li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </ul>
            </div>
        </div>
        <!-- / container -->
    </header>
    <!-- / header -->

    <nav id="menu">
        <div class="container">
            <div class="trigger"></div>
            <ul>
                <li><a href="products.html">New collection</a></li>
                <li><a href="products.html">necklaces</a></li>
                <li><a href="products.html">earrings</a></li>
                <li><a href="products.html">Rings</a></li>
                <li><a href="products.html">Gift cards</a></li>
                <li><a href="products.html">Promotions</a></li>
            </ul>
        </div>
        <!-- / container -->
    </nav>
    <!-- / navigation -->

    <div id="breadcrumbs">
        <div class="container">
            <ul>
                <li><a href="/">Home</a></li>
                <li>Product page</li>
            </ul>
        </div>
        <!-- / container -->
    </div>
    <!-- / body -->

    <div id="body">
        <div class="container">
            <div id="content" class="full">
                <div class="product">
                    <div class="image" style="height: 100%">
                        {{-- <img src="./images/5888493621760609323_121.jpg" alt=""> --}}
                        <img src="{{ asset('storage/' . $product->image) }}" alt="" style="height: 100%">
                    </div>
                    <div class="details">
                        <h1>{{ $product->name }}</h1>
                        <h4>${{ Illuminate\Support\Number::format($product->price) }}</h4>
                        <div class="entry">
                            <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p> -->
                            <div class="tabs">
                                <div class="nav">
                                    <ul>
                                        <li class="active" style="width: 50%"><a href="#desc">Description</a></li>
                                        <li style="width: 50%"><a href="#spec">Specification</a></li>
                                    </ul>
                                </div>
                                <div class="tab-content active" id="desc">
                                    <p>{{ $product->description }}</p>
                                </div>
                                <div class="tab-content" id="spec">
                                    {{-- <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium
                                        doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore
                                        veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam
                                        voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia
                                        consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p> --}}
                                    <ul style="padding-bottom: 1rem">
                                        <li>Weight : {{ $product->weight }}</li>
                                        <li>Material : {{ $product->material }}</li>
                                        <li>Designer : {{ $product->designer->name }}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div>
                            <a href="{{ route('add_to_cart', ['item_id' => $product->id]) }}" class="btn-add btn-grey"
                                style="width: 100%; text-align: center">Add
                                to
                                cart</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- / content -->
        </div>
        <!-- / container -->
    </div>
    <!-- / body -->

    <footer id="footer">
        <div class="container">
            <div class="cols">
                <div class="col">
                    <h3>Frequently Asked Questions</h3>
                    <ul>
                        <li><a href="#">Fusce eget dolor adipiscing </a></li>
                        <li><a href="#">Posuere nisl eu venenatis gravida</a></li>
                        <li><a href="#">Morbi dictum ligula mattis</a></li>
                        <li><a href="#">Etiam diam vel dolor luctus dapibus</a></li>
                        <li><a href="#">Vestibulum ultrices magna </a></li>
                    </ul>
                </div>
                <div class="col media">
                    <h3>Social media</h3>
                    <ul class="social">
                        <li><a href="#"><span class="ico ico-fb"></span>Facebook</a></li>
                        <li><a href="#"><span class="ico ico-tw"></span>Twitter</a></li>
                        <li><a href="#"><span class="ico ico-gp"></span>Google+</a></li>
                        <li><a href="#"><span class="ico ico-pi"></span>Pinterest</a></li>
                    </ul>
                </div>
                <div class="col contact">
                    <h3>Contact us</h3>
                    <p>Diana’s Jewelry INC.<br>54233 Avenue Street<br>New York</p>
                    <p><span class="ico ico-em"></span><a href="#">contact@dianasjewelry.com</a></p>
                    <p><span class="ico ico-ph"></span>(590) 423 446 924</p>
                </div>
                <div class="col newsletter">
                    <h3>Join our newsletter</h3>
                    <p>Sed ut perspiciatis unde omnis iste natus sit voluptatem accusantium doloremque laudantium.</p>
                    <form action="#">
                        <input type="text" placeholder="Your email address...">
                        <button type="submit"></button>
                    </form>
                </div>
            </div>
            <p class="copy">Copyright 2013 Jewelry. All rights reserved.</p>
        </div>
        <!-- / container -->
    </footer>
    <!-- / footer -->


    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script>
        window.jQuery || document.write("<script src='{{ asset('js/jquery-1.11.1.min.js') }}'>\x3C/script>")
    </script>
    <script src="{{ asset('js/plugins.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>
