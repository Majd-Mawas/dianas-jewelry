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

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="shortcut icon" href="{{ asset('images/logos.png') }}" type="image/x-icon">
    <!--[if lt IE 9]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
 <![endif]-->
</head>

<body>

    <header id="header">
        <div class="container">
            <a href="/" id="logo" title="Diana’s jewelry">Diana’s jewelry</a>
            <div class="right-links">
                <ul>
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
                <li><a href="{{ route('list_products') }}">New collection</a></li>
                <li><a href="{{ route('list_products', ['cat' => 'necklaces']) }}">necklaces</a></li>
                <li><a href="{{ route('list_products', ['cat' => 'earrings']) }}">earrings</a></li>
                <li><a href="{{ route('list_products', ['cat' => 'Rings']) }}">Rings</a></li>
                {{-- <li><a href="{{ route('list_products', ['cat' => 'Gift cards']) }}">Gift cards</a></li> --}}
                {{-- <li><a href="{{ route('list_products', ['cat' => 'Promotions']) }}">Promotions</a></li> --}}
            </ul>
        </div>
        <!-- / container -->
    </nav>
    <!-- / navigation -->

    <div id="slider">
        <ul>
            <li style="background-image: url(./images/h20240519_224324.jpg); ">
                <h3>Make your life better</h3>
                <h2>Genuine diamonds</h2>
                <a href="#" class="btn-more">Read more</a>
            </li>
            <li class="purple" style="background-image: url(./images/Google\ Images.jpeg)">
                <h3>She will say “yes”</h3>
                <h2>engagement ring</h2>
                <a href="#" class="btn-more">Read more</a>
            </li>
            <li class="yellow" style="background-image: url(./images/h20240519_220843.jpg)">
                <h3>You deserve to be beauty</h3>
                <h2>golden bracelets</h2>
                <a href="#" class="btn-more">Read more</a>
            </li>
        </ul>
    </div>
    <!-- / body -->

    <div id="body">
        <div class="container">
            <div class="last-products">
                <h2>Last added products</h2>
                <section class="products">
                    @foreach ($latest_products as $product)
                        <article>
                            <img src="{{ asset('storage/' . $product->image) }}" {{-- src="./images/707_17R$_Casamento_de_luxo_zircônia_cúbica_borla_noiva_colar,_brincos.jpeg" --}} alt="">
                            <h3><a href="{{ route('show_product', ['id' => $product->id]) }}"
                                    class="text-secondary">{{ $product->name }}</a>
                            </h3>
                            <h4>${{ Illuminate\Support\Number::format($product->price) }}</h4>
                            <a href="{{ route('add_to_cart', ['item_id' => $product->id]) }}" class="btn-add">Add to
                                cart</a>
                        </article>
                    @endforeach

                    {{-- <article>
                        <img src="{{ asset('images/Diamond 💎.jpeg') }}" alt="">
                        <h3>Lorem ipsum dolor</h3>
                        <h4>$990.00</h4>
                        <a href="cart.html" class="btn-add">Add to cart</a>
                    </article>
                    <article>
                        <img src="{{ asset('images/Diy Crafts Jewelry Necklaces.jpeg') }}" alt="">
                        <h3>cupidatat non proident</h3>
                        <h4>$1 200.00</h4>
                        <a href="cart.html" class="btn-add">Add to cart</a>
                    </article>
                    <article>
                        <img src="./images/31_Amazing_Hand_Crafted_Aesthetic_Fancy_Cute_Jewelry_Designs_Cool.jpeg"
                            alt="">
                        <h3>Duis aute irure</h3>
                        <h4>$2 650.00</h4>
                        <a href="cart.html" class="btn-add">Add to cart</a>
                    </article>
                    <article>
                        <img src="./images/50368bbf-919a-47a7-a460-65c573b62610.jpeg" alt="">
                        <h3>magna aliqua</h3>
                        <h4>$3 500.00</h4>
                        <a href="cart.html" class="btn-add">Add to cart</a>
                    </article> --}}
                </section>
            </div>
            <section class="quick-links">
                <article style="background-image: url(./images/h7246e47a-9e79-4aeb-9b78-a43b5a85d279.jpeg);">
                    <a href="#" class="table">
                        <div class="cell">
                            <div class="text">
                                <h4>Lorem ipsum</h4>
                                <hr>
                                <h3>Dolor sit amet</h3>
                            </div>
                        </div>
                    </a>
                </article>
                <article
                    style="background-image: url(./images/hGreen_Emerald_Gold_Bracelet_Thin_925_Sterling_Silvet_Chain_Bracelet.jpeg); ">
                    <a href="#" class="table">
                        <div class="cell">
                            <div class="text">
                                <h4>consequatur</h4>
                                <hr>
                                <h3>voluptatem</h3>
                                <hr>
                                <p>Accusantium</p>
                            </div>
                        </div>
                    </a>
                </article>
                <article
                    style="background-image: url(./images/hEILIECK_316L_Stainless_Steel_Square_Portrait_Pendant_Necklace_Earrings\ \(1\).jpeg)">
                    <a href="#" class="table">
                        <div class="cell">
                            <div class="text">
                                <h4>culpa qui officia</h4>
                                <hr>
                                <h3>magnam aliquam</h3>
                            </div>
                        </div>
                    </a>
                </article>
            </section>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script>
        window.jQuery || document.write("<script src='{{ asset('js/jquery-1.11.1.min.js') }}'>\x3C/script>")
    </script>
    <script src="{{ asset('js/plugins.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>
