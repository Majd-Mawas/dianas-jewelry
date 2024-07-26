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
                <li><a href="#">Home</a></li>
                <li>Product results</li>
            </ul>
        </div>
        <!-- / container -->
    </div>
    <!-- / body -->

    <div id="body">
        <div class="container">
            <div class="pagination">
                <ul>
                    <li><a href="#"><span class="ico-prev"></span></a></li>
                    <li><a href="#">1</a></li>
                    <li class="active"><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#"><span class="ico-next"></span></a></li>
                </ul>
            </div>
            <div class="products-wrap">
                <aside id="sidebar">
                    <div class="widget">
                        <h3>Products per page:</h3>
                        <fieldset>
                            <input checked type="checkbox">
                            <label>8</label>
                            <input type="checkbox">
                            <label>16</label>
                            <input type="checkbox">
                            <label>32</label>
                        </fieldset>
                    </div>
                    <!-- <div class="widget">
      <h3>Sort by:</h3>
      <fieldset>
       <input checked type="checkbox">
       <label>Popularity</label>
       <input type="checkbox">
       <label>Date</label>
       <input type="checkbox">
       <label>Price</label>
      </fieldset>
     </div> -->
                    <div class="widget">
                        <h3>Condition:</h3>
                        <fieldset>
                            <input checked type="checkbox">
                            <label>New</label>
                            <input type="checkbox">
                            <label>Used</label>
                        </fieldset>
                    </div>
                    <div class="widget">
                        <h3>Price range:</h3>
                        <fieldset>
                            <div id="price-range"></div>
                        </fieldset>
                    </div>
                </aside>
                <div id="content">
                    <section class="products">
                        <article>
                            <a href="product.html"><img
                                    src="./images/New_Fashion_Bohemian_Square_Pearl_Stud_Earring_Mascot_Ornaments.jpeg"
                                    alt=""></a>
                            <h3><a href="product.html">Lorem ipsum dolor</a></h3>
                            <h4><a href="product.html">$990.00</a></h4>
                            <a href="cart.html" class="btn-add">Add to cart</a>
                        </article>
                        <article>
                            <a href="product.html"><img src="./images/9736f881-f5f5-4e35-a007-3f2ad549b476.jpeg"
                                    alt=""></a>
                            <h3><a href="product.html">cupidatat non proident</a></h3>
                            <h4><a href="product.html">$1 200.00</a></h4>
                            <a href="cart.html" class="btn-add">Add to cart</a>
                        </article>
                        <article>
                            <a href="product.html"><img src="./images/734ad9e7-48c4-4b0a-adb7-f39e4c13710e.jpeg"
                                    alt=""></a>
                            <h3><a href="product.html">Duis aute irure</a></h3>
                            <h4><a href="product.html">$2 650.00</a></h4>
                            <a href="cart.html" class="btn-add">Add to cart</a>
                        </article>
                        <article>
                            <a href="product.html"><img src="./images/Banquet Trendy Square Jewelry Set - earrings.jpeg"
                                    alt=""></a>
                            <h3><a href="product.html">magna aliqua</a></h3>
                            <h4><a href="product.html">$3 500.00</a></h4>
                            <a href="cart.html" class="btn-add">Add to cart</a>
                        </article>
                        <article>
                            <a href="product.html"><img src="./images/20240519_222606.jpg" alt=""></a>
                            <h3><a href="product.html">Lorem ipsum dolor</a></h3>
                            <h4><a href="product.html">$1 500.00</a></h4>
                            <a href="cart.html" class="btn-add">Add to cart</a>
                        </article>
                        <article>
                            <a href="product.html"><img src="./images/0b17123f-501d-4151-9ac5-f7f339777806.jpeg"
                                    alt=""></a>
                            <h3><a href="product.html">cupidatat non proident</a></h3>
                            <h4><a href="product.html">$3 200.00</a></h4>
                            <a href="cart.html" class="btn-add">Add to cart</a>
                        </article>
                        <article>
                            <a href="product.html"><img src="./images/20240519_220840.jpg" alt=""></a>
                            <h3><a href="product.html">Duis aute irure</a></h3>
                            <h4><a href="product.html">$2 650.00</a></h4>
                            <a href="cart.html" class="btn-add">Add to cart</a>
                        </article>
                        <article>
                            <a href="product.html"><img src="./images/23e62fe5-2bb0-4f33-8b06-dc37c444ffb4.jpeg"
                                    alt=""></a>
                            <h3><a href="product.html">magna aliqua</a></h3>
                            <h4><a href="product.html">$3 500.00</a></h4>
                            <a href="cart.html" class="btn-add">Add to cart</a>
                        </article>
                    </section>
                </div>
                <!-- / content -->
            </div>
            <div class="pagination">
                <ul>
                    <li><a href="#"><span class="ico-prev"></span></a></li>
                    <li><a href="#">1</a></li>
                    <li class="active"><a href="#">2</a>
                    </li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#"><span class="ico-next"></span></a></li>
                </ul>
            </div>
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
