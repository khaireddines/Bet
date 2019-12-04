<div class="modal fade" id="modelId2" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">New Event</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form class="needs-validation" novalidate method="POST" action="{{ route('neweve') }}">
                        @csrf
                        <div class="form-row">
                            <div class="col-md-6 mb-6" id="Datepicker">
                                <label for="validationCusto">Date</label>
                                <input type="date" name="time" class="form-control" id="validationCusto"
                                    placeholder='"Time"' required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 mb-6">
                                <div class="input-group">
                                    <label for="validationCustomUsername2">Place</label>
                                    <div class="input-group">

                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupPrepend">Towns</label>
                                        </div>
                                        <select class="custom-select form-control" name="place"
                                            id="validationCustomUsername2" aria-describedby="inputGroupPrepend"
                                            required>
                                            <option selected disabled>Choose...</option>
                                            <option value="Tunis">Tunis</option>
                                            <option value="Ariana">Ariana</option>
                                            <option value="Ben Arous">Ben Arous</option>
                                            <option value="Manouba">Manouba</option>
                                            <option value="Nabeul">Nabeul</option>
                                            <option value="Zaghouan">Zaghouan</option>
                                            <option value="Bizerte">Bizerte</option>
                                            <option value="Béja">Béja</option>
                                            <option value="Jendouba">Jendouba</option>
                                            <option value="El Kef">El Kef</option>
                                            <option value="Siliana">Siliana</option>
                                            <option value="Sousse">Sousse</option>
                                            <option value="Monastir">Monastir</option>
                                            <option value="Mahdia">Mahdia</option>
                                            <option value="Sfax">Sfax</option>
                                            <option value="Kairouan">Kairouan</option>
                                            <option value="Kasserine">Kasserine</option>
                                            <option value="Sidi Bouzid">Sidi Bouzid</option>
                                            <option value="Gabès">Gabès</option>
                                            <option value="Mednine">Mednine</option>
                                            <option value="Tataouine">Tataouine</option>
                                            <option value="Gafsa">Gafsa</option>
                                            <option value="Tozeur">Tozeur</option>
                                            <option value="Kebili">Kebili</option>
                                        </select>
                                    </div>
                                    <div class="invalid-feedback">
                                        Please choose a state.
                                    </div>

                                </div>
                            </div>

                        </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(function () {
        $(document).ready(function () {

            var todaysDate = new Date(); // Gets today's date

            // Max date attribute is in "YYYY-MM-DD".  Need to format today's date accordingly

            var year = todaysDate.getFullYear(); // YYYY
            var month = ("0" + (todaysDate.getMonth() + 1)).slice(-2); // MM
            var day = ("0" + todaysDate.getDate()).slice(-2); // DD

            var mindate = (year + "-" + month + "-" + day); // Results in "YYYY-MM-DD" for today's date 

            // Now to set the max date value for the calendar to be today's date
            $('#Datepicker input').attr('min', mindate);

        });
    });

    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function () {
        'use strict';
        window.addEventListener('load', function () {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function (form) {
                form.addEventListener('submit', function (event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();

</script>
