@extends('layouts.app')
@section('content')

@php
  $profile=DB::table('users')->where('id',Auth::id())->first();
@endphp

    <div class="contact_form py-5" style="background: #F5F5FA">
        <div class="container py-3">
            <div class="row">

        <div class="col-md-7 mt-5 mr-5 ml-5" data-aos="fade-right">
            <h3 class="bg-white p-2 mt-2 text-success" style="background-color: #e1f1e9e5; font-size:29px;">Mon profil</h3>
            <div class="bg-white">
                <table class="table table-hover" style="font-size: 16px;">
                    <tr>
                        <td class="border-0">Nom</td>
                        <td class="border-0">{{ $profile->name }}</td>
                    </tr>
                    <tr>
                        <td>E-mail</td>
                        <td>{{ $profile->email }}</td>
                    </tr>
                    <tr>
                        <td>Téléphone</td>
                        <td>{{ $profile->phone }}</td>
                    </tr>
                </table>
            </div> <!---end col-md-5--->
        </div>


<!------User-Profile----------------------->
            <div class="col-4" data-aos="fade-left">
                <div class="card" style="width: 18rem;">

                <a href="{{ route('home') }}">
                    <img src="{{ asset('public/avatar.jpg') }}" class="card-img-top rounded-circle mt-3" style="height: 90px; width: 90px; margin-left: 34%;">
                </a>
                <div class="card-body more moreApp" style="margin-left: 80px;">
                    <a href="{{ route('home') }}" class="button-pipaluk button--inverted text-primary px-4 pt-1"> <h4 class="text-center">{{ Auth::user()->name }}</h4></a>
                </div>

                <ul class="list-group list-group-flush ml-4">
                <li class="list-group-item more moreS py-1"><a href="{{ route('password.change') }}" class="button-pipaluk button--inverted px-4 py-2 text-primary ml-4">Changer le mot de passe</a></li>
                <li class="list-group-item more moreS py-1"><a href="{{ route('edit.user.profile') }}" class="button-pipaluk button--inverted px-5 py-2 text-primary ml-4">Modifier le profil</a></li>
                <li class="list-group-item more moreS py-1"><a href="{{ route('add.property.user')}}" class="button-pipaluk button--inverted pl-4 py-2 text-primary ml-4" style="padding-right:35px;">Publier une annonce</a></li>
                </ul>
                <div class="card-body more more2 p-1">
                <a href="{{ route('user.logout') }}" class="btn bg-transparent text-white button-pipaluk button--inverted btn-block btn-sm py-1" style="font-size:15px;">Déconnexion</a>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>

@endsection
