<?php


// Controller namespacing.
namespace App\Http\Requests;

// Other.
use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
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
            'name'          => 'required|string|max:255',
            'contact'       => 'required|string|max:255',
            'street'        => 'required|string|max:255',
            'zip_code'      => 'required|string|postal_code:NL,BE|max:255',
            'location'      => 'required|string|max:255',
            'country'       => 'required|string|max:255',
            'email'         => 'required|email|string|max:255',
            'phone'         => 'nullable|phone|string|max:255',
            'mobile'        => 'required|phone|string|max:255',
            'coc'           => 'nullable|string|integer|digits:8',
            'vat'           => 'nullable|string|vat_number|max:255',
        ];
    }

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        $this->merge([

        ]);
    }
}
