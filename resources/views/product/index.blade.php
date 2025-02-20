<x-layouts.app :meta-title="'Productos:'.$titulo " :header-text="'Productos: '.$titulo">
  <div class="">
    <x-products-list :products="$products"/>
  </div>
</x-layouts.app>