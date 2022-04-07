@section('meta')
<title>{{ config('app.name') }} | {{ __('modules/administrator.title_administrator') }}</title>
    <meta name="description" content="{{ (@$administrator ? __('modules/administrator.description_administrator_edit') . $administrator->name : __('modules/administrator.title_administrator_add')) }}" />
@endsection

<x-adminLayout>

    <div class="{{ $cssNs }}">

                    @include('admin.layouts.breadcrumb', [
                        'title' => __('modules/administrator.title_administrator'),
                        'description' => (@$administrator ? __('modules/administrator.description_administrator_edit') . $administrator->name : __('modules/administrator.description_administrator_add')),
                        'breadcrum' => [
                            __('modules/administrator.title_administrator') => route('administrator.index'),
                            (@$administrator ? __('modules/administrator.description_administrator_edit') . $administrator->name : __('modules/administrator.title_administrator_add')) => '#'
                        ],
                    ])
                    @if ($errors->any())

                    <div class="alert alert-fill-danger alert-dismissible fade show" role="alert">
                        {{ __('modules.msg_alert_error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"></button>
                    </div>
                    @endif

                    <div class="row">

                        <div class="col-md-12 grid-margin stretch-card">

                            <div class="card">

                                <div class="card-body">

                                    <form class="forms-sample row" method="post" action="{{ (@$administrator ? route('administrator.update', $administrator) : route('administrator.store')) }}" enctype="multipart/form-data">

                                        @csrf

                                        @if(@$administrator)

                                        @method('PATCH')

                                        @endif

                                        <div class="col-md-8 grid-margin">

                                            <div>

                                                <div>

                                                    <h6 class="card-title">{{ __('form.personal') }}</h6>

                                                    <x-form.input
                                                        type="text"
                                                        name="name"
                                                        :label="__('form.name')"
                                                        :value="(old('name') ? old('name') : (@$administrator ? $administrator->name : null))"
                                                    />

                                                    <x-form.input
                                                        type="email"
                                                        name="email"
                                                        :label="__('form.email')"
                                                        :value="(old('email') ? old('email') : (@$administrator ? $administrator->email : null))"
                                                    />

                                                    <x-form.input
                                                        type="text"
                                                        name="phone"
                                                        :label="__('form.phone')"
                                                        :value="(old('phone') ? old('phone') : (@$administrator ? $administrator->phone : null))"
                                                    />

                                                    <h6 class="card-title mt-5">{{ __('form.edit_password') }}</h6>
                                                    <p class="card-description small text-muted mb-3">{{ __('form.edit_password_description') }}</p>

                                                    <x-form.input
                                                        type="password"
                                                        name="password"
                                                        :label="__('form.password')"
                                                    />

                                                    <x-form.input
                                                        type="password"
                                                        name="password_confirmation"
                                                        :label="__('form.password_repeat')"
                                                    />

                                                </div>

                                            </div>

                                        </div>

                                        <div class="col-md-4 grid-margin">

                                            <div>

                                                <div>

                                                    @role('superadmin')
                                                    <h6 class="card-title">{{ __('form.administrator') }}</h6>

                                                    <x-form.radio
                                                        name="role"
                                                        :label="__('form.usertype')"
                                                        wrapperClass="admin-permissions-switcher"
                                                        :row="false"
                                                        :value="(@$administrator ? \Arr::first($administrator->roles->pluck('name')->toArray()) : null)"
                                                        :options="[
                                                            'superadmin'    => __('admin.superadmin'),
                                                            'administrator' => 'Administrator',
                                                            'moderator'     => __('admin.moderator'),
                                                            'user'          => __('admin.user'),
                                                        ]"
                                                    />
                                                    @endrole
                                                    <h6 class="card-title mt-5">{{ __('form.image') }}</h6>

                                                    <x-form.file
                                                        name="avatar"
                                                        extensions="jpg jpeg png"
                                                        :label="__('form.image')"
                                                        :row="false"
                                                        :file="(@$administrator ? $administrator->getFirstMediaUrl('avatar') : null)"
                                                        :description="__('form.image_description')"
                                                    />

                                                </div>

                                            </div>

                                        </div>

                                        <div class="col-md-12 admin-permissions {{ @$administrator ? (\Arr::first(@$administrator->roles->pluck('name')->toArray()) == 'superadmin' ? 'd-none' : null) : null }}">

                                            <div>

                                                <div>

                                                    <h6 class="card-title">Gebruikersrechten</h6>

                                                    <div class="row">

                                                        <div class="form-group d-flex flex-wrap w-100">
                                                        @foreach($permissions as $route => $permissionArray)

                                                            <div class="grouped-permissions mt-3 col-3 {{ str_replace('modules.', '', $route) }}">

                                                                <h6><i class="fal fa-{{ __('icon.' . str_replace('modules.', '', $route)) }} mr-1"></i>
                                                                    {{ __('admin.' . str_replace('modules.', '', $route)) }}
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

                                                                    <label class="form-check-label" for="{{ $route . '.' . $permission }}">{{ __('admin.' . $permission) }}</label>

                                                                </div>
                                                            @endforeach

                                                            </div>
                                                        @endforeach
                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                        <div class="form-submit">
                                            <button type="submit" class="btn btn-primary">{{ (@$administrator ? __('form.edit') : __('form.add')) }}</button>
                                        </div>

                                    </form>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

</x-adminLayout>
