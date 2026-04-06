<!DOCTYPE html>
<html lang="fr">

<head>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
</head>

<!--------Eita Must be HTML Template hothe hobe,(Table Format)//Bootstap kaj korbe na------->

<body>

    <table>
        <caption><h2>Récapitulatif de votre annonce</h2></caption>

        <tr>
            <th>Nom</th>
            <th>{{ $info['name'] }}</th>
        </tr>
        <tr>
            <th>E-mail</th>
            <th>{{ $info['email'] }}</th>
        </tr>
        <tr>
            <th>Téléphone</th>
            <th>{{ $info['phone'] }}</th>
        </tr>
        <tr>
            <th>Adresse</th>
            <th>{{ $info['address'] }}</th>
        </tr>

         <tr>
            <th>Quartier / zone</th>
            <th>{{ $info['subcity'] }}</th>
        </tr>
      <tr>
          <th>Référence bien</th>
          <th>{{ $info['property_code'] }}</th>
      </tr>
        <tr>
            <th>Chambres</th>
            <th>{{ $info['bedroom'] }}</th>
        </tr>
        <tr>
            <th>Salles de bain</th>
            <th>{{ $info['bathroom'] }}</th>
        </tr>
        <tr>
            <th>Cuisine</th>
            <th>{{ $info['kitchen'] }}</th>
        </tr>
        <tr>
            <th>Parking</th>
            <th>{{ $info['parking'] }}</th>
        </tr>
        <tr>
            <th>Type</th>
            <th>{{ $info['type'] }}</th>
        </tr>
        <tr>
          <th>Surface</th>
          <th>{{ $info['area'] }}</th>
      </tr>
      <tr>
          <th>Catégorie</th>
          <th>{{ $info['category'] }}</th>
      </tr>
      <tr>
          <th>Objectif (vente / location)</th>
          <th>{{ $info['purpose'] }}</th>
      </tr>
      <tr>
          <th>Étage</th>
          <th>{{ $info['floor'] }}</th>
      </tr>
      <tr>
          <th>Prix</th>
          <th>{{ $info['price'] }}</th>
      </tr>
      <tr>
        <th>Vidéo</th>
        <th>{{ $info['video'] }}</th>
    </tr>
    <tr>
        <th>Mois</th>
        <th>{{ $info['month'] }}</th>
    </tr>
    <tr>
        <th>Date</th>
        <th>{{ $info['date'] }}</th>
    </tr>
    <tr>
        <th>Année</th>
        <th>{{ $info['year'] }}</th>
    </tr>

    </table>

</body>

</html>
