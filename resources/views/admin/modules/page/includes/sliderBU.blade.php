<h6 class="card-title mt-4">{{ __('Slider') }}</h6>
<p class="mb-4 text-muted small">{{ __('Slider Description') }}</p>

<button class="addButton btn btn-primary mb-3 float-right" type="button">{{ __('Add') }}</button>

<ul id="nestedImages" class="mt-4">

    @if(!$pageSlides->isEmpty())

        @foreach($pageSlides as $key => $pageSlide)

            <li class="slider-item mb-3">

                <input type="hidden" name="pageSlider[{{ $key }}][_lft]" value="{{ $key }}" class="hidden-lft"/>

                <x-form.input
                    type="text"
                    name="pageSlider[0][title]"
                    :label="__('Image') . ' ' . __('Title')"
                    :value="$pageSlide['title']"
                />

            </li>
        @endforeach

    @else

        <li class="slider-item mb-3">

            <input type="hidden" name="pageSlider[0][_lft]" value="0" class="hidden-lft"/>

            <x-form.input
                type="text"
                name="pageSlider[0][title]"
                :label="__('Image') . ' ' . __('Title')"
                :value="(old('meta_title') ? old('meta_title') : (@$page ? $page->meta_title : null))"
            />

            <x-form.textarea
                name="pageSlider[0][figcaption]"
                maxLength="165"
                :description="__('Intro Description')"
                :label="__('Image') . ' ' . __('Figcation')"
                :value="(old('og_description') ? old('og_description') : (@$page ? $page->og_description : null))"
            />

            <x-form.input
                type="text"
                name="pageSlider[0][alt]"
                :label="__('Image') . ' ' . __('Alt')"
                :value="(old('meta_title') ? old('meta_title') : (@$page ? $page->meta_title : null))"
            />

            <x-form.slug
                name="pageSlider[0][slug]"
                slugField="page_title"
                :label="'OG ' . __('Url')"
                :model="@$page"
                :modelName="\App\Models\Post::where('id', @$page->parent_id)->first()"
                :value="(old('og_url') ? old('og_url') : (@$page ? $page->og_url : null))"
            />

            <x-form.file
                name="pageSlider[0][image]"
                id="pageSlider0"
                :label="'OG ' . __('Image')"
                :file="(@$page ? $page->getFirstMediaUrl('ogImage') : null)"
                extensions="jpg jpeg png"
                :description="__('OG Image Description')"
                :required="false"
                :duplicate="true"
            />

            <button class="closeButton btn btn-danger" type="button">{{ __('Delete') }}</button>

        </li>

    @endif

</ul>
