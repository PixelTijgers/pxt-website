<div class="{{ $cssNs }} mb-3">

                                <label for="{{ @$id ? $id : $name }}" class="form-label">

                                    <span>{{ $label }}:</span> @if(@$required === true)<span class="required">*</span>@endif

                                </label>

                                <textarea
                                    id="{{ $name }}"
                                    name="{{ $name }}"
                                    class="form-control {{ @$class }} @error($name) border-danger @enderror"
                                    placeholder="{{ $label }}">{{ $value }}</textarea>
                                @if(@$description)

                                <p class="card-description small mt-2 text-muted">{{ @$description }}</p>
                                @endif
                                @error($name)

                                <label id="{{ $name }}-error" class="error mt-2 small text-danger" for="{{ $name }}">{{ $message }}</label>
                                @enderror

                            </div>

                            <script>

                                ClassicEditor
                                    .create( document.querySelector('#{{ $name }}'), {

                                    })
                                    .then(editor => {
                                        console.log(editor);
                                    })
                                    .catch( error => {
                                        console.error(error);
                                    });

                            </script>
