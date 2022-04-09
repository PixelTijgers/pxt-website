<div class="{{ $cssNs }} {{ $wrapperClass }} mb-3">

                                <label for="{{ @$id ? $id : $name }}" class="form-label">
                                    <span>{{ $label }}:</span> <span class="required">*</span>

                                </label>
                                @foreach($options as $key => $option)

                                <div class="form-check mb-2">

                                    <label class="form-check form-check-flat form-check-primary">

                                        <label class="form-check-label">

                                            <input
                                                type="checkbox"
                                                name="{{ $name }}"
                                                id="{{ @$id ? $id : $name }}"
                                                class="form-check-input {{ @$class }} @error($name) border-danger @enderror"
                                                value="{{ $key }}"
                                                {{ (old(str_replace(array('[', ']'), '' , $name)) !== null ? (in_array($key, old(str_replace(array('[', ']'), '' , $name))) ? 'checked' : null) : ($values !== null && in_array($key, array_column($values->toArray(), 'id')) ? ' checked' : null)) }}
                                            />
                                            {{ $option }}

                                        </div>
                                    </label>

                                </div>
                                @endforeach
                                @if(@$description)

                                <p class="card-description small mt-2 text-muted">{{ @$description }}</p>
                                @endif
                                @error($name)

                                <label id="{{ $name }}-error" class="error mt-2 small text-danger" for="{{ $name }}">{{ $message }}</label>
                                @enderror

                            </div>
