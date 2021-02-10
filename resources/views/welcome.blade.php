@extends ('layout')

    @section('css')
    <link href="{{asset ('css/welcome.css')}}" rel="stylesheet" />
    @endsection

    @section ('contenu')
        <div class="texte-center d-flex justify-content-center A1">
            <h1>Todo Liste :</h1>
            <div class="ajouter">
                <a class="btn btn-primary" href="{{ route('taches.create') }}">Ajouté une tache</a>
            </div>
        </div>

        @if ($message = Session::get('success'))
            <div class="alert allert-sucsess d-flex justify-content-center ">
                <p>{{ $message }}</p>
            </div>
        @endif


        <div class="d-flex justify-content-center">
            <table>
                <thead class="th">
                    <tr>
                        <td></td>
                        <td>Titre</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach( $taches as $tache )
                        <tr>
                            <td><input type="checkbox" name="checkbox" id="checkbox"></td>
                            <td><label for="checkbox"> {{ $tache->titre }} </label></td>
                            <td>
                                <form action="{{ route('taches.destroy', $tache->id) }}" method="POST">
                                    <a class="btn btn-info" href="{{ route('taches.show',$tache->id) }}">Voire</a>
                                    <a class="btn btn-info" href="{{ route('taches.edit',$tache->id) }}">Modifier</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endsection

