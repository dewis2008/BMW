@php
    $serviceGroups = [
        [
            'image' => '1.png',
            'title' => 'Diagnostics & repairs',
            'summary' => 'Fault finding, everyday repair work and engine support.',
            'items' => ['BMW diagnostics', 'BMW repairs', 'Engine rebuilds'],
        ],
        [
            'image' => '2.png',
            'title' => 'Coding & driveline',
            'summary' => 'Module coding, retrofits and performance-focused gearbox work.',
            'items' => ['BMW coding', '8HP swaps', 'Retrofit support'],
        ],
        [
            'image' => '3.png',
            'title' => 'Performance builds',
            'summary' => 'Practical build support for faster, stronger BMW projects.',
            'items' => ['Turbo builds', 'Drift builds', 'Power and reliability setup'],
        ],
        [
            'image' => '4.png',
            'title' => 'Custom projects',
            'summary' => 'One-off work for BMW and MINI Group vehicles.',
            'items' => ['Custom BMW work', 'MINI Group support'],
        ],
    ];
@endphp

<section class="section section-dark" id="services" aria-labelledby="services-heading">
    <div class="section-shell">
        <div class="services-overview">
            <div class="services-intro">
                <p class="eyebrow">Specialist services</p>
                <h2 id="services-heading">BMW repairs, diagnostics, coding and build work under one roof.</h2>
                <p>R&S Auto Works focuses on BMW and MINI Group vehicles, from everyday repairs to advanced performance projects.</p>
            </div>

            <div class="services-grid" aria-label="Specialist service groups">
                @foreach($serviceGroups as $serviceGroup)
                    <article class="service-card">
                        <span class="service-icon" aria-hidden="true">
                            <img src="{{ asset("images/work/{$serviceGroup['image']}") }}" alt="" loading="lazy">
                        </span>
                        <h3>{{ $serviceGroup['title'] }}</h3>
                        <p>{{ $serviceGroup['summary'] }}</p>

                        <ul class="service-tags">
                            @foreach($serviceGroup['items'] as $item)
                                <li>{{ $item }}</li>
                            @endforeach
                        </ul>
                    </article>
                @endforeach
            </div>
        </div>
    </div>
</section>
