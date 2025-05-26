@php
    $ptype = App\Models\PropertyType::latest()->get();
@endphp
<section class="category-section centred">
    <div class="auto-container">
        <div class="inner-container wow slideInLeft animated" data-wow-delay="00ms" data-wow-duration="1500ms">
            <ul class="category-list clearfix clearfix d-flex flex-wrap justify-content-center">

                @foreach ($ptype as $item)
                    @php
                        $property = App\Models\Property::where('ptype_id', $item->id)->latest()->get();
                    @endphp
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
            {{-- <div class="more-btn"><a href="{{ route('all.category') }}" class="theme-btn btn-one">All Categories</a>
            </div> --}}
        </div>
    </div>
</section>
