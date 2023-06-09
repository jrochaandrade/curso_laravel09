<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Página inicial</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
  <body>
    <main class="container">
        <h1>index</h1>
        <a type="button" href="{{route('create')}}" class="btn btn-primary">ADICIONAR NOVOS USUÁRIOS</a>

        <table class="table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome</th>
                <th scope="col">Email</th>
                <th scope="col">Ver</th>
                <th scope="col">Editar</th>
                <th scope="col">Deletar</th>

            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
            <tr>
                <th scope="row">{{$user->id}}</th>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>
                  <a type="button" href="{{route('show', $user->id)}}" class="btn btn-success">VER</a>
                </td>
                <td>
                  <a type="button" href="{{route('edit', $user->id)}}" class="btn btn-warning">EDITAR</a>
                </td>                
                <td>
                  <form action="{{route('destroy', $user->id)}}" method="post">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-danger">DELETAR</button>
                  </form>
                </td>


                
            </tr>
            @endforeach
                
            </tbody>
        </table>

    </main>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>