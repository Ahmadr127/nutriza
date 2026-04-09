@extends('layouts.public')

@section('content')
    <!-- 1. Hero Section -->
    <x-public.sections.hero :hero="$hero" :settings="$settings" />

    <!-- 2. Benefits Section -->
    <x-public.sections.benefits :benefits="$benefits" />

    <!-- 3. All You Need (Benefits Copywriting & Testimonial) -->
    <x-public.sections.all-you-need :settings="$settings" />

    <!-- 4. Programs List Section -->
    <x-public.sections.programs :programs="$programs" :settings="$settings" />

    <!-- 4.5. What's Inside Detail (Static In   fographic) -->
    <x-public.sections.whats-inside-detail />

    <!-- 5. What's Inside (Menu) Section -->
    <x-public.sections.whats-inside :menus="$menus" />
    

    <!-- 5. Testimonials Section -->
    <x-public.sections.testimonials :testimonials="$testimonials" />

    <!-- 6. FAQ Section -->
    <x-public.sections.faq :faqs="$faqs" />
@endsection
