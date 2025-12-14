<?php

namespace App\Http\Requests\Customer;

use Illuminate\Foundation\Http\FormRequest;

class AddToCartRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id_produk' => 'required|exists:produk,id_produk',
            'quantity' => 'required|integer|min:1'
        ];
    }
}
