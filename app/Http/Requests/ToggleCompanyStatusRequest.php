<?php

namespace App\Http\Requests;

use App\Models\Company;
use Illuminate\Foundation\Http\FormRequest;

class ToggleCompanyStatusRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // Use the company instance from the route model binding
        $company = $this->route('company');

        // Fetch the company directly from the database
        $company = Company::find($company);

        // Ensure the company exists and check if the user owns it
        return $company && $this->user()->id === $company->user_id;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'status' => 'required|in:1,0',
        ];
    }
}
