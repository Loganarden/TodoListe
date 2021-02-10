@extends ('layout')

    @section('css')

        <link href="{{asset ('css/connexion.css')}}" rel="stylesheet" />

    @endsection

    @section('contenu')

                <div class="title m-b-md">
                    Connexion
                </div>

                <fieldset>

                <form action="/connexion" method="post">
                        {{ csrf_field() }}

                        <p><input type="email" name="email" id="Email" placeholder="Email" > </p>

                            @if($errors->has('email'))
                            <p>{{$errors->first ('email') }}</p>
                            @endif

                        <p><input type="password" name="password" id="password" placeholder="Mot de passe"></p>

                            @if($errors->has('password'))
                            <p>{{$errors->first ('password') }}</p>
                            @endif

                        <p><input type="submit" value="Se connecter"></p>
                    </form>

                </fieldset>

    @endsection
