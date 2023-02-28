@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Mašinos</div>

                    <div class="card-body">
                        <a class="btn btn-success float-end" href="{{route("cars.create")}}">Pridėti savininką</a>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Registracijos numeris</th>
                                <th>Gamintojas</th>
                                <th>Modelis</th>
                                <th>Savininkas</th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>


                                @foreach($cars as $car)
                                    <tr>
                                    <td>{{$car->reg_number}}</td>
                                        <td>{{$car->brand}}</td>
                                        <td>{{$car->model}}</td>
                                        <td>{{$car->owner->name}}</td>
                                        <td class="col-md-3"><a class="btn btn-info" href="{{route("cars.edit", $car->id)}}">Redaguoti</a></td>
                                        <td>
                                            <form method="post" action="{{route('cars.destroy',$car->id)}}">
                                                @csrf
                                                @method("delete")
                                                <button class="btn btn-danger">Ištrinti</button>
                                            </form>
                                        </td>
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

