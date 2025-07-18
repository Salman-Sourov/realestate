@extends('frontend.frontend_dashboard')
@section('main')

@section('title')
    {{ $property->property_name }} | EMPO RealEstate
@endsection

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
            <h1>{{ $property->property_name }} Details</h1>
            <ul class="bread-crumb clearfix">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li>{{ $property->property_name }} Details</li>
            </ul>
        </div>
    </div>
</section>
<!--End Page Title-->


<!-- property-details -->
<section class="property-details property-details-one">
    <div class="auto-container">

        <div class="top-details clearfix">
            <div class="left-column pull-left clearfix">
                <h3>{{ $property->title }}</h3>
                <div class="author-info clearfix">
                    <div class="author-box pull-left">

                        @if ($property->agent_id == null)
                            <figure class="author-thumb"><img src="{{ url('upload/salman_sourov.png') }}"
                                    alt=""></figure>
                            <h6>Admin</h6>
                        @else
                            <figure class="author-thumb"><img
                                    src="{{ !empty($property->user->photo) ? url('upload/agent_images/' . $property->user->photo) : url('upload/no_image.jpg') }}"
                                    alt=""></figure>
                            <h6>{{ $property->user->name }}</h6>
                        @endif
                    </div>

                    <ul class="other-option" style="display: flex; gap: 10px; list-style: none; padding: 0; margin: 0;">
                        <li>
                            <a aria-label="Compare" class="action-btn" id="{{ $property->id }}"
                                onclick="addToCompare(this.id)">
                                <i class="icon-12"></i>
                            </a>
                        </li>
                        <li>
                            <a aria-label="Add To Wishlist" class="action-btn" id="{{ $property->id }}"
                                onclick="addToWishList(this.id)">
                                <i class="icon-13"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="right-column pull-right clearfix">
                <div class="price-inner clearfix">
                    <ul class="category clearfix pull-left">
                        <li><a href="">{{ $property->type->type_name }}</a></li>
                        <li><a href="">For {{ $property->property_status }}</a></li>
                    </ul>
                    <div class="price-box pull-right">
                        <h3>৳ {{ $property->lowest_price }}</h3>
                    </div>
                </div>
            </div>
        </div>

        {{-- Product Details --}}
        <div class="row clearfix">
            <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                <div class="property-details-content">
                    <div class="carousel-inner">
                        <div class="single-item-carousel owl-carousel owl-theme owl-dots-none">
                            <figure class="image-box">
                                <img src="{{ asset($property->property_thambnail) }}" alt=""
                                    class="carousel-image clickable-image">
                            </figure>
                            @foreach ($multiImage as $img)
                                <figure class="image-box">
                                    <img src="{{ asset($img->photo_name) }}" alt=""
                                        class="carousel-image clickable-image">
                                </figure>
                            @endforeach
                        </div>
                    </div>

                    <!-- The Modal/Popup -->
                    <div id="imageModal" class="modal">
                        <span class="close-button">&times;</span>
                        <img class="modal-content" id="modalImage">
                    </div>

                    <div class="discription-box content-widget">
                        <div class="title-box">
                            <h4>Property Description</h4>
                        </div>
                        <div class="text override-color">
                            <p>{!! $property->short_descp !!}</p>
                        </div>
                        <hr>
                        <div class="text override-color">
                            <p>{!! $property->long_descp !!}</p>
                        </div>
                    </div>
                    <div class="details-box content-widget">
                        <div class="title-box">
                            <h4>Property Details</h4>
                        </div>
                        <ul class="list clearfix">
                            <li>Property ID: <span>{{ $property->property_code }}</span></li>
                            <li>Rooms: <span>{{ $property->bedrooms }}</span></li>
                            <li>Garage Size: <span>{{ $property->garage_size }} Sq Ft</span></li>
                            <li>Property Type: <span>{{ $property->type->type_name }}</span></li>
                            <li>Bathrooms: <span>{{ $property->bathrooms }}</span></li>
                            <li>Property Status: <span>For {{ $property->property_status }}</span></li>
                            <li>Property Size: <span>{{ $property->property_size }} Sq Ft</span></li>
                            <li>Garage: <span>{{ $property->garage }}</span></li>
                        </ul>
                    </div>
                    <div class="amenities-box content-widget">
                        <div class="title-box">
                            <h4>Amenities</h4>
                        </div>
                        <ul class="list clearfix">
                            @foreach ($property_amen as $amen)
                                <li><span>{{ $amen }}</span></li>
                            @endforeach
                        </ul>

                    </div>
                    <div class="location-box content-widget">
                        <div class="title-box">
                            <h4>Location</h4>
                        </div>
                        <ul class="info clearfix">
                            <li><span>Address:</span> {{ $property->address }}</li>
                            <li>
                                <span>Area:</span>
                                {{ $property['pstate']['state_name'] ?? 'N/A' }}
                            </li>

                            <li><span>Neighborhood:</span> {{ $property->neighborhood }}</li>
                            <li><span>Zip/Postal Code:</span> {{ $property->postal_code }}</li>
                            <li><span>City:</span> {{ $property->city }}</li>
                            <li><span>Property Type:</span> {{ $property['type']['type_name'] ?? 'N/A' }}</li>
                        </ul>
                        <div class="google-map-area">
                            <div class="google-map" id="contact-google-map" data-map-lat="{{ $property->latitude }}"
                                data-map-lng="{{ $property->longitude }}"
                                data-icon-path="{{ asset('frontend') }}/assets/images/icons/map-marker.png"
                                data-map-title="Brooklyn, New York, United Kingdom" data-map-zoom="12"
                                data-markers='{
                                            "marker-1": [40.712776, -74.005974, "<h4>Branch Office</h4><p>77/99 New York</p>","{{ asset('frontend') }}/assets/images/icons/map-marker.png"]
                                        }'>
                            </div>
                        </div>
                    </div>

                    <div class="nearby-box content-widget">
                        <div class="title-box">
                            <h4>What’s Nearby?</h4>
                        </div>
                        <div class="inner-box">
                            <div class="single-item">
                                <div class="icon-box"><i class="fas fa-book-reader"></i></div>
                                <div class="inner">
                                    <h5>Places</h5>
                                    @foreach ($facility as $item)
                                        <div class="box clearfix">
                                            <div class="text pull-left">
                                                <h6>{{ $item->facility_name }} <span>({{ $item->distance }} km)</span>
                                                </h6>
                                            </div>
                                            <ul class="rating pull-right clearfix">
                                                <li><i class="icon-39"></i></li>
                                                <li><i class="icon-39"></i></li>
                                                <li><i class="icon-39"></i></li>
                                                <li><i class="icon-39"></i></li>
                                                <li><i class="icon-40"></i></li>
                                            </ul>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="statistics-box content-widget">
                        <div class="title-box">
                            <h4>Property Video</h4>
                        </div>

                        <figure class="image-box">
                            @if (!empty($property->property_video))
                                <iframe width="700" height="415" src="{{ $property->property_video }}"
                                    title="YouTube video player" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                    referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                            @else
                                <iframe width="700" height="415" src="https://www.youtube.com/embed/n8pysoUJ56c"
                                    title="No Video" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                    referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                            @endif
                    </div>

                    {{-- Schedule --}}
                    <div class="schedule-box
                                    content-widget">
                        <div class="title-box">
                            <h4>Schedule A Tour</h4>
                        </div>
                        <div class="form-inner">
                            <form action="{{ route('store.schedule') }}" method="post">
                                @csrf
                                <div class="row clearfix">
                                    <input type="hidden" name="property_id" value="{{ $property->id }}">

                                    @if ($property->agent_id == null)
                                        <input type="hidden" name="agent_id" value="">
                                    @else
                                        <input type="hidden" name="agent_id" value="{{ $property->agent_id }}">
                                    @endif

                                    <div class="col-lg-6 col-md-12 col-sm-12 column">
                                        <div class="form-group">
                                            <i class="far fa-calendar-alt"></i>
                                            <input type="text" name="tour_date" placeholder="Tour Date"
                                                id="datepicker">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 column">
                                        <div class="form-group">
                                            <i class="far fa-clock"></i>
                                            <input type="text" name="tour_time" placeholder="Any Time">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 column">
                                        <div class="form-group">
                                            <textarea name="message" placeholder="Your message"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 column">
                                        <div class="form-group message-btn">
                                            <button type="submit" class="theme-btn btn-one">Submit
                                                Now</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                <div class="property-sidebar default-sidebar">
                    <div class="author-widget sidebar-widget">
                        <div class="author-box">

                            @if ($property->agent_id == null)
                                <figure class="author-thumb"><img src="{{ url('upload/salman_sourov.png') }}"
                                        alt="">
                                </figure>
                                <div class="inner">
                                    <h4>Mulkaan</h4>
                                    <ul class="info clearfix">
                                        <li><i class="fas fa-map-marker-alt"></i>10-B, Jcx Business Tawar, 1136/A,
                                            Japan Street, Bashundhara R/A, Dhaka, Bangladesh, 1219</li>
                                        <li><i class="fas fa-phone"></i><a
                                                href="tel:+8801733682541">+8801733682541</a>
                                        </li>
                                    </ul>
                                    @if (!is_null($property->agent_id))
                                        <div class="btn-box"><a
                                                href="{{ route('agent.details', $property->agent_id) }}">View
                                                Listing</a></div>
                                    @endif

                                </div>
                            @else
                                <figure class="author-thumb"><img
                                        src="{{ !empty($property->user->photo) ? url('upload/agent_images/' . $property->user->photo) : url('upload/no_image.jpg') }}"
                                        alt="">
                                </figure>
                                <div class="inner">
                                    <h4>{{ $property->user->name }}</h4>
                                    <ul class="info clearfix">
                                        <li><i class="fas fa-map-marker-alt"></i>{{ $property->user->address }}</li>
                                        <li><i class="fas fa-phone"></i><a {{-- href="tel:03030571965">{{ $property->user->phone }}</a> --}}
                                                href="tel:+8801733682541">+8801733682541</a>
                                        </li>
                                    </ul>
                                    <div class="btn-box"><a
                                            href="{{ route('agent.details', $property->agent_id) }}">View Listing</a>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="form-inner">
                            @auth

                                @php
                                    $id = Auth::user()->id;
                                    $userData = App\Models\User::find($id);
                                @endphp


                                <form action="{{ route('property.message') }}" method="post" class="default-form">
                                    @csrf

                                    <input type="hidden" name="property_id" value="{{ $property->id }}">

                                    @if ($property->agent_id == null)
                                        <input type="hidden" name="agent_id" value="">
                                    @else
                                        <input type="hidden" name="agent_id" value="{{ $property->agent_id }}">
                                    @endif

                                    <div class="form-group">
                                        <input type="text" name="msg_name" placeholder="Your name"
                                            value="{{ $userData->name }}">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" name="msg_email" placeholder="Your Email"
                                            value="{{ $userData->email }}">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="msg_phone" placeholder="Phone"
                                            value="{{ $userData->phone }}">
                                    </div>
                                    <div class="form-group">
                                        <textarea name="message" placeholder="Message"></textarea>
                                    </div>
                                    <div class="form-group message-btn">
                                        <button type="submit" class="theme-btn btn-one">Send Message</button>
                                    </div>
                                </form>
                            @else
                                <form action="{{ route('property.message') }}" method="post" class="default-form">
                                    @csrf

                                    <input type="hidden" name="property_id" value="{{ $property->id }}">

                                    @if ($property->agent_id == null)
                                        <input type="hidden" name="agent_id" value="">
                                    @else
                                        <input type="hidden" name="agent_id" value="{{ $property->agent_id }}">
                                    @endif

                                    <div class="form-group">
                                        <input type="text" name="msg_name" placeholder="Your name" required="">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" name="msg_email" placeholder="Your Email" required="">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="msg_phone" placeholder="Phone" required="">
                                    </div>
                                    <div class="form-group">
                                        <textarea name="message" placeholder="Message"></textarea>
                                    </div>
                                    <div class="form-group message-btn">
                                        <button type="submit" class="theme-btn btn-one">Send Message</button>
                                    </div>
                                </form>

                            @endauth

                        </div>

                    </div>

                    {{-- <div class="calculator-widget sidebar-widget">
                            <div class="calculate-inner">
                                <div class="widget-title">
                                    <h4>Mortgage Calculator</h4>
                                </div>
                                <form method="post" action="mortgage-calculator.html" class="default-form">
                                    <div class="form-group">
                                        <i class="fas fa-dollar-sign"></i>
                                        <input type="number" name="total_amount" placeholder="Total Amount">
                                    </div>
                                    <div class="form-group">
                                        <i class="fas fa-dollar-sign"></i>
                                        <input type="number" name="down_payment" placeholder="Down Payment">
                                    </div>
                                    <div class="form-group">
                                        <i class="fas fa-percent"></i>
                                        <input type="number" name="interest_rate" placeholder="Interest Rate">
                                    </div>
                                    <div class="form-group">
                                        <i class="far fa-calendar-alt"></i>
                                        <input type="number" name="loan" placeholder="Loan Terms(Years)">
                                    </div>
                                    <div class="form-group">
                                        <div class="select-box">
                                            <select class="wide">
                                                <option data-display="Monthly">Monthly</option>
                                                <option value="1">Yearly</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group message-btn">
                                        <button type="submit" class="theme-btn btn-one">Calculate Now</button>
                                    </div>
                                </form>
                            </div>
                        </div> --}}
                </div>
            </div>
        </div>

        {{-- Similar type of property --}}
        <div class="similar-content">
            <div class="title">
                <h4>Similar Properties</h4>
            </div>
            <div class="row clearfix">
                @foreach ($relatedProperty as $item)
                    <div class="col-lg-4 col-md-6 col-sm-12 feature-block">
                        <div class="feature-block-one wow fadeInUp animated" data-wow-delay="00ms"
                            data-wow-duration="1500ms">
                            <div class="inner-box">
                                <div class="image-box">
                                    <a href="{{ url('property/details/' . $item->property_slug) }}">
                                        <figure class="image">
                                            <img src="{{ asset($item->property_thambnail) }}"
                                                alt="empotechbd_property_image">
                                        </figure>
                                    </a>
                                    <div class="batch"><i class="icon-11"></i></div>
                                    <span class="category">{{ $item->type->type_name }}</span>
                                </div>
                                <div class="lower-content">
                                    <div class="author-info clearfix">
                                        <div class="author pull-left">
                                            @if ($item->agent_id == null)
                                                <figure class="author-thumb"><img
                                                        src="{{ url('upload/salman_sourov.png') }}" alt="">
                                                </figure>
                                                <h6>Admin </h6>
                                            @else
                                                <figure class="author-thumb"><img
                                                        src="{{ !empty($item->user->photo) ? url('upload/agent_images/' . $item->user->photo) : url('upload/no_image.jpg') }}"
                                                        alt=""></figure>
                                                <p class="agent">{{ $item->user->name }}</p>
                                            @endif
                                        </div>
                                        <div class="buy-btn pull-right"><a
                                                href="{{ url('property/details/' . $item->property_slug) }}">For
                                                {{ $item->property_status }}</a></div>
                                    </div>
                                    <div class="title-text">
                                        <h4><a
                                                href="{{ url('property/details/' . $item->property_slug) }}">{{ $item->property_name }}</a>
                                        </h4>
                                    </div>
                                    <div class="price-box clearfix">
                                        <div class="price-info pull-left">
                                            <h6>Start From</h6>
                                            <h4>${{ $item->lowest_price }}</h4>
                                        </div>
                                        {{-- <ul class="other-option pull-right clearfix">
                                            <li><a href="property-details.html"><i class="icon-12"></i></a></li>
                                            <li><a href="property-details.html"><i class="icon-13"></i></a></li>
                                        </ul> --}}
                                    </div>
                                    <p class="two-line-text">{{ $item->short_descp }}</p>
                                    <ul class="more-details clearfix">
                                        <li><i class="icon-14"></i>{{ $item->bedrooms }} Beds</li>
                                        <li><i class="icon-15"></i>{{ $item->bathrooms }} Baths</li>
                                        <li><i class="icon-16"></i>{{ $item->property_size }} Sq Ft</li>
                                    </ul>
                                    <div class="btn-box"><a
                                            href="{{ url('property/details/' . $item->property_slug) }}"
                                            class="theme-btn btn-two">See Details</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
</section>
<!-- property-details end -->
@endsection
