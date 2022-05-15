<h6 class="card-title mt-4">{{ __('Invoice') }}</h6>
<p class="mb-4 text-muted small">{{ __('Invoice Description') }}</p>

<button class="addButton btn btn-primary mb-3 float-right" type="button">{{ __('Add Rule') }}</button>

<ul id="invoiceRules" class="mt-4">

    @if(!$invoiceRules->isEmpty())

        @foreach($invoiceRules as $key => $slide)

        <li class="slider-item mb-3">

            <div class="row">

                <div class="col-md-12 mb-3">

                    <div class="border-bottom d-flex justify-content-end w-full pb-3">

                        <button class="closeButton btn btn-danger" type="button">{{ __('Delete Slide') }}</button>

                    </div>

                </div>

                <x-form.textarea
                    name="invoiceRule[0][description]"
                    maxLength="100"
                    :label="__('description')"
                    :value="$slide->description"
                />

                <x-form.input
                    type="text"
                    name="invoiceRule[0][price]"
                    :label="__('Price')"
                    :value="$slide->price"
                />

                <x-form.input
                    type="text"
                    name="invoiceRule[0][amount]"
                    :label="__('Amount')"
                    :value="$slide->amount"
                />

            </div>

        </li>

        @endforeach()

    @else
        @include('admin.modules.invoice.includes.invoice-rule')

    @endif
</ul>
