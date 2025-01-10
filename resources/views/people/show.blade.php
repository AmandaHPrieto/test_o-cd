<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <title>{{ $person->first_name }} {{ $person->last_name }}</title>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-warning">
    <div class="container-fluid">
      <a class="navbar-brand h1" href={{ route('people.index') }}>People</a>
    </div>
  </nav>
  
  <div class="container mt-5">
    <div class="row">
      <div class="col">
        <div class="card">
          <div class="card-header">
            <h5 class="card-title">{{ $person->first_name }} {{ $person->last_name }}</h5>
          </div>
          <div class="card-body">
            <p><strong>Nom de naissance:</strong> {{ $person->birth_name ?? 'N/A' }}</p>
            <p><strong>Date de naissance:</strong> {{ $person->date_of_birth }}</p>
            <h5>Parents</h5>
              <ul>
                @foreach($person->parents as $parent)
                  <li>{{ $parent->first_name }} {{ $parent->last_name }}</li>
                @endforeach
              </ul>
            <h5>Enfants</h5>
            @if($person->children->isEmpty())
              <p>Aucun enfant trouvé.</p>
            @else
              <ul>
                @foreach($person->children as $child)
                  <li>{{ $child->first_name }} {{ $child->last_name }}</li>
                @endforeach
              </ul>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
