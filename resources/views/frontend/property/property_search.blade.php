@php
    $states = App\Models\State::latest()->get();
    $ptypes = App\Models\PropertyType::latest()->get();
@endphp

@extends('frontend.frontend_dashboard')
@section('main')
@section('title')
    Property Search | EMPO RealEstate
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
                @if ($property->isNotEmpty())
                    {{ ucfirst($property->first()->property_status) }} Property Search
                @else
                    Empty Property Search
                @endif
            </h1>
            <ul class="bread-crumb clearfix">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li>Property Search</li>
            </ul>
        </div>
    </div>
</section>
<!--End Page Title-->


<!-- property-page-section -->
<section class="property-page-section property-list">
    <div class="auto-container">
        <div class="row clearfix">

            <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                <div class="default-sidebar property-sidebar">

                    <div class="filter-widget sidebar-widget">
                        <div class="widget-title">
                            <h5>Property Search</h5>
                        </div>

                        <form action="{{ route('all.property.search') }}" method="post" class="search-form">
                            @csrf
                            <div class="widget-content">
                                <div class="select-box">
                                    <select name="property_status" class="wide">
                                        <option data-display="Property Status">Select Status</option>
                                        <option value="buy">Buy</option>
                                        <option value="rent">Sell</option>
                                    </select>
                                </div>

                                <div class="select-box">
                                    <select name="ptype_id" class="wide">
                                        <option data-display="Type" selected="" disabled="">Select Type</option>
                                        @foreach ($ptypes as $type)
                                            <option value="{{ $type->type_name }}">{{ $type->type_name }}</option>
                                        @endforeach

                                    </select>
                                </div>

                                <div class="select-box">
                                    <select name="state" class="wide">
                                        <option data-display="Area" selected="" disabled="">Select State/Area</option>
                                        @foreach ($states as $state)
                                            <option value="{{ $state->state_name }}">{{ $state->state_name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="select-box">
                                    <select name="bedrooms" class="wide">
                                        <option data-display="Rooms">Max Rooms</option>
                                        <option value="1">1 Rooms</option>
                                        <option value="2">2 Rooms</option>
                                        <option value="3">3 Rooms</option>
                                        <option value="4">4 Rooms</option>
                                        <option value="4">5 Rooms</option>
                                    </select>
                                </div>
                                <div class="select-box">
                                    <select name="bathrooms" class="wide">
                                        <option data-display="Bathrooms">Max BathRooms</option>
                                        <option value="1">1 BathRooms</option>
                                        <option value="2">2 BathRooms</option>
                                        <option value="3">3 BathRooms</option>
                                        <option value="4">4 BathRooms</option>
                                        <option value="5">5 BathRooms</option>
                                    </select>
                                </div>

                                <div class="filter-btn">
                                    <button type="submit" class="theme-btn btn-one"><i
                                            class="fas fa-filter"></i>&nbsp;Filter</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    {{-- <div class="price-filter sidebar-widget">
                        <div class="widget-title">
                            <h5>Select Price Range</h5>
                        </div>
                        <div class="range-slider clearfix">
                            <div class="clearfix">
                                <div class="input">
                                    <input type="text" class="property-amount" name="field-name" readonly="">
                                </div>
                            </div>
                            <div class="price-range-slider"></div>
                        </div>
                    </div> --}}
                </div>
            </div>

            <div class="col-lg-8 col-md-12 col-sm-12 content-side">
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
                                        <a href="{{ url('property/details/' . $item->property_slug) }}"
                                            class="image-box-link">
                                            <div class="image-box">
                                                <figure class="image"><img
                                                        src="{{ asset($item->property_thambnail) }}" alt=""
                                                        style="width:300px; height:350px;"></figure>
                                                <div class="batch"><i class="icon-11"></i></div>
                                                <span class="category">{{ $item->type->type_name }}</span>
                                                <div class="buy-btn"><a href="#">For
                                                        {{ $item->property_status }}</a></div>
                                            </div>
                                        </a>
                                            <div class="lower-content">
                                                <div class="title-text">
                                                    <h4><a
                                                            href="{{ url('property/details/' . $item->property_slug) }}">{{ $item->property_name }}</a>
                                                    </h4>
                                                </div>
                                                <div class="price-box clearfix">
                                                    <div class="price-info pull-left">
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
                                                                id="{{ $item->id }}"
                                                                onclick="addToCompare(this.id)"><i
                                                                    class="icon-12"></i></a></li>

                                                        <li><a aria-label="Add To Wishlist" class="action-btn"
                                                                id="{{ $item->id }}"
                                                                onclick="addToWishList(this.id)"><i
                                                                    class="icon-13"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                    {{-- <div class="pagination-wrapper">
                            {{ $property->links('vendor.pagination.custom') }}
                        </div> --}}
                </div>
            </div>
        </div>
    </div>
</section>
<!-- property-page-section end -->
@endsection
