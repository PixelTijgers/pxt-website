@section('meta')
<title>{{ config('app.name') }} | {{ (@$invoice ? __('Edit') . ' ' . \Str::Lower(__('Invoice')) . ': ' . $invoice->name  : __('Invoice') . ' ' . \Str::Lower(__('Add'))) }}</title>
    <meta name="description" content="{{ (@$invoice ? __('Invoice Edit') : __('Invoice Add')) }}" />
@endsection

<x-adminLayout>

    <div class="{{ $cssNs }}">

        @include('admin.layouts.breadcrumb', [
            'title' => __('Invoice'),
            'description' => (@$invoice ? __('Edit') . ' ' . \Str::Lower(__('Invoice')) . ': ' . $invoice->name  : __('Invoice Add')),
            'breadcrum' => [
                __('Invoice') => route('invoice.index'),
                (@$invoice ? __('Edit') . ' ' . \Str::Lower(__('Invoice')) . ': ' . $invoice->name  : __('Invoice') . ' ' . \Str::Lower(__('Add'))) => '#'
            ],
        ])
        @if ($errors->any())

        <div class="alert alert-fill-danger alert-dismissible fade show" role="alert">
            {{ __('Item Error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"></button>
        </div>
        @endif

        <form class="form-content" method="post" action="{{ (@$invoice ? route('invoice.update', $invoice) : route('invoice.store')) }}">

            @csrf

            @if(@$invoice)

            @method('PATCH')

            @endif

            <div class="row">

                <div class="col-md-12 grid-margin stretch-card">

                    <div class="card">

                        <div class="card-body">

                            <x-form.input
                                type="text"
                                name="id"
                                :label="__('Invoice ID')"
                                :value="(old('id') ? old('id') : (@$invoice ? $invoice->id : null))"
                                :row="true"
                                :cols="['col-2', 'col-2']"
                            />

                            <x-form.select
                                name="client_id"
                                :label="__('Client')"
                                :row="true"
                                :cols="['col-2', 'col-3']"
                                :value="(old('client_id') ? old('client_id') : (@$invoice ? $invoice->client_id : null))"
                                :options="\App\Models\Client::all()->sortBy('name')"
                                :valueWrapper="['id', 'name']"
                                :disabledOption="__('Select Client')"
                            />

                            <x-form.select
                                name="type"
                                :label="__('Type')"
                                :row="true"
                                :cols="['col-2', 'col-3']"
                                :value="(old('type') ? old('type') : (@$invoice ? $invoice->type : null))"
                                :options="[
                                   'invoice'   =>  __('Invoice'),
                                   'quotation'   =>  __('Quotation'),
                                ]"
                                :disabledOption="__('Select Type')"
                            />

                            <x-form.date
                                name="invoice_date"
                                :label="__('Invoice Date')"
                                :value="(old('invoice_date') ? old('invoice_date') : (@$invoice ? $invoice->invoice_date : null))"
                                :row="true"
                                :cols="['col-2', 'col-3']"
                            />

                            <x-form.switcher
                                name="is_payed"
                                :label="__('Payed')"
                                :value="(old('is_payed') ? old('is_payed') : (@$invoice ? $invoice->is_payed : null))"
                                :row="true"
                                :cols="['col-2', 'col-3']"
                                :required="false"
                            />

                        </div>

                    </div>

                </div>

            </div>

            <div class="form-submit">
                <button type="submit" class="btn btn-primary">{{ (@$invoice ? __('Edit') : __('Add')) }}</button>
            </div>

        </form>

    </div>

</x-adminLayout>
