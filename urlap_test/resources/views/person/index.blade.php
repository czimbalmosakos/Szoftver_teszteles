@include('partials.navbar')

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>
    <body>
        <div class="container rounded" style="background-color: #a0aec0; font-size: 30px">
{{--            @dd($members)--}}
            @foreach($members as $member)
                <div class="row p-2" style="justify-content: space-between">
                    {{ $member->id }} {{ $member->title }} {{ $member->first_name }} {{ $member->last_name }} {{ \Carbon\Carbon::parse($member->birth_date)->diff(\Carbon\Carbon::now())->format('%y éves') }}
                    <div>
                        <a href="{{ route('member.show', ['person' => $member]) }}" class="btn btn-default" style="background-color: #bcbebf">Tovább</a>
                    </div>
                </div>
            @endforeach
            </div>
                <div class="row">
                    <div class="col-12 d-flex justify-content-center">
                        {{ $members->links() }}
                    </div>
                </div>
        </div>
    </body>
</html>
