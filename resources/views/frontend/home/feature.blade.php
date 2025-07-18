@php
    $property = App\Models\Property::where('status', '1')->where('featured', '1')->latest()->limit(3)->get();
    $count_property = $property->count();
@endphp

<section class="feature-section sec-pad bg-color-1">
    <div class="auto-container">
        <div class="sec-title centred">
            <h5>Features</h5>
            <h2>Featured Property</h2>
            <p>Featuring the country's most selective developments, we promise investors and buyers an unmatched level
                of service.</p>
        </div>
        <div class="row clearfix">

            @foreach ($property as $item)
                @php
                    $user = App\Models\User::where('id', $item->agent_id)->get();
                @endphp
                <div class="col-lg-4 col-md-6 col-sm-12 feature-block">
                    <div class="feature-block-one wow fadeInUp animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                        <div class="inner-box">
                            <div class="image-box">
                                <a href="{{ url('property/details/' . $item->property_slug) }}">
                                    <figure class="image">
                                        <img src="{{ asset($item->property_thambnail) }}"
                                            alt="empotechbd_property_image" style="width: 500px; height: 250px;">
                                    </figure>
                                </a>
                                <div class="batch"><i class="icon-11"></i></div>
                                {{-- <span class="category">Featured</span> --}}
                                <span class="category">{{ $item->type->type_name }}</span>
                            </div>
                            <div class="lower-content">
                                <div class="author-info clearfix">
                                    <div class="author pull-left">
                                        @if ($item->agent_id == null)
                                            <figure class="author-thumb"><img
                                                    src="{{ url('upload/salman_sourov.png') }}" alt=""></figure>
                                            <p class="agent">Admin</p>
                                        @else
                                            <figure class="author-thumb"><img
                                                    src="{{ !empty($item->user->photo) ? url('upload/agent_images/' . $item->user->photo) : url('upload/no_image.jpg') }}"
                                                    alt=""></figure>
                                            {{-- <h6>{{ $item->user->name }}</h6> --}}
                                            <p class="agent">{{ $item->user->name }}</p>
                                        @endif
                                    </div>
                                    <div class="buy-btn pull-right"><a
                                            href="{{ url('property/details/' . $item->property_slug) }}">For
                                            Buy</a>
                                    </div>
                                </div>
                                <div class="title-text">
                                    <h4><a
                                            href="{{ url('property/details/' . $item->property_slug) }}">{{ $item->property_name }}</a>
                                    </h4>
                                </div>
                                <div class="price-box clearfix">
                                    <div class="price-info pull-left">
                                        <div class="d-flex align-items-center mb-2">
                                            <i class="fas fa-map-marker-alt text-danger" style="margin-right: 5px;"></i>
                                            <span class="text-truncate text-dark fw-medium">
                                                {{ $item['pstate']['state_name'] ?? 'N/A' }}
                                            </span>
                                        </div>
                                        <h6>Start From</h6>
                                        <h4>৳ {{ $item->lowest_price }}</h4>
                                    </div>
                                    <ul class="other-option pull-right clearfix">
                                        <li><a aria-label="Compare" class="action-btn" id="{{ $item->id }}"
                                                onclick="addToCompare(this.id)"><i class="icon-12"></i></a></li>
                                        <li><a aria-label="Add To Wishlist" class="action-btn" id="{{ $item->id }}"
                                                onclick="addToWishList(this.id)"><i class="icon-13"></i></a></li>
                                    </ul>
                                </div>
                                <p class="two-line-text">{{ $item->short_descp }}</p>
                                <ul class="more-details clearfix">
                                    <li><i class="icon-14"></i>{{ $item->bedrooms }} Beds</li>
                                    <li><i class="icon-15"></i>{{ $item->bathrooms }} Baths</li>
                                    <li><i class="icon-16"></i>{{ $item->property_size }} SqFt</li>
                                </ul>
                                <div class="btn-box"><a href="{{ url('property/details/' . $item->property_slug) }}"
                                        class="theme-btn btn-two">See Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>

        @if ($count_property > 3)
            <div class="more-btn centred"><a href="{{ route('all.property') }}" class="theme-btn btn-one">View All
                    Listing</a></div>
        @endif
    </div>
</section>
