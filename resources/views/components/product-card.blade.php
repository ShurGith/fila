@php
  function enteros($valor) {
    $formatPrecio = number_format($valor / 100, 2, "'", ".");
    return substr($formatPrecio,0, strpos($formatPrecio,"'" )+1);
  }
    function decimales($valor) {
    $formatPrecio = number_format($valor / 100, 2, "'", ".");
    return substr($formatPrecio, -2);
  }
@endphp
<div class="-mx-px gap-2 grid grid-cols-2 sm:mx-0 md:grid-cols-3 lg:grid-cols-4">
  @foreach($products as $product)
    <div
      class="flex flex-col justify-start bg-gray-100 group relative border-b border-r rounded border-gray-200 p-2">
      <div class="flex flex-col items-center gap-4">
        @foreach($product->imageproducts as $imagen)
          @if($imagen->img_position === 1)
            <img src="{{ asset('storage/'.$imagen->image_path) }}" alt="TODO"
                 class="aspect-square rounded-lg bg-gray-200 object-cover group-hover:opacity-75 max-h-38">
          @endif
        @endforeach
        @if($product->imageproducts->count() === 0 )
          <img src="{{ Avatar::create($product->name)->toBase64() }}"
               alt="TODO" class="group-hover:opacity-70">
        @endif
      </div>
      <div class="pb-4 pt-2 min-h-20 gap-2 flex flex-col items-center">
        <h3 class="text-xl font-medium text-gray-900">
          <a href="#">
            {{ $product->name }}
          </a>
        </h3>
        @if($product->oferta)
          <h5
            class="w-1/2 inline-flex justify-center items-center gap-x-1.5 rounded-md px-2 py-1 text-xs font-medium text-white bg-green-600 ring-1 ring-inset ring-green-700">
            <svg class="size-2.5 fill-green-300" viewBox="0 0 6 6" aria-hidden="true">
              <circle cx="3" cy="3" r="3"/>
            </svg>
            {{$product->oferta_descuento}}% Descuento
          </h5>
        @endif
      </div>
      <div>
        <div class="mt-3 flex flex-col items-center justify-center">
          <p class="sr-only">5 out of 5 stars</p>
          <div class="flex items-center">
            <svg class="size-5 shrink-0 text-yellow-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"
                 data-slot="icon">
              <path fill-rule="evenodd"
                    d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401Z"
                    clip-rule="evenodd"/>
            </svg>
            <svg class="size-5 shrink-0 text-yellow-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"
                 data-slot="icon">
              <path fill-rule="evenodd"
                    d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401Z"
                    clip-rule="evenodd"/>
            </svg>
            <svg class="size-5 shrink-0 text-yellow-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"
                 data-slot="icon">
              <path fill-rule="evenodd"
                    d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401Z"
                    clip-rule="evenodd"/>
            </svg>
            <svg class="size-5 shrink-0 text-yellow-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"
                 data-slot="icon">
              <path fill-rule="evenodd"
                    d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401Z"
                    clip-rule="evenodd"/>
            </svg>
            <svg class="size-5 shrink-0 text-yellow-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"
                 data-slot="icon">
              <path fill-rule="evenodd"
                    d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401Z"
                    clip-rule="evenodd"/>
            </svg>
          </div>
          <p class="mt-1 text-sm text-gray-500">{{ rand(12, 45) }} reviews</p>
        </div>
        <div class="w-full mt-4">
          @php
            $precio_venta  = $product->price;
           if($product->oferta){
               $descuento = $product->oferta_descuento;
               $precio_final =   $product->price  * ((100-$descuento)/100);
             }else{
               $precio_final = $product->price;
             }
          @endphp
          <div class="flex justify-center  gap-8">
            @if($product->oferta)
              <h4 class="line-through text-sm font-medium text-gray-900">{{ enteros( $product->price ) }}<span
                  class="text-xs pl-1 align-super  ">{{ decimales( $product->price ) }}</span> €</h4>
            @endif
            <h4 class="text-base font-medium text-gray-900">{{ enteros($precio_final) }}<span
                class="text-xs pl-1 align-super  ">{{ decimales($precio_final) }}</span>
              €</h4>
          </div>
          <h4 class="text-xs mt-2 w-full text-center">Quedan: {{ $product->units }} unidades</h4>
          <div class="mt-4 w-full p-4">
            @foreach($product->categoriesWithTags as $cat)
              <div class="flex flex-col text-center gap-1">
                <div class="flex items-center gap-1 w-fit py-1 px-1 rounded" style="background:{{ $cat->color }}">
                  @if($cat->icono_activo)
                    <div class="w-6 h-6" style="color:{{$cat->text_color}}">
                      {!!$cat->heroicon!!}
                    </div>
                  @else
                    <img src="{{$cat->logo}}" class="w-6 rounded-full">
                  @endif
                  <p class="text-[10px] px-2 py-1 rounded" style="color:{{$cat->text_color}}"> {{ $cat->name }}</p>
                </div>
                <div class="flex gap-1 ml-4 mb-1">
                  @foreach($cat->tags as $tag)
                    <div class="w-fit flex items-center text-[8px] min-w-14 px-2 py-1 rounded"
                         style="background:{{ $tag->color }}; color:{{$tag->text_color}}">
                      @if($tag->icono_activo)
                        <div>{!!$tag->heroicon!!}</div>
                      @endif
                      {{ $tag->name }}</div>
                  @endforeach
                </div>
              </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  @endforeach
</div>

