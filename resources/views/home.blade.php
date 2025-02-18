<x-layouts.app :meta-title="'Home'" :header-text="'Home'">
  <div class="">
    <h3 class="mb-4 text-xl">{{ __('Last Products') }}</h3>
    <x-product-card :products="$products"/>
  </div>
</x-layouts.app>