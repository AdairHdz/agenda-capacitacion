<x-layout.layout>
    <div class="row mb-5">
        <div class="col-12 col-md-10 offset-md-1 col-lg-8 offset-lg-2 col-xl-6 offset-xl-3 p-0">
            <form action="{{ route('contacts.store') }}" class="bg-white p-3 p-md-5 shadow-sm" method="POST">
                @csrf
                <p class="font-weight-bold text-center h4 mb-3">
                    Datos del contacto
                </p>
                <div class="col-12">
                    <div class="row mb-3">
                        <div class="col">
                            <label for="firstName">Nombre(s)</label>
                            <input type="text" name="firstName" id="firstName" value="{{ isset($retrievedContact) ? $retrievedContact->first_name : '' }}" class="form-control">
                            @error("firstName")
                            <p class="text-danger"> {{ $message }} </p>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12 col-md-6">
                            <label for="middleName">Apellido paterno</label>
                            <input type="text" name="middleName" id="middleName" value="" class="form-control">
                            @error("middleName")
                            <p class="text-danger"> {{ $message }} </p>
                            @enderror
                        </div>
                        <div class="col-12 col-md-6">
                            <label for="middleName">Apellido materno</label>
                            <input type="text" name="lastName" id="lastName" value="" class="form-control">
                            @error("lastName")
                            <p class="text-danger"> {{ $message }} </p>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12 col-md-6">
                            <label for="birthDate">Fecha de nacimiento</label>
                            <input type="date" name="birthDate" id="birthDate" value="" class="form-control">
                            @error("birthDate")
                            <p class="text-danger"> {{ $message }} </p>
                            @enderror
                        </div>
                        <div class="col-12 col-md-6">
                            <label for="emailAddress">Correo electrónico</label>
                            <input type="email" name="emailAddress" id="emailAddress" value="" class="form-control">
                            @error("emailAddress")
                            <p class="text-danger"> {{ $message }} </p>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="row mb-3 p-3">
                        <div class="col-12">
                            <label for="homePhone">Teléfono de casa</label>
                            <input type="tel" name="homePhone" id="homePhone" value="" class="form-control">
                            @error("homePhone")
                            <p class="text-danger"> {{ $message }} </p>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3 p-3">
                        <div class="col-12">
                            <label for="workPhone">Teléfono de trabajo</label>
                            <input type="tel" name="workPhone" id="workPhone" value="" class="form-control">
                            @error("workPhone")
                            <p class="text-danger"> {{ $message }} </p>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3 p-3">
                        <div class="col-12">
                            <label for="mobilePhone">Teléfono celular</label>
                            <input type="tel" name="mobilePhone" id="mobilePhone" value="" class="form-control">
                            @error("mobilePhone")
                            <p class="text-danger"> {{ $message }} </p>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-12 col-md-6 offset-md-3">
                        <button class="btn btn-success btn-block">
                            Aceptar
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-layout.layout>