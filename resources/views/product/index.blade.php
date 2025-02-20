<x-layouts.app :meta-title="'Productos'" :header-text="'Productos'">
  <div class="">
    <h3 class="mb-4 text-xl">{{ __('Listado de Productos') }}</h3>
    <x-products-list :products="$products"/>
  </div>
</x-layouts.app>