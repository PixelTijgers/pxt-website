<footer class="{{ $cssNs }}">

    <div class="mx-auto max-w-screen-xl w-full">

        <div class="flex justify-between h-full footer-top">

            <div class="flex justify-start items-center w-1/2">

                <a href="{{ url()->current() }}" class="brand-logo">

                    <figure>

                        <img src="{{ URL::asset('img/common/' . config('cms.common.settings.logo')) }}" alt="{{ config('app.name') }} Logo" />

                    </figure>

                </a>

            </div>

            <x-social-media
                justify="justify-end"
                align="items-center"
                width="w-2/12"
            />

        </div>

        <div class="flex justify-between h-full copyright">

            <nav class="flex justify-start w-8/12">

                @include('front.layouts.navigation.menu.navigation-menu', [
                    'navigationMenu' => 'footer',
                ])

            </nav>

            <div class="flex justify-end w-4/12">

                <p>© {{ config('app.name') }} 2021 - {{ date('Y') }}, alle rechten voorbehouden.</p>

            </div>

        </div>

    </div>

</footer>
