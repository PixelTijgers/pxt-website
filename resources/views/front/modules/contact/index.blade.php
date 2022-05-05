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

        <div class="main-container contact-container">

            <div class="mx-auto max-w-screen-xl w-full">

                @include('front.layouts.breadcrumb', [
                    'breadcrum' => [
                        'Contact' => '/contact',
                    ],
                ])

                <h2>{{ $page->page_title}} </h2>
                {!! $page->content !!}

                <div class="flex flex-row w-full justify-between">

                    <div class="w-8/12">

                        <form method="post" action="{{ route('sendForm') }}" class="flex flex-col w-full">

                            @csrf()

                            <div class="flex flex-row w-full">

                                <div class="flex w-1/2 input-group mr-1">

                                    <label for="name">Naam: *</label>
                                    <input type="text" name="name" placeholder="Naam" autofocus />

                                </div>

                                <div class="flex w-1/2 input-group ml-1">

                                    <label for="email">E-mail adres: *</label>
                                    <input type="email" name="email" placeholder="E-mail adres" />

                                </div>

                            </div>

                            <div class="flex flex-row w-full">

                                <div class="flex w-1/2 input-group mr-1">

                                    <label for="company">Bedrijf: </label>
                                    <input type="text" name="company" placeholder="Bedrijf" />

                                </div>

                                <div class="flex w-1/2 input-group ml-1">

                                    <label for="website">Website: </label>
                                    <input type="text" name="website" placeholder="Website" />

                                </div>

                            </div>

                            <div class="flex flex-row w-full">

                                <div class="flex w-full input-group">

                                    <label for="subject">Onderwerp: *</label>
                                    <input type="text" name="subject" placeholder="Onderwerp" />

                                </div>

                            </div>

                            <div class="flex flex-row w-full">

                                <div class="flex w-full input-group">

                                    <label for="message">Bericht: *</label>
                                    <textarea placeholder="Bericht" name="message"></textarea>

                                </div>

                            </div>

                            <span>* Deze velden zijn verplicht.</span>

                            <button type="submit" class="btn">Verzend</button>

                        </form>

                    </div>

                    <aside class="w-3/12">

                        <section class="widget">

                            <div class="widget-title">

                                <h3>Postadres</h3>

                            </div>

                            <div class="widget-content">

                                <ul>

                                    <li><h4>{{ config('app.name') }}</h4></li>
                                    <li>{{ $details->street }}</li>
                                    <li>{{ $details->zip_code }}, {{$details->location }}</li>
                                    <li>{{ $details->country }}</li>

                                </ul>

                            </div>

                        </section>

                        <section class="widget">

                            <div class="widget-title">

                                <h3>Bedrijfsgegevens</h3>

                            </div>

                            <div class="widget-content">

                                <ul>

                                    <li><strong>KVK:</strong> {{ $details->coc }}</li>
                                    <li><strong>btw-nummer:</strong> {{$details->vat }}</li>

                                </ul>

                            </div>

                        </section>

                        <section class="widget">

                            <div class="widget-title">

                                <h3>Social Media</h3>

                            </div>

                            <div class="widget-content">

                                <x-social-media />

                            </div>

                        </section>

                    </aside>

                </div>

            </div>

        </div>

        <div class="sub-container">

        </div>

    </main>

</x-front-layout>
