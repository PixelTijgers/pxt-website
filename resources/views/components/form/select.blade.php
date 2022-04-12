<div class="{{ $cssNs }} mb-3">

                                <label for="{{ @$id ? $id : $name }}" class="form-label">

                                    <span>{{ $label }}:</span> @if(@$required === true)<span class="required">*</span>@endif

                                </label>

                                <div>

                                    <select class="form-control form-control-sm mb-3 select2 initSelect2 {{ @$class }}" name="{{ $name }}">

                                        <option class="disabled">{{ $disabledOption }}</option>
                                        @foreach($options as $key => $option)
<option value="{{ (@$valueWrapper ? $option[$valueWrapper[0]] : $key) }}" {{ ($valueWrapper ? ($option[$valueWrapper[0]] == $value ? 'selected' : null) : ($key == $value ? 'selected' : null)) }}>{{ (@$valueWrapper ? $option[$valueWrapper[1]] : $option) }}</option>
                                        @endforeach

                                    </select>
                                    @if(@$description)

                                    <p class="card-description small mt-2 text-muted">{{ $description }}</p>
                                    @endif
                                    @error($name)

                                    <label id="{{ $name }}-error" class="error mt-2 small text-danger" for="{{ $name }}">{{ $message }}</label>
                                    @enderror

                                </div>

                            </div>

                            <script>
                                $('.select2').select2({
                                    theme: 'bootstrap4',
                                });
                            </script>
