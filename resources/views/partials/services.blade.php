@php
    $services = [
        ['icon' => 'DIAG', 'title' => 'BMW Diagnostics', 'description' => 'Fault finding for warning lights, running issues, electrical faults and control module problems.'],
        ['icon' => 'FIX', 'title' => 'BMW Repairs', 'description' => 'Daily repair work for BMW owners who want the job handled by a marque-focused workshop.'],
        ['icon' => 'CODE', 'title' => 'BMW Coding', 'description' => 'BMW coding and programming for features, module changes, retrofits and specialist updates.'],
        ['icon' => 'ENG', 'title' => 'Engine Rebuilds', 'description' => 'Engine strip-down, rebuild and repair support for BMW and MINI Group vehicles.'],
        ['icon' => '8HP', 'title' => '8HP Gearbox Swaps', 'description' => 'BMW 8HP swap planning, supporting work and performance-focused driveline projects.'],
        ['icon' => 'DRFT', 'title' => 'Drift Builds', 'description' => 'Practical BMW drift build knowledge from cars built for hard use, setup and testing.'],
        ['icon' => 'TRBO', 'title' => 'Turbo Builds', 'description' => 'Turbo BMW project support for owners building more capable street and track cars.'],
        ['icon' => 'PERF', 'title' => 'Performance Builds', 'description' => 'Performance-focused BMW work for power, reliability, response and drivability.'],
        ['icon' => 'BMW', 'title' => 'Custom BMW Projects', 'description' => 'Custom project support for unusual BMW builds, modifications and retrofit work.'],
        ['icon' => 'MINI', 'title' => 'MINI Group Vehicle Support', 'description' => 'Specialist diagnostics and repair support for MINI Group vehicles in Norwich.'],
    ];
@endphp

<section class="section section-dark" id="services" aria-labelledby="services-heading">
    <div class="section-shell">
        <div class="section-heading">
            <p class="eyebrow">Specialist services</p>
            <h2 id="services-heading">BMW repairs, diagnostics, coding and build work under one roof.</h2>
            <p>R&S Auto Works focuses on BMW and MINI Group vehicles, from everyday repairs to advanced performance projects.</p>
        </div>

        <div class="services-grid">
            @foreach($services as $service)
                <article class="service-card">
                    <span class="service-icon" aria-hidden="true">{{ $service['icon'] }}</span>
                    <h3>{{ $service['title'] }}</h3>
                    <p>{{ $service['description'] }}</p>
                </article>
            @endforeach
        </div>
    </div>
</section>
