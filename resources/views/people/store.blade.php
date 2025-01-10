<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Créer une nouvelle personne</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container mt-5">
    <h2>Créer une nouvelle personne</h2>

    <!-- Affichage des messages d'erreur -->
    @if($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <!-- Formulaire de création -->
    <form action="{{ route('people.store') }}" method="POST">
      @csrf
      <div class="mb-3">
        <label for="first_name" class="form-label">Prénom</label>
        <input type="text" class="form-control" id="first_name" name="first_name" value="{{ old('first_name') }}">
      </div>

      <div class="mb-3">
        <label for="last_name" class="form-label">Nom</label>
        <input type="text" class="form-control" id="last_name" name="last_name" value="{{ old('last_name') }}">
      </div>

      <div class="mb-3">
        <label for="birth_name" class="form-label">Nom de naissance (facultatif)</label>
        <input type="text" class="form-control" id="birth_name" name="birth_name" value="{{ old('birth_name') }}">
      </div>

      <div class="mb-3">
        <label for="date_of_birth" class="form-label">Date de naissance</label>
        <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" value="{{ old('date_of_birth') }}">
      </div>

      <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
  </div>
</body>
</html>
