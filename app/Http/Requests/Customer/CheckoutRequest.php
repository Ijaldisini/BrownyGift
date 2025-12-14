<?php

namespace App\Http\Requests\Customer;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id_alamat' => 'required_if:pengiriman,Dikirim|exists:alamat,id_alamat',
            'pengiriman' => 'required|in:Dikirim,Ambil di Tempat',
            'id_metode_pembayaran' => 'required|exists:metode_pembayaran,id_metode_pembayaran',
        ];
    }
}
