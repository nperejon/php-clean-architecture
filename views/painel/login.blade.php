<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Teste</title>
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
  @if(isset($logged) && $logged) 
    @php
      header("Location: " . $url, true, 302);
      exit();
    @endphp
  @endif
  <div class="login">
    <form method="POST">
      {{ $error ?? null }}
      <input type="text" name="email" required />
      <input type="password" name="password" required />
      <input type="hidden" name="token" value={{ $token }} />
      <input type="submit" value="Entrar" />
    </form>
  </div>
</body>
</html>