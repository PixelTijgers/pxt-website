<h6 class="card-title mt-4">{{ __('Slider') }}</h6>
<p class="mb-4 text-muted small">{{ __('Slider Description') }}</p>

<button class="addButton btn btn-primary mb-3 float-right" type="button">{{ __('Add') }}</button>

<ul id="nestedImages" class="mt-4">

    <li class="slider-item mb-3">

        <input type="hidden" name="pageSlider[0][_lft]" value="0" class="hidden-lft"/>

        <x-form.input
            type="text"
            name="pageSlider[0][title]"
            :label="__('Image') . ' ' . __('Title')"
            :value="(old('meta_title') ? old('meta_title') : (@$page ? $page->meta_title : null))"
        />

        <button class="closeButton btn btn-danger" type="button">{{ __('Delete') }}</button>

    </li>

</ul>
