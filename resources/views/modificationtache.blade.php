@extends ('layout')

    @section ('css')
    <link href="{{asset ('css/form.css')}}" rel="stylesheet" />
    @endsection

    @section ('contenu')

        <div class="roow">
            <div class="texte-center d-flex justify-content-center">
                <h1>Modifier une tache :</h1>
            </div>
            <div class="pull-left">
                <a class=" m-4 btn btn-primary" href="{{ route('taches.index') }}">Retour</a>
            </div>
        </div>

        <div class="texte-center d-flex justify-content-center">

            <form action="{{ route('taches.update',$tache->id) }}" method="POST">
                {{ csrf_field() }}
                @method('PUT')

                <p><input type="text" name="titre" value=" {{ $tache->titre }} "></p>

                <!-- <p><input type="text"  name="description" value=" {{ $tache->description }} "></p> -->
                <p><textarea name="description" rows="10" cols="60" > {{ $tache->description }} </textarea></p>

                <p><input type="text" name="date" value=" {{ $tache->date }} "></p>

                <p><input type="submit" class="btn btn-primary" value="Modifier"></p>

            </form>

        </div>

    @endsection