@if(session('msg-erro'))
  <div class="alert alert-danger" role="alert">
    {{ session('msg-erro') }}
  </div>
@endif  

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="/usuario-insert" method="post">
    @csrf
        Nome:
        <input type="text" name="nome" placeholder="nome">
        Username:
        <input type="text" name="username" placeholder="username">
        Email:
        <input type="text" name="email" placeholder="email">
        Senha:
        <input type="text" name="senha" placeholder="senha">
        <input type="submit" value="">Enviar
    </form>
</body>
</html>