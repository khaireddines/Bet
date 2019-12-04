@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="container-fluid">
                <div class="row mt-4">
                    <div class="col" style="width: 100%">
                        <table id="mytable" class="table table-striped table-bordered" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>Matricule</th>
                                    <th>Mark</th>
                                    <th>Highest Bet</th>
                                    <th>MyBet</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($bets != null)
                                @foreach ($bets as $bet)
                                @foreach ($bet->vehicule as $veh )
                                <tr>
                                    <td width="20%">
                                        {{ $veh->matricule }}
                                    </td>
                                    <td width="10%">
                                        {{ $veh->name_veh }}
                                    </td>
                                    <td width="15%" id="risedto">
                                        {{ $veh->prise_rised_to }}
                                    </td>
                                    <td width="15%" id="betprise">
                                        {{ $bet->bet_prise }}
                                    </td>
                                    <td align="center">

                                        <small class="text-muted">

                                            <label for="validationCustom04">Bet Prise: Min +100dt</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">$</span>
                                                </div>
                                                <input type="number" min='{{ $veh->prise_rised_to }}'
                                                    value="{{ $veh->prise_rised_to }}" name="betprise"
                                                    class="form-control " id="betprise{{ $veh->id }}" required>

                                                <div class="text-danger validationAlert" id="{{ $veh->id }}">
                                                    Please provide a valid Prise.
                                                </div>
                                                <a href="#this" class="btn btn-outline-success bet" id="{{ $veh->id }}"
                                                    role="button">
                                                    <i class="fas fa-hand-holding-usd"></i>
                                                </a>
                                                <a href="{{ route('cancelBet',['user_id'=>$bet->user_id,'object_id'=>$bet->object_id])}}"
                                                    class="btn btn-outline-danger"
                                                    onclick="return confirm('are you sure ??')" role="button">
                                                    <i class="far fa-trash-alt"></i>
                                                </a>
                                            </div>
                                        </small>


                                    </td>
                                </tr>
                                @endforeach
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@endsection
@section('scripts')
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
<script>
    $(document).ready(function () {
        $('#mytable').DataTable();
        $('#mytable_wrapper').removeClass('form-inline');
    });
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
                            $('#risedto').html(data);
                            $('#betprise').html(data);

                        }

                    }

                });
            }

        });
    });

</script>
@endsection
