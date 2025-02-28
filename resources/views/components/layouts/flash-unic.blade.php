<div id="flashUnic" class="relative w-full flex justify-center">
  <div class="absolute w-full max-w-1/3 flex justify-center px-12 -translate-y-full duration-1000">
    <div class="rounded-md w-full max-w-[600px] bg-green-50 p-4 flex items-center justify-evenly">
      <div class="flex items-center gap-2 ">
        <x-heroicon-c-information-circle class="text-green-800 h-12 w-12"/>
        <p class="text-sm font-medium text-green-800">{{__('Add') }}</p>
        <p class="text-sm font-medium text-green-800">{{__('Remove this item from favorites') }}</p>
      </div>
      <div class="-mx-1.5 -my-1.5">
        <button type="button"
                class="inline-flex rounded-md bg-green-50 p-1.5 text-green-500 hover:bg-green-100 focus:outline-none focus:ring-2 focus:ring-green-600 focus:ring-offset-2 focus:ring-offset-green-50">
          <span class="sr-only">Dismiss</span>
          <x-heroicon-c-x-mark class="text-green-500 h-8 w-8"/>
        </button>
      </div>
    </div>
  </div>
</div>