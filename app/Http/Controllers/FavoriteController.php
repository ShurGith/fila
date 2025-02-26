<?php
    
    namespace App\Http\Controllers;
    
    use App\Models\Product;
    use Illuminate\Http\Request;
    
    class FavoriteController extends Controller
    {
        /**
         * Agregar o quitar un producto de favoritos
         */
        public function toggle(Request $request, $productId)
        {
            $favorites = json_decode($request->cookie('favorites', '[]'), true);
            
            if (in_array($productId, $favorites)) {
                // Si ya está en favoritos, lo eliminamos
                $favorites = array_diff($favorites, [$productId]);
            } else {
                // Si no está en favoritos, lo agregamos
                $favorites[] = $productId;
            }
            
            // Guardamos en una cookie por 1 año
            return response()->json([
              'status' => 'success',
              'favorites' => $favorites
            ])->cookie('favorites', json_encode($favorites), 525600); // 1 año
        }
        
        /**
         * Obtener la lista de favoritos
         */
        public function getFavorites(Request $request)
        {
            $favorites = json_decode($request->cookie('favorites', '[]'), true);
            $products = [];
            foreach ($favorites as $favorite) {
                $products[] = Product::find($favorite);
            }
            
            //$product = Product::find($favorites);
            //return response()->json($favorites);
            
            return view('product.favorites', [
              'products' => $products,
            ]);
        }
    }