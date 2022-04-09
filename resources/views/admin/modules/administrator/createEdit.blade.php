@section('meta')
<title>{{ config('app.name') }} | {{ (@$administrator ? __('Edit') . ' ' . \Str::Lower(__('User')) . ': ' . $administrator->name : __('User') . ' ' . \Str::Lower(__('Add'))) }}</title>
    <meta name="description" content="{{ (@$administrator ? __('Users Edit') : __('Users Add')) }}" />
@endsection

<x-adminLayout>

    <div class="{{ $cssNs }}">

                    @include('admin.layouts.breadcrumb', [
                        'title' => __('Users'),
                        'description' => (@$administrator ? __('Users Edit') : __('Users Add')),
                        'breadcrum' => [
                            __('Users') => route('administrator.index'),
                            (@$administrator ? __('Edit') . ' ' . \Str::Lower(__('User')) . ': ' . $administrator->name : __('User') . ' ' . \Str::Lower(__('Add'))) => '#'
                        ],
                    ])
                    @if ($errors->any())

                    <div class="alert alert-fill-danger alert-dismissible fade show" role="alert">
                        {{ __('modules.msg_alert_error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"></button>
                    </div>
                    @endif

                    <form class="form-content row" method="post" action="{{ (@$administrator ? route('administrator.update', $administrator) : route('administrator.store')) }}" enctype="multipart/form-data">

                        <div class="row">

                            <div class="col-md-12 grid-margin stretch-card">

                                <div class="card">

                                    <div class="card-body">

                                        <div class="row">

                                            <div class="col-md-12">

                                                <h6 class="card-title">{{ (@$administrator ? __('Edit') . ' ' . \Str::Lower(__('User')) . ': ' . $administrator->name : __('User') . ' ' . \Str::Lower(__('Add'))) }}</h6>
                                                <p class="text-muted mb-4">{{ __('Users Edit Description') }}</p>

                                            </div>

                                            @csrf

                                            @if(@$administrator)

                                            @method('PATCH')

                                            @endif

                                            <div class="col-md-7 grid-margin">

                                                <div>

                                                    <div>

                                                        <h6 class="card-title">{{ __('General') }}</h6>

                                                        <x-form.input
                                                            type="text"
                                                            name="name"
                                                            :label="__('Name')"
                                                            :required="true"
                                                            :value="(old('name') ? old('name') : (@$administrator ? $administrator->name : null))"
                                                        />

                                                        <x-form.input
                                                            type="email"
                                                            name="email"
                                                            :label="__('Email')"
                                                            :required="true"
                                                            :value="(old('email') ? old('email') : (@$administrator ? $administrator->email : null))"
                                                        />

                                                        <x-form.input
                                                            type="text"
                                                            name="phone"
                                                            :label="__('Phone')"
                                                            :required="true"
                                                            :value="(old('phone') ? old('phone') : (@$administrator ? $administrator->phone : null))"
                                                        />

                                                        <h6 class="card-title mt-5">{{ __('Edit') }} {{ __('Password') }}</h6>
                                                        <p class="card-description small text-muted mb-3">{{ __('Password Description Edit') }}</p>

                                                        <x-form.input
                                                            type="password"
                                                            name="password"
                                                            :label="__('Password')"
                                                            :required="false"
                                                        />

                                                        <x-form.input
                                                            type="password"
                                                            name="password_confirmation"
                                                            :label="__('Repeat Password')"
                                                            :required="false"
                                                        />

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="col-md-4 offset-1 grid-margin">

                                                <div>

                                                    <div>

                                                        @role('superadmin')
                                                        <h6 class="card-title">{{ __('Usertype') }}</h6>

                                                        <x-form.radio
                                                            name="role"
                                                            wrapperClass="admin-permissions-switcher"
                                                            :label="__('Usertype')"
                                                            :value="(@$administrator ? \Arr::first($administrator->roles->pluck('name')->toArray()) : null)"
                                                            :options="[
                                                                'superadmin'    => __('Superadmin'),
                                                                'administrator' => __('Administrator'),
                                                                'moderator'     => __('Moderator'),
                                                                'editor'        => __('Editor'),
                                                                'user'          => __('User'),
                                                                'demo'          => __('Demo'),
                                                            ]"
                                                        />

                                                        @endrole

                                                        <h6 class="card-title mt-5">{{ __('Image') }}</h6>

                                                        <x-form.file
                                                            name="avatar"
                                                            extensions="jpg jpeg png"
                                                            :label="__('Image')"
                                                            :file="(@$administrator ? $administrator->getFirstMediaUrl('avatar') : null)"
                                                            :description="__('Image Description')"
                                                        />
                                                    </div>

                                                </div>

                                            </div>

                                        </div>
                                        
                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="row">

                            <div class="col-md-12 grid-margin stretch-card">

                                <div class="card">

                                    <div class="card-body">

                                        <div class="col-md-12 admin-permissions {{ @$administrator ? (\Arr::first(@$administrator->roles->pluck('name')->toArray()) == 'superadmin' ? 'd-none' : null) : null }}">

                                            <div>

                                                <div>

                                                    <h6 class="card-title">Gebruikersrechten</h6>

                                                    <div class="row">

                                                        <div class="form-group d-flex flex-wrap w-100">
                                                        @foreach($permissions as $route => $permissionArray)

                                                            <div class="grouped-permissions mt-3 col-3 {{ str_replace('modules.', '', $route) }}">

                                                                <h6><i class="fa-regular fa-{{ __('Icon ' . ucfirst(str_replace('modules.', '', $route))) }} mr-1"></i>
                                                                    {{ Str::upper(__(str_replace('modules.', '', $route))) }}
                                                                </h6>
                                                            @foreach($permissionArray as $permission)

                                                                <div class="form-check mt-2 {{ ($loop->last ? 'mb-4' : null) }}">

                                                                    <input
                                                                        type="checkbox"
                                                                        class="form-check-input {{ $permission }}"
                                                                        name="permission[{{ $route . '.' . $permission }}][]"
                                                                        id="{{ $route . '.' . $permission }}"
                                                                        @if(@$administrator && $administrator->can($route . '.' . $permission)) checked @endif
                                                                    >

                                                                    <label class="form-check-label" for="{{ $route . '.' . $permission }}">{{ __(ucfirst($permission)) }}</label>

                                                                </div>
                                                            @endforeach

                                                            </div>
                                                        @endforeach
                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="form-submit">
                            <button type="submit" class="btn btn-primary">{{ (@$administrator ? __('Edit') : __('Add')) }}</button>
                        </div>

                    </form>

                </div>

</x-adminLayout>
