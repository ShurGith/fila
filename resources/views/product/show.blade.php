<x-partials.precios/>

<x-layouts.app :meta-title="$product->name" :header-text="$product->name">
  <link rel="stylesheet" href="../css/show.css">
  <div class="">
    <div class="flex flex-col justify-start bg-gray-100 group relative border-b border-r rounded border-gray-200 p-2">
      <div class="flex flex-col items-center gap-4">
        @foreach($product->imageproducts as $imagen)
          @if($imagen->img_position === 1)
            <img src="{{ asset('storage/'.$imagen->image_path) }}" alt="TODO"
                 class="aspect-square rounded-lg bg-gray-200 object-cover group-hover:opacity-75 max-h-38">
          @endif
        @endforeach
        @if($product->imageproducts->count() === 0 )
          <img src="{{ Avatar::create($product->name)->toBase64() }}" alt="TODO">
        @endif
      </div>
      <!-- ## NOMBRE - DESCRIPCIÓN -->
      <div class="pb-4 pt-2 min-h-20 gap-2 flex flex-col items-center">
        <h2 class="text-4xl font-medium text-gray-900">
          {{ $product->name }}
        </h2>
        <div class="max-w-2xl">
          {!! tiptap_converter()->asHTML($product->description) !!}
        </div>
        @if($product->oferta)
          <h5
            class="max-w-fit inline-flex justify-center items-center gap-x-1.5 rounded-md px-2 py-1 text-xl font-medium text-white bg-green-600 ring-1 ring-inset ring-green-700">
            <svg class="size-2.5 fill-green-300" viewBox="0 0 6 6" aria-hidden="true">
              <circle cx="3" cy="3" r="3"/>
            </svg>
            {{$product->descuento}}% Descuento
          </h5>
        @endif
      </div>
      <!-- ## Datos Stars - Reviews - Price ## -->
      <div>
        <!-- ## Stars ## -->
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
          <!-- ## Price ## -->
          <div>
            @php
              $precio_venta  = $product->price;
             if($product->oferta){
                 $descuento = $product->descuento;
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
          </div>
          <!-- ## Buyit Now ## -->
          <div class="flex flex-col items-center gap-2 justify-center mt-4">
            @if($product->units)
              <a href="{{ route('product.buyit', $product) }}">
              <span
                class="border-4 max-w-fit inline-flex items-center gap-x-1.5 rounded-full bg-green-100 px-2 py-1 text-sm font-bold text-green-700">
            <svg class="size-1.5 fill-green-500" viewBox="0 0 6 6" aria-hidden="true">
              <circle cx="3" cy="3" r="3"/>
            </svg>
          {{  __('Buy Now') }}
          </span>
              </a>
              <h4 class="text-xs mt-2 w-full text-center">Quedan: {{ $product->units }} unidades</h4>
            @else
              <span
                class="border-4 max-w-fit inline-flex items-center gap-x-1.5 rounded-full bg-red-100 px-2 py-1 text-sm font-bold text-red-700">
              <svg class="size-1.5 fill-red-500" viewBox="0 0 6 6" aria-hidden="true">
                <circle cx="3" cy="3" r="3"/>
              </svg>
              {{ __('Out of Stock') }}
            </span>
            @endif
          </div>
          <!-- ## Categories & Tags -->
          <div class="flex items-center justify-center mt-4 max-w-2/4 border p-4">
            @php
              $categs=[];
            @endphp
            <div class="grid grid-cols-2 max-w-fit border">
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
    <main class="mx-auto max-w-7xl sm:px-6 sm:pt-16 lg:px-8">
      <div class="mx-auto max-w-2xl lg:max-w-none">
        <!-- Product -->
        <div class="lg:grid lg:grid-cols-2 lg:items-start lg:gap-x-8">
          <!-- Image gallery -->
          <div class="flex flex-col-reverse">
            <!-- Image selector -->
            <div class="mx-auto mt-6 hidden w-full max-w-2xl sm:block lg:max-w-none">
              <div class="grid grid-cols-4 gap-6" aria-orientation="horizontal" role="tablist">
                <button id="tabs-2-tab-1"
                        class="relative flex h-24 cursor-pointer items-center justify-center rounded-md bg-white text-sm font-medium uppercase text-gray-900 hover:bg-gray-50 focus:outline-none focus:ring focus:ring-indigo-500/50 focus:ring-offset-4"
                        aria-controls="tabs-2-panel-1" role="tab" type="button">
                  <span class="sr-only">Angled view</span>
                  <span class="absolute inset-0 overflow-hidden rounded-md">
                  @foreach($product->imageproducts as $imagen)
                      @if($imagen->img_pos === 1)
                        <img src="{{ asset( $imagen->img_path) }}"
                             alt="" class="size-full object-cover">
                      @endif
                    @endforeach
                
                </span>
                  <!-- Selected: "ring-indigo-500", Not Selected: "ring-transparent" -->
                  <span class="pointer-events-none absolute inset-0 rounded-md ring-2 ring-transparent ring-offset-2"
                        aria-hidden="true"></span>
                </button>
                <!-- More images... -->
              </div>
            </div>
            
            <div>
              <!-- Tab panel, show/hide based on tab state. -->
              <div id="tabs-2-panel-1" aria-labelledby="tabs-2-tab-1" role="tabpanel" tabindex="0">
                @foreach($product->imageproducts as $imagen)
                  @if($imagen->img_pos === 1)
                    <img src="{{ asset( $imagen->img_path) }}"
                         alt="Angled front view with bag zipped and handles upright."
                         class="aspect-square w-full object-cover sm:rounded-lg">
                  @endif
                @endforeach
              </div>
              <!-- More images... -->
            </div>
          </div>
          
          <!-- Product info -->
          <div class="mt-10 px-4 sm:mt-16 sm:px-0 lg:mt-0">
            <h1 class="text-3xl font-bold tracking-tight text-gray-900">{{ $product->name }}</h1>
            <!-- Precio -->
            <div class="mt-3">
              @php
                $precio_venta  = $product->price;
               if($product->oferta){
                   $descuento = $product->descuento;
                   $precio_final =   $product->price  * ((100-$descuento)/100);
                 }else{
                   $precio_final = $product->price;
                 }
              @endphp
              <div class="flex items-center gap-8">
                <h4 class="text-3xl font-medium text-gray-900">{{ enteros($precio_final) }}<span
                    class="text-xl pl-1 align-super  ">{{ decimales($precio_final) }}</span>
                  €</h4>
                @if($product->oferta)
                  <h4 class="line-through text-xl font-medium text-gray-900">{{ enteros( $product->price ) }}<span
                      class="text-xs pl-1 align-super  ">{{ decimales( $product->price ) }}</span> €</h4>
                @endif
              </div>
              
              <!-- Reviews -->
              <div class="mt-3">
                <h3 class="sr-only">Reviews</h3>
                <div class="flex items-center">
                  <div class="flex items-center">
                    <!-- Active: "text-indigo-500", Inactive: "text-gray-300" -->
                    
                    <svg class="size-5 shrink-0 text-yellow-400" viewBox="0 0 20 20" fill="currentColor"
                         aria-hidden="true"
                         data-slot="icon">
                      <path fill-rule="evenodd"
                            d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401Z"
                            clip-rule="evenodd"/>
                    </svg>
                    <svg class="size-5 shrink-0 text-yellow-400" viewBox="0 0 20 20" fill="currentColor"
                         aria-hidden="true"
                         data-slot="icon">
                      <path fill-rule="evenodd"
                            d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401Z"
                            clip-rule="evenodd"/>
                    </svg>
                    <svg class="size-5 shrink-0 text-yellow-400" viewBox="0 0 20 20" fill="currentColor"
                         aria-hidden="true"
                         aria-hidden="true" data-slot="icon">
                      <path fill-rule="evenodd"
                            d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401Z"
                            clip-rule="evenodd"/>
                    </svg>
                    <svg class="size-5 shrink-0 text-yellow-400" viewBox="0 0 20 20" fill="currentColor"
                         aria-hidden="true" data-slot="icon">
                      <path fill-rule="evenodd"
                            d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401Z"
                            clip-rule="evenodd"/>
                    </svg>
                    <svg class="size-5 shrink-0 text-yellow-400" viewBox="0 0 20 20" fill="currentColor"
                         data-slot="icon">
                      <path fill-rule="evenodd"
                            d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401Z"
                            clip-rule="evenodd"/>
                    </svg>
                  </div>
                  <p class="sr-only">4 out of 5 stars</p>
                </div>
              </div>
              
              <div class="mt-6">
                <h3 class="sr-only">Description</h3>
                
                <div class="space-y-6 text-base text-gray-700">
                  {!! tiptap_converter()->asHTML($product->description) !!}
                </div>
                @if($product->oferta)
                  <h5
                    class="max-w-fit mt-3 inline-flex justify-center items-center gap-x-1.5 rounded-md px-2 py-1 text-xl font-medium text-white bg-green-600 ring-1 ring-inset ring-green-700">
                    <svg class="size-2.5 fill-green-300" viewBox="0 0 6 6" aria-hidden="true">
                      <circle cx="3" cy="3" r="3"/>
                    </svg>
                    {{$product->descuento}}% Descuento
                  </h5>
                @endif
              </div>
              
              <form class="mt-6">
                <!-- Colors -->
                <div>
                  <h3 class="text-sm text-gray-600">Color</h3>
                  
                  <fieldset aria-label="Choose a color" class="mt-2">
                    <div class="flex items-center gap-x-3">
                      <!-- Active and Checked: "ring ring-offset-1" -->
                      <label aria-label="Washed Black"
                             class="relative -m-0.5 flex cursor-pointer items-center justify-center rounded-full p-0.5 ring-gray-700 focus:outline-none">
                        <input type="radio" name="color-choice" value="Washed Black" class="sr-only">
                        <span aria-hidden="true" class="size-8 rounded-full border border-black/10 bg-gray-700"></span>
                      </label>
                      <!-- Active and Checked: "ring ring-offset-1" -->
                      <label aria-label="White"
                             class="relative -m-0.5 flex cursor-pointer items-center justify-center rounded-full p-0.5 ring-gray-400 focus:outline-none">
                        <input type="radio" name="color-choice" value="White" class="sr-only">
                        <span aria-hidden="true" class="size-8 rounded-full border border-black/10 bg-white"></span>
                      </label>
                      <!-- Active and Checked: "ring ring-offset-1" -->
                      <label aria-label="Washed Gray"
                             class="relative -m-0.5 flex cursor-pointer items-center justify-center rounded-full p-0.5 ring-gray-500 focus:outline-none">
                        <input type="radio" name="color-choice" value="Washed Gray" class="sr-only">
                        <span aria-hidden="true" class="size-8 rounded-full border border-black/10 bg-gray-500"></span>
                      </label>
                    </div>
                  </fieldset>
                </div>
                
                <div class="mt-10 flex">
                  <button type="submit"
                          class="flex max-w-xs flex-1 items-center justify-center rounded-md border border-transparent bg-indigo-600 px-8 py-3 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:ring-offset-gray-50 sm:w-full">
                    Add to bag
                  </button>
                  
                  <button type="button"
                          class="ml-4 flex items-center justify-center rounded-md px-3 py-3 text-gray-400 hover:bg-gray-100 hover:text-gray-500">
                    <svg class="size-6 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="currentColor"
                         aria-hidden="true" data-slot="icon">
                      <path stroke-linecap="round" stroke-linejoin="round"
                            d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z"/>
                    </svg>
                    <span class="sr-only">Add to favorites</span>
                  </button>
                </div>
              </form>
              
              <section aria-labelledby="details-heading" class="mt-12">
                <h2 id="details-heading" class="">Additional details</h2>
                @foreach($product->featuretitle as $feature)
                  <div class="divide-y divide-gray-200 border-t">
                    <div>
                      <h3>
                        <!-- Expand/collapse question button -->
                        <button type="button"
                                class="cursor-pointer group relative flex w-full items-center justify-between py-2 my-4 text-left"
                                aria-controls="disclosure-1" aria-expanded="false">
                          <span class="text-sm font-medium pl-4 text-gray-900"> {{ $feature->title }}</span>
                          <span class="ml-6 flex items-center mr-4">
                      <!-- Open: "hidden", Closed: "block" -->
                      <svg class="block size-6 text-gray-400 group-hover:text-gray-500" fill="none"
                           viewBox="0 0 24 24"
                           stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/>
                      </svg>
                      <svg class="hidden size-6 text-indigo-600 group-hover:text-indigo-500" fill="none"
                           viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                           data-slot="icon">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14"/>
                      </svg>
                    </span>
                        </button>
                      </h3>
                      <div class="pb-6 hidden" id="disclosure">
                        <ul role="list" class="list-disc space-y-1 pl-5 text-sm/6 text-gray-700 marker:text-gray-300">
                          {!! $feature->text !!}
                        </ul>
                      </div>
                    </div>
                  </div>
                @endforeach
                <!-- More sections... -->
              </section>
            </div>
          </div>
          <section aria-labelledby="related-heading" class="mt-10 border-t border-gray-200 px-4 py-16 sm:px-0">
            <h2 id="related-heading" class="text-xl font-bold text-gray-900">Customers also bought</h2>
            <div class="mt-8 grid grid-cols-1 gap-y-12 sm:grid-cols-2 sm:gap-x-6 lg:grid-cols-4 xl:gap-x-8">
              <div>
                <div class="relative">
                  <div class="relative h-72 w-full overflow-hidden rounded-lg">
                    <img
                      src="https://tailwindui.com/plus-assets/img/ecommerce-images/product-page-03-related-product-01.jpg"
                      alt="Front of zip tote bag with white canvas, black canvas straps and handle, and black zipper pulls."
                      class="size-full object-cover">
                  </div>
                  <div class="relative mt-4">
                    <h3 class="text-sm font-medium text-gray-900">Zip Tote Basket</h3>
                    <p class="mt-1 text-sm text-gray-500">White and black</p>
                  </div>
                  <div class="absolute inset-x-0 top-0 flex h-72 items-end justify-end overflow-hidden rounded-lg p-4">
                    <div aria-hidden="true"
                         class="absolute inset-x-0 bottom-0 h-36 bg-gradient-to-t from-black opacity-50"></div>
                    <p class="relative text-lg font-semibold text-white">$140</p>
                  </div>
                </div>
                <div class="mt-6">
                  <a href="#"
                     class="relative flex items-center justify-center rounded-md border border-transparent bg-gray-100 px-8 py-2 text-sm font-medium text-gray-900 hover:bg-gray-200">Add
                    to bag<span class="sr-only">, Zip Tote Basket</span></a>
                </div>
              </div>
              
              <!-- More products... -->
            </div>
          </section>
        </div>
    </main>
</x-layouts.app>
<script>
	document.addEventListener('DOMContentLoaded', () => {
		const botones = document.querySelectorAll('[aria-controls = disclosure-1]'),
			divs = document.querySelectorAll('#disclosure')
		
		botones.forEach((boton, index) => {
			boton.addEventListener('click', () => {
				boton.classList.toggle('bg-indigo-50')
				divs[index].classList.toggle('hidden')
				let spans = boton.querySelectorAll('span')
				let svgs = boton.querySelectorAll('svg')
				spans.forEach(span => span.classList.toggle('text-indigo-600'))
				svgs.forEach(svg => svg.classList.toggle('hidden'))
			})
		})
	})
</script>