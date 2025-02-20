<?php
    
    namespace App\Http\Controllers;
    
    use App\Models\Product;
    use Illuminate\Http\Request;
    use Illuminate\View\View;
    
    class HomeControler extends Controller
    {
        public function home(Request $request): View
        {
            
            if ($request->category) {
                $laid = $request->category;
                $products = Product::whereHas('categories', function ($query) use ($laid) {
                    $query->where('category_id', $laid);
                })->paginate(12);
                
            } elseif ($request->tag) {
                $laid = $request->tag;
                $products = Product::whereHas('tags', function ($query) use ($laid) {
                    $query->where('tag_id', $laid);
                })->paginate(12);
                
            } else {
                $products = Product::with(['imageproducts'])
                  ->where('active', true)
                  ->paginate(12);
            }
            return view('product.index', [
              'products' => $products,
            ]);
        }
    }
