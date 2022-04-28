@if(\App\Models\PageSlide::where('page_id', $page->id)->get() != null)

    <div class="{{ $cssNs }}" id="pageSlider">

        @foreach(\App\Models\PageSlide::where('page_id', $page->id)->orderBy('_lft', 'ASC')->get() as $pageSlide)

        <div>

            <a href="{{ $pageSlide->slug }}">

                <figure class="{{ $pageSlide->class }}">
                    
                    <img
                        src="{{ $pageSlide->getFirstMediaUrl('pageSliderImage') }}"
                        alt="{{ $pageSlide->alt }}"
                        title="{{ $pageSlide->title }}"
                    />
                    <figcaption>{{ $pageSlide->figcaption }}</figcaption>

                </figure>

            </a>

        </div>

        @endforeach

    </div>

@endif
