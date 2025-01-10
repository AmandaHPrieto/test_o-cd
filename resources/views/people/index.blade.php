<!-- Source : https://kinsta.com/blog/laravel-crud/ -->

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <title>Liste des Personnes</title>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-warning">
    <div class="container-fluid">
      <a class="navbar-brand h1" href="{{ route('people.index') }}">People</a>
      <div class="ms-auto">
        <a class="btn btn-sm btn-success" href="{{ route('people.create') }}">Ajouter une Personne</a>
      </div>
    </div>
  </nav>

  <div class="container mt-5">
    @if(session('success'))
      <div class="alert alert-success">
        {{ session('success') }}
      </div>
    @endif

    <div class="row">
      @foreach ($people as $person)
        <div class="col-sm-4">
          <div class="card mb-3">
            <div class="card-header">
              <h5 class="card-title">{{ $person->first_name }} {{ $person->last_name }}</h5>
            </div>
            <div class="card-body">
            <p><strong>Créé par:</strong> 
                User {{ $person->created_by }}
            </p>             
            </div>
            <div class="card-footer">
              <a href="{{ route('people.show', $person->id) }}" class="btn btn-info btn-sm">Voir</a>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pzjw8f+ua7Kw1TIq0wP7pxr8F14WXYR0tYyD2QpG62z1Dx9X0zVmoj0XrjmB0qHgf" crossorigin="anonymous"></script>
</body>
</html>
