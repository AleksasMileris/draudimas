@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Savininkai</div>

                    <div class="card-body">
                        <form method="post" action="{{route("owners.save",$owner->id)}}">
                            @csrf
                            <div>
                                <label class="form-label mb-4">Vardas</label>
                                <input type="text" class="form-control" name="name" value="{{$owner->name}}">
                                <label class="form-label mb-4">Pavarde</label>
                                <input type="text" class="form-control" name="surname" value="{{$owner->surname}}">
                            </div>
                            <button class="btn btn-success mt-2">Pridėti</button>
                        </form>
                    </div>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Turimos mošinos</th>
                        </tr>
                        </thead>
                        <tbody>

                            @foreach($owner->cars as $car)
                                <tr> <td>{{ $car->brand}}  {{ $car->model}} </td></tr>
                            @endforeach

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection
