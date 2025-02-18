<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Document</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <link rel="stylesheet" href="../css/css.css">
  <script src="https://unpkg.com/@popperjs/core@2"></script>
  <script src="https://unpkg.com/tippy.js@6"></script>
</head>
<body>

<div class="mt-4">
  {{ $product->name }}
</div>

{!! tiptap_converter()->asHTML($product->description) !!}

<style>
    figcaption {
        display: none;
    }

    img {
        width: 300px;
        height: auto;
        aspect-ratio: auto;
        border-radius: 15px;
    }

    .filament-tiptap-grid-builder {
        display: grid;
        margin: auto;
        max-width: 70%;
        border: 1px solid lightgray;
        items: center;
        justify-content: center;

    }
</style>

</body>
</html>