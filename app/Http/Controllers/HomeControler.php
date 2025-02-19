<?php
    
    namespace App\Http\Controllers;
    
    use App\Models\Product;
    use Illuminate\Http\Request;
    use Illuminate\View\View;
    
    class HomeControler extends Controller
    {
        public function home(Request $request): View
        {
            $products = Product::all();
            
            return view('home', [
              'products' => $products,
            ]);
        }
    }
