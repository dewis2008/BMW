@extends('layouts.app')

@section('title', 'R&S Auto Works | BMW & MINI Specialist Norwich')
@section('meta_description', 'R&S Auto Works in Norwich specialises in BMW and MINI diagnostics, repairs, coding, engine rebuilds, 8HP swaps, drift builds, turbo builds and custom performance projects.')

@section('content')
    @include('partials.hero')
    @include('partials.services')
    @include('partials.performance-builds')
    @include('partials.gallery')
    @include('partials.about')
    @include('partials.contact-form')
@endsection
