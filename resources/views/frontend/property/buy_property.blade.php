@extends('frontend.frontend_dashboard')
@section('title', 'Buy Property | EMPO RealEstate')
@section('main')

<section class="page-title-two bg-color-1 centred">
    <div class="pattern-layer">
        <div class="pattern-1" style="background-image: url({{ asset('frontend/assets/images/shape/shape-9.png') }});"></div>
        <div class="pattern-2" style="background-image: url({{ asset('frontend/assets/images/shape/shape-10.png') }});"></div>
    </div>
    <div class="auto-container">
        <div class="content-box clearfix">
            <h1>All Buy Properties</h1>
            <ul class="bread-crumb clearfix">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li>Buy Property List</li>
            </ul>
        </div>
    </div>
</section>

<section class="property-page-section property-list">
    <div class="auto-container">
        <div class="row clearfix">

            {{-- Sidebar --}}
            <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                <div class="default-sidebar property-sidebar">

                    {{-- Property Types --}}
                    <div class="category-widget sidebar-widget">
                        <div class="widget-title">
                            <h5>Choose Property Type (Buy)</h5>
                        </div>
                        <ul class="category-list clearfix">
                            @foreach ($propertyTypes as $type)
                                @php
                                    $count = $type->properties()->where('property_status', 'buy')->count();
                                @endphp
                                <li>
                                    <a href="{{ route('buy.property.plot.flat', $type->id) }}">
                                        Buy {{ $type->type_name }}
                                        <span>({{ $count }})</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    {{-- Search Form --}}
                    <div class="filter-widget sidebar-widget">
                        <div class="widget-title">
                            <h5>Property Search</h5>
                        </div>
                        <form action="{{ route('all.property.search') }}" method="POST" class="search-form">
                            @csrf
                            <div class="widget-content">

                                <div class="select-box">
                                    <select name="property_status" class="wide">
                                        <option data-display="Property Status" disabled selected>Select Status</option>
                                        <option value="buy">Buy</option>
                                        <option value="sell">Sell</option>
                                    </select>
                                </div>

                                <div class="select-box">
                                    <select name="ptype_id" class="wide">
                                        <option data-display="Type" disabled selected>Select Type</option>
                                        @foreach ($propertyTypes as $type)
                                            <option value="{{ $type->type_name }}">{{ $type->type_name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="select-box">
                                    <select name="state" class="wide">
                                        <option data-display="Area" disabled selected>Select Area</option>
                                        @foreach ($states as $state)
                                            <option value="{{ $state->state_name }}">{{ $state->state_name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="select-box">
                                    <select name="bedrooms" class="wide">
                                        <option data-display="Rooms">Max Rooms</option>
                                        @for ($i = 1; $i <= 5; $i++)
                                            <option value="{{ $i }}">{{ $i }} Room{{ $i > 1 ? 's' : '' }}</option>
                                        @endfor
                                    </select>
                                </div>

                                <div class="select-box">
                                    <select name="bathrooms" class="wide">
                                        <option data-display="Bathrooms">Max Bathrooms</option>
                                        @for ($i = 1; $i <= 5; $i++)
                                            <option value="{{ $i }}">{{ $i }} Bathroom{{ $i > 1 ? 's' : '' }}</option>
                                        @endfor
                                    </select>
                                </div>

                                <div class="filter-btn">
                                    <button type="submit" class="theme-btn btn-one">
                                        <i class="fas fa-filter"></i>&nbsp;Filter
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>

            {{-- Properties List --}}
            <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                <div class="property-content-side">
                    <div class="item-shorting clearfix">
                        <div class="left-column pull-left">
                            <h5>Search Results: <span>Showing {{ $properties->count() }} Listings</span></h5>
                        </div>
                        <div class="left-column pull-right">
                            <h5>Total Buy Property: <span>{{ $totalBuyProperties }}</span></h5>
                        </div>
                    </div>

                    <div class="wrapper list">
                        <div class="deals-list-content list-item">
                            @forelse ($properties as $item)
                                <div class="deals-block-one">
                                    <div class="inner-box">
                                        <div class="image-box">
                                            <a href="{{ url('property/details/' . $item->property_slug) }}">
                                                <figure class="image">
                                                    <img src="{{ asset($item->property_thambnail) }}" alt="property image" style="width: 500px; height: 350px;">
                                                </figure>
                                            </a>
                                            <div class="batch"><i class="icon-11"></i></div>
                                            <span class="category">{{ $item->type->type_name }}</span>
                                            <div class="buy-btn"><a href="{{ route('buy.property') }}">For {{ ucfirst($item->property_status) }}</a></div>
                                        </div>

                                        <div class="lower-content">
                                            <div class="title-text">
                                                <h4><a href="{{ url('property/details/' . $item->property_slug) }}">{{ $item->property_name }}</a></h4>
                                            </div>

                                            <div class="price-box clearfix">
                                                <div class="price-info pull-left">
                                                    <h6>Start From</h6>
                                                    <h4>৳ {{ $item->lowest_price }}</h4>
                                                </div>

                                                <div class="author-box pull-right">
                                                    <figure class="author-thumb">
                                                        @if ($item->user)
                                                            <img src="{{ url('upload/agent_images/' . $item->user->photo) }}" alt="">
                                                            <span>{{ $item->user->name }}</span>
                                                        @else
                                                            <img src="{{ url('upload/salman_sourov.png') }}" alt="">
                                                            <span>Admin</span>
                                                        @endif
                                                    </figure>
                                                </div>
                                            </div>

                                            <p>{{ $item->short_descp }}</p>
                                            <ul class="more-details clearfix">
                                                <li><i class="icon-14"></i>{{ $item->bedrooms }} Beds</li>
                                                <li><i class="icon-15"></i>{{ $item->bathrooms }} Baths</li>
                                                <li><i class="icon-16"></i>{{ $item->property_size }} Sq Ft</li>
                                            </ul>

                                            <div class="other-info-box clearfix">
                                                <div class="btn-box pull-left">
                                                    <a href="{{ url('property/details/' . $item->property_slug) }}" class="theme-btn btn-two">See Details</a>
                                                </div>
                                                <ul class="other-option pull-right clearfix">
                                                    <li><a class="action-btn" onclick="addToCompare({{ $item->id }})"><i class="icon-12"></i></a></li>
                                                    <li><a class="action-btn" onclick="addToWishList({{ $item->id }})"><i class="icon-13"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <p>No properties found for buying.</p>
                            @endforelse
                        </div>
                    </div>

                    {{-- Pagination --}}
                    <div class="pagination-wrapper">
                        {{ $properties->links('vendor.pagination.custom') }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection
