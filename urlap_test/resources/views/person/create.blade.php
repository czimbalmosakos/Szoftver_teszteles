@include('partials.navbar')
@include('partials.msg')

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" xmlns="http://www.w3.org/1999/html">

    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <div class="container" style="font-size: 45px">
            Válaszolj a következő kérdésekre!
        </div>
        <br><br>
    </head>
    <body>
        <div class="container rounded" style="background-color: #a0aec0">
            <form action="{{ route('member.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="vez_nev" style="font-size: 25px">Vezetéknév</label>
                    <input type="text" class="form-control" name="first_name" id="vez_nev" placeholder="Vezetéknév" required>
                </div>
                <br>

                <div class="form-group">
                    <label for="ker_nev" style="font-size: 25px">Keresztnév</label>
                    <input type="text" class="form-control" name="last_name" id="ker_nev" placeholder="Keresztnév" required>
                </div>
                <br>

                <div class="form-group">
                    <label for="szul_datum" style="font-size: 25px">Születési dátum</label>
                    <input name="birth_date" type="datetime-local" class="form-control" id="szul_datum" placeholder="Születési dátum" required>
                </div>
                <br>

                <div class="form-group">
                    <label for="szul_hely" style="font-size: 25px">Születési hely</label>
                    <input name="birth_place" type="text" class="form-control" id="szul_hely" placeholder="Születési hely" required>
                </div>
                <br>

                <div class="form-check">
                    <input name="has_newsletter" class="form-check-input" type="checkbox" id="hirlevel" style="width: 25px; height: 25px">
                    <label class="form-check-label" for="hirlevel" style="font-size: 25px">
                        <pre> Iratkozz fel, hogy hírleveleket kaphass! </pre>
                    </label>
                </div>
                <br>

                <div class="form-group">
                    <label for="bemutatkozas" style="font-size: 25px">Bemutatkozás</label>
                    <textarea name="introduction" class="form-control" id="bemutatkozas" rows="3"></textarea>
                </div>
                <br>

                <div style="font-size: 25px">Megszólítás</div>
                @foreach(config('titles') as $title)
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="{{$title}}" name="title" id="megszolitas">
                        <label class="form-check-label" for="megszolitas">
                            {{ $title }}
                        </label>
                    </div>
                @endforeach
                <br>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="mail" style="width: 25px; height: 25px" required>
                    <label class="form-check-label" for="mail" style="font-size: 25px">
                        <pre> Adatvédelmi szabályzat elfogadása! </pre>
                    </label>
                </div>
                <br>

                <div style="font-size: 25px">Vércsoport</div>
                <div style="font-size: 25px">
                    <select name="blood_type" class="form-select" aria-label="Default select example" required>
                        <option selected>Válassz ki egy vércsoportot</option>
                        @foreach($blood_types as $bloodType)
                            <option value="{{$bloodType->name}}"> {{ $bloodType->name }} </option>
                        @endforeach
                    </select>
                </div>
                <br>

                <div style="font-size: 25px">Érdeklődési kör</div>
                @foreach($interests as $interest)
                    <div class="form-check">
                        <input class="form-check-input" name="interests[]" value="{{ $interest->id }}" type="checkbox">
                        <label class="form-check-label">
                            {{ $interest->name }}
                        </label>
                    </div>
                @endforeach
                <br>

                <div>
                    <input type="submit" value="Elküld"/>
                </div>
                <br>

            </form>
        </div>
    </body>
</html>
