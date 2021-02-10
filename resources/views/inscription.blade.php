@extends('layout')

    @section('css')

        <link href="{{asset ('css/inscription.css')}}" rel="stylesheet" />

    @endsection

    @section('contenu')
        <div class="title m-b-md">
                    Inscription
                </div>

                <form action="/inscription" method="post">
                        {{ csrf_field() }}

                    <fieldset>

                        <legend> Créer votre compte </legend>

                        <p> <input type="name" name="name" placeholder="Nom" Value="{{ old ('name') }}"></p>

                            @if($errors->has('name'))
                            <p>{{$errors->first ('name') }}</p>
                            @endif

                        <p><input type="email" name="email" id="Email" placeholder="Email" Value="{{ old ('email') }}"> </p>

                            @if($errors->has('email'))
                            <p>{{$errors->first ('email') }}</p>
                            @endif

                        <p><input type="password" name="password" id="password" placeholder="Mot de passe"></p>

                            @if($errors->has('password'))
                            <p>{{$errors->first ('password') }}</p>
                            @endif

                        <p><input type="password" name="password_confirmation" id="Confirmer_mot_de_passe" placeholder="Confirmer mot de passe"></p>

                            @if($errors->has('password_confirmation'))
                            <p>{{$errors->first ('password_confirmation') }}</p>
                            @endif

                        <p><input type="submit" value="M'inscrire"></p>


                    </fieldset>

                    </form>

    @endsection
