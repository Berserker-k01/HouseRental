@extends('layouts.app')

@section('content')



<div style="background-image: linear-gradient(to top, rgba(254, 254, 254,.3) , #F5F5FA);">

                <!---------------User Log-in & Register Form --------------->

<!--------------- Log-in Form --------------->
<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/contact_styles.css')}}">

    <div class="contact_form">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 offset-lg-1 logreg">
                    <div class="contact_form_container">
                        <div class="contact_form_title text-center text-primary">Connexion</div>

                        <form action="{{ route('login') }}" id="contact_form" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">E-mail ou téléphone</label>
                                <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  aria-describedby="emailHelp" placeholder="E-mail ou téléphone" required="">
                                @error('email')
                                   <span class="invalid-feedback" role="alert">
                                       <strong>{{ $message }}</strong>
                                   </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Mot de passe</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required=""  aria-describedby="emailHelp" placeholder="Mot de passe">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="contact_form_button more more2">
                                <button type="submit" class="btn bg-transparent text-white button-pipaluk button--inverted px-4 py-2" style="font-size:16px;">Se connecter</button>
                            </div>
                        </form><br>
                        <a href="{{ route('password.request') }}">Mot de passe oublié ?</a>
                        <br><br>
{{-------Socialite-----------}}
                        <span class="more"><button type="submit" class="btn btn-block text-white bg-transparent button-pipaluk button--inverted" style="font-size: 15px; padding:8px; margin-top:1px"><i class="fab fa-facebook-square"></i>  Continuer avec Facebook</button></span>
                        <span class="more more2"><a href="{{ url('/auth/redirect/google') }}" class="btn btn-block text-white bg-transparent button-pipaluk button--inverted" style="font-size: 15px; padding:8px; margin-top:1px"><i class="fab fa-google-plus-square"></i>  Continuer avec Google</a></span>

                    </div>
                </div>



<!------------//---------------//---------------//------------------//-----------------//--------------//---------------->



<!--------------- Register Form --------------->
                 <div class="col-lg-5 offset-lg-1 logreg">
                    <div class="contact_form_container">
                        <div class="contact_form_title text-center text-primary">Créer un compte</div>

                        <form action="{{ route('register') }}" id="contact_form" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nom complet</label>
                                <input type="text" class="form-control"  aria-describedby="emailHelp" placeholder="Nom complet" name="name" required="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Téléphone</label>
                                <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}"  aria-describedby="emailHelp" placeholder="Téléphone"  required="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">E-mail</label>
                                <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  aria-describedby="emailHelp" placeholder="E-mail" required="">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Mot de passe</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" aria-describedby="emailHelp" placeholder="Mot de passe" name="password" required="" autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Confirmer le mot de passe</label>
                                <input type="password" class="form-control" aria-describedby="emailHelp" placeholder="Confirmez le mot de passe" name="password_confirmation" required="" autocomplete="new-password">
                            </div>
                            <div class="contact_form_button more">
                                <button type="submit" class="btn bg-transparent text-white button-pipaluk button--inverted px-4 py-2" style="font-size:16px;">S’inscrire</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <div class="panel"></div>
    </div>


</div>

@endsection
