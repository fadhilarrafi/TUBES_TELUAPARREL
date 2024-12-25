<?php

// app/Http/Controllers/CheckoutController.php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Order;  // Import model Order
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    // Menampilkan halaman checkout
    public function show($productId)
    {
        // Mendapatkan produk berdasarkan ID (hanya untuk menampilkan informasi produk di halaman checkout)
        $product = Product::findOrFail($productId);
        return view('checkout', compact('product'));
    }

    // Menangani proses checkout (menyimpan transaksi)
    public function submit(Request $request, $productId)
    {
        // Validasi input form checkout
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'address' => 'required|string',
            'credit_card_number' => 'required|numeric',
        ]);

        // Menyimpan transaksi ke database tanpa product_id dan user_id
        Order::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'address' => $validated['address'],
            'credit_card_number' => $validated['credit_card_number'],
        ]);

        // Jika transaksi berhasil
        return redirect()->route('products.index')->with('success', 'Your order has been placed successfully!');
    }
}
