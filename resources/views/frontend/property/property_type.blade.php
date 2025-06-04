@extends('frontend.frontend_dashboard')
@section('main')
@section('title')
    {{ $pbread->type_name }} | EMPO RealEstate
@endsection
<!--Page Title-->
<section class="page-title-two bg-color-1 centred">
    <div class="pattern-layer">
        <div class="pattern-1" style="background-image: url({{ asset('frontend/assets/images/shape/shape-9.png') }});">
        </div>
        <div class="pattern-2" style="background-image: url({{ asset('frontend/assets/images/shape/shape-10.png') }});">
        </div>
    </div>
    <div class="auto-container">
        <div class="content-box clearfix">
            <h1>
                All {{ $pbread->type_name }} Property
                @if ($property->isNotEmpty())
                    ({{ $property->first()->property_status }})
                @endif
            </h1>
            <ul class="bread-crumb clearfix">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li>{{ $pbread->type_name }}</li>
            </ul>
        </div>
    </div>
</section>
<!--End Page Title-->

@php
    $ptype = App\Models\PropertyType::latest()->get();
@endphp

{{-- <section class="category-section centred">
    <div class="auto-container">
        <div class="inner-container wow slideInLeft animated" data-wow-delay="00ms" data-wow-duration="1500ms">
            <ul class="category-list clearfix clearfix d-flex flex-wrap justify-content-center">
                @foreach ($property as $item)
                    <li>
                        <a href="{{ route('property.type', $item->id) }}" class="category-block-link">
                            <div class="category-block-one">
                                <div class="inner-box">
                                    <div class="icon-box"><i class="{{ $item->type_icon }}"></i></div>
                                    <h5>{{ $item->type_name }}</h5>
                                    <span>{{ count($property) }}</span>
                                </div>
                            </div>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</section> --}}

<!-- property-page-section -->
<section class="property-page-section property-list">
    <div class="auto-container">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 content-side">
                <div class="property-content-side">
                    <div class="item-shorting clearfix">
                        <div class="left-column pull-left">
                            <h5>Search Reasults: <span>Showing {{ count($property) }} Listings</span></h5>
                        </div>
                    </div>
                    <div class="wrapper list">
                        <div class="deals-list-content list-item">
                            @foreach ($property as $item)
                                <div class="deals-block-one">
                                    <div class="inner-box">
                                        <div class="image-box">
                                            <a href="{{ url('property/details/' . $item->property_slug) }}">
                                                <figure class="image">
                                                    <img src="{{ asset($item->property_thambnail) }}"
                                                        style="width: 500px; height: 350px;"
                                                        alt="empotechbd_property_image">
                                                </figure>
                                            </a>
                                            <div class="batch"><i class="icon-11"></i></div>
                                            <span class="category">{{ $item->type->type_name }}</span>
                                            <div class="buy-btn"><a href="">For
                                                    {{ $item->property_status }}</a></div>
                                        </div>
                                        <div class="lower-content">
                                            <div class="title-text">
                                                <h4><a
                                                        href="{{ url('property/details/' . $item->property_slug) }}">{{ $item->property_name }}</a>
                                                </h4>
                                            </div>
                                            <div class="price-box clearfix">
                                                <div class="price-info pull-left">
                                                    <div class="d-flex align-items-center mb-2">
                                                        <i class="fas fa-map-marker-alt text-danger"
                                                            style="margin-right: 5px;"></i>
                                                        <span class="text-truncate text-dark fw-medium">
                                                            {{ $item['pstate']['state_name'] ?? 'N/A' }}
                                                        </span>
                                                    </div>
                                                    <h6>Start From</h6>
                                                    <h4>৳ {{ $item->lowest_price }}</h4>
                                                </div>

                                                @if ($item->agent_id == null)
                                                    <div class="author-box pull-right">
                                                        <figure class="author-thumb">
                                                            <img src="{{ url('upload/salman_sourov.png') }}"
                                                                alt="">
                                                            <span>Admin</span>
                                                        </figure>
                                                    </div>
                                                @else
                                                    <div class="author-box pull-right">
                                                        <figure class="author-thumb">
                                                            <img src="{{ !empty($item->user->photo) ? url('upload/agent_images/' . $item->user->photo) : url('upload/no_image.jpg') }}"
                                                                alt="">
                                                            <span>{{ $item->user->name }}</span>
                                                        </figure>
                                                    </div>
                                                @endif
                                            </div>
                                            <p>{{ $item->short_descp }}</p>
                                            <ul class="more-details clearfix">
                                                <li><i class="icon-14"></i>{{ $item->bedrooms }} Beds</li>
                                                <li><i class="icon-15"></i>{{ $item->bathrooms }} Baths</li>
                                                <li><i class="icon-16"></i>{{ $item->property_size }} Sq Ft</li>
                                            </ul>
                                            <div class="other-info-box clearfix">
                                                <div class="btn-box pull-left"><a
                                                        href="{{ url('property/details/' . $item->property_slug) }}"
                                                        class="theme-btn btn-two">See Details</a></div>
                                                <ul class="other-option pull-right clearfix">
                                                    <li><a aria-label="Compare" class="action-btn"
                                                            id="{{ $item->id }}" onclick="addToCompare(this.id)"><i
                                                                class="icon-12"></i></a></li>
                                                    <li><a aria-label="Add To Wishlist" class="action-btn"
                                                            id="{{ $item->id }}"
                                                            onclick="addToWishList(this.id)"><i class="icon-13"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="pagination-wrapper">
                        {{-- {{ $property->links('vendor.pagination.custom') }} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- property-page-section end -->

@endsection
