@php
    $agents = App\Models\User::where('status', 'active')->where('role', 'agent')->orderBy('id', 'ASC')->get();
    $agentCount = $agents->count();
@endphp

@if ($agentCount > 0)
    <section class="team-section sec-pad centred bg-color-1">
        <div class="pattern-layer"
            style="background-image: url({{ asset('frontend') }}/assets/images/shape/shape-1.png);"></div>
        <div class="auto-container">
            <div class="sec-title">
                <h5>Our Agents</h5>
                <h2>Meet Our Excellent Agents</h2>
            </div>

            @if ($agentCount == 1)
                {{-- Single Agent Display --}}
                <div class="team-block-one" style="max-width: 370px; margin: 0 auto;">
                    <div class="inner-box">
                        <figure class="image-box">
                            <img src="{{ !empty($agents[0]->photo) ? url('upload/agent_images/' . $agents[0]->photo) : url('upload/no_image.jpg') }}"
                                alt="{{ $agents[0]->name }}" style="width:370px; height:370px;">
                        </figure>
                        <div class="lower-content">
                            <div class="inner">
                                <h4><a href="{{ route('agent.details', $agents[0]->id) }}">{{ $agents[0]->name }}</a>
                                </h4>
                                <span class="designation">{{ $agents[0]->email }}</span>
                                <ul class="social-links clearfix">
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            @elseif($agentCount > 1 && $agentCount < 5)
                {{-- Grid Layout for 2-4 Agents --}}
                <div class="row clearfix">
                    @foreach ($agents as $agent)
                        <div class="col-lg-{{ 12 / $agentCount }} col-md-6 col-sm-12 team-block">
                            <div class="inner-box">
                                <figure class="image-box">
                                    <img src="{{ !empty($agent->photo) ? url('upload/agent_images/' . $agent->photo) : url('upload/no_image.jpg') }}"
                                        alt="{{ $agent->name }}" style="width:370px; height:370px;">
                                </figure>
                                <div class="lower-content">
                                    <div class="inner">
                                        <h4><a href="{{ route('agent.details', $agent->id) }}">{{ $agent->name }}</a>
                                        </h4>
                                        <span class="designation">{{ $agent->email }}</span>
                                        <ul class="social-links clearfix">
                                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                            <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                {{-- Carousel for 5+ Agents --}}
                <div class="agents-carousel owl-carousel owl-theme">
                    @foreach ($agents as $agent)
                        <div class="team-block-one">
                            <div class="inner-box">
                                <figure class="image-box">
                                    <img src="{{ !empty($agent->photo) ? url('upload/agent_images/' . $agent->photo) : url('upload/no_image.jpg') }}"
                                        alt="{{ $agent->name }}" style="width:370px; height:370px;">
                                </figure>
                                <div class="lower-content">
                                    <div class="inner">
                                        <h4><a href="{{ route('agent.details', $agent->id) }}">{{ $agent->name }}</a>
                                        </h4>
                                        <span class="designation">{{ $agent->email }}</span>
                                        <ul class="social-links clearfix">
                                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                            <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>

    @if ($agentCount >= 5)
        <script>
            $(document).ready(function() {
                $('.agents-carousel').owlCarousel({
                    loop: {{ $agentCount > 5 ? 'true' : 'false' }},
                    margin: 30,
                    nav: true,
                    dots: false,
                    autoplay: true,
                    responsive: {
                        0: {
                            items: 1
                        },
                        768: {
                            items: 2
                        },
                        992: {
                            items: 3
                        },
                        1200: {
                            items: 4
                        }
                    }
                });
            });
        </script>
    @endif
@endif
