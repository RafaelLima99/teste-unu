@if(session('msg-sucesso'))
  <div class="alert alert-success" role="alert">
    {{ session('msg-sucesso') }}
  </div>
@endif  
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
    <form action="/auth" method="post">
    @csrf
        
        Email ou username:
        <input type="text" name="emailOuUser" placeholder="emailOuUser">
        Senha:
        <input type="text" name="senha" placeholder="senha">
        <input type="submit" value="">Enviar
    </form>
</body>
</html>