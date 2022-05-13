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
