@php
    $skip_state_0 = App\Models\State::skip(0)->first();
    $skip_state_1 = App\Models\State::skip(1)->first();
    $skip_state_2 = App\Models\State::skip(2)->first();
    $skip_state_3 = App\Models\State::skip(3)->first();
@endphp

@if ($skip_state_0 && $skip_state_1 && $skip_state_2 && $skip_state_3)
    @php
        $property_0 = App\Models\Property::where('state', $skip_state_0->id)->get();
        $property_1 = App\Models\Property::where('state', $skip_state_1->id)->get();
        $property_2 = App\Models\Property::where('state', $skip_state_2->id)->get();
        $property_3 = App\Models\Property::where('state', $skip_state_3->id)->get();
    @endphp

    <section class="place-section sec-pad">
        <div class="auto-container">
            <div class="sec-title centred">
                <h5>Top Places</h5>
                <h2>Most Popular Places</h2>
                <p>Discover the most stunning and visited destinations around the world...</p>
            </div>
            <div class="sortable-masonry">
                <div class="items-container row clearfix">
                    {{-- Block 0 --}}
                    <a href="{{ route('state.details', $skip_state_0->id) }}">
                        <div class="col-lg-4 col-md-6 col-sm-12 masonry-item small-column all illustration brand marketing software">
                            <div class="place-block-one">
                                <div class="inner-box">
                                    <figure class="image-box">
                                        <img src="{{ asset($skip_state_0->state_image) }}" alt="" style="width:370px; height:580px;">
                                    </figure>
                                    <div class="text">
                                        <h4><a href="{{ route('state.details', $skip_state_0->id) }}">{{ $skip_state_0->state_name }}</a></h4>
                                        <p>{{ count($property_0) }} Properties</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>

                    {{-- Block 1 --}}
                    <a href="{{ route('state.details', $skip_state_1->id) }}">
                        <div class="col-lg-4 col-md-6 col-sm-12 masonry-item small-column all brand illustration print software logo">
                            <div class="place-block-one">
                                <div class="inner-box">
                                    <figure class="image-box">
                                        <img src="{{ asset($skip_state_1->state_image) }}" alt="" style="width:370px; height:275px;">
                                    </figure>
                                    <div class="text">
                                        <h4><a href="{{ route('state.details', $skip_state_1->id) }}">{{ $skip_state_1->state_name }}</a></h4>
                                        <p>{{ count($property_1) }} Properties</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>

                    {{-- Block 2 --}}
                    <a href="{{ route('state.details', $skip_state_2->id) }}">
                        <div class="col-lg-4 col-md-6 col-sm-12 masonry-item small-column all illustration marketing logo">
                            <div class="place-block-one">
                                <div class="inner-box">
                                    <figure class="image-box">
                                        <img src="{{ asset($skip_state_2->state_image) }}" alt="" style="width:370px; height:275px;">
                                    </figure>
                                    <div class="text">
                                        <h4><a href="{{ route('state.details', $skip_state_2->id) }}">{{ $skip_state_2->state_name }}</a></h4>
                                        <p>{{ count($property_2) }} Properties</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>

                    {{-- Block 3 --}}
                    <a href="{{ route('state.details', $skip_state_3->id) }}">
                        <div class="col-lg-8 col-md-6 col-sm-12 masonry-item small-column all brand marketing print software">
                            <div class="place-block-one">
                                <div class="inner-box">
                                    <figure class="image-box">
                                        <img src="{{ asset($skip_state_3->state_image) }}" alt="" style="width:770px; height:275px;">
                                    </figure>
                                    <div class="text">
                                        <h4><a href="{{ route('state.details', $skip_state_3->id) }}">{{ $skip_state_3->state_name }}</a></h4>
                                        <p>{{ count($property_3) }} Properties</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
@endif
