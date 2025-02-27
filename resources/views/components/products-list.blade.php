<div class="-mx-px gap-2 grid grid-cols-2 sm:mx-0 md:grid-cols-3 lg:grid-cols-4">
  @foreach($products as $product)
    <div class="flex flex-col justify-start bg-gray-100 group relative border-b border-r rounded border-gray-200 p-2">
      <div class="flex flex-col items-center gap-4">
        <img src="{{ $product->getImgPal() }}" alt="{{$product->name."imagen-principal"}}"
             class="aspect-square rounded-lg bg-gray-200 object-cover group-hover:opacity-75 max-w-28">
      </div>
      <div class="pb-4 pt-2 min-h-20 gap-2 flex flex-col items-center">
        <h3 class="text-xl font-medium text-gray-900">
          <a href="{{ route('products.show', $product) }}">
            {{ $product->name }}
          </a>
        </h3>
        <!-- Favoritos -->
        @php
          $myc= request()->cookie('favorites');
          if(strpos($myc, $product->id) !== false)
              $favo=true;
          else
              $favo=false;
          //echo $myc;
        @endphp
        <button type="button" data-id="{{ $product->id }}"
                class="favorite-btn ml-4 flex items-center justify-center rounded-md px-3 py-3 text-gray-400 hover:bg-gray-100 hover:text-red-500">
          <svg class="size-6 shrink-0 {{ $favo ? 'text-green-500':'' }} " fill="none" viewBox="0 0 24 24" stroke-width="1.5"
               stroke="currentColor"
               aria-hidden="true" data-slot="icon">
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z"/>
          </svg>
          <span class="sr-only">Add to favorites</span>
        </button>
        
        <!-- Fin Favoritos -->
        
        
        
        @if(request()->routeIs('products.show'))
          <div>
            {!! tiptap_converter()->asHTML($product->description) !!}
          </div>
        @endif
        @if($product->oferta)
          <h5
            class="w-1/2 inline-flex justify-center items-center gap-x-1.5 rounded-md px-2 py-1 text-xs font-medium text-white bg-green-600 ring-1 ring-inset ring-green-700">
            <svg class="size-2.5 fill-green-300" viewBox="0 0 6 6" aria-hidden="true">
              <circle cx="3" cy="3" r="3"/>
            </svg>
            {{$product->descuento}}% Descuento
          </h5>
        @endif
      </div>
      <div>
        <!-- ## ESTRELLAS ## -->
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
          <!-- ### PRECIOS ### -->
          <div class="flex justify-center gap-8">
            @if($product->oferta)
              <h4 class="line-through text-sm font-medium text-gray-900">{{ $product->precios( false ) }}<span
                  class="text-xs pl-1 align-super  ">{{ $product->precios( false, true ) }}</span> €</h4>
            @endif
            <h4 class="text-base font-medium text-gray-900">{{ $product->precios(true) }}<span
                class="text-xs pl-1 align-super  ">{{ $product->precios(true,true) }}</span>
              €</h4>
          </div>
          <div class="flex flex-col items-center gap-2 justify-center mt-4">
            @if($product->units)
              <a href="{{ route('product.buyit', $product) }}">
              <span
                class="max-w-fit inline-flex items-center gap-x-1.5 rounded-full bg-green-100 px-2 py-1 text-xs font-medium text-green-700">
            <svg class="size-1.5 fill-green-500" viewBox="0 0 6 6" aria-hidden="true">
              <circle cx="3" cy="3" r="3"/>
            </svg>
          {{  __('Buy Now') }}
          </span>
              </a>
              <h4 class="text-xs mt-2 w-full text-center">Quedan: {{ $product->units }} unidades</h4>
            @else
              <span
                class="max-w-fit inline-flex items-center gap-x-1.5 rounded-full bg-red-100 px-2 py-1 text-xs font-medium text-red-700">
              <svg class="size-1.5 fill-red-500" viewBox="0 0 6 6" aria-hidden="true">
                <circle cx="3" cy="3" r="3"/>
              </svg>
              {{ __('Out of Stock') }}
            </span>
            @endif
          </div>
          <!-- ## CATERGORÍAS ## -->
          <div class="mt-4 w-full p-4">
            <div class="grid grid-cols-2">
              @foreach($product->categories as $category)
                <div class="mb-2">
                  <a href="{{url('/?category='.$category->id).'&categ_name='.$category->name}}">
                    <div class="flex w-5/6 min-h-8 items-center gap-1 w-fit py-1 px-1 rounded text-xs"
                         style="background:{{ $category->bgcolor }}; color:{{$category->color}}">
                      @if($category->icon_active)
                        <div class="mr-1" style="color:{{$category->color}}">
                          {!! $category->icon !!}
                        </div>
                      @elseif($category->image)
                        <img src="{{asset($category->image)}}" class="w-6 rounded-full">
                      @endif
                      <p class="m-auto">{{ $category->name }}</p>
                    </div>
                  </a>
                  @foreach($product->tags as $tag)
                    @if($tag->category_id === $category->id)
                      <a href="{{url('/?tag='.$tag->id.'&tag_name='.$tag->name)}}">
                        <div class="flex justify-center items-center gap-1 w-fit py-1 px-1 ml-4 mt-[2px] rounded"
                             style="background:{{ $tag->bgcolor }}">
                          @if($tag->icon_active)
                            <div style="color:{{$tag->color}}">
                              {!!$tag->icon!!}
                            </div>
                          @elseif($tag->image)
                            <img src="{{asset($tag->image)}}" class="w-6 rounded-full">
                          @endif
                          <p class="text-[10px] px-2 py-1 m-auto rounded"
                             style="color:{{$tag->color}}"> {{ $tag->name }}</p>
                        </div>
                      </a>
                    @endif
                  @endforeach
                </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
  @endforeach
</div>
</div>
<div class="mt-2">
  {{ $products->links() }}
</div>

<script src="../../js/favorites.js"></script>