<!doctype html>
<html lang="en-GB">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title', 'R&S Auto Works | BMW & MINI Specialists in Norwich')</title>
        <meta name="description" content="@yield('meta_description', 'R&S Auto Works is a BMW and MINI specialist garage in Norwich for diagnostics, repairs, coding, engine rebuilds, 8HP swaps, turbo builds, drift builds and performance projects.')">
        <link rel="canonical" href="{{ url()->current() }}">
        <meta property="og:title" content="@yield('og_title', 'R&S Auto Works | BMW & MINI Specialists in Norwich')">
        <meta property="og:description" content="@yield('og_description', 'Specialist BMW and MINI diagnostics, repairs, coding and performance builds in Norwich.')">
        <meta property="og:type" content="website">
        <meta property="og:url" content="{{ url()->current() }}">
        <meta property="og:image" content="{{ asset('images/work/rs-drift-hero.jpg') }}">
        <meta name="twitter:card" content="summary_large_image">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @php
            $schema = [
                '@context' => 'https://schema.org',
                '@type' => 'AutoRepair',
                'name' => 'R&S Auto Works',
                'description' => 'BMW and MINI specialist garage in Norwich for diagnostics, repairs, coding, engine rebuilds, 8HP swaps, turbo builds, drift builds and performance projects.',
                'url' => url('/'),
                'image' => asset('images/work/rs-workshop-sign.jpg'),
                'address' => [
                    '@type' => 'PostalAddress',
                    'streetAddress' => '7 Auster Cl',
                    'addressLocality' => 'Norwich',
                    'postalCode' => 'NR6 6BD',
                    'addressCountry' => 'GB',
                ],
                'hasMap' => 'https://www.google.com/maps/search/?api=1&query=7%20Auster%20Cl%2C%20Norwich%2C%20United%20Kingdom%2C%20NR6%206BD',
                'areaServed' => 'Norwich, UK',
                'openingHoursSpecification' => [
                    [
                        '@type' => 'OpeningHoursSpecification',
                        'dayOfWeek' => [
                            'Monday',
                            'Tuesday',
                            'Wednesday',
                            'Thursday',
                            'Friday',
                        ],
                        'opens' => '08:30',
                        'closes' => '18:00',
                    ],
                ],
                'sameAs' => [
                    'https://www.facebook.com/AutoworksRS/',
                    'https://www.instagram.com/rsautoworksltdnorwich',
                ],
                'makesOffer' => [
                    ['@type' => 'Offer', 'itemOffered' => ['@type' => 'Service', 'name' => 'BMW diagnostics Norwich']],
                    ['@type' => 'Offer', 'itemOffered' => ['@type' => 'Service', 'name' => 'BMW repairs Norwich']],
                    ['@type' => 'Offer', 'itemOffered' => ['@type' => 'Service', 'name' => 'BMW coding Norwich']],
                    ['@type' => 'Offer', 'itemOffered' => ['@type' => 'Service', 'name' => 'BMW performance builds']],
                ],
            ];
        @endphp
        <script type="application/ld+json">
            {!! json_encode($schema, JSON_UNESCAPED_SLASHES) !!}
        </script>
    </head>
    <body>
        <a class="skip-link" href="#main">Skip to content</a>

        @include('partials.header')

        <main id="main">
            @yield('content')
        </main>

        @include('partials.footer')
    </body>
</html>
