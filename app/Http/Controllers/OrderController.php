<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OrderController extends Controller
{
    public function create()
    {
        $categories = Category::with(['products' => fn ($q) => $q->where('is_active', true)])
            ->orderBy('name')
            ->get();

        return view('dashboard', compact('categories'));
    }

    public function store(\App\Http\Requests\StoreOrderRequest $request)
    {
        $validated = $request->validated();

        $items = collect($validated['products'] ?? [])
            ->filter(fn ($p) => ($p['quantity'] ?? 0) > 0);

        if ($items->isEmpty()) {
            return back()
                ->withInput()
                ->withErrors(['products' => 'Debe agregar al menos un producto con cantidad mayor a 0.']);
        }

        $date = \Carbon\Carbon::parse($validated['date']);

        $filePath = null;
        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('orders', 'public');
        }

        $order = Order::create([
            'user_id' => auth()->id(),
            'order_number' => Order::generateOrderNumber(),
            'date' => $date,
            'locality' => $validated['locality'],
            'schedule' => $validated['schedule'],
            'business_name' => $validated['business_name'],
            'customer_code' => $validated['customer_code'],
            'payment_terms' => $validated['payment_terms'],
            'notes' => $validated['notes'] ?? null,
            'file_path' => $filePath,
        ]);

        foreach ($items as $item) {
            $product = Product::findOrFail($item['product_id']);
            $order->items()->create([
                'product_id' => $product->id,
                'quantity' => $item['quantity'],
                'price' => $product->price,
            ]);
        }

        return redirect()->route('dashboard')
            ->with('success', 'Pedido enviado correctamente. Nº ' . $order->order_number);
    }

    public function index()
    {
        $orders = Order::with('items.product')
            ->where('user_id', auth()->id())
            ->orderBy('date', 'desc')
            ->get();

        return view('dashboard.history', compact('orders'));
    }
}
