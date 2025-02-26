<x-layouts.app :meta-title='__("Favorites")' :header-text='__("Favorites")'>
  <div class="px-4 sm:px-6 lg:px-8">
    <div class="sm:flex sm:items-center">
      <div class="sm:flex-auto">
        <h1 class="text-base font-semibold text-gray-900">{{__("Your Saved Favorites")}}</h1>
      </div>
      <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
        <button type="button"
                class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
          Update credit card
        </button>
      </div>
    </div>
    <div class="-mx-4 mt-10 ring-1 ring-gray-300 sm:mx-0 sm:rounded-lg">
      <table class="min-w-full divide-y divide-gray-300">
        <thead>
        <tr>
          <th scope="col"
              class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">{{  __('Name') }}</th>
          <th scope="col"
              class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">{{  __('Name') }}</th>
          <th scope="col" class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 lg:table-cell">
            {{ __('Price') }}
          </th>
          <th scope="col"
              class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 lg:table-cell">{{ __('Offer') }}
          </th>
          <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">{{ __('Actions') }}
            <span class="sr-only">{{ __('Actions') }}</span>
          </th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
          @php
            if($product->imageproducts->count() === 0 )
             $img =  Avatar::create($product->name)->toBase64();
              else
          $img = asset($product->getImgPal());
          @endphp
          <tr class="border-b">
            <td class="relative py-4 pl-4 pr-3 text-sm sm:pl-6">
              <div class="font-medium text-gray-900"><img class="max-w-14" src="{{ $img }}"></div>
            </td>
            <td class=" relative py-4 pl-4 pr-3 text-sm sm:pl-6">
              <div class="font-medium text-gray-900">{{ $product->name }}</div>
            </td>
            <td class="hidden px-3 py-3.5 text-sm text-gray-500 lg:table-cell">
              <div class="max-w-fit"><p> {{ $product->precios(false) }}<span
                    class="pl-1 align-super">{{ $product->precios(false, true) }}</span> €</p>
                @if($product->oferta)
                  <p class="line-through  text-xs text-red-500">{{  $product->precios( true ) }}
                    <span class="pl-1 align-super">{{  $product->precios( true, true ) }}</span> €</p>
              </div>
      @endif</div>
    </td>
    <td class="hidden px-3 py-3.5 text-sm text-gray-500 lg:table-cell">
      @if( $product->oferta)
        <span
          class="inline-flex items-center gap-x-1.5 rounded-md bg-green-500/10 px-2 py-1 text-xs font-medium text-green-600 ring-1 ring-inset ring-green-500/20"><svg
            class="size-1.5 fill-green-300" viewBox="0 0 6 6" aria-hidden="true">  <circle cx="3" cy="3" r="3"/> </svg>
          {{ $product->descuento .'% '. __('Discount') }}</span>
      @endif
    </td>
    <td class="flex items-center justify-center gap-2 py-3.5 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
      <a href="{{ route('products.show', $product) }}">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
             stroke="currentColor"
             class="size-6 text-blue-600">
          <path stroke-linecap="round" stroke-linejoin="round"
                d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z"/>
          <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
        </svg>
      </a>
      <button type="button">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
             class="size-6 text-red-600">
          <path stroke-linecap="round" stroke-linejoin="round"
                d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
        </svg>
      </button>
    </td>
    </tr>
    @endforeach
    </tbody>
    </table>
  </div>
  </div>
</x-layouts.app>