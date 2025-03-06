<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nuevo Usuario Registrado</title>
</head>
<body>
<h2>Nuevo Usuario Registrado</h2>
<p>Nombre: {{ $user->name }}</p>
<p>Email: {{ $user->email }}</p>
<p>Fecha de registro: {{ $user->created_at->format('d/m/Y H:i') }}</p>
</body>
</html>