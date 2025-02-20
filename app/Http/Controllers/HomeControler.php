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
                $titulo = "filtrados por la categoría \"$request->categ_name\"";
                $laid = $request->category;
                $products = Product::whereHas('categories', function ($query) use ($laid) {
                    $query->where('category_id', $laid);
                })->paginate(12);
                
            } elseif ($request->tag) {
                $titulo = "filtrados por etiqueta \"$request->tag_name \"";
                $laid = $request->tag;
                $products = Product::whereHas('tags', function ($query) use ($laid) {
                    $query->where('tag_id', $laid);
                })->paginate(12);
                
            } else {
                $titulo = "Listado";
                $products = Product::with(['imageproducts'])
                  ->where('active', true)
                  ->paginate(12);
            }
            return view('product.index', [
              'products' => $products,
              'titulo' => $titulo,
            ]);
        }
    }
