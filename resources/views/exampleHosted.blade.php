<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="SSLCommerz">
    <title>Tedia-investisment — Paiement (hébergé) | SSLCommerz</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
</head>
<body class="bg-light">
<div class="container">
    <div class="py-5 text-center">
        <h1 style="color: blue">Tedia-investisment</h1>
        <h2>Paiement sécurisé</h2>
        <p>Passerelle : SSLCommerz (à remplacer si vous utilisez un PSP local en FCFA)</p>
        {{-- <p class="lead">Below is an example form built entirely with Bootstrap’s form controls. We have provided this sample form for understanding Hosted Checkout Payment with SSLCommerz.</p> --}}
    </div>

    <!------------ Check in Session Message ----------->
        {{-- @if (session()->has('message'))
            <div class="alert alert-{{session('type')}} alert-dismissible fade show" role="alert">
                <strong>{{ session('message')}}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif --}}
    <!--- ---------------- X -------------------- --->


    <div class="row">
        <div class="col-md-8 offset-md-2 order-md-1">
            <h4 class="mb-3">Adresse de facturation</h4>
            <form action="{{ url('/checkout') }}" method="POST" class="needs-validation">
                <input type="hidden" value="{{ csrf_token() }}" name="_token" />

                <!----- Hidden Value ----->
                <input type="hidden" name="user_id" class="form-control" value="{{$user->id}}" >
                <input type="hidden" name="property_id" class="form-control" value="{{$property_id}}">
                <input type="hidden" name="price" class="form-control" value="{{$price}}">
                <!----- Hidden Value ----->


                <div class="row">
                    <div class="col-md-5 mb-3">
                        <label for="country">Pays</label>
                        <select class="custom-select d-block w-100" id="country" required>
                            <option value="">Choisir…</option>
                            <option value="Togo" selected>Togo</option>
                        </select>
                        <div class="invalid-feedback">
                            Veuillez choisir un pays.
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="state">Région / ville</label>
                        <select class="custom-select d-block w-100" id="state" required>
                            <option value="">Choisir…</option>
                            <option value="Lomé">Lomé</option>
                            <option value="Kara">Kara</option>
                            <option value="Sokodé">Sokodé</option>
                            <option value="Kpalimé">Kpalimé</option>
                            <option value="Atakpamé">Atakpamé</option>
                            <option value="Dapaong">Dapaong</option>
                            <option value="Tsévié">Tsévié</option>
                        </select>
                        <div class="invalid-feedback">
                            Veuillez indiquer une région ou une ville.
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="zip">Code postal</label>
                        <input type="text" class="form-control" id="zip" placeholder="Code postal" required>
                        <div class="invalid-feedback">
                            Code postal requis.
                        </div>
                    </div>
                </div>

                <hr class="mb-4">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="save-info">
                    <label class="custom-control-label" for="save-info">Enregistrer pour la prochaine fois</label>
                </div>
                <hr class="mb-4">
                <button class="btn btn-primary btn-lg btn-block" type="submit">Continuer vers le paiement</button>
            </form>
        </div>
    </div>

    <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">&copy; {{ date('Y') }} Tedia-investisment</p>
        <ul class="list-inline">
            <li class="list-inline-item"><a href="#">Confidentialité</a></li>
            <li class="list-inline-item"><a href="#">Conditions</a></li>
            <li class="list-inline-item"><a href="#">Assistance</a></li>
        </ul>
    </footer>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</html>
