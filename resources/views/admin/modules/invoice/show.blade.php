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

    <a href={{ route('invoice.download', $invoice->id) }}>Download Factuur</a>

    </div>

</x-adminLayout>
