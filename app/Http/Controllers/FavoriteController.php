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
            
            if (in_array($productId, $favorites)) {
                $favorites = array_diff($favorites, [$productId]);
            } else {
                $favorites[] = $productId;
            }
            
            return response()->json([
              'status' => 'success',
              'favorites' => $favorites
            ])->cookie($this->cookie_name(), json_encode($favorites), 525600); // 1 año
        }
        
        public function cookie_name(): string
        {
            return 'cookie_favorites';
        }
        
        public function getFavorites(Request $request)
        {
            $cookie_name = $this->cookie_name();
            // $favorites = $request->cookie($this->cookie_name());
            $favorites = json_decode($request->cookie($this->cookie_name(), '[]'), true);
            $products = [];
            foreach ($favorites as $favorite) {
                if (in_array('null', $favorites)) {
                    Cookie::queue(Cookie::forget($cookie_name));
                    return redirect()->route('favorites')->with('Borrado');
                }
                
            }
            if (isset($favorite)) {
                $products[] = Product::find($favorite);
            }
            return view('product.favorites', [
              'products' => $products,
            ]);
        }
        
        public function eliminarCookie()
        {
            $cookie = Cookie::forget($this->cookie_name());
            return redirect()->route('favorites')->with('¡Eliminado!');
        }
    }