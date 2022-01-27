<x-layout.layout>
    @isset($successMessage)
        <div class="alert alert-primary" role="alert" id="alertMessage">
            dlksjflsdjf
        </div>
    @endisset
    <div class="col-12 col-md-10 offset-md-1 col-lg-8 offset-lg-2 col-xl-6 offset-xl-3 p-0">
        <form class="row">
            <div class="flex col-12">
                <input type="search" name="search" id="search" placeholder="Buscar..." class="form-control flex-grow-1">
                <button type="submit" class="btn bg-white text-primary shadow-sm border">Buscar</button>
            </div>
        </form>
    </div>
    <section class="row mb-5">        
        <div class="col-12 col-md-10 offset-md-1 col-lg-8 offset-lg-2 col-xl-6 offset-xl-3 position-relative">
            @isset($retrievedContacts)
            @forelse ($retrievedContacts as $contact)
            <div class="row border bg-white">
                <div class="col-12 flex flex-column flex-md-row justify-around p-5">
                    <div class="flex flex-grow-1">
                        <div
                        class="d-none d-md-flex justify-center align-items-center rounded-circle text-white text-center bg-primary mr-3 h3" style="height: 80px; width: 80px;">
                            {{ substr($contact->first_name, 0, 1) }}
                        </div>
                        <div class="align-self-center">
                            <strong class="fw-bolder mb-0"> {{ $contact->first_name }} {{ $contact->middle_name }} {{ $contact->last_name }} </strong>
                            <p class="fst-italic mb-0"> {{ $contact->email_address }} </p>
                        </div>
                    </div>
                    <div class="flex align-items-end ml-md-5">
                        <a href="{{ route('contacts.edit', $contact->id) }}" class="btn btn-primary me-3"> Detalles </a>
                        <a href="{{ route('contacts.destroy', $contact->id) }}" class="btn btn-danger"> Eliminar </a>
                    </div>
                </div>
            </div>
            @empty
            <p> No hay contactos </p>
            @endforelse
            @endisset
        </div>
    </section>
</x-layout.layout>