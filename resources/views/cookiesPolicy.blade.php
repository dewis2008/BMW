@extends('layouts.app')

@section('title', 'Cookies Policy | R&S Auto Works')
@section('meta_description', 'Cookies policy for R&S Auto Works, explaining essential website cookies, optional Google Analytics cookies and consent choices.')
@section('og_title', 'Cookies Policy | R&S Auto Works')
@section('og_description', 'How R&S Auto Works uses essential cookies and optional Google Analytics cookies on this website.')

@section('content')
    <section class="section legal-hero" aria-labelledby="cookies-policy-heading">
        <div class="section-shell legal-hero-inner">
            <p class="eyebrow">Cookies</p>
            <h1 id="cookies-policy-heading">Cookies Policy</h1>
            <p>This policy explains how R&S Auto Works uses cookies and similar browser storage on this website.</p>
            <p class="legal-updated">Last updated <time datetime="2026-06-26">26 June 2026</time></p>
        </div>
    </section>

    <section class="section legal-section" aria-label="Cookies policy details">
        <div class="section-shell legal-layout">
            <nav class="legal-index" aria-label="Cookies policy sections">
                <span>On this page</span>
                <a href="#cookies-what">What cookies are</a>
                <a href="#cookies-essential">Essential cookies</a>
                <a href="#cookies-analytics">Analytics cookies</a>
                <a href="#cookies-manage">Managing choices</a>
                <a href="#cookies-contact">Contact</a>
            </nav>

            <div class="legal-content">
                <section id="cookies-what">
                    <h2>What cookies are</h2>
                    <p>Cookies are small files placed on your device by a website. Similar technologies, such as local storage, can also remember choices in your browser.</p>
                    <p>Some cookies are needed for the website to work. Optional analytics cookies are only used if you choose to accept them.</p>
                </section>

                <section id="cookies-essential">
                    <h2>Essential cookies and storage</h2>
                    <p>These are used for security, forms, sessions and remembering your cookie choice. They are not used for advertising.</p>

                    <div class="legal-table-wrap">
                        <table class="legal-table">
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Purpose</th>
                                    <th scope="col">Duration</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row"><code>{{ config('session.cookie') }}</code></th>
                                    <td>Keeps the website session working, including form security and status messages.</td>
                                    <td>Usually up to {{ config('session.lifetime') }} minutes of inactivity, unless your browser is closed or settings differ.</td>
                                </tr>
                                <tr>
                                    <th scope="row"><code>XSRF-TOKEN</code></th>
                                    <td>Helps protect forms from cross-site request forgery.</td>
                                    <td>Session based.</td>
                                </tr>
                                <tr>
                                    <th scope="row"><code>rs_autoworks_cookie_consent</code></th>
                                    <td>Stores whether you accepted or rejected optional analytics cookies.</td>
                                    <td>Stored in browser local storage until you change the setting or clear browser storage.</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </section>

                <section id="cookies-analytics">
                    <h2>Optional analytics cookies</h2>
                    <p>With your consent, this website uses Google Analytics to understand how visitors use the site and to improve content, navigation and performance.</p>
                    <p>Google Analytics may set cookies such as <code>_ga</code> and <code>_ga_*</code> to distinguish visitors and measure activity. These cookies are usually stored for up to 2 years, depending on Google Analytics settings.</p>
                    <p>We do not use Google Analytics for advertising cookies on this website.</p>
                </section>

                <section id="cookies-manage">
                    <h2>Managing choices</h2>
                    <p>You can accept or reject analytics cookies in the cookie banner. After making a choice, you can change it using Cookie settings in the footer.</p>
                    <p>You can also block or delete cookies in your browser settings. Blocking essential cookies may affect form submissions or other website features.</p>
                    <p>Google also provides information about analytics privacy controls at <a href="https://support.google.com/analytics/answer/181881" target="_blank" rel="noopener noreferrer">support.google.com/analytics/answer/181881</a>.</p>
                </section>

                <section id="cookies-contact">
                    <h2>Contact</h2>
                    <p>Questions about this policy can be sent through the website enquiry form or by writing to R&S Auto Works, 7 Auster Cl, Norwich, NR6 6BD, United Kingdom.</p>
                </section>
            </div>
        </div>
    </section>
@endsection
