<div class="{{ $cssNs }} mb-3">

                                <label for="{{ @$id ? $id : $name }}" class="form-label">
                                    <span>{{ $label }}:</span> @if($required === true)<span class="required">*</span>@endif

                                </label>

                                <div class="form-check form-switch mb-2">

                                    <input
                                        name="{{ $name }}"
                                        type="checkbox"
                                        class="form-check-input{{ (@$class === true ? ' ' . $class : null) }} @error($name) border-danger @enderror"
                                        id="{{ $name }}"
                                        {{ (old() ? (old($name) === 'on' ? 'checked' : null) : ($value === 1 ? 'checked' : null)) }}
                                    />

                                    <label class="custom-control-label" for="{{ $name }}"></label>

                                </div>
                                @if(@$description)

                                <p class="card-description small mt-2 text-muted">{{ @$description }}</p>
                                @endif
                                @error($name)

                                <label id="{{ $name }}-error" class="error mt-2 small text-danger" for="{{ $name }}">{{ $message }}</label>
                                @enderror

                            </div>
