@extends ('layout')

    @section ('css')
        <link href="{{asset ('css/tache.css')}}" rel="stylesheet" />
    @endsection

    @section ('contenu')

        <div class="row">
            <div class="texte-center d-flex justify-content-center">
                <h1>Tache :</h1>
            </div>
            <div class=" m-4 pull-left">
                <a class="btn btn-primary" href="{{ route('taches.index') }}">Retour</a>
            </div>
        </div>

        <div>
            @foreach( $taches as $tache ) 
            <div class="list">
                <ul>
                    <li>
                    <p> titre :</br>
                    {{ $tache->titre }} </p> </br>
                    <p> Description : </br>
                    {{ $tache->description }} </p> </br>
                    <p> deadline : {{ $tache->date }} </p> </br>
                    </li>
                </ul>
            </div>
            @endforeach
        </div>

    @endsection