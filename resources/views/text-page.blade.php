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

    <div id="breadcrumbs">
        <div class="container">
            <ul>
                <li><a href="#">Home</a></li>
                <li>Text page</li>
            </ul>
        </div>
        <!-- / container -->
    </div>
    <!-- / body -->

    <div id="body">
        <div class="container">
            <div id="content" class="full">
                <h1>sed do eiusmod tempor incididunt</h1>
                <div class="entry">
                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,
                        totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae
                        dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut
                        fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque
                        porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia
                        non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut
                        enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut
                        aliquid ex ea commodi consequatur. Quis autem vel eum iure reprehenderit qui in ea voluptate
                        velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla
                        pariatur.</p>
                    <h2>Duis aute irure dolor in reprehenderit </h2>
                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,
                        totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae
                        dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut
                        fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque
                        porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia
                        non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut
                        enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut
                        aliquid ex ea commodi consequatur:</p>
                    <ol>
                        <li>Phasellus vitae enim non quam adipiscing suscipit nec quis mauris.</li>
                        <li>Vivamus feugiat erat vel pellentesque luctus.</li>
                        <li>Nullam ac urna facilisis, fringilla arcu in, sodales velit.</li>
                        <li>Nam tempus nisi ornare urna mollis cursus.</li>
                    </ol>
                    <h2>dignissimos ducimus blanditiis praesentium</h2>
                    <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum
                        deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non
                        provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et
                        dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio <a
                            href="#"><strong>nam libero tempore, cum soluta nobis est eligendi optio cumque nihil
                                impedit</strong></a> quo minus id quod maxime placeat facere possimus, omnis voluptas
                        assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut
                        rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non
                        recusandae. Itaque earum rerum hic tenetur a sapiente delectus.</p>
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
