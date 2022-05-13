<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InvoiceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id'            => 'required|string|digits:8',
            'client_id'     => 'required|numeric|integer',
            'type'          => 'required|string|in:invoice,quotation',
            'invoice_date'  => 'required|date_format:"Y-m-d H:i:s"',
            'is_payed'      => 'required|boolean',
        ];
    }

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        // Merge into request.
        $this->merge([
            'is_payed'      => ($this->is_payed !== null ? 1 : 0),
            'invoice_date'  => \Carbon\Carbon::createFromFormat('d-m-Y', $this->invoice_date)->toDateTimeString(),
        ]);
    }
}
