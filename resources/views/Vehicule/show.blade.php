@extends('layouts.app')


@section('content')

<div class="container card">
    <div class="row m-4">
        <div class="col">
            <ul class="nav nav-tabs justify-content-center" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="aobjects" href="#objects" role="tab" data-toggle="tab"
                        aria-controls="object" aria-selected="true">Objects</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="aevents" href="#events" role="tab" data-toggle="tab" aria-controls="events"
                        aria-selected="false">Events</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="objects">
            <div class="row justify-content-around">
                <div class="col-6 col-auto mr-auto offset-3">
                    <div class="input-group" hidden>
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupPrepend"><i
                                    class="fab fa-searchengin"></i></span>
                        </div>
                        <input type="text" class="form-control" style="border-radius=0.3rem" placeholder="Search"
                            aria-describedby="inputGroupPrepend">

                    </div>
                </div>
                <div class="col-2 col-auto">
                    <button type="button" class="btn btn-outline-primary btn-lg " data-toggle="modal"
                        data-target="#modelId">
                        <i class="fa fa-plus-circle" aria-hidden="true"></i>
                        New
                    </button>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row mt-4">
                    <div class="col">
                        <table id="mytable" class="table table-striped table-bordered" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>Matricule</th>
                                    <th>Name</th>
                                    <th>Prise initial</th>
                                    <th>Prise rised to </th>
                                    <th>Category</th>
                                    <th>Place</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($vehicules as $veh)
                                <tr>
                                    <td>
                                        {{ $veh->matricule }}
                                    </td>
                                    <td>
                                        {{ $veh->name_veh }}
                                    </td>
                                    <td>
                                        {{ $veh->prise_init }}
                                    </td>
                                    <td>
                                        {{ $veh->prise_rised_to }}
                                    </td>
                                    <td>
                                        {{ $veh->category }}
                                    </td>
                                    <td>
                                        {{ $veh->place }}
                                    </td>
                                    <td align="center">

                                        <a href="{{ route('editform', ['id' => $veh->id]) }}"
                                            class="btn btn-outline-success" role="button">
                                            <i class="far fa-edit"></i>
                                        </a>
                                        <a href="{{ route('delVeh', ['id' => $veh->id]) }}"
                                            class="btn btn-outline-danger del1"
                                            onclick="return confirm('are you sure ??')" role="button">
                                            <i class="far fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="events">
            <div class="row justify-content-around">
                <div class="col-6 col-auto mr-auto offset-3">
                    <div class="input-group" hidden>
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupPrepend"><i
                                    class="fab fa-searchengin"></i></span>
                        </div>
                        <input type="text" class="form-control" style="border-radius=0.3rem" placeholder="Search"
                            aria-describedby="inputGroupPrepend">

                    </div>
                </div>
                <div class="col-2 col-auto">
                    <button type="button" class="btn btn-outline-primary btn-lg " data-toggle="modal"
                        data-target="#modelId2">
                        <i class="fa fa-plus-circle" aria-hidden="true"></i>
                        New
                    </button>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row mt-4">
                    <div class="col" style="width: 100%">
                        <table id="mynable" class="table table-striped table-bordered" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>Time</th>
                                    <th>Place</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($events as $event)
                                <tr>
                                    <td>
                                        {{$event->time}}
                                    </td>
                                    <td>
                                        {{$event->place}}
                                    </td>
                                    <td align="center" width="20%">

                                        <a href="{{ route('editformEve',['id'=>$event->id]) }}"
                                            class="btn btn-outline-success" role="button">
                                            <i class="far fa-edit"></i>
                                        </a>
                                        <a href="{{ route('delEve',['id'=>$event->id]) }}"
                                            class="btn btn-outline-danger" onclick="return confirm('are you sure ??')"
                                            role="button">
                                            <i class="far fa-trash-alt"></i>
                                        </a>
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
</div>





@include('Events.form')

@include('Vehicule.form')
@endsection

<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
<script>
    $('#myTab a').on('click', function (e) {
        e.preventDefault()
        $(this).tab('show');
    })

    $(document).ready(function () {
        $('#mynable').DataTable();
        $('#mytable').DataTable();
        $('#mytable_wrapper').removeClass('form-inline');
        $('#mynable_wrapper').removeClass('form-inline');
    });

</script>
