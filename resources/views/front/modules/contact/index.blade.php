@section('meta')
<title>{{ config('app.name') }} | {{ $page ? $page->meta_title : config('cms.common.settings.head.meta_title') }}</title>
    <meta name="description" content="{{ $page ? $page->meta_description : config('cms.common.settings.head.meta_description') }}">
    <meta name="keywords" content="{{ $page ? $page->meta_tags : config('cms.common.settings.head.meta_tags') }}">
    <meta name="author" content="{{ config('app.name') }}">
    <meta property="og:title" content="{{ $page ? $page->og_title : config('cms.common.settings.head.meta_title') }}" />
    <meta property="og:description" content="{{ $page ? $page->og_description : config('cms.common.settings.head.meta_description') }}" />
    <meta property="og:url" content="{{ $page ? $page->og_slug : url() }}" />
    <meta property="og:type" content="{{ $page ? $page->og_type : config('cms.common.settings.head.og_type') }}" />
    <meta property="og:locale" content="{{ $page ? $page->og_locale : config('cms.common.settings.head.og_locale') }}" />
    <meta property="og:updated_time" content="{{ $page ? $page->last_edit_at->toIso8601String() : now() }}" />
    <meta property="og:image" content="{{ $page->getFirstMediaUrl('pageOgImage') ? $page->getFirstMediaUrl('pageOgImage') : URL::asset('img/common/og_image_default.jpg') }}" />
@endsection

@pushOnce('styles')
@endPushOnce

@pushOnce('scripts')
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAkztYqAeIxU5sTDcFtylmfkKPNAecyQrU&callback=initMap&v=weekly" defer></script>
@endPushOnce

<x-front-layout>

        <main class="{{ $cssNs }}">

            <div id="map"></div>

            <div class="contact-container">

                <div class="mx-auto max-w-screen-xl w-full">

                    @include('front.layouts.breadcrumb', [
                        'breadcrum' => [
                            'Contact' => '/contact',
                        ],
                    ])

                    <h1>{{ $page->page_title }}</h1>

                </div>

            </div>

        </main>

</x-front-layout>
