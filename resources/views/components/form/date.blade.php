<div class="{{ $cssNs }} mb-3">

                                <label for="{{ @$id ? $id : $name }}" class="form-label">
                                    <span>{{ $label }}:</span> @if($required === true)<span class="required">*</span>@endif

                                </label>

                                <input
                                    type="text"
                                    class="form-control {{ $class }}"
                                    id="{{ $name }}"
                                    name="{{ $name }}"
                                    autocomplete="off"
                                    placeholder="{{ $label }}"
                                    value="{{ ($value !== null ? \Carbon\Carbon::parse($value)->formatLocalized('%d/%m/%y %H:%M') : null) }}"
                                    data-toggle="datetimepicker"
                                    data-target="#{{ $name }}"
                                />
                                @if(@$description)

                                <p class="card-description small mt-2 text-muted">{{ @$description }}</p>
                                @endif
                                @error($name)

                                <label id="{{ $name }}-error" class="error mt-2 small text-danger" for="{{ $name }}">{{ $message }}</label>
                                @enderror

                            </div>

                            <script type="text/javascript">
                                $(function () {

                                    $('input#{{ $name }}').datetimepicker({
                                        icons: {
                                            time: 'far fa-clock',
                                            previous: 'fas fa-chevron-double-left',
                                            next: 'fas fa-chevron-double-right',
                                            up: 'fas fa-arrow-up',
                                            down: 'fas fa-arrow-down',
                                        },
                                        keepOpen: true,
                                        format: 'DD-MM-YYYY',
                                        locale: 'nl',
                                        sideBySide: false,
                                        debug: false,
                                        calendarWeeks: false,
                                        widgetPositioning: {
                                            horizontal: 'left',
                                            vertical: 'bottom'
                                        }
                                    });
                                });
                            </script>
