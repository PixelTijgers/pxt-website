<div class="{{ $cssNs }} mb-3">

                                <label for="{{ @$id ? $id : $name }}" class="form-label">
                                    <span>{{ $label }}:</span> @if($required === true)<span class="required">*</span>@endif

                                </label>

                                <textarea
                                    id="{{ $name }}"
                                    name="{{ $name }}"
                                    class="form-control{{ (@$class === true ? ' ' . $class : null) }} @error($name) border-danger @enderror"
                                    placeholder="{{ $label }}"
@if($maxLength)
                                    maxlength="{{ $maxLength }}"
@endif
                                >{{ $value }}</textarea>
                                @if(@$description)

                                <p class="card-description small mt-2 text-muted">{{ @$description }}</p>
                                @endif
                                @error($name)

                                <label id="{{ $name }}-error" class="error mt-2 small text-danger" for="{{ $name }}">{{ $message }}</label>
                                @enderror

                            </div>
                            @if($maxLength)

                            <script>

                                $(function() {
                                    $('#{{ $name }}').maxlength({
                                        alwaysShow: true,
                                        showOnReady: true,
                                        appendToParent: true,
                                        warningClass: "badge mt-2 bg-success",
                                        limitReachedClass: "badge mt-1 bg-danger"
                                    });
                                });

                            </script>
                            @endif
