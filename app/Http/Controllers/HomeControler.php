<?php
    
    namespace App\Http\Controllers;
    
    use App\Models\Generaloptions;
    use App\Models\Product;
    use Illuminate\Http\Request;
    use Illuminate\View\View;
    
    class HomeControler extends Controller
    {
        public function home(Request $request): View
        {
            $hideNoActives = Generaloptions::get('hide_no_actives', '0');
            $hideNoStock = Generaloptions::get('hide_no_existences', '0');
            
            if ($request->category) {
                $titulo = "filtrados por la categoría \"$request->categ_name\"";
                $laid = $request->category;
                $products = Product::with(['imageproducts'])
                  ->whereHas('categories',
                    function ($query) use ($hideNoStock, $hideNoActives, $laid) {
                        $query->where('category_id', $laid)
                          ->when($hideNoActives == 1, fn($query) => $query->where('active', true))
                          ->when($hideNoStock == 1, fn($query) => $query->where('units', '>', 0));
                    })->paginate(12);
                
            } elseif ($request->tag) {
                $titulo = "filtrados por etiqueta \"$request->tag_name \"";
                $laid = $request->tag;
                $products = Product::with(['imageproducts'])
                  ->whereHas('tags', function ($query) use ($hideNoStock, $hideNoActives, $laid) {
                      $query->where('tag_id', $laid)
                        ->when($hideNoActives == 1, fn($query) => $query->where('active', true))
                        ->when($hideNoStock == 1, fn($query) => $query->where('units', '>', 0));
                  })->paginate(12);
                
            } else {
                $products = Product::with(['imageproducts'])
                  ->when($hideNoActives == 1, fn($query) => $query->where('active', true))
                  ->when($hideNoStock == 1, fn($query) => $query->where('units', '>', 0))
                  ->paginate(12);
            }
            return view('product.index', [
              'products' => $products,
            ]);
        }
        
    }
