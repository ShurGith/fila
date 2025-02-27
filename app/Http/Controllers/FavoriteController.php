<?php
    
    namespace App\Http\Controllers;
    
    use App\Models\Product;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Cookie;
    
    class FavoriteController extends Controller
    {
        public function toggle(Request $request, $productId)
        {
            $favorites = json_decode($request->cookie($this->cookie_name(), '[]'), true);
            
            if (!in_array($productId, $favorites) and is_numeric($productId)) {
                $favorites[] = $productId;
            } else {
                $favorites = array_diff($favorites, [$productId]);
            }
            
            return response()->json([
              'status' => 'success',
              'favorites' => $favorites
            ])->cookie($this->cookie_name(), json_encode($favorites), 525600);
            
        }
        
        public function cookie_name(): string
        {
            return 'cookie_favorites';
        }
        
        public function getFavorites(Request $request)
        {
            $favorites = json_decode($request->cookie($this->cookie_name(), '[]'), true);
            $products = [];
            foreach ($favorites as $favorite) {
                $products[] = Product::find($favorite);
            }
            return view('product.favorites', [
              'products' => $products,
            ]);
        }
        
        public function eliminarCookieFav()
        {
            $cookie = Cookie::forget($this->cookie_name());
            return redirect()->route('favorites')->with('info', '!Todos los favoritos han sido eliminados!');
        }
    }