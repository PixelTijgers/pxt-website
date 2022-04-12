<div class="{{ $cssNs }} mb-3">

                                <label for="{{ @$id ? $id : $name }}" class="form-label">
                                    <span>{{ $label }}:</span> @if($required === true)<span class="required">*</span>@endif

                                </label>

                                <div>

                                    <input
                                        type="text"
                                        id="{{ $name }}"
                                        name="{{ $name }}"
                                        class="form-control{{ (@$class === true ? ' ' . $class : null) }} @error($name) border-danger @enderror"
                                        autocomplete="off"
                                        placeholder="{{ $label }}"
                                        value="{{ $value }}"
                                    />
                                    @if(@$description)

                                    <p class="card-description small mt-2 text-muted">{{ $description }}</p>
                                    @endif
                                    @error($name)

                                    <label id="{{ $name }}-error" class="error mt-2 small text-danger" for="{{ $name }}">{{ $message }}</label>
                                    @enderror

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
                                    'use strict';

                                    $('#{{ $name }}').tagsInput({
                                        'width': '100%',
                                        'height': '75%',
                                        'interactive': true,
                                        'defaultText': 'Tag toevoegen',
                                        'removeWithBackspace': true,
                                        'minChars': 0,
                                        'maxChars': 20,
                                        'placeholderColor': '#666666'
                                    });
                                });

                            </script>
