@extends('layouts.app')

@section('content')
        {{print_r($using)}}
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Mašinos</div>

                    <div class="card-body">
{{--                        @if(Auth::user()->user_type !== null && Auth::user()->user_type == 'admin')--}}


                        <a class="btn btn-success float-end" href="{{route("cars.create")}}">Pridėti savininką</a>
{{--                        @endif--}}


                        <form  method="post" action="{{route('cars.search')}}">
                            @csrf
                        <div class="mb-3 mt-3 col-md-12 d-flex">

                            <div>
                                <label class="form-label">Numeris</label>
                                <input class="form-control  " type="text" name="reg_number" value="{{$reg_number}}" placeholder="AAA-111">
                            </div>

                            <div>
                                <label class="form-label">Gamintojas</label>
                                <input class="form-control  " type="text" name="brand" value="{{$brand}}" placeholder="Gamintojas">
                            </div>
                            <div>
                                <label class="form-label">Modelis</label>
                                <input class="form-control" type="text" name="model" value="{{$model}}" placeholder="Modelis">
                            </div>

                            <div>
                                <label class="form-label">Savininkas</label>
                                <select  class="form-select">

                                    @foreach($owners as $owner)



                                            <option name="using" value="{{$owner->id}}"> {{$owner->name}} {{$owner->surname}}</option>



                                    @endforeach
                                </select>

                            </div>



                        </div>
                        <button class="btn btn-info ">Ieškoti</button>



                        </form>
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
                                        <td>{{$car->owner->name}} {{$car->owner->surname}}</td>
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

