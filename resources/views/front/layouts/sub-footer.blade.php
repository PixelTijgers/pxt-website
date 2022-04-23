<div class="{{ $cssNs }}">

            <div class="mx-auto max-w-screen-xl w-full">

                <div class="flex justify-start h-full">

                    <div class="flex justify-start flex-col w-1/4">

                        <h2>Over {{ config('cms.front.details.app_name') }}</h2>

                        <nav>

                            @include('front.layouts.navigation.menu.navigation-menu', [
                                'navigationMenu' => 'main',
                            ])

                        </nav>

                    </div>

                    <div class="flex justify-start flex-col w-1/3">

                        <h2>Expertises</h2>

                        <nav>

                            @include('front.layouts.navigation.menu.navigation-menu', [
                                'navigationMenu' => 'footer',
                            ])

                        </nav>

                    </div>

                    <div class="flex justify-start flex-col w-1/3 details">

                        <h2>Neem contact met ons op</h2>

                        <ul class="contact">

                            <li><i class="fa-solid fa-location-dot"></i> Vier Ambachtenstraat 5, 4551 HP Sas van Gent</li>
                            <li><a href="mailto:{{ config('cms.front.details.email') }}"><i class="fa-solid fa-envelope"></i>{{ config('cms.front.details.email') }}</a></li>
                            <li><a href="tel:{{ config('cms.front.details.phone') }}"><i class="fa-solid fa-mobile-screen"></i>{{ config('cms.front.details.mobile') }}</a></li>

                        </ul>

                        <ul>
                            <li><strong>Kvk:</strong> 12345678</li>
                            <li><strong>Btw:</strong> NLB07 123455678</li>
                        </ul>

                    </div>

                </div>

            </div>

        </div>
