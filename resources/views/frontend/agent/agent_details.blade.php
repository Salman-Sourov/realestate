@extends('frontend.frontend_dashboard')
@section('main')
    <!--Page Title-->
    <section class="page-title-two bg-color-1 centred">
        <div class="pattern-layer">
            <div class="pattern-1" style="background-image: url({{ asset('frontend') }}/assets/images/shape/shape-9.png);">
            </div>
            <div class="pattern-2" style="background-image: url({{ asset('frontend') }}/assets/images/shape/shape-10.png);">
            </div>
        </div>
        <div class="auto-container">
            <div class="content-box clearfix">
                <h1>{{ $agent->name }} Details</h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="">Home</a></li>
                    <li>{{ $agent->name }} Details</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->


    <!-- agent-details -->
    <section class="agent-details">
        <div class="auto-container">
            <div class="agent-details-content">
                <div class="agents-block-one">
                    <div class="inner-box mr-0">
                        <figure class="image-box"><img
                                src="{{ !empty($agent->photo) ? url('upload/agent_images/' . $agent->photo) : url('upload/no_image.jpg') }}"
                                alt="" style="width:270px; height:330px;"></figure>
                        <div class="content-box">
                            <div class="upper clearfix">
                                <div class="title-inner pull-left">
                                    <h4>{{ $agent->name }}</h4>
                                    <span class="designation">{{ $agent->username }}</span>
                                </div>
                                <ul class="social-list pull-right clearfix">
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                </ul>
                            </div>
                            <div class="text">
                                <p>{{ $agent->description }}</p>
                            </div>
                            <ul class="info clearfix mr-0">
                                <li><i class="fab fa fa-envelope"></i><a href="mailto:{{ $agent->email }}">{{ $agent->email }}</a></li>
                                <li><i class="fab fa fa-phone"></i><a href="tel:{{ $agent->phone }}">{{ $agent->phone }}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- agent-details end -->


    <!-- agents-page-section -->
    <section class="agents-page-section agent-details-page">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                    <div class="agents-content-side tabs-box">
                        <div class="group-title">
                            <h3>Listing By Michael Bean</h3>
                        </div>
                        <div class="item-shorting clearfix">
                            <div class="left-column pull-left">
                                <div class="tab-btn-box">
                                    <ul class="tab-btns tab-buttons centred clearfix">
                                        <li class="tab-btn active-btn" data-tab="#tab-1">Apartments</li>
                                        <li class="tab-btn" data-tab="#tab-2">TownHouse</li>
                                        <li class="tab-btn" data-tab="#tab-3">Office</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="right-column pull-right clearfix">
                                <div class="short-box clearfix">
                                    <div class="select-box">
                                        <select class="wide">
                                            <option data-display="Sort by: Newest">Sort by: Newest</option>
                                            <option value="1">New Arrival</option>
                                            <option value="2">Top Rated</option>
                                            <option value="3">Offer Place</option>
                                            <option value="4">Most Place</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="short-menu clearfix">
                                    <button class="list-view on"><i class="icon-35"></i></button>
                                    <button class="grid-view"><i class="icon-36"></i></button>
                                </div>
                            </div>
                        </div>



                        <div class="tabs-content">
                            <div class="tab active-tab" id="tab-1">
                                <div class="wrapper list">
                                    <div class="deals-list-content list-item">



                                        <div class="deals-block-one">
                                            <div class="inner-box">
                                                <div class="image-box">
                                                    <figure class="image"><img src="assets/images/resource/deals-3.jpg"
                                                            alt=""></figure>
                                                    <div class="batch"><i class="icon-11"></i></div>
                                                    <span class="category">Featured</span>
                                                    <div class="buy-btn"><a href="property-details.html">For Buy</a></div>
                                                </div>
                                                <div class="lower-content">
                                                    <div class="title-text">
                                                        <h4><a href="property-details.html">Villa on Grand Avenue</a></h4>
                                                    </div>
                                                    <div class="price-box clearfix">
                                                        <div class="price-info pull-left">
                                                            <h6>Start From</h6>
                                                            <h4>$30,000.00</h4>
                                                        </div>
                                                        <div class="author-box pull-right">
                                                            <figure class="author-thumb">
                                                                <img src="assets/images/feature/author-1.jpg"
                                                                    alt="">
                                                                <span>Michael Bean</span>
                                                            </figure>
                                                        </div>
                                                    </div>
                                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing sed eiusm do
                                                        tempor incididunt labore.</p>
                                                    <ul class="more-details clearfix">
                                                        <li><i class="icon-14"></i>3 Beds</li>
                                                        <li><i class="icon-15"></i>2 Baths</li>
                                                        <li><i class="icon-16"></i>600 Sq Ft</li>
                                                    </ul>
                                                    <div class="other-info-box clearfix">
                                                        <div class="btn-box pull-left"><a href="property-details.html"
                                                                class="theme-btn btn-two">See Details</a></div>
                                                        <ul class="other-option pull-right clearfix">
                                                            <li><a href="property-details.html"><i
                                                                        class="icon-12"></i></a>
                                                            </li>
                                                            <li><a href="property-details.html"><i
                                                                        class="icon-13"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="deals-block-one">
                                            <div class="inner-box">
                                                <div class="image-box">
                                                    <figure class="image"><img src="assets/images/resource/deals-4.jpg"
                                                            alt=""></figure>
                                                    <div class="batch"><i class="icon-11"></i></div>
                                                    <span class="category">Featured</span>
                                                    <div class="buy-btn"><a href="property-details.html">For Buy</a></div>
                                                </div>
                                                <div class="lower-content">
                                                    <div class="title-text">
                                                        <h4><a href="property-details.html">Contemporary Apartment</a></h4>
                                                    </div>
                                                    <div class="price-box clearfix">
                                                        <div class="price-info pull-left">
                                                            <h6>Start From</h6>
                                                            <h4>$20,000.00</h4>
                                                        </div>
                                                        <div class="author-box pull-right">
                                                            <figure class="author-thumb">
                                                                <img src="assets/images/feature/author-1.jpg"
                                                                    alt="">
                                                                <span>Michael Bean</span>
                                                            </figure>
                                                        </div>
                                                    </div>
                                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing sed eiusm do
                                                        tempor incididunt labore.</p>
                                                    <ul class="more-details clearfix">
                                                        <li><i class="icon-14"></i>3 Beds</li>
                                                        <li><i class="icon-15"></i>2 Baths</li>
                                                        <li><i class="icon-16"></i>600 Sq Ft</li>
                                                    </ul>
                                                    <div class="other-info-box clearfix">
                                                        <div class="btn-box pull-left"><a href="property-details.html"
                                                                class="theme-btn btn-two">See Details</a></div>
                                                        <ul class="other-option pull-right clearfix">
                                                            <li><a href="property-details.html"><i
                                                                        class="icon-12"></i></a></li>
                                                            <li><a href="property-details.html"><i
                                                                        class="icon-13"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="deals-block-one">
                                            <div class="inner-box">
                                                <div class="image-box">
                                                    <figure class="image"><img src="assets/images/resource/deals-5.jpg"
                                                            alt=""></figure>
                                                    <div class="batch"><i class="icon-11"></i></div>
                                                    <span class="category">Featured</span>
                                                    <div class="buy-btn"><a href="property-details.html">For Buy</a></div>
                                                </div>
                                                <div class="lower-content">
                                                    <div class="title-text">
                                                        <h4><a href="property-details.html">Luxury Villa With Pool</a></h4>
                                                    </div>
                                                    <div class="price-box clearfix">
                                                        <div class="price-info pull-left">
                                                            <h6>Start From</h6>
                                                            <h4>$35,000.00</h4>
                                                        </div>
                                                        <div class="author-box pull-right">
                                                            <figure class="author-thumb">
                                                                <img src="assets/images/feature/author-1.jpg"
                                                                    alt="">
                                                                <span>Michael Bean</span>
                                                            </figure>
                                                        </div>
                                                    </div>
                                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing sed eiusm do
                                                        tempor incididunt labore.</p>
                                                    <ul class="more-details clearfix">
                                                        <li><i class="icon-14"></i>3 Beds</li>
                                                        <li><i class="icon-15"></i>2 Baths</li>
                                                        <li><i class="icon-16"></i>600 Sq Ft</li>
                                                    </ul>
                                                    <div class="other-info-box clearfix">
                                                        <div class="btn-box pull-left"><a href="property-details.html"
                                                                class="theme-btn btn-two">See Details</a></div>
                                                        <ul class="other-option pull-right clearfix">
                                                            <li><a href="property-details.html"><i
                                                                        class="icon-12"></i></a></li>
                                                            <li><a href="property-details.html"><i
                                                                        class="icon-13"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="deals-block-one">
                                            <div class="inner-box">
                                                <div class="image-box">
                                                    <figure class="image"><img src="assets/images/resource/deals-6.jpg"
                                                            alt=""></figure>
                                                    <div class="batch"><i class="icon-11"></i></div>
                                                    <span class="category">Featured</span>
                                                    <div class="buy-btn"><a href="property-details.html">For Buy</a></div>
                                                </div>
                                                <div class="lower-content">
                                                    <div class="title-text">
                                                        <h4><a href="property-details.html">Home in Merrick Way</a></h4>
                                                    </div>
                                                    <div class="price-box clearfix">
                                                        <div class="price-info pull-left">
                                                            <h6>Start From</h6>
                                                            <h4>$45,000.00</h4>
                                                        </div>
                                                        <div class="author-box pull-right">
                                                            <figure class="author-thumb">
                                                                <img src="assets/images/feature/author-1.jpg"
                                                                    alt="">
                                                                <span>Michael Bean</span>
                                                            </figure>
                                                        </div>
                                                    </div>
                                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing sed eiusm do
                                                        tempor incididunt labore.</p>
                                                    <ul class="more-details clearfix">
                                                        <li><i class="icon-14"></i>3 Beds</li>
                                                        <li><i class="icon-15"></i>2 Baths</li>
                                                        <li><i class="icon-16"></i>600 Sq Ft</li>
                                                    </ul>
                                                    <div class="other-info-box clearfix">
                                                        <div class="btn-box pull-left"><a href="property-details.html"
                                                                class="theme-btn btn-two">See Details</a></div>
                                                        <ul class="other-option pull-right clearfix">
                                                            <li><a href="property-details.html"><i
                                                                        class="icon-12"></i></a></li>
                                                            <li><a href="property-details.html"><i
                                                                        class="icon-13"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="deals-block-one">
                                            <div class="inner-box">
                                                <div class="image-box">
                                                    <figure class="image"><img src="assets/images/resource/deals-7.jpg"
                                                            alt=""></figure>
                                                    <div class="batch"><i class="icon-11"></i></div>
                                                    <span class="category">Featured</span>
                                                    <div class="buy-btn"><a href="property-details.html">For Buy</a></div>
                                                </div>
                                                <div class="lower-content">
                                                    <div class="title-text">
                                                        <h4><a href="property-details.html">Apartment in Glasgow</a></h4>
                                                    </div>
                                                    <div class="price-box clearfix">
                                                        <div class="price-info pull-left">
                                                            <h6>Start From</h6>
                                                            <h4>$40,000.00</h4>
                                                        </div>
                                                        <div class="author-box pull-right">
                                                            <figure class="author-thumb">
                                                                <img src="assets/images/feature/author-1.jpg"
                                                                    alt="">
                                                                <span>Michael Bean</span>
                                                            </figure>
                                                        </div>
                                                    </div>
                                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing sed eiusm do
                                                        tempor incididunt labore.</p>
                                                    <ul class="more-details clearfix">
                                                        <li><i class="icon-14"></i>3 Beds</li>
                                                        <li><i class="icon-15"></i>2 Baths</li>
                                                        <li><i class="icon-16"></i>600 Sq Ft</li>
                                                    </ul>
                                                    <div class="other-info-box clearfix">
                                                        <div class="btn-box pull-left"><a href="property-details.html"
                                                                class="theme-btn btn-two">See Details</a></div>
                                                        <ul class="other-option pull-right clearfix">
                                                            <li><a href="property-details.html"><i
                                                                        class="icon-12"></i></a></li>
                                                            <li><a href="property-details.html"><i
                                                                        class="icon-13"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="deals-grid-content">
                                        <div class="row clearfix">
                                            <div class="col-lg-6 col-md-6 col-sm-12 feature-block">
                                                <div class="feature-block-one">
                                                    <div class="inner-box">
                                                        <div class="image-box">
                                                            <figure class="image"><img
                                                                    src="assets/images/feature/feature-1.jpg"
                                                                    alt=""></figure>
                                                            <div class="batch"><i class="icon-11"></i></div>
                                                            <span class="category">Featured</span>
                                                        </div>
                                                        <div class="lower-content">
                                                            <div class="author-info clearfix">
                                                                <div class="author pull-left">
                                                                    <figure class="author-thumb"><img
                                                                            src="assets/images/feature/author-1.jpg"
                                                                            alt=""></figure>
                                                                    <h6>Michael Bean</h6>
                                                                </div>
                                                                <div class="buy-btn pull-right"><a
                                                                        href="property-details.html">For Buy</a></div>
                                                            </div>
                                                            <div class="title-text">
                                                                <h4><a href="property-details.html">Luxury Villa With
                                                                        Pool</a></h4>
                                                            </div>
                                                            <div class="price-box clearfix">
                                                                <div class="price-info pull-left">
                                                                    <h6>Start From</h6>
                                                                    <h4>$30,000.00</h4>
                                                                </div>
                                                                <ul class="other-option pull-right clearfix">
                                                                    <li><a href="property-details.html"><i
                                                                                class="icon-12"></i></a></li>
                                                                    <li><a href="property-details.html"><i
                                                                                class="icon-13"></i></a></li>
                                                                </ul>
                                                            </div>
                                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing sed.</p>
                                                            <ul class="more-details clearfix">
                                                                <li><i class="icon-14"></i>3 Beds</li>
                                                                <li><i class="icon-15"></i>2 Baths</li>
                                                                <li><i class="icon-16"></i>600 Sq Ft</li>
                                                            </ul>
                                                            <div class="btn-box"><a href="property-details.html"
                                                                    class="theme-btn btn-two">See Details</a></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12 feature-block">
                                                <div class="feature-block-one">
                                                    <div class="inner-box">
                                                        <div class="image-box">
                                                            <figure class="image"><img
                                                                    src="assets/images/feature/feature-2.jpg"
                                                                    alt=""></figure>
                                                            <div class="batch"><i class="icon-11"></i></div>
                                                            <span class="category">Featured</span>
                                                        </div>
                                                        <div class="lower-content">
                                                            <div class="author-info clearfix">
                                                                <div class="author pull-left">
                                                                    <figure class="author-thumb"><img
                                                                            src="assets/images/feature/author-2.jpg"
                                                                            alt=""></figure>
                                                                    <h6>Robert Niro</h6>
                                                                </div>
                                                                <div class="buy-btn pull-right"><a
                                                                        href="property-details.html">For Rent</a></div>
                                                            </div>
                                                            <div class="title-text">
                                                                <h4><a href="property-details.html">Contemporary
                                                                        Apartment</a></h4>
                                                            </div>
                                                            <div class="price-box clearfix">
                                                                <div class="price-info pull-left">
                                                                    <h6>Start From</h6>
                                                                    <h4>$45,000.00</h4>
                                                                </div>
                                                                <ul class="other-option pull-right clearfix">
                                                                    <li><a href="property-details.html"><i
                                                                                class="icon-12"></i></a></li>
                                                                    <li><a href="property-details.html"><i
                                                                                class="icon-13"></i></a></li>
                                                                </ul>
                                                            </div>
                                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing sed.</p>
                                                            <ul class="more-details clearfix">
                                                                <li><i class="icon-14"></i>3 Beds</li>
                                                                <li><i class="icon-15"></i>2 Baths</li>
                                                                <li><i class="icon-16"></i>600 Sq Ft</li>
                                                            </ul>
                                                            <div class="btn-box"><a href="property-details.html"
                                                                    class="theme-btn btn-two">See Details</a></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12 feature-block">
                                                <div class="feature-block-one">
                                                    <div class="inner-box">
                                                        <div class="image-box">
                                                            <figure class="image"><img
                                                                    src="assets/images/feature/feature-3.jpg"
                                                                    alt=""></figure>
                                                            <div class="batch"><i class="icon-11"></i></div>
                                                            <span class="category">Featured</span>
                                                        </div>
                                                        <div class="lower-content">
                                                            <div class="author-info clearfix">
                                                                <div class="author pull-left">
                                                                    <figure class="author-thumb"><img
                                                                            src="assets/images/feature/author-3.jpg"
                                                                            alt=""></figure>
                                                                    <h6>Keira Mel</h6>
                                                                </div>
                                                                <div class="buy-btn pull-right"><a
                                                                        href="property-details.html">Sold Out</a></div>
                                                            </div>
                                                            <div class="title-text">
                                                                <h4><a href="property-details.html">Villa on Grand
                                                                        Avenue</a></h4>
                                                            </div>
                                                            <div class="price-box clearfix">
                                                                <div class="price-info pull-left">
                                                                    <h6>Start From</h6>
                                                                    <h4>$63,000.00</h4>
                                                                </div>
                                                                <ul class="other-option pull-right clearfix">
                                                                    <li><a href="property-details.html"><i
                                                                                class="icon-12"></i></a></li>
                                                                    <li><a href="property-details.html"><i
                                                                                class="icon-13"></i></a></li>
                                                                </ul>
                                                            </div>
                                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing sed.</p>
                                                            <ul class="more-details clearfix">
                                                                <li><i class="icon-14"></i>3 Beds</li>
                                                                <li><i class="icon-15"></i>2 Baths</li>
                                                                <li><i class="icon-16"></i>600 Sq Ft</li>
                                                            </ul>
                                                            <div class="btn-box"><a href="property-details.html"
                                                                    class="theme-btn btn-two">See Details</a></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12 feature-block">
                                                <div class="feature-block-one">
                                                    <div class="inner-box">
                                                        <div class="image-box">
                                                            <figure class="image"><img
                                                                    src="assets/images/feature/feature-4.jpg"
                                                                    alt=""></figure>
                                                            <div class="batch"><i class="icon-11"></i></div>
                                                            <span class="category">Featured</span>
                                                        </div>
                                                        <div class="lower-content">
                                                            <div class="author-info clearfix">
                                                                <div class="author pull-left">
                                                                    <figure class="author-thumb"><img
                                                                            src="assets/images/feature/author-1.jpg"
                                                                            alt=""></figure>
                                                                    <h6>Michael Bean</h6>
                                                                </div>
                                                                <div class="buy-btn pull-right"><a
                                                                        href="property-details.html">For Buy</a></div>
                                                            </div>
                                                            <div class="title-text">
                                                                <h4><a href="property-details.html">Home in Merrick Way</a>
                                                                </h4>
                                                            </div>
                                                            <div class="price-box clearfix">
                                                                <div class="price-info pull-left">
                                                                    <h6>Start From</h6>
                                                                    <h4>$30,000.00</h4>
                                                                </div>
                                                                <ul class="other-option pull-right clearfix">
                                                                    <li><a href="property-details.html"><i
                                                                                class="icon-12"></i></a></li>
                                                                    <li><a href="property-details.html"><i
                                                                                class="icon-13"></i></a></li>
                                                                </ul>
                                                            </div>
                                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing sed.</p>
                                                            <ul class="more-details clearfix">
                                                                <li><i class="icon-14"></i>3 Beds</li>
                                                                <li><i class="icon-15"></i>2 Baths</li>
                                                                <li><i class="icon-16"></i>600 Sq Ft</li>
                                                            </ul>
                                                            <div class="btn-box"><a href="property-details.html"
                                                                    class="theme-btn btn-two">See Details</a></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12 feature-block">
                                                <div class="feature-block-one">
                                                    <div class="inner-box">
                                                        <div class="image-box">
                                                            <figure class="image"><img
                                                                    src="assets/images/feature/feature-5.jpg"
                                                                    alt=""></figure>
                                                            <div class="batch"><i class="icon-11"></i></div>
                                                            <span class="category">Featured</span>
                                                        </div>
                                                        <div class="lower-content">
                                                            <div class="author-info clearfix">
                                                                <div class="author pull-left">
                                                                    <figure class="author-thumb"><img
                                                                            src="assets/images/feature/author-2.jpg"
                                                                            alt=""></figure>
                                                                    <h6>Robert Niro</h6>
                                                                </div>
                                                                <div class="buy-btn pull-right"><a
                                                                        href="property-details.html">For Rent</a></div>
                                                            </div>
                                                            <div class="title-text">
                                                                <h4><a href="property-details.html">Apartment in
                                                                        Glasgow</a></h4>
                                                            </div>
                                                            <div class="price-box clearfix">
                                                                <div class="price-info pull-left">
                                                                    <h6>Start From</h6>
                                                                    <h4>$45,000.00</h4>
                                                                </div>
                                                                <ul class="other-option pull-right clearfix">
                                                                    <li><a href="property-details.html"><i
                                                                                class="icon-12"></i></a></li>
                                                                    <li><a href="property-details.html"><i
                                                                                class="icon-13"></i></a></li>
                                                                </ul>
                                                            </div>
                                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing sed.</p>
                                                            <ul class="more-details clearfix">
                                                                <li><i class="icon-14"></i>3 Beds</li>
                                                                <li><i class="icon-15"></i>2 Baths</li>
                                                                <li><i class="icon-16"></i>600 Sq Ft</li>
                                                            </ul>
                                                            <div class="btn-box"><a href="property-details.html"
                                                                    class="theme-btn btn-two">See Details</a></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12 feature-block">
                                                <div class="feature-block-one">
                                                    <div class="inner-box">
                                                        <div class="image-box">
                                                            <figure class="image"><img
                                                                    src="assets/images/feature/feature-6.jpg"
                                                                    alt=""></figure>
                                                            <div class="batch"><i class="icon-11"></i></div>
                                                            <span class="category">Featured</span>
                                                        </div>
                                                        <div class="lower-content">
                                                            <div class="author-info clearfix">
                                                                <div class="author pull-left">
                                                                    <figure class="author-thumb"><img
                                                                            src="assets/images/feature/author-3.jpg"
                                                                            alt=""></figure>
                                                                    <h6>Keira Mel</h6>
                                                                </div>
                                                                <div class="buy-btn pull-right"><a
                                                                        href="property-details.html">Sold Out</a></div>
                                                            </div>
                                                            <div class="title-text">
                                                                <h4><a href="property-details.html">Family Home For
                                                                        Sale</a></h4>
                                                            </div>
                                                            <div class="price-box clearfix">
                                                                <div class="price-info pull-left">
                                                                    <h6>Start From</h6>
                                                                    <h4>$63,000.00</h4>
                                                                </div>
                                                                <ul class="other-option pull-right clearfix">
                                                                    <li><a href="property-details.html"><i
                                                                                class="icon-12"></i></a></li>
                                                                    <li><a href="property-details.html"><i
                                                                                class="icon-13"></i></a></li>
                                                                </ul>
                                                            </div>
                                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing sed.</p>
                                                            <ul class="more-details clearfix">
                                                                <li><i class="icon-14"></i>3 Beds</li>
                                                                <li><i class="icon-15"></i>2 Baths</li>
                                                                <li><i class="icon-16"></i>600 Sq Ft</li>
                                                            </ul>
                                                            <div class="btn-box"><a href="property-details.html"
                                                                    class="theme-btn btn-two">See Details</a></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab" id="tab-2">
                                <div class="wrapper list">
                                    <div class="deals-list-content list-item">
                                        <div class="deals-block-one">
                                            <div class="inner-box">
                                                <div class="image-box">
                                                    <figure class="image"><img src="assets/images/resource/deals-3.jpg"
                                                            alt=""></figure>
                                                    <div class="batch"><i class="icon-11"></i></div>
                                                    <span class="category">Featured</span>
                                                    <div class="buy-btn"><a href="property-details.html">For Buy</a></div>
                                                </div>
                                                <div class="lower-content">
                                                    <div class="title-text">
                                                        <h4><a href="property-details.html">Villa on Grand Avenue</a></h4>
                                                    </div>
                                                    <div class="price-box clearfix">
                                                        <div class="price-info pull-left">
                                                            <h6>Start From</h6>
                                                            <h4>$30,000.00</h4>
                                                        </div>
                                                        <div class="author-box pull-right">
                                                            <figure class="author-thumb">
                                                                <img src="assets/images/feature/author-1.jpg"
                                                                    alt="">
                                                                <span>Michael Bean</span>
                                                            </figure>
                                                        </div>
                                                    </div>
                                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing sed eiusm do
                                                        tempor incididunt labore.</p>
                                                    <ul class="more-details clearfix">
                                                        <li><i class="icon-14"></i>3 Beds</li>
                                                        <li><i class="icon-15"></i>2 Baths</li>
                                                        <li><i class="icon-16"></i>600 Sq Ft</li>
                                                    </ul>
                                                    <div class="other-info-box clearfix">
                                                        <div class="btn-box pull-left"><a href="property-details.html"
                                                                class="theme-btn btn-two">See Details</a></div>
                                                        <ul class="other-option pull-right clearfix">
                                                            <li><a href="property-details.html"><i
                                                                        class="icon-12"></i></a></li>
                                                            <li><a href="property-details.html"><i
                                                                        class="icon-13"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="deals-block-one">
                                            <div class="inner-box">
                                                <div class="image-box">
                                                    <figure class="image"><img src="assets/images/resource/deals-4.jpg"
                                                            alt=""></figure>
                                                    <div class="batch"><i class="icon-11"></i></div>
                                                    <span class="category">Featured</span>
                                                    <div class="buy-btn"><a href="property-details.html">For Buy</a></div>
                                                </div>
                                                <div class="lower-content">
                                                    <div class="title-text">
                                                        <h4><a href="property-details.html">Contemporary Apartment</a></h4>
                                                    </div>
                                                    <div class="price-box clearfix">
                                                        <div class="price-info pull-left">
                                                            <h6>Start From</h6>
                                                            <h4>$20,000.00</h4>
                                                        </div>
                                                        <div class="author-box pull-right">
                                                            <figure class="author-thumb">
                                                                <img src="assets/images/feature/author-1.jpg"
                                                                    alt="">
                                                                <span>Michael Bean</span>
                                                            </figure>
                                                        </div>
                                                    </div>
                                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing sed eiusm do
                                                        tempor incididunt labore.</p>
                                                    <ul class="more-details clearfix">
                                                        <li><i class="icon-14"></i>3 Beds</li>
                                                        <li><i class="icon-15"></i>2 Baths</li>
                                                        <li><i class="icon-16"></i>600 Sq Ft</li>
                                                    </ul>
                                                    <div class="other-info-box clearfix">
                                                        <div class="btn-box pull-left"><a href="property-details.html"
                                                                class="theme-btn btn-two">See Details</a></div>
                                                        <ul class="other-option pull-right clearfix">
                                                            <li><a href="property-details.html"><i
                                                                        class="icon-12"></i></a></li>
                                                            <li><a href="property-details.html"><i
                                                                        class="icon-13"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="deals-block-one">
                                            <div class="inner-box">
                                                <div class="image-box">
                                                    <figure class="image"><img src="assets/images/resource/deals-5.jpg"
                                                            alt=""></figure>
                                                    <div class="batch"><i class="icon-11"></i></div>
                                                    <span class="category">Featured</span>
                                                    <div class="buy-btn"><a href="property-details.html">For Buy</a></div>
                                                </div>
                                                <div class="lower-content">
                                                    <div class="title-text">
                                                        <h4><a href="property-details.html">Luxury Villa With Pool</a></h4>
                                                    </div>
                                                    <div class="price-box clearfix">
                                                        <div class="price-info pull-left">
                                                            <h6>Start From</h6>
                                                            <h4>$35,000.00</h4>
                                                        </div>
                                                        <div class="author-box pull-right">
                                                            <figure class="author-thumb">
                                                                <img src="assets/images/feature/author-1.jpg"
                                                                    alt="">
                                                                <span>Michael Bean</span>
                                                            </figure>
                                                        </div>
                                                    </div>
                                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing sed eiusm do
                                                        tempor incididunt labore.</p>
                                                    <ul class="more-details clearfix">
                                                        <li><i class="icon-14"></i>3 Beds</li>
                                                        <li><i class="icon-15"></i>2 Baths</li>
                                                        <li><i class="icon-16"></i>600 Sq Ft</li>
                                                    </ul>
                                                    <div class="other-info-box clearfix">
                                                        <div class="btn-box pull-left"><a href="property-details.html"
                                                                class="theme-btn btn-two">See Details</a></div>
                                                        <ul class="other-option pull-right clearfix">
                                                            <li><a href="property-details.html"><i
                                                                        class="icon-12"></i></a></li>
                                                            <li><a href="property-details.html"><i
                                                                        class="icon-13"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="deals-block-one">
                                            <div class="inner-box">
                                                <div class="image-box">
                                                    <figure class="image"><img src="assets/images/resource/deals-6.jpg"
                                                            alt=""></figure>
                                                    <div class="batch"><i class="icon-11"></i></div>
                                                    <span class="category">Featured</span>
                                                    <div class="buy-btn"><a href="property-details.html">For Buy</a></div>
                                                </div>
                                                <div class="lower-content">
                                                    <div class="title-text">
                                                        <h4><a href="property-details.html">Home in Merrick Way</a></h4>
                                                    </div>
                                                    <div class="price-box clearfix">
                                                        <div class="price-info pull-left">
                                                            <h6>Start From</h6>
                                                            <h4>$45,000.00</h4>
                                                        </div>
                                                        <div class="author-box pull-right">
                                                            <figure class="author-thumb">
                                                                <img src="assets/images/feature/author-1.jpg"
                                                                    alt="">
                                                                <span>Michael Bean</span>
                                                            </figure>
                                                        </div>
                                                    </div>
                                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing sed eiusm do
                                                        tempor incididunt labore.</p>
                                                    <ul class="more-details clearfix">
                                                        <li><i class="icon-14"></i>3 Beds</li>
                                                        <li><i class="icon-15"></i>2 Baths</li>
                                                        <li><i class="icon-16"></i>600 Sq Ft</li>
                                                    </ul>
                                                    <div class="other-info-box clearfix">
                                                        <div class="btn-box pull-left"><a href="property-details.html"
                                                                class="theme-btn btn-two">See Details</a></div>
                                                        <ul class="other-option pull-right clearfix">
                                                            <li><a href="property-details.html"><i
                                                                        class="icon-12"></i></a></li>
                                                            <li><a href="property-details.html"><i
                                                                        class="icon-13"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="deals-block-one">
                                            <div class="inner-box">
                                                <div class="image-box">
                                                    <figure class="image"><img src="assets/images/resource/deals-7.jpg"
                                                            alt=""></figure>
                                                    <div class="batch"><i class="icon-11"></i></div>
                                                    <span class="category">Featured</span>
                                                    <div class="buy-btn"><a href="property-details.html">For Buy</a></div>
                                                </div>
                                                <div class="lower-content">
                                                    <div class="title-text">
                                                        <h4><a href="property-details.html">Apartment in Glasgow</a></h4>
                                                    </div>
                                                    <div class="price-box clearfix">
                                                        <div class="price-info pull-left">
                                                            <h6>Start From</h6>
                                                            <h4>$40,000.00</h4>
                                                        </div>
                                                        <div class="author-box pull-right">
                                                            <figure class="author-thumb">
                                                                <img src="assets/images/feature/author-1.jpg"
                                                                    alt="">
                                                                <span>Michael Bean</span>
                                                            </figure>
                                                        </div>
                                                    </div>
                                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing sed eiusm do
                                                        tempor incididunt labore.</p>
                                                    <ul class="more-details clearfix">
                                                        <li><i class="icon-14"></i>3 Beds</li>
                                                        <li><i class="icon-15"></i>2 Baths</li>
                                                        <li><i class="icon-16"></i>600 Sq Ft</li>
                                                    </ul>
                                                    <div class="other-info-box clearfix">
                                                        <div class="btn-box pull-left"><a href="property-details.html"
                                                                class="theme-btn btn-two">See Details</a></div>
                                                        <ul class="other-option pull-right clearfix">
                                                            <li><a href="property-details.html"><i
                                                                        class="icon-12"></i></a></li>
                                                            <li><a href="property-details.html"><i
                                                                        class="icon-13"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="deals-grid-content">
                                        <div class="row clearfix">
                                            <div class="col-lg-6 col-md-6 col-sm-12 feature-block">
                                                <div class="feature-block-one">
                                                    <div class="inner-box">
                                                        <div class="image-box">
                                                            <figure class="image"><img
                                                                    src="assets/images/feature/feature-1.jpg"
                                                                    alt=""></figure>
                                                            <div class="batch"><i class="icon-11"></i></div>
                                                            <span class="category">Featured</span>
                                                        </div>
                                                        <div class="lower-content">
                                                            <div class="author-info clearfix">
                                                                <div class="author pull-left">
                                                                    <figure class="author-thumb"><img
                                                                            src="assets/images/feature/author-1.jpg"
                                                                            alt=""></figure>
                                                                    <h6>Michael Bean</h6>
                                                                </div>
                                                                <div class="buy-btn pull-right"><a
                                                                        href="property-details.html">For Buy</a></div>
                                                            </div>
                                                            <div class="title-text">
                                                                <h4><a href="property-details.html">Luxury Villa With
                                                                        Pool</a></h4>
                                                            </div>
                                                            <div class="price-box clearfix">
                                                                <div class="price-info pull-left">
                                                                    <h6>Start From</h6>
                                                                    <h4>$30,000.00</h4>
                                                                </div>
                                                                <ul class="other-option pull-right clearfix">
                                                                    <li><a href="property-details.html"><i
                                                                                class="icon-12"></i></a></li>
                                                                    <li><a href="property-details.html"><i
                                                                                class="icon-13"></i></a></li>
                                                                </ul>
                                                            </div>
                                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing sed.</p>
                                                            <ul class="more-details clearfix">
                                                                <li><i class="icon-14"></i>3 Beds</li>
                                                                <li><i class="icon-15"></i>2 Baths</li>
                                                                <li><i class="icon-16"></i>600 Sq Ft</li>
                                                            </ul>
                                                            <div class="btn-box"><a href="property-details.html"
                                                                    class="theme-btn btn-two">See Details</a></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12 feature-block">
                                                <div class="feature-block-one">
                                                    <div class="inner-box">
                                                        <div class="image-box">
                                                            <figure class="image"><img
                                                                    src="assets/images/feature/feature-2.jpg"
                                                                    alt=""></figure>
                                                            <div class="batch"><i class="icon-11"></i></div>
                                                            <span class="category">Featured</span>
                                                        </div>
                                                        <div class="lower-content">
                                                            <div class="author-info clearfix">
                                                                <div class="author pull-left">
                                                                    <figure class="author-thumb"><img
                                                                            src="assets/images/feature/author-2.jpg"
                                                                            alt=""></figure>
                                                                    <h6>Robert Niro</h6>
                                                                </div>
                                                                <div class="buy-btn pull-right"><a
                                                                        href="property-details.html">For Rent</a></div>
                                                            </div>
                                                            <div class="title-text">
                                                                <h4><a href="property-details.html">Contemporary
                                                                        Apartment</a></h4>
                                                            </div>
                                                            <div class="price-box clearfix">
                                                                <div class="price-info pull-left">
                                                                    <h6>Start From</h6>
                                                                    <h4>$45,000.00</h4>
                                                                </div>
                                                                <ul class="other-option pull-right clearfix">
                                                                    <li><a href="property-details.html"><i
                                                                                class="icon-12"></i></a></li>
                                                                    <li><a href="property-details.html"><i
                                                                                class="icon-13"></i></a></li>
                                                                </ul>
                                                            </div>
                                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing sed.</p>
                                                            <ul class="more-details clearfix">
                                                                <li><i class="icon-14"></i>3 Beds</li>
                                                                <li><i class="icon-15"></i>2 Baths</li>
                                                                <li><i class="icon-16"></i>600 Sq Ft</li>
                                                            </ul>
                                                            <div class="btn-box"><a href="property-details.html"
                                                                    class="theme-btn btn-two">See Details</a></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12 feature-block">
                                                <div class="feature-block-one">
                                                    <div class="inner-box">
                                                        <div class="image-box">
                                                            <figure class="image"><img
                                                                    src="assets/images/feature/feature-3.jpg"
                                                                    alt=""></figure>
                                                            <div class="batch"><i class="icon-11"></i></div>
                                                            <span class="category">Featured</span>
                                                        </div>
                                                        <div class="lower-content">
                                                            <div class="author-info clearfix">
                                                                <div class="author pull-left">
                                                                    <figure class="author-thumb"><img
                                                                            src="assets/images/feature/author-3.jpg"
                                                                            alt=""></figure>
                                                                    <h6>Keira Mel</h6>
                                                                </div>
                                                                <div class="buy-btn pull-right"><a
                                                                        href="property-details.html">Sold Out</a></div>
                                                            </div>
                                                            <div class="title-text">
                                                                <h4><a href="property-details.html">Luxury Villa With
                                                                        Pool</a></h4>
                                                            </div>
                                                            <div class="price-box clearfix">
                                                                <div class="price-info pull-left">
                                                                    <h6>Start From</h6>
                                                                    <h4>$63,000.00</h4>
                                                                </div>
                                                                <ul class="other-option pull-right clearfix">
                                                                    <li><a href="property-details.html"><i
                                                                                class="icon-12"></i></a></li>
                                                                    <li><a href="property-details.html"><i
                                                                                class="icon-13"></i></a></li>
                                                                </ul>
                                                            </div>
                                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing sed.</p>
                                                            <ul class="more-details clearfix">
                                                                <li><i class="icon-14"></i>3 Beds</li>
                                                                <li><i class="icon-15"></i>2 Baths</li>
                                                                <li><i class="icon-16"></i>600 Sq Ft</li>
                                                            </ul>
                                                            <div class="btn-box"><a href="property-details.html"
                                                                    class="theme-btn btn-two">See Details</a></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12 feature-block">
                                                <div class="feature-block-one">
                                                    <div class="inner-box">
                                                        <div class="image-box">
                                                            <figure class="image"><img
                                                                    src="assets/images/feature/feature-4.jpg"
                                                                    alt=""></figure>
                                                            <div class="batch"><i class="icon-11"></i></div>
                                                            <span class="category">Featured</span>
                                                        </div>
                                                        <div class="lower-content">
                                                            <div class="author-info clearfix">
                                                                <div class="author pull-left">
                                                                    <figure class="author-thumb"><img
                                                                            src="assets/images/feature/author-1.jpg"
                                                                            alt=""></figure>
                                                                    <h6>Michael Bean</h6>
                                                                </div>
                                                                <div class="buy-btn pull-right"><a
                                                                        href="property-details.html">For Buy</a></div>
                                                            </div>
                                                            <div class="title-text">
                                                                <h4><a href="property-details.html">Home in Merrick Way</a>
                                                                </h4>
                                                            </div>
                                                            <div class="price-box clearfix">
                                                                <div class="price-info pull-left">
                                                                    <h6>Start From</h6>
                                                                    <h4>$30,000.00</h4>
                                                                </div>
                                                                <ul class="other-option pull-right clearfix">
                                                                    <li><a href="property-details.html"><i
                                                                                class="icon-12"></i></a></li>
                                                                    <li><a href="property-details.html"><i
                                                                                class="icon-13"></i></a></li>
                                                                </ul>
                                                            </div>
                                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing sed.</p>
                                                            <ul class="more-details clearfix">
                                                                <li><i class="icon-14"></i>3 Beds</li>
                                                                <li><i class="icon-15"></i>2 Baths</li>
                                                                <li><i class="icon-16"></i>600 Sq Ft</li>
                                                            </ul>
                                                            <div class="btn-box"><a href="property-details.html"
                                                                    class="theme-btn btn-two">See Details</a></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12 feature-block">
                                                <div class="feature-block-one">
                                                    <div class="inner-box">
                                                        <div class="image-box">
                                                            <figure class="image"><img
                                                                    src="assets/images/feature/feature-5.jpg"
                                                                    alt=""></figure>
                                                            <div class="batch"><i class="icon-11"></i></div>
                                                            <span class="category">Featured</span>
                                                        </div>
                                                        <div class="lower-content">
                                                            <div class="author-info clearfix">
                                                                <div class="author pull-left">
                                                                    <figure class="author-thumb"><img
                                                                            src="assets/images/feature/author-2.jpg"
                                                                            alt=""></figure>
                                                                    <h6>Robert Niro</h6>
                                                                </div>
                                                                <div class="buy-btn pull-right"><a
                                                                        href="property-details.html">For Rent</a></div>
                                                            </div>
                                                            <div class="title-text">
                                                                <h4><a href="property-details.html">Apartment in
                                                                        Glasgow</a></h4>
                                                            </div>
                                                            <div class="price-box clearfix">
                                                                <div class="price-info pull-left">
                                                                    <h6>Start From</h6>
                                                                    <h4>$45,000.00</h4>
                                                                </div>
                                                                <ul class="other-option pull-right clearfix">
                                                                    <li><a href="property-details.html"><i
                                                                                class="icon-12"></i></a></li>
                                                                    <li><a href="property-details.html"><i
                                                                                class="icon-13"></i></a></li>
                                                                </ul>
                                                            </div>
                                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing sed.</p>
                                                            <ul class="more-details clearfix">
                                                                <li><i class="icon-14"></i>3 Beds</li>
                                                                <li><i class="icon-15"></i>2 Baths</li>
                                                                <li><i class="icon-16"></i>600 Sq Ft</li>
                                                            </ul>
                                                            <div class="btn-box"><a href="property-details.html"
                                                                    class="theme-btn btn-two">See Details</a></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12 feature-block">
                                                <div class="feature-block-one">
                                                    <div class="inner-box">
                                                        <div class="image-box">
                                                            <figure class="image"><img
                                                                    src="assets/images/feature/feature-6.jpg"
                                                                    alt=""></figure>
                                                            <div class="batch"><i class="icon-11"></i></div>
                                                            <span class="category">Featured</span>
                                                        </div>
                                                        <div class="lower-content">
                                                            <div class="author-info clearfix">
                                                                <div class="author pull-left">
                                                                    <figure class="author-thumb"><img
                                                                            src="assets/images/feature/author-3.jpg"
                                                                            alt=""></figure>
                                                                    <h6>Keira Mel</h6>
                                                                </div>
                                                                <div class="buy-btn pull-right"><a
                                                                        href="property-details.html">Sold Out</a></div>
                                                            </div>
                                                            <div class="title-text">
                                                                <h4><a href="property-details.html">Family Home For
                                                                        Sale</a></h4>
                                                            </div>
                                                            <div class="price-box clearfix">
                                                                <div class="price-info pull-left">
                                                                    <h6>Start From</h6>
                                                                    <h4>$63,000.00</h4>
                                                                </div>
                                                                <ul class="other-option pull-right clearfix">
                                                                    <li><a href="agents-details.html"><i
                                                                                class="icon-12"></i></a></li>
                                                                    <li><a href="agents-details.html"><i
                                                                                class="icon-13"></i></a></li>
                                                                </ul>
                                                            </div>
                                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing sed.</p>
                                                            <ul class="more-details clearfix">
                                                                <li><i class="icon-14"></i>3 Beds</li>
                                                                <li><i class="icon-15"></i>2 Baths</li>
                                                                <li><i class="icon-16"></i>600 Sq Ft</li>
                                                            </ul>
                                                            <div class="btn-box"><a href="property-details.html"
                                                                    class="theme-btn btn-two">See Details</a></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab" id="tab-3">
                                <div class="wrapper list">
                                    <div class="deals-list-content list-item">
                                        <div class="deals-block-one">
                                            <div class="inner-box">
                                                <div class="image-box">
                                                    <figure class="image"><img src="assets/images/resource/deals-3.jpg"
                                                            alt=""></figure>
                                                    <div class="batch"><i class="icon-11"></i></div>
                                                    <span class="category">Featured</span>
                                                    <div class="buy-btn"><a href="property-details.html">For Buy</a></div>
                                                </div>
                                                <div class="lower-content">
                                                    <div class="title-text">
                                                        <h4><a href="property-details.html">Villa on Grand Avenue</a></h4>
                                                    </div>
                                                    <div class="price-box clearfix">
                                                        <div class="price-info pull-left">
                                                            <h6>Start From</h6>
                                                            <h4>$30,000.00</h4>
                                                        </div>
                                                        <div class="author-box pull-right">
                                                            <figure class="author-thumb">
                                                                <img src="assets/images/feature/author-1.jpg"
                                                                    alt="">
                                                                <span>Michael Bean</span>
                                                            </figure>
                                                        </div>
                                                    </div>
                                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing sed eiusm do
                                                        tempor incididunt labore.</p>
                                                    <ul class="more-details clearfix">
                                                        <li><i class="icon-14"></i>3 Beds</li>
                                                        <li><i class="icon-15"></i>2 Baths</li>
                                                        <li><i class="icon-16"></i>600 Sq Ft</li>
                                                    </ul>
                                                    <div class="other-info-box clearfix">
                                                        <div class="btn-box pull-left"><a href="property-details.html"
                                                                class="theme-btn btn-two">See Details</a></div>
                                                        <ul class="other-option pull-right clearfix">
                                                            <li><a href="property-details.html"><i
                                                                        class="icon-12"></i></a></li>
                                                            <li><a href="property-details.html"><i
                                                                        class="icon-13"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="deals-block-one">
                                            <div class="inner-box">
                                                <div class="image-box">
                                                    <figure class="image"><img src="assets/images/resource/deals-4.jpg"
                                                            alt=""></figure>
                                                    <div class="batch"><i class="icon-11"></i></div>
                                                    <span class="category">Featured</span>
                                                    <div class="buy-btn"><a href="property-details.html">For Buy</a></div>
                                                </div>
                                                <div class="lower-content">
                                                    <div class="title-text">
                                                        <h4><a href="property-details.html">Contemporary Apartment</a></h4>
                                                    </div>
                                                    <div class="price-box clearfix">
                                                        <div class="price-info pull-left">
                                                            <h6>Start From</h6>
                                                            <h4>$20,000.00</h4>
                                                        </div>
                                                        <div class="author-box pull-right">
                                                            <figure class="author-thumb">
                                                                <img src="assets/images/feature/author-1.jpg"
                                                                    alt="">
                                                                <span>Michael Bean</span>
                                                            </figure>
                                                        </div>
                                                    </div>
                                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing sed eiusm do
                                                        tempor incididunt labore.</p>
                                                    <ul class="more-details clearfix">
                                                        <li><i class="icon-14"></i>3 Beds</li>
                                                        <li><i class="icon-15"></i>2 Baths</li>
                                                        <li><i class="icon-16"></i>600 Sq Ft</li>
                                                    </ul>
                                                    <div class="other-info-box clearfix">
                                                        <div class="btn-box pull-left"><a href="property-details.html"
                                                                class="theme-btn btn-two">See Details</a></div>
                                                        <ul class="other-option pull-right clearfix">
                                                            <li><a href="property-details.html"><i
                                                                        class="icon-12"></i></a></li>
                                                            <li><a href="property-details.html"><i
                                                                        class="icon-13"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="deals-block-one">
                                            <div class="inner-box">
                                                <div class="image-box">
                                                    <figure class="image"><img src="assets/images/resource/deals-5.jpg"
                                                            alt=""></figure>
                                                    <div class="batch"><i class="icon-11"></i></div>
                                                    <span class="category">Featured</span>
                                                    <div class="buy-btn"><a href="property-details.html">For Buy</a></div>
                                                </div>
                                                <div class="lower-content">
                                                    <div class="title-text">
                                                        <h4><a href="property-details.html">Luxury Villa With Pool</a></h4>
                                                    </div>
                                                    <div class="price-box clearfix">
                                                        <div class="price-info pull-left">
                                                            <h6>Start From</h6>
                                                            <h4>$35,000.00</h4>
                                                        </div>
                                                        <div class="author-box pull-right">
                                                            <figure class="author-thumb">
                                                                <img src="assets/images/feature/author-1.jpg"
                                                                    alt="">
                                                                <span>Michael Bean</span>
                                                            </figure>
                                                        </div>
                                                    </div>
                                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing sed eiusm do
                                                        tempor incididunt labore.</p>
                                                    <ul class="more-details clearfix">
                                                        <li><i class="icon-14"></i>3 Beds</li>
                                                        <li><i class="icon-15"></i>2 Baths</li>
                                                        <li><i class="icon-16"></i>600 Sq Ft</li>
                                                    </ul>
                                                    <div class="other-info-box clearfix">
                                                        <div class="btn-box pull-left"><a href="property-details.html"
                                                                class="theme-btn btn-two">See Details</a></div>
                                                        <ul class="other-option pull-right clearfix">
                                                            <li><a href="property-details.html"><i
                                                                        class="icon-12"></i></a></li>
                                                            <li><a href="property-details.html"><i
                                                                        class="icon-13"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="deals-block-one">
                                            <div class="inner-box">
                                                <div class="image-box">
                                                    <figure class="image"><img src="assets/images/resource/deals-6.jpg"
                                                            alt=""></figure>
                                                    <div class="batch"><i class="icon-11"></i></div>
                                                    <span class="category">Featured</span>
                                                    <div class="buy-btn"><a href="property-details.html">For Buy</a></div>
                                                </div>
                                                <div class="lower-content">
                                                    <div class="title-text">
                                                        <h4><a href="property-details.html">Home in Merrick Way</a></h4>
                                                    </div>
                                                    <div class="price-box clearfix">
                                                        <div class="price-info pull-left">
                                                            <h6>Start From</h6>
                                                            <h4>$45,000.00</h4>
                                                        </div>
                                                        <div class="author-box pull-right">
                                                            <figure class="author-thumb">
                                                                <img src="assets/images/feature/author-1.jpg"
                                                                    alt="">
                                                                <span>Michael Bean</span>
                                                            </figure>
                                                        </div>
                                                    </div>
                                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing sed eiusm do
                                                        tempor incididunt labore.</p>
                                                    <ul class="more-details clearfix">
                                                        <li><i class="icon-14"></i>3 Beds</li>
                                                        <li><i class="icon-15"></i>2 Baths</li>
                                                        <li><i class="icon-16"></i>600 Sq Ft</li>
                                                    </ul>
                                                    <div class="other-info-box clearfix">
                                                        <div class="btn-box pull-left"><a href="property-details.html"
                                                                class="theme-btn btn-two">See Details</a></div>
                                                        <ul class="other-option pull-right clearfix">
                                                            <li><a href="property-details.html"><i
                                                                        class="icon-12"></i></a></li>
                                                            <li><a href="property-details.html"><i
                                                                        class="icon-13"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="deals-block-one">
                                            <div class="inner-box">
                                                <div class="image-box">
                                                    <figure class="image"><img src="assets/images/resource/deals-7.jpg"
                                                            alt=""></figure>
                                                    <div class="batch"><i class="icon-11"></i></div>
                                                    <span class="category">Featured</span>
                                                    <div class="buy-btn"><a href="property-details.html">For Buy</a></div>
                                                </div>
                                                <div class="lower-content">
                                                    <div class="title-text">
                                                        <h4><a href="property-details.html">Apartment in Glasgow</a></h4>
                                                    </div>
                                                    <div class="price-box clearfix">
                                                        <div class="price-info pull-left">
                                                            <h6>Start From</h6>
                                                            <h4>$40,000.00</h4>
                                                        </div>
                                                        <div class="author-box pull-right">
                                                            <figure class="author-thumb">
                                                                <img src="assets/images/feature/author-1.jpg"
                                                                    alt="">
                                                                <span>Michael Bean</span>
                                                            </figure>
                                                        </div>
                                                    </div>
                                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing sed eiusm do
                                                        tempor incididunt labore.</p>
                                                    <ul class="more-details clearfix">
                                                        <li><i class="icon-14"></i>3 Beds</li>
                                                        <li><i class="icon-15"></i>2 Baths</li>
                                                        <li><i class="icon-16"></i>600 Sq Ft</li>
                                                    </ul>
                                                    <div class="other-info-box clearfix">
                                                        <div class="btn-box pull-left"><a href="property-details.html"
                                                                class="theme-btn btn-two">See Details</a></div>
                                                        <ul class="other-option pull-right clearfix">
                                                            <li><a href="property-details.html"><i
                                                                        class="icon-12"></i></a></li>
                                                            <li><a href="property-details.html"><i
                                                                        class="icon-13"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="deals-grid-content">
                                        <div class="row clearfix">
                                            <div class="col-lg-6 col-md-6 col-sm-12 feature-block">
                                                <div class="feature-block-one">
                                                    <div class="inner-box">
                                                        <div class="image-box">
                                                            <figure class="image"><img
                                                                    src="assets/images/feature/feature-1.jpg"
                                                                    alt=""></figure>
                                                            <div class="batch"><i class="icon-11"></i></div>
                                                            <span class="category">Featured</span>
                                                        </div>
                                                        <div class="lower-content">
                                                            <div class="author-info clearfix">
                                                                <div class="author pull-left">
                                                                    <figure class="author-thumb"><img
                                                                            src="assets/images/feature/author-1.jpg"
                                                                            alt=""></figure>
                                                                    <h6>Michael Bean</h6>
                                                                </div>
                                                                <div class="buy-btn pull-right"><a
                                                                        href="property-details.html">For Buy</a></div>
                                                            </div>
                                                            <div class="title-text">
                                                                <h4><a href="property-details.html">Luxury Villa With
                                                                        Pool</a></h4>
                                                            </div>
                                                            <div class="price-box clearfix">
                                                                <div class="price-info pull-left">
                                                                    <h6>Start From</h6>
                                                                    <h4>$30,000.00</h4>
                                                                </div>
                                                                <ul class="other-option pull-right clearfix">
                                                                    <li><a href="property-details.html"><i
                                                                                class="icon-12"></i></a></li>
                                                                    <li><a href="property-details.html"><i
                                                                                class="icon-13"></i></a></li>
                                                                </ul>
                                                            </div>
                                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing sed.</p>
                                                            <ul class="more-details clearfix">
                                                                <li><i class="icon-14"></i>3 Beds</li>
                                                                <li><i class="icon-15"></i>2 Baths</li>
                                                                <li><i class="icon-16"></i>600 Sq Ft</li>
                                                            </ul>
                                                            <div class="btn-box"><a href="property-details.html"
                                                                    class="theme-btn btn-two">See Details</a></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12 feature-block">
                                                <div class="feature-block-one">
                                                    <div class="inner-box">
                                                        <div class="image-box">
                                                            <figure class="image"><img
                                                                    src="assets/images/feature/feature-2.jpg"
                                                                    alt=""></figure>
                                                            <div class="batch"><i class="icon-11"></i></div>
                                                            <span class="category">Featured</span>
                                                        </div>
                                                        <div class="lower-content">
                                                            <div class="author-info clearfix">
                                                                <div class="author pull-left">
                                                                    <figure class="author-thumb"><img
                                                                            src="assets/images/feature/author-2.jpg"
                                                                            alt=""></figure>
                                                                    <h6>Robert Niro</h6>
                                                                </div>
                                                                <div class="buy-btn pull-right"><a
                                                                        href="property-details.html">For Rent</a></div>
                                                            </div>
                                                            <div class="title-text">
                                                                <h4><a href="property-details.html">Contemporary
                                                                        Apartment</a></h4>
                                                            </div>
                                                            <div class="price-box clearfix">
                                                                <div class="price-info pull-left">
                                                                    <h6>Start From</h6>
                                                                    <h4>$45,000.00</h4>
                                                                </div>
                                                                <ul class="other-option pull-right clearfix">
                                                                    <li><a href="property-details.html"><i
                                                                                class="icon-12"></i></a></li>
                                                                    <li><a href="property-details.html"><i
                                                                                class="icon-13"></i></a></li>
                                                                </ul>
                                                            </div>
                                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing sed.</p>
                                                            <ul class="more-details clearfix">
                                                                <li><i class="icon-14"></i>3 Beds</li>
                                                                <li><i class="icon-15"></i>2 Baths</li>
                                                                <li><i class="icon-16"></i>600 Sq Ft</li>
                                                            </ul>
                                                            <div class="btn-box"><a href="property-details.html"
                                                                    class="theme-btn btn-two">See Details</a></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12 feature-block">
                                                <div class="feature-block-one">
                                                    <div class="inner-box">
                                                        <div class="image-box">
                                                            <figure class="image"><img
                                                                    src="assets/images/feature/feature-3.jpg"
                                                                    alt=""></figure>
                                                            <div class="batch"><i class="icon-11"></i></div>
                                                            <span class="category">Featured</span>
                                                        </div>
                                                        <div class="lower-content">
                                                            <div class="author-info clearfix">
                                                                <div class="author pull-left">
                                                                    <figure class="author-thumb"><img
                                                                            src="assets/images/feature/author-3.jpg"
                                                                            alt=""></figure>
                                                                    <h6>Keira Mel</h6>
                                                                </div>
                                                                <div class="buy-btn pull-right"><a
                                                                        href="property-details.html">Sold Out</a></div>
                                                            </div>
                                                            <div class="title-text">
                                                                <h4><a href="property-details.html">Villa on Grand
                                                                        Avenue</a></h4>
                                                            </div>
                                                            <div class="price-box clearfix">
                                                                <div class="price-info pull-left">
                                                                    <h6>Start From</h6>
                                                                    <h4>$63,000.00</h4>
                                                                </div>
                                                                <ul class="other-option pull-right clearfix">
                                                                    <li><a href="property-details.html"><i
                                                                                class="icon-12"></i></a></li>
                                                                    <li><a href="property-details.html"><i
                                                                                class="icon-13"></i></a></li>
                                                                </ul>
                                                            </div>
                                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing sed.</p>
                                                            <ul class="more-details clearfix">
                                                                <li><i class="icon-14"></i>3 Beds</li>
                                                                <li><i class="icon-15"></i>2 Baths</li>
                                                                <li><i class="icon-16"></i>600 Sq Ft</li>
                                                            </ul>
                                                            <div class="btn-box"><a href="property-details.html"
                                                                    class="theme-btn btn-two">See Details</a></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12 feature-block">
                                                <div class="feature-block-one">
                                                    <div class="inner-box">
                                                        <div class="image-box">
                                                            <figure class="image"><img
                                                                    src="assets/images/feature/feature-4.jpg"
                                                                    alt=""></figure>
                                                            <div class="batch"><i class="icon-11"></i></div>
                                                            <span class="category">Featured</span>
                                                        </div>
                                                        <div class="lower-content">
                                                            <div class="author-info clearfix">
                                                                <div class="author pull-left">
                                                                    <figure class="author-thumb"><img
                                                                            src="assets/images/feature/author-1.jpg"
                                                                            alt=""></figure>
                                                                    <h6>Michael Bean</h6>
                                                                </div>
                                                                <div class="buy-btn pull-right"><a
                                                                        href="property-details.html">For Buy</a></div>
                                                            </div>
                                                            <div class="title-text">
                                                                <h4><a href="property-details.html">Home in Merrick
                                                                        Way</a></h4>
                                                            </div>
                                                            <div class="price-box clearfix">
                                                                <div class="price-info pull-left">
                                                                    <h6>Start From</h6>
                                                                    <h4>$30,000.00</h4>
                                                                </div>
                                                                <ul class="other-option pull-right clearfix">
                                                                    <li><a href="property-details.html"><i
                                                                                class="icon-12"></i></a></li>
                                                                    <li><a href="property-details.html"><i
                                                                                class="icon-13"></i></a></li>
                                                                </ul>
                                                            </div>
                                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing sed.</p>
                                                            <ul class="more-details clearfix">
                                                                <li><i class="icon-14"></i>3 Beds</li>
                                                                <li><i class="icon-15"></i>2 Baths</li>
                                                                <li><i class="icon-16"></i>600 Sq Ft</li>
                                                            </ul>
                                                            <div class="btn-box"><a href="property-details.html"
                                                                    class="theme-btn btn-two">See Details</a></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12 feature-block">
                                                <div class="feature-block-one">
                                                    <div class="inner-box">
                                                        <div class="image-box">
                                                            <figure class="image"><img
                                                                    src="assets/images/feature/feature-5.jpg"
                                                                    alt=""></figure>
                                                            <div class="batch"><i class="icon-11"></i></div>
                                                            <span class="category">Featured</span>
                                                        </div>
                                                        <div class="lower-content">
                                                            <div class="author-info clearfix">
                                                                <div class="author pull-left">
                                                                    <figure class="author-thumb"><img
                                                                            src="assets/images/feature/author-2.jpg"
                                                                            alt=""></figure>
                                                                    <h6>Robert Niro</h6>
                                                                </div>
                                                                <div class="buy-btn pull-right"><a
                                                                        href="property-details.html">For Rent</a></div>
                                                            </div>
                                                            <div class="title-text">
                                                                <h4><a href="property-details.html">Apartment in
                                                                        Glasgow</a></h4>
                                                            </div>
                                                            <div class="price-box clearfix">
                                                                <div class="price-info pull-left">
                                                                    <h6>Start From</h6>
                                                                    <h4>$45,000.00</h4>
                                                                </div>
                                                                <ul class="other-option pull-right clearfix">
                                                                    <li><a href="property-details.html"><i
                                                                                class="icon-12"></i></a></li>
                                                                    <li><a href="property-details.html"><i
                                                                                class="icon-13"></i></a></li>
                                                                </ul>
                                                            </div>
                                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing sed.</p>
                                                            <ul class="more-details clearfix">
                                                                <li><i class="icon-14"></i>3 Beds</li>
                                                                <li><i class="icon-15"></i>2 Baths</li>
                                                                <li><i class="icon-16"></i>600 Sq Ft</li>
                                                            </ul>
                                                            <div class="btn-box"><a href="property-details.html"
                                                                    class="theme-btn btn-two">See Details</a></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12 feature-block">
                                                <div class="feature-block-one">
                                                    <div class="inner-box">
                                                        <div class="image-box">
                                                            <figure class="image"><img
                                                                    src="assets/images/feature/feature-6.jpg"
                                                                    alt=""></figure>
                                                            <div class="batch"><i class="icon-11"></i></div>
                                                            <span class="category">Featured</span>
                                                        </div>
                                                        <div class="lower-content">
                                                            <div class="author-info clearfix">
                                                                <div class="author pull-left">
                                                                    <figure class="author-thumb"><img
                                                                            src="assets/images/feature/author-3.jpg"
                                                                            alt=""></figure>
                                                                    <h6>Keira Mel</h6>
                                                                </div>
                                                                <div class="buy-btn pull-right"><a
                                                                        href="property-details.html">Sold Out</a></div>
                                                            </div>
                                                            <div class="title-text">
                                                                <h4><a href="property-details.html">Family Home For
                                                                        Sale</a></h4>
                                                            </div>
                                                            <div class="price-box clearfix">
                                                                <div class="price-info pull-left">
                                                                    <h6>Start From</h6>
                                                                    <h4>$63,000.00</h4>
                                                                </div>
                                                                <ul class="other-option pull-right clearfix">
                                                                    <li><a href="property-details.html"><i
                                                                                class="icon-12"></i></a></li>
                                                                    <li><a href="property-details.html"><i
                                                                                class="icon-13"></i></a></li>
                                                                </ul>
                                                            </div>
                                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing sed.</p>
                                                            <ul class="more-details clearfix">
                                                                <li><i class="icon-14"></i>3 Beds</li>
                                                                <li><i class="icon-15"></i>2 Baths</li>
                                                                <li><i class="icon-16"></i>600 Sq Ft</li>
                                                            </ul>
                                                            <div class="btn-box"><a href="property-details.html"
                                                                    class="theme-btn btn-two">See Details</a></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                    <div class="default-sidebar agent-sidebar">
                        <div class="agents-contact sidebar-widget">
                            <div class="widget-title">
                                <h5>Contact To Michael</h5>
                            </div>
                            <div class="form-inner">
                                <form action="contact.html" method="post" class="default-form">
                                    <div class="form-group">
                                        <input type="text" name="name" placeholder="Your Name" required="">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" name="email" placeholder="Email Address"
                                            required="">
                                    </div>
                                    <div class="form-group">
                                        <input type="tel" name="phone" placeholder="Phone" required="">
                                    </div>
                                    <div class="form-group">
                                        <textarea name="message" placeholder="Your Message"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="theme-btn btn-one">Send Message</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="category-widget sidebar-widget">
                            <div class="widget-title">
                                <h5>Status Of Property</h5>
                            </div>
                            <ul class="category-list clearfix">
                                <li><a href="agents-details.html">For Rent <span>(200)</span></a></li>
                                <li><a href="agents-details.html">For Sale <span>(700)</span></a></li>
                            </ul>
                        </div>
                        <div class="featured-widget sidebar-widget">
                            <div class="widget-title">
                                <h5>Featured Properties</h5>
                            </div>
                            <div class="single-item-carousel owl-carousel owl-theme owl-nav-none dots-style-one">
                                <div class="feature-block-one">
                                    <div class="inner-box">
                                        <div class="image-box">
                                            <figure class="image"><img src="assets/images/feature/feature-1.jpg"
                                                    alt=""></figure>
                                            <div class="batch"><i class="icon-11"></i></div>
                                            <span class="category">Featured</span>
                                        </div>
                                        <div class="lower-content">
                                            <div class="title-text">
                                                <h4><a href="property-details.html">Villa on Grand Avenue</a></h4>
                                            </div>
                                            <div class="price-box clearfix">
                                                <div class="price-info">
                                                    <h6>Start From</h6>
                                                    <h4>$30,000.00</h4>
                                                </div>
                                            </div>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing sed.</p>
                                            <div class="btn-box"><a href="property-details.html"
                                                    class="theme-btn btn-two">See Details</a></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="feature-block-one">
                                    <div class="inner-box">
                                        <div class="image-box">
                                            <figure class="image"><img src="assets/images/feature/feature-2.jpg"
                                                    alt=""></figure>
                                            <div class="batch"><i class="icon-11"></i></div>
                                            <span class="category">Featured</span>
                                        </div>
                                        <div class="lower-content">
                                            <div class="title-text">
                                                <h4><a href="property-details.html">Family Home For Sale</a></h4>
                                            </div>
                                            <div class="price-box clearfix">
                                                <div class="price-info">
                                                    <h6>Start From</h6>
                                                    <h4>$30,000.00</h4>
                                                </div>
                                            </div>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing sed.</p>
                                            <div class="btn-box"><a href="property-details.html"
                                                    class="theme-btn btn-two">See Details</a></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="feature-block-one">
                                    <div class="inner-box">
                                        <div class="image-box">
                                            <figure class="image"><img src="assets/images/feature/feature-3.jpg"
                                                    alt=""></figure>
                                            <div class="batch"><i class="icon-11"></i></div>
                                            <span class="category">Featured</span>
                                        </div>
                                        <div class="lower-content">
                                            <div class="title-text">
                                                <h4><a href="property-details.html">Luxury Villa With Pool</a></h4>
                                            </div>
                                            <div class="price-box clearfix">
                                                <div class="price-info">
                                                    <h6>Start From</h6>
                                                    <h4>$30,000.00</h4>
                                                </div>
                                            </div>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing sed.</p>
                                            <div class="btn-box"><a href="property-details.html"
                                                    class="theme-btn btn-two">See Details</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- agents-page-section end -->


    <!-- subscribe-section -->
    <section class="subscribe-section bg-color-3">
        <div class="pattern-layer" style="background-image: url(assets/images/shape/shape-2.png);"></div>
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-6 col-md-6 col-sm-12 text-column">
                    <div class="text">
                        <span>Subscribe</span>
                        <h2>Sign Up To Our Newsletter To Get The Latest News And Offers.</h2>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 form-column">
                    <div class="form-inner">
                        <form action="contact.html" method="post" class="subscribe-form">
                            <div class="form-group">
                                <input type="email" name="email" placeholder="Enter your email" required="">
                                <button type="submit">Subscribe Now</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- subscribe-section end -->


    <!-- main-footer -->
    <footer class="main-footer">
        <div class="footer-top bg-color-2">
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                        <div class="footer-widget about-widget">
                            <div class="widget-title">
                                <h3>About</h3>
                            </div>
                            <div class="text">
                                <p>Lorem ipsum dolor amet consetetur adi pisicing elit sed eiusm tempor in cididunt ut
                                    labore dolore magna aliqua enim ad minim venitam</p>
                                <p>Quis nostrud exercita laboris nisi ut aliquip commodo.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                        <div class="footer-widget links-widget ml-70">
                            <div class="widget-title">
                                <h3>Services</h3>
                            </div>
                            <div class="widget-content">
                                <ul class="links-list class">
                                    <li><a href="index.html">About Us</a></li>
                                    <li><a href="index.html">Listing</a></li>
                                    <li><a href="index.html">How It Works</a></li>
                                    <li><a href="index.html">Our Services</a></li>
                                    <li><a href="index.html">Our Blog</a></li>
                                    <li><a href="index.html">Contact Us</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                        <div class="footer-widget post-widget">
                            <div class="widget-title">
                                <h3>Top News</h3>
                            </div>
                            <div class="post-inner">
                                <div class="post">
                                    <figure class="post-thumb"><a href="blog-details.html"><img
                                                src="assets/images/resource/footer-post-1.jpg" alt=""></a>
                                    </figure>
                                    <h5><a href="blog-details.html">The Added Value Social Worker</a></h5>
                                    <p>Mar 25, 2020</p>
                                </div>
                                <div class="post">
                                    <figure class="post-thumb"><a href="blog-details.html"><img
                                                src="assets/images/resource/footer-post-2.jpg" alt=""></a>
                                    </figure>
                                    <h5><a href="blog-details.html">Ways to Increase Trust</a></h5>
                                    <p>Mar 24, 2020</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                        <div class="footer-widget contact-widget">
                            <div class="widget-title">
                                <h3>Contacts</h3>
                            </div>
                            <div class="widget-content">
                                <ul class="info-list clearfix">
                                    <li><i class="fas fa-map-marker-alt"></i>Flat 20, Reynolds Neck, North Helenaville,
                                        FV77 8WS</li>
                                    <li><i class="fas fa-microphone"></i><a href="tel:23055873407">+2(305) 587-3407</a>
                                    </li>
                                    <li><i class="fas fa-envelope"></i><a
                                            href="mailto:info@example.com">info@example.com</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="auto-container">
                <div class="inner-box clearfix">
                    <figure class="footer-logo"><a href="index.html"><img src="assets/images/footer-logo.png"
                                alt=""></a></figure>
                    <div class="copyright pull-left">
                        <p><a href="index.html">Realshed</a> &copy; 2021 All Right Reserved</p>
                    </div>
                    <ul class="footer-nav pull-right clearfix">
                        <li><a href="index.html">Terms of Service</a></li>
                        <li><a href="index.html">Privacy Policy</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <!-- main-footer end -->



    <!--Scroll to top-->
    <button class="scroll-top scroll-to-target" data-target="html">
        <span class="fal fa-angle-up"></span>
    </button>
    </div>
@endsection
