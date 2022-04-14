@role('superadmin')
<h6 class="card-title">{{ __('Usertype') }}</h6>

<x-form.radio
    name="role"
    wrapperClass="admin-permissions-switcher mb-5"
    :label="__('Usertype')"
    :value="(@$administrator ? \Arr::first($administrator->roles->pluck('name')->toArray()) : null)"
    :options="[
        'superadmin'    => __('Superadmin'),
        'administrator' => __('Administrator'),
        'editor'        => __('Editor'),
        'user'          => __('User'),
    ]"
/>

@endrole

<x-form.file
    name="avatar"
    extensions="jpg jpeg png"
    :label="__('Image')"
    :file="(@$administrator ? $administrator->getFirstMediaUrl('avatar') : null)"
    :description="__('Image Description')"
    :required="false"
/>
