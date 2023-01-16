<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title')</title>
    @include('home.includes.head')
    @yield('style')
</head>
<!-- Body-->

<body class="handheld-toolbar-enabled">
    <!-- Google Tag Manager (noscript)-->
    <noscript>
        <iframe src="//www.googletagmanager.com/ns.html?id=GTM-WKV3GT5" height="0" width="0"
            style="display: none; visibility: hidden;"></iframe>
    </noscript>
    <!-- Sign in / sign up modal-->
    <div class="modal fade" id="signin-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-secondary">
                    <ul class="nav nav-tabs card-header-tabs" role="tablist">
                        <li class="nav-item"><a class="nav-link fw-medium active" href="#signin-tab"
                                data-bs-toggle="tab" role="tab" aria-selected="true"><i
                                    class="ci-unlocked me-2 mt-n1"></i>Sign in</a></li>
                        <li class="nav-item"><a class="nav-link fw-medium" href="#signup-tab" data-bs-toggle="tab"
                                role="tab" aria-selected="false"><i class="ci-user me-2 mt-n1"></i>Sign up</a></li>
                    </ul>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body tab-content py-4">
                    <form class="needs-validation tab-pane fade show active" autocomplete="off" novalidate
                        id="signin-tab">
                        <div class="mb-3">
                            <label class="form-label" for="si-email">Email address</label>
                            <input class="form-control" type="email" id="si-email" placeholder="johndoe@example.com"
                                required>
                            <div class="invalid-feedback">Please provide a valid email address.</div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="si-password">Password</label>
                            <div class="password-toggle">
                                <input class="form-control" type="password" id="si-password" required>
                                <label class="password-toggle-btn" aria-label="Show/hide password">
                                    <input class="password-toggle-check" type="checkbox"><span
                                        class="password-toggle-indicator"></span>
                                </label>
                            </div>
                        </div>
                        <div class="mb-3 d-flex flex-wrap justify-content-between">
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="si-remember">
                                <label class="form-check-label" for="si-remember">Remember me</label>
                            </div><a class="fs-sm" href="#">Forgot password?</a>
                        </div>
                        <button class="btn btn-primary btn-shadow d-block w-100" type="submit">Sign in</button>
                    </form>
                    <form class="needs-validation tab-pane fade" autocomplete="off" novalidate id="signup-tab">
                        <div class="mb-3">
                            <label class="form-label" for="su-name">Full name</label>
                            <input class="form-control" type="text" id="su-name" placeholder="John Doe" required>
                            <div class="invalid-feedback">Please fill in your name.</div>
                        </div>
                        <div class="mb-3">
                            <label for="su-email">Email address</label>
                            <input class="form-control" type="email" id="su-email" placeholder="johndoe@example.com"
                                required>
                            <div class="invalid-feedback">Please provide a valid email address.</div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="su-password">Password</label>
                            <div class="password-toggle">
                                <input class="form-control" type="password" id="su-password" required>
                                <label class="password-toggle-btn" aria-label="Show/hide password">
                                    <input class="password-toggle-check" type="checkbox"><span
                                        class="password-toggle-indicator"></span>
                                </label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="su-password-confirm">Confirm password</label>
                            <div class="password-toggle">
                                <input class="form-control" type="password" id="su-password-confirm" required>
                                <label class="password-toggle-btn" aria-label="Show/hide password">
                                    <input class="password-toggle-check" type="checkbox"><span
                                        class="password-toggle-indicator"></span>
                                </label>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-shadow d-block w-100" type="submit">Sign up</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <main class="page-wrapper">
        <!-- Quick View Modal start-->
        <div class="modal-quick-view modal fade" id="quick-view-electro" tabindex="-1">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title product-title"><a href="shop-single-v2.html" data-bs-toggle="tooltip"
                                data-bs-placement="right" title="Go to product page">Smartwatch Youth Edition<i
                                    class="ci-arrow-right fs-lg ms-2"></i></a></h4>
                        <button class="btn-close" type="button" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <!-- Product gallery-->
                            <div class="col-lg-7 pe-lg-0">
                                <div class="product-gallery">
                                    <div class="product-gallery-preview order-sm-2">
                                        <div class="product-gallery-preview-item active" id="first"><img
                                                class="image-zoom" src="{{ asset ('home/img/shop/single/gallery/05.jpg')}}"
                                                data-zoom="{{ asset ('home/img/shop/single/gallery/05.jpg')}}" alt="Product image">
                                            <div class="image-zoom-pane"></div>
                                        </div>
                                        <div class="product-gallery-preview-item" id="second"><img
                                                class="image-zoom" src="{{ asset ('home/img/shop/single/gallery/06.jpg')}}"
                                                data-zoom="{{ asset ('home/img/shop/single/gallery/06.jpg')}}" alt="Product image">
                                            <div class="image-zoom-pane"></div>
                                        </div>
                                        <div class="product-gallery-preview-item" id="third"><img
                                                class="image-zoom" src="{{ asset ('home/img/shop/single/gallery/07.jpg')}}"
                                                data-zoom="{{ asset ('home/img/shop/single/gallery/07.jpg')}}" alt="Product image">
                                            <div class="image-zoom-pane"></div>
                                        </div>
                                        <div class="product-gallery-preview-item" id="fourth"><img
                                                class="image-zoom" src="{{ asset ('home/img/shop/single/gallery/08.jpg')}}"
                                                data-zoom="{{ asset ('home/img/shop/single/gallery/08.jpg')}}" alt="Product image">
                                            <div class="image-zoom-pane"></div>
                                        </div>
                                    </div>
                                    <div class="product-gallery-thumblist order-sm-1"><a
                                            class="product-gallery-thumblist-item active" href="#first"><img
                                                src="{{ asset ('home/img/shop/single/gallery/th05.jpg')}}" alt="Product thumb"></a><a
                                            class="product-gallery-thumblist-item" href="#second"><img
                                                src="{{ asset ('home/img/shop/single/gallery/th06.jpg')}}" alt="Product thumb"></a><a
                                            class="product-gallery-thumblist-item" href="#third"><img
                                                src="{{ asset ('home/img/shop/single/gallery/th07.jpg')}}" alt="Product thumb"></a><a
                                            class="product-gallery-thumblist-item" href="#fourth"><img
                                                src="{{ asset ('home/img/shop/single/gallery/th08.jpg')}}" alt="Product thumb"></a></div>
                                </div>
                            </div>
                            <!-- Product details-->
                            <div class="col-lg-5 pt-4 pt-lg-0 image-zoom-pane">
                                <div class="product-details ms-auto pb-3">
                                    <div class="mb-2">
                                        <div class="star-rating"><i
                                                class="star-rating-icon ci-star-filled active"></i><i
                                                class="star-rating-icon ci-star-filled active"></i><i
                                                class="star-rating-icon ci-star-filled active"></i><i
                                                class="star-rating-icon ci-star-filled active"></i><i
                                                class="star-rating-icon ci-star"></i>
                                        </div><span class="d-inline-block fs-sm text-body align-middle mt-1 ms-1">74
                                            Reviews</span>
                                    </div>
                                    <div class="h3 fw-normal text-accent mb-3 me-1">$124.<small>99</small></div>
                                    <div class="fs-sm mb-4"><span
                                            class="text-heading fw-medium me-1">Color:</span><span class="text-muted"
                                            id="colorOptionText">Dark blue/Orange</span></div>
                                    <div class="position-relative me-n4 mb-3">
                                        <div class="form-check form-option form-check-inline mb-2">
                                            <input class="form-check-input" type="radio" name="color"
                                                id="color1" data-bs-label="colorOptionText"
                                                value="Dark blue/Orange" checked>
                                            <label class="form-option-label rounded-circle" for="color1"><span
                                                    class="form-option-color rounded-circle"
                                                    style="background-color: #f25540;"></span></label>
                                        </div>
                                        <div class="form-check form-option form-check-inline mb-2">
                                            <input class="form-check-input" type="radio" name="color"
                                                id="color2" data-bs-label="colorOptionText"
                                                value="Dark gray/Green">
                                            <label class="form-option-label rounded-circle" for="color2"><span
                                                    class="form-option-color rounded-circle"
                                                    style="background-color: #65805b;"></span></label>
                                        </div>
                                        <div class="form-check form-option form-check-inline mb-2">
                                            <input class="form-check-input" type="radio" name="color"
                                                id="color3" data-bs-label="colorOptionText" value="White">
                                            <label class="form-option-label rounded-circle" for="color3"><span
                                                    class="form-option-color rounded-circle"
                                                    style="background-color: #f5f5f5;"></span></label>
                                        </div>
                                        <div class="form-check form-option form-check-inline mb-2">
                                            <input class="form-check-input" type="radio" name="color"
                                                id="color4" data-bs-label="colorOptionText" value="Black">
                                            <label class="form-option-label rounded-circle" for="color4"><span
                                                    class="form-option-color rounded-circle"
                                                    style="background-color: #333;"></span></label>
                                        </div>
                                        <div class="product-badge product-available mt-n1"><i
                                                class="ci-security-check"></i>Product available</div>
                                    </div>
                                    <div class="d-flex align-items-center pt-2 pb-4">
                                        <select class="form-select me-3" style="width: 5rem;">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                        <button class="btn btn-primary btn-shadow d-block w-100" type="button"><i
                                                class="ci-cart fs-lg me-2"></i>Add to Cart</button>
                                    </div>
                                    <div class="d-flex mb-4">
                                        <div class="w-100 me-3">
                                            <button class="btn btn-secondary d-block w-100" type="button"><i
                                                    class="ci-heart fs-lg me-2"></i><span
                                                    class='d-none d-sm-inline'>Add to </span>Wishlist</button>
                                        </div>
                                        <div class="w-100">
                                            <button class="btn btn-secondary d-block w-100" type="button"><i
                                                    class="ci-compare fs-lg me-2"></i>Compare</button>
                                        </div>
                                    </div>
                                    <h5 class="h6 mb-3 py-2 border-bottom"><i
                                            class="ci-announcement text-muted fs-lg align-middle mt-n1 me-2"></i>Product
                                        info</h5>
                                    <h6 class="fs-sm mb-2">General</h6>
                                    <ul class="fs-sm pb-2">
                                        <li><span class="text-muted">Model: </span>Amazfit Smartwatch</li>
                                        <li><span class="text-muted">Gender: </span>Unisex</li>
                                        <li><span class="text-muted">OS campitibility: </span>Android / iOS</li>
                                    </ul>
                                    <h6 class="fs-sm mb-2">Physical specs</h6>
                                    <ul class="fs-sm pb-2">
                                        <li><span class="text-muted">Shape: </span>Rectangular</li>
                                        <li><span class="text-muted">Body material: </span>Plastics / Ceramics</li>
                                        <li><span class="text-muted">Band material: </span>Silicone</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
         <!-- Quick View Modal end-->
        <!-- HEADER start-->
        <header class="shadow-sm">
            <!-- TOP HEAD start-->
            @include('home.includes.header.top_head')
            <!-- TOP HEAD end-->
            
            <!-- Remove "navbar-sticky" class to make navigation bar scrollable with the page.-->
            <div class="navbar-sticky bg-light">
                <!-- MID HEAD start-->
                @include('home.includes.header.mid_head')
                <!-- MID HEAD end-->
               <!-- MENU HEAD start-->
               @include('home.includes.header.menu')
               <!-- MENU HEAD end-->
            </div>
        </header>
         <!-- HEADER end-->
        <!-- start (Banners + Slider)-->
        <section class="bg-secondary py-4 pt-md-5">
            <div class="container py-xl-2">
              <div class="row">
                <!-- Start Slider     -->
                @include('home.includes.banner.slider')
                <!-- End Slider     -->
                <!-- start Banner group-->
                @include('home.includes.banner.banner')
                <!-- end Banner group-->
              </div>
            </div>
          </section>
      <!-- end (Banners + Slider)-->
        @yield('main')
    </main>
    <!--start Footer-->
    @include('home.includes.footer')
    <!--end Footer-->
    <!-- Toolbar for handheld devices (Default)-->
    <div class="handheld-toolbar">
        <div class="d-table table-layout-fixed w-100"><a class="d-table-cell handheld-toolbar-item"
                href="account-wishlist.html"><span class="handheld-toolbar-icon"><i
                        class="ci-heart"></i></span><span class="handheld-toolbar-label">Wishlist</span></a><a
                class="d-table-cell handheld-toolbar-item" href="javascript:void(0)" data-bs-toggle="collapse"
                data-bs-target="#navbarCollapse" onclick="window.scrollTo(0, 0)"><span
                    class="handheld-toolbar-icon"><i class="ci-menu"></i></span><span
                    class="handheld-toolbar-label">Menu</span></a><a class="d-table-cell handheld-toolbar-item"
                href="shop-cart.html"><span class="handheld-toolbar-icon"><i class="ci-cart"></i><span
                        class="badge bg-primary rounded-pill ms-1">4</span></span><span
                    class="handheld-toolbar-label">$265.00</span></a></div>
    </div>
    <!-- Back To Top Button--><a class="btn-scroll-top" href="#top" data-scroll><span
            class="btn-scroll-top-tooltip text-muted fs-sm me-2">Top</span><i
            class="btn-scroll-top-icon ci-arrow-up"> </i></a>
    <!-- start foot script  -->
    @include('home.includes.foot')
    <!-- end foot script  -->
    @yield('script')
</body>

</html>
