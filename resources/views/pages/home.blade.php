<x-layout.layout>
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
            <p>
                Contacto
            </p>
            @empty
            <p> No hay contactos </p>
            @endforelse
            @endisset
        </div>
    </section>
</x-layout.layout>