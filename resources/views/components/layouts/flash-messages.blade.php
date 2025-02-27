@session('success')
<div class="rounded-md bg-green-50 p-4">
  <div class="flex">
    <div class="shrink-0">
      <x-heroicon-c-information-circle class="text-green-800 h-24 w-24"/>
    </div>
    <div class="ml-3">
      <p class="text-sm font-medium text-green-800">{{$value}}</p>
    </div>
    <div class="ml-auto pl-3">
      <div class="-mx-1.5 -my-1.5">
        <button type="button"
                class="inline-flex rounded-md bg-green-50 p-1.5 text-green-500 hover:bg-green-100 focus:outline-none focus:ring-2 focus:ring-green-600 focus:ring-offset-2 focus:ring-offset-green-50">
          <span class="sr-only">Dismiss</span>
          <svg class="size-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
            <path
              d="M6.28 5.22a.75.75 0 0 0-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 1 0 1.06 1.06L10 11.06l3.72 3.72a.75.75 0 1 0 1.06-1.06L11.06 10l3.72-3.72a.75.75 0 0 0-1.06-1.06L10 8.94 6.28 5.22Z"/>
          </svg>
        </button>
      </div>
    </div>
  </div>
</div>
@endsession

@session('error')
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  {{ $value }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endsession

@session('warning')
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  {{ $value }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endsession

@session('info')
<div class="rounded bg-blue-50 p-4">
  <div class="flex items-center">
    <div class="shrink-0">
      <x-heroicon-c-information-circle class="text-blue-800 h-14 w-14"/>
    </div>
    <div class="ml-3">
      <p class="text-sm font-medium text-blue-800">{{$value}}</p>
    </div>
    <div class="ml-auto pl-3">
      <div class="-mx-1.5 -my-1.5">
        <button type="button"
                class="inline-flex rounded-md bg-blue-50 p-1.5 text-blue-500 hover:bg-blue-100 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-offset-2 focus:ring-offset-blue-50">
          <span class="sr-only">Dismiss</span>
          <svg class="size-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
            <path
              d="M6.28 5.22a.75.75 0 0 0-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 1 0 1.06 1.06L10 11.06l3.72 3.72a.75.75 0 1 0 1.06-1.06L11.06 10l3.72-3.72a.75.75 0 0 0-1.06-1.06L10 8.94 6.28 5.22Z"/>
          </svg>
        </button>
      </div>
    </div>
  </div>
</div>
@endsession

@if ($errors->any())
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Please check the form below for errors</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif
