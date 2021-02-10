@extends ('layout')

    @section ('css')
    <link href="{{asset ('css/form.css')}}" rel="stylesheet" />
    @endsection

    @section ('contenu')

    <div class="m-4 pull-left">
        <a class="btn btn-primary" href="{{ route('taches.index') }}">Retour</a>
    </div>

    <div class="card justify-content-center">

        <div class="card-header texte-center d-flex justify-content-center">
            <h1>Ajouter une tache :</h1>

        </div>

        <div class="card-body">

            @if ($errors->any())

                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li> {{ $error }} </li>
                        @endforeach
                    </ul>

                </div>
            @endif     

            <form action="{{ route('taches.store') }}" method="POST">
                {{ csrf_field() }}

                <div class="m-2">

                    <div class="texte-center">
                        <p><input class="form-control" type="text" name="titre" placeholder="Titre"></p>
                    </div>

                    <div class="texte-center d-flex justify-content-center">
                        <textarea class="form-control" rows="10" cols="60" name="description" placeholder="Déscription"></textarea>
                    </div>

                    <div class="texte-center d-flex justify-content-center">
                        <p><input class="form-control" type="date" name="date" placeholder="Date de fin"></p>
                    </div>

                    <div class="texte-center d-flex justify-content-center">
                        <p><input type="submit" class="btn btn-primary" value="Ajouter"></p>
                    </div>
                
                </div>

            </form>

        </div>

    </div>

    @endsection