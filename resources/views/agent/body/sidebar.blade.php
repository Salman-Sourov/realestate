@php
    $id = Auth::user()->id;
    $agentId = App\Models\User::find($id);
    $status = $agentId->status;
@endphp

<nav class="sidebar">
    <div class="sidebar-header" style="background: #011b39;">
        <a href="{{ route('agent.dashboard') }}" class="sidebar-brand">
            Mul<span>Kaan</span>
        </a>
    </div>
    <div class="sidebar-body" style="background: #011b39;">
        <ul class="nav">
            <li class="nav-item nav-category">Main</li>
            <li class="nav-item">
                <a href="{{ route('agent.dashboard') }}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Dashboard</span>
                </a>
            </li>

            @if ($status == 'active')
                <li class="nav-item nav-category">Real Agent</li>

                {{-- Property --}}
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#property" role="button" aria-expanded="false"
                        aria-controls="emails">
                        <i class="link-icon" data-feather="home"></i>
                        <span class="link-title">Property</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse" id="property">
                        <ul class="nav sub-menu">
                            <li class="nav-item">
                                <a href="{{ route('agent.all.property') }}" class="nav-link">All Property</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('agent.add.property') }}" class="nav-link">Add Property</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a href="{{ route('buy.package') }}" class="nav-link">
                        <i class="link-icon" data-feather="unlock"></i>
                        <span class="link-title">Buy Package</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('package.history') }}" class="nav-link">
                        <i class="link-icon" data-feather="package"></i>
                        <span class="link-title">Package History</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('agent.property.message') }}" class="nav-link">
                        <i class="link-icon" data-feather="mail"></i>
                        <span class="link-title">Property Message</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('agent.schedule.request') }}" class="nav-link">
                        <i class="link-icon" data-feather="mail"></i>
                        <span class="link-title">Schedule Request</span>
                    </a>
                </li>
            @else
            @endif
        </ul>
    </div>
</nav>
