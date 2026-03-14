<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'date' => 'required|date|after_or_equal:today',
            'locality' => 'required|string|max:255',
            'schedule' => 'required|string|max:100',
            'business_name' => 'required|string|max:255',
            'customer_code' => 'required|string|max:50',
            'payment_terms' => 'required|string|max:255',
            'notes' => 'nullable|string|max:2000',
            'file' => 'nullable|file|max:5120|mimes:pdf,jpg,jpeg,png',
            'products' => 'nullable|array',
            'products.*.product_id' => 'required_with:products|exists:products,id',
            'products.*.quantity' => 'nullable|integer|min:0',
        ];
    }

    protected function prepareForValidation(): void
    {
        $products = [];
        $raw = $this->input('products', []);
        if (is_array($raw)) {
            foreach ($raw as $item) {
                if (is_array($item) && isset($item['product_id'])) {
                    $products[] = [
                        'product_id' => $item['product_id'],
                        'quantity' => (int) ($item['quantity'] ?? 0),
                    ];
                }
            }
        }
        $this->merge(['products' => $products]);
    }
}
