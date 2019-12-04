@extends('layouts.app')
@section('content')
<div class="container mb-4">
    <div class="row  text-monospace mx-auto ">
        <div class="col shadow">
            <p class="mt-4 mb-4 text-center">
                <span class="text-muted">Event Status:</span>@if ($event)
                <span class="badge badge-success text-wrap  " style="width: 9rem;font-size: 0.8rem">
                    Active
                </span>
                @else
                <span class="badge badge-danger text-wrap " style="width: 25rem;font-size: 0.8rem">
                    No Active Event.Check back later!!
                </span>
                @endif
            </p>
        </div>
        @if($newEvent!=null)
        <div class="col shadow ">
            <p class="mt-4 mb-4 text-center">
                <span class="text-muted">Upcomming Event:</span> Taking place in
                <span class="badge badge-primary text-wrap" style="width: 9rem;font-size: 0.8rem">
                    {{ $newEvent[0]->place }}
                </span>
                At
                <span class="badge badge-primary text-wrap " style="width: 9rem;font-size: 0.8rem">
                    The {{ $newEvent[0]->time }}
                </span>
            </p>
        </div>
        @endif

    </div>
</div>
@if ($vehicule !=null)
<div class="container card shadow">
    <div class="row ">
        @foreach ($vehicule as $veh)
        <div class="col mb-2 mt-4 d-flex justify-content-center">
            <div class="card p-2  shadow" style="width:15rem">
                <img src="{{ asset('img/'.$veh->picture) }}" class="card-img-top rounded-sm  " alt="...">
                <div class="card-body text-monospace ">
                    <h5 class="card-title font-weight-bolder">Category: {{ $veh->category }}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Mark: {{ $veh->name_veh }}</h6>

                    <p class="card-text ">Matricule:
                        <div class="badge badge-secondary text-wrap  " style="width: 9rem;font-size: 0.8rem">
                            {{ $veh->matricule }}</div>
                    </p>

                    <p class="card-text ">
                        Prise Init: {{ $veh->prise_init }}</p>
                    <p class="card-text" id="rised_to">Rised To: {{ $veh->prise_rised_to }}</p>
                    <p class="card-text">Place: {{ $veh->place }}</p>
                </div>
                @if (Auth::user())
                <div class="card-footer ">
                    <small class="text-muted">

                        <label for="validationCustom04">Bet Prise: Min +100dt</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">$</span>
                            </div>
                            <input type="number" min='{{ $veh->prise_rised_to }}' value="{{ $veh->prise_rised_to }}"
                                name="betprise" class="form-control " id="betprise{{ $veh->id }}" required>

                            <div class="text-danger validationAlert" id="{{ $veh->id }}">
                                Please provide a valid Prise.
                            </div>
                            <a href="#this" class="btn btn-outline-success bet" id="{{ $veh->id }}" role="button">
                                <i class="fas fa-hand-holding-usd"></i>
                            </a>
                        </div>
                    </small>
                </div>
                @else
                <div class="card-footer ">
                    <small class="text-muted text-center">
                        <h6>Login first to be able to</h6><h3>Bet !!</h3>
                    </small>
                </div>
                @endif
            </div>
        </div>
        @endforeach
    </div>
</div>
@endif



@endsection
@section('scripts')
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).ready(function () {
        $(".validationAlert").hide();
        $('.bet').on('click', function () {
            let index = $(this).attr('id');
            let betminprise = Number($('#betprise' + index).attr('min')) + 100;
            console.log(index);

            if (Number($("#betprise" + index).val()) < betminprise) {
                $("#" + index).show();
            } else {
                $("#" + index).hide();
                console.log(index);
                $.ajax({
                    type: 'POST',
                    url: '{{ route("updateBet") }}',
                    data: {
                        user: '{{ Auth::user() }}',
                        objectId: index,
                        betprise: Number($("#betprise" + index).val())
                    },
                    success: function (data) {
                        console.log(Number(data));
                        if (isNaN(Number(data))) {
                            alert(data);
                        } else {
                            $('#betprise' + index).attr({
                                min: data,
                                value: data
                            });
                            $('#rised_to').html('Rised To:' + data);

                        }

                    }

                });
            }

        });
    });

</script>
@endsection
