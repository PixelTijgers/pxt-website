<div class="{{ $cssNs }} mb-3">

                                <label for="{{ @$id ? $id : $name }}" class="form-label">
                                    <span>{{ $label }}:</span> @if($required === true)<span class="required">*</span>@endif

                                </label>

                                <div class="input-group">

                                    <span class="input-group-text">
                                        @if($model !== null)
                                            @php
                                                $prepend = @$modelName;
                                                $slug = explode('/', $value);
                                            @endphp
                                        @else
                                            @php
                                                $prepend = null;
                                                $slug = null;
                                            @endphp
                                        @endif

                                        {{ url('/') . ($prepend !== null ? $prepend->slug : null) . '/' }}
                                    </span>

                                    <input
                                        type="text"
                                        id="{{ $name }}"
                                        name="{{ $name }}"
                                        class="form-control {{ @$class }} @error($name) form-control-danger @enderror"
                                        autocomplete="off"
                                        placeholder="{{ $label }}"
                                        value="{{ ($slug !== null ? end($slug) : $slug) }}"
                                    />

                                </div>
                                @if(@$description)

                                <p class="card-description small mt-2 text-muted">{{ @$description }}</p>
                                @endif
                                @error($name)

                                <label id="{{ $name }}-error" class="error mt-2 small text-danger" for="{{ $name }}">{{ $message }}</label>
                                @enderror

                            </div>

                            <script>

                                $(function() {

                                    $('#{{ $name }}').slugify('#{{ $slugField }}');

                                })

                            </script>
