<!-- Modal -->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">New Vehicule</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form class="needs-validation" novalidate method="POST" action="{{ route('newveh') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom01">Matricule</label>
                                <input type="text" name="matricule" class="form-control" id="validationCustom01"
                                    placeholder='"1234 Tunis 2500"' required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom02">Mark</label>
                                <input type="text" name="name_veh" class="form-control" id="validationCustom02"
                                    placeholder='"Mark"' required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">

                                <div class="input-group">
                                    <label for="validationCustomUsername">Category</label>
                                    <div class="input-group">

                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupPrepend">Options</label>
                                        </div>
                                        <select class="custom-select form-control" name="category"
                                            id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
                                            <option selected disabled>Choose...</option>
                                            <option value="Car">Car</option>
                                            <option value="Motorcycle">Motorcycle</option>

                                        </select>
                                    </div>
                                    <div class="invalid-feedback">
                                        Please choose a Category.
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="validationCustom03">Picture</label>
                                <div class="custom-file mb-3">
                                    <input type="file" accept=".jpg,.png" class="custom-file-input" id="customFile"
                                        name="picture" required>
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                                <div class="invalid-feedback">
                                    Please provide a valid picture.
                                </div>

                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="validationCustom04">Prise</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">$</span>
                                    </div>
                                    <input type="number" min="0" name="prise_init" class="form-control numeric"
                                        id="validationCustom04" aria-label="Amount (to the nearest dollar)" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text">.00</span>
                                    </div>
                                    <div class="invalid-feedback">
                                        Please provide a valid Prise.
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
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
    // Add the following code if you want the name of the file appear on select
    $(".custom-file-input").on("change", function () {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
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
