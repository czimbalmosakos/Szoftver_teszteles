@include('partials.navbar')

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>
    <body>
    <br>
        <div class="container rounded" style="background-color: #a0aec0; font-size: 30px">
            <span>
                ID: {{ $person->id }}<br>
                Név: {{ $person->first_name }} {{ $person->last_name }}<br>
                Született {{ $age }} éve, {{ $person->birth_place }}<br>
                Hirlevél:
                @if($person->has_newsletter == "1")
                    Feliratkozva
                @else Nincs feliratkozva
                @endif <br>
                Bemutatkozás: {{ $person->introduction }} <br>
                Megszolitás: {{ $person->title }} <br>
                Vércsoport: {{ $person->blood_type }} <br>
                Érdeklődési kör: @foreach($person->interests as $interest)
                    {{ $interest->name }} <br>
                @endforeach <br>
            </span>
            <a href="{{ route('member.delete', ['person' => $person]) }}" class="btn-primary rounded" style="font-size: 50px">Törlés</a>
        </div>
        </body>
</html>
