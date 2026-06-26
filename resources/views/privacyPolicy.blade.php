@extends('layouts.app')

@section('title', 'Privacy Policy | R&S Auto Works')
@section('meta_description', 'Privacy policy for R&S Auto Works, explaining how enquiry, website and analytics data is collected and used.')
@section('og_title', 'Privacy Policy | R&S Auto Works')
@section('og_description', 'How R&S Auto Works collects, uses and protects personal information submitted through this website.')

@section('content')
    <section class="section legal-hero" aria-labelledby="privacy-policy-heading">
        <div class="section-shell legal-hero-inner">
            <p class="eyebrow">Privacy</p>
            <h1 id="privacy-policy-heading">Privacy Policy</h1>
            <p>R&S Auto Works respects your privacy. This policy explains what personal information we collect through this website, why we use it and the choices you have.</p>
            <p class="legal-updated">Last updated <time datetime="2026-06-26">26 June 2026</time></p>
        </div>
    </section>

    <section class="section legal-section" aria-label="Privacy policy details">
        <div class="section-shell legal-layout">
            <nav class="legal-index" aria-label="Privacy policy sections">
                <span>On this page</span>
                <a href="#privacy-who-we-are">Who we are</a>
                <a href="#privacy-information">Information we collect</a>
                <a href="#privacy-use">How we use information</a>
                <a href="#privacy-sharing">Who we share it with</a>
                <a href="#privacy-retention">How long we keep it</a>
                <a href="#privacy-rights">Your rights</a>
                <a href="#privacy-contact">Contact</a>
            </nav>

            <div class="legal-content">
                <section id="privacy-who-we-are">
                    <h2>Who we are</h2>
                    <p>This website is operated by R&S Auto Works, a BMW and MINI specialist workshop based at 7 Auster Cl, Norwich, NR6 6BD, United Kingdom.</p>
                    <p>For data protection purposes, R&S Auto Works is the controller of the personal information collected through this website.</p>
                </section>

                <section id="privacy-information">
                    <h2>Information we collect</h2>
                    <p>When you send an enquiry or quote request, we collect the details you choose to provide, such as your name, email address, phone number, vehicle details, preferred contact method, service required and message.</p>
                    <p>We also collect limited technical information needed to run and protect the website, such as security tokens, session information, approximate server log data and your cookie preference.</p>
                    <p>If you accept analytics cookies, Google Analytics may collect website usage information such as pages viewed, device and browser details, approximate location, referring website and interaction events. We do not intentionally connect this analytics data to your enquiry form submission.</p>
                </section>

                <section id="privacy-use">
                    <h2>How we use information</h2>
                    <p>We use personal information to respond to enquiries, prepare quotes, arrange workshop services, manage customer communication, protect the website from misuse and improve how the website performs.</p>
                    <p>Our lawful bases include taking steps before entering into a contract, fulfilling a contract, legitimate interests in operating and improving the business, complying with legal obligations and consent where optional analytics cookies are used.</p>
                </section>

                <section id="privacy-sharing">
                    <h2>Who we share it with</h2>
                    <p>We only share personal information where it is necessary for running the website or business. This may include hosting providers, email providers, website support providers, professional advisers and authorities where required by law.</p>
                    <p>If you accept analytics cookies, usage data is processed by Google Analytics. Google may process data outside the United Kingdom or European Economic Area using appropriate transfer safeguards.</p>
                </section>

                <section id="privacy-retention">
                    <h2>How long we keep it</h2>
                    <p>We keep enquiry records for as long as reasonably needed to handle your request, provide services, maintain business records, resolve issues and meet legal or accounting requirements.</p>
                    <p>Technical logs are kept only for operational and security needs. Analytics data retention is controlled in Google Analytics. Cookie choices are stored on your device until you change them or clear browser storage.</p>
                </section>

                <section id="privacy-rights">
                    <h2>Your rights</h2>
                    <p>You may have the right to ask for access to your personal information, correction, deletion, restriction, portability or to object to some processing. Where processing is based on consent, you can withdraw that consent at any time.</p>
                    <p>You also have the right to complain to the UK Information Commissioner's Office. You can find more information at <a href="https://ico.org.uk/make-a-complaint/" target="_blank" rel="noopener noreferrer">ico.org.uk/make-a-complaint</a>.</p>
                </section>

                <section id="privacy-contact">
                    <h2>Contact</h2>
                    <p>To ask about this policy or your personal information, contact R&S Auto Works using the website enquiry form or write to R&S Auto Works, 7 Auster Cl, Norwich, NR6 6BD, United Kingdom.</p>
                </section>
            </div>
        </div>
    </section>
@endsection
