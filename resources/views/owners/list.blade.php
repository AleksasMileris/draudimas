@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Savininkai</div>

                    <div class="card-body">
                        <a class="btn btn-success float-end" href="{{route("owners.create")}}">Pridėti savininką</a>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Vardas </th>
                                <th>Pavarde</th>
                                <th>Mašinos</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>


                                @foreach($owners as $owner)
                                    <tr>
                                    <td>{{$owner->name}}</td>
                                    <td>{{$owner->surname}}</td>

                                        <td>
                                            @foreach($owner->cars as $car)
                                             {{ $car->brand}}  {{ $car->model}} <br>
                                            @endforeach
                                        </td>

                                        <td class="col-md-3"><a class="btn btn-info" href="{{route("owners.update", $owner->id)}}">Redaguoti</a>
                                        <a class="btn btn-danger" href="{{route("owners.delete", $owner->id)}}">Redaguoti</a></td>
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

