<div class="{{ $cssNs }} mb-3">

                                <label for="{{ @$id ? $id : $name }}" class="form-label">
                                    <span>{{ $label }}:</span> <span class="required">*</span>

                                </label>

                                <div class="dropify-container {{ (@$row ? (@$cols ? $cols[1] : 'col-10') : null) }}">
                                @if(@$file)

                                    <input
                                        type="hidden"
                                        name="{{ $name }}CurrentImage"
                                        value="{{ $file }}"
                                    />
                                @endif

                                    <input
                                        type="file"
                                        id="{{ (@$id ? $id : $name) }}"
                                        class="dropify border {{ @$class }}"
                                        name="{{ $name }}"
                                        data-allowed-file-extensions="{{ $extensions }}"
                                        @if(@$file)
                                        data-default-file="{{ $file }}"
                                        @endif
                                    />
                                    @if(@$description)

                                    <p class="card-description small mt-2 text-muted">{{ $description }}</p>
                                    @endif
                                    @error($name)

                                    <label id="{{ $name }}-error" class="error mt-2 small text-danger" for="{{ $name }}">{{ $message }}</label>
                                    @enderror

                                </div>

                            </div>

                            <script>

                                $(function() {

                                    $('.dropify').dropify({
                                        messages: {
                                            'default': '{{ __('Dropify Default') }}',
                                            'replace': '{{ __('Dropify Replace') }}',
                                            'remove':  '{{ __('Dropify Remove') }}',
                                            'error':   '{{ __('Dropify Image Format') }}'
                                        },
                                        error: {
                                            'imageFormat': '{{ __('Dropify Default') }}'
                                        }
                                    })
                                    .on('dropify.afterClear', function(event, element){
                                        $('input[name="{{ $name }}CurrentImage"]').removeAttr('value');
                                    });
                                });

                            </script>
