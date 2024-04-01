@extends('layouts.app')
@vite(['resources/css/etudiant.css', 'resources/js/app.js','resources/css/layouts.css'])
@section('content')
<body style="background-color: #000000; color: #ffffff;" id="etudiant">

    <div class="welcome" style="background-color: #ff6600; padding: 20px; border-radius: 10px; box-shadow: 0 0 20px rgba(0, 0, 0, 0.1); margin: 20px auto;">

        <h2 style="background-color: #ff6600; text-align:center; padding: 10px; border-radius: 5px; margin-bottom: 20px;">Résultats de la recherche</h2>

        <table class="offers-table" style="width: 100%; border-collapse: collapse;">
            <thead>
                <tr>
                    <th style="padding: 15px; background-color: #ff6600; text-align: left; font-weight: bold;">Nom de l'offre</th>
                    <th style="padding: 15px; background-color: #ff6600; text-align: left; font-weight: bold;">Compétences requises</th>
                    <th style="padding: 15px; background-color: #ff6600; text-align: left; font-weight: bold;">Durée </th>
                    <th style="padding: 15px; background-color: #ff6600; text-align: left; font-weight: bold;">Entreprise</th>
                    <th style="padding: 15px; background-color: #ff6600; text-align: center; font-weight: bold;">Postuler</th>
                    <th style="padding: 15px; background-color: #ff6600; text-align: center; font-weight: bold;">Evaluer</th>
                    <th style="padding: 15px; background-color: #ff6600; text-align: center; font-weight: bold;">Consulter</th>
                    <th style="padding: 15px; background-color: #ff6600; text-align: center; font-weight: bold;">Ajouter</th>
                </tr>
            </thead>
            <tbody style="font-family: monospace;">
                @foreach ($offers as $offer)
                <tr>
                    <td style="padding: 15px; border-bottom: 1px solid #ffffff;">{{ $offer->name }}</td>
                    <td style="padding: 15px; border-bottom: 1px solid #ffffff;">{{ $offer->type }}</td>
                    <td style="padding: 15px; border-bottom: 1px solid #ffffff;">{{ $offer->duree }}</td>
                    <td style="padding: 15px; border-bottom: 1px solid #ffffff;">{{ $offer->entreprise->name }}</td>
                    <td style="padding: 10px; border-bottom: 1px solid #ffffff; text-align: center;"> <a class="btn btn-primary postuler-btn" href="/postuler/{{ $offer->id }}/candidates">Postuler</a></td>
                    <td style="padding: 10px; border-bottom: 1px solid #ffffff; text-align: center;">   <a class="btn btn-primary postuler-btn" href="/evaluations/{{ $offer->entreprise_id }}/create">Evaluer</a></td>
                    <td style="padding: 10px; border-bottom: 1px solid #ffffff; text-align: center;"><a class="btn btn-primary postuler-btn" href="/evaluations/{{ $offer->entreprise_id }}">Evaluations</a></td>
                    <td style="padding: 10px; border-bottom: 1px solid #ffffff; text-align: center;"><form action="/wishlist/add/{{ $offer->id }}" method="POST" style="display: inline;">
                            @csrf
                            <input type="hidden" name="offer_id" value="{{ $offer->id }}">
                            <button type="submit" class="btn btn-primary postuler-btn">Wishlist</button>
                        </form></td>
                     
                  
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>

</body>

@endsection
