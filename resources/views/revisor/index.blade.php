<x-layout title="Revisiona">

    @if($add_to_check)
        <h2 class="anton-font display-4 text-center">Ecco l'annuncio da revisionare:</h2>
         @else
            <h2 class="anton-font display-4 text-center my-5">Non ci sono annunci da revisionare</h2>
            <div class="d-flex justify-content-center">
                <form action="{{route('revisor.addBack')}}" method="POST">
                        
                    @csrf
                    @method('PATCH')

                    <button type="submit" class="btn btn-lg btnCustomPage bg-prim bg-gradient h6 rounded text-center anton-font mb-3 shadow">Annulla ultima revisione</button>

                </form>
            </div>
    @endif
        

    @if($add_to_check)
     
        <div class="container mt-5 p-4 shadow rounded">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6">
                    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
                        @if(count($add_to_check->images))
                            <div class="carousel-inner">
                                @foreach($add_to_check->images as $image)
                                    <div class="carousel-item d-flex align-items-center @if($loop->first)active @endif">
                                        <img src="{{Storage::url($image->path)}}" class="d-block w-100" alt="{{$add_to_check->title}}">
                                    </div>

                                @endforeach
                            </div>
                        @else
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="https://picsum.photos/600" class="d-block w-100 h-100" alt="Immagine di default">
                                    </div>
                                
                                </div>
                        @endif

                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Next</span>
                        </button>
                      </div>
                    {{-- <img src="https://picsum.photos/600" class="img-fluid my-2 rounded" alt="{{$add_to_check->title}}">
                    <div class="d-flex justify-content-evenly">
                        <img src="https://picsum.photos/100" class="img-fluid rounded" alt="{{$add_to_check->title}}">
                        <img src="https://picsum.photos/100" class="img-fluid rounded" alt="{{$add_to_check->title}}">
                        <img src="https://picsum.photos/100" class="img-fluid rounded" alt="{{$add_to_check->title}}">
                    </div> --}}
                </div>
                <div class="col-12 col-md-6">
                    <h2 class="display-3 py-2 fw-bold anton-font text-dark" >
                        @if(strlen($add_to_check->title) > 50) 
                                        
                            {{substr($add_to_check->title, 0, 25)}} <br> {{substr($add_to_check->title,26,25)}} <br> {{substr($add_to_check->title, 51, 25)}} <br> {{substr($add_to_check->title, 76, 25)}}
                
                        @elseif(strlen($add_to_check->title) <= 50 && strlen($add_to_check->title)>25)
                            
                            {{substr($add_to_check->title, 0, 25)}} <br> {{substr($add_to_check->title, 26)}}
    
                        @else
    
                            {{ $add_to_check->title }}
    
                        @endif
                    </h2>
                    <a href="{{route('adds.category', $add_to_check->category)}}" class="text-decoration-none anton-font">
                        
                        Categoria: {{$add_to_check->category->name}}
                        
                    </a>
                    <p class="maven-font py-5"><i class="fa-solid fa-city"></i> {{$add_to_check->place}}</p>
                    <hr>
                    <h4 class=" anton-font display-4">{{$add_to_check->price}} €</h4>
                    <hr>
                    <h6 class="anton-font">Descrizione:</h6>
                    <p class="my-3 maven-font">{{$add_to_check->description}}</p>
                    <hr>
                    <div class="d-flex bg-accent bg-gradient h6 rounded justify-content-center flex-column align-items-center">
                        <p class="muted mb-0 pt-3">Pubblicato il: {{$add_to_check->created_at->format('d/m/Y')}}</p>
                        <br>
                        <p class="muted mb-0 pb-3">Pubblicato da: {{$add_to_check->user->name ?? 'Utente Cancellato'}}</p>
                    </div>
                </div>
    
                
    
            </div>
            <hr class="mt-5">
            <div class="row mt-3 mb-3 justify-content-evenly w-100">
                <div class="col-12 col-md-1 d-flex justify-content-evenly">
                    <form action="{{route('revisor.addAccepted', ['add'=>$add_to_check])}}" method="POST">
                    
                        @csrf
                        @method('PATCH')
    
                        <button type="submit" class="btn btn-success shadow m-1">Accetta</button>
    
                    </form>
                </div>
                <div class="col-12 col-md-3 d-flex justify-content-evenly">
                    <form action="{{route('revisor.addBack')}}" method="POST">
                    
                        @csrf
                        @method('PATCH')
    
                        <button type="submit" class="btn btn-secondary shadow text-white m-1">Annulla ultima revisione</button>
    
                    </form>
                </div>
                <div class="col-12 col-md-1 d-flex justify-content-evenly">
                    <form action="{{route('revisor.addRefused', ['add'=>$add_to_check])}}" method="POST">
                    
                        @csrf
                        @method('PATCH')
    
                        <button type="submit" class="btn btn-danger shadow m-1">Rifiuta</button>
    
                    </form>
                </div>
            </div>
            
        </div>

    @endif
    <div class="row w-100 justify-content-center">
        <div class="col-12 d-flex justify-content-center mt-5">
            <a href="{{route('add.index')}}" class="btn btn-lg btnCustomPage bg-prim bg-gradient h6 rounded text-center anton-font mb-3 shadow">Torna agli annunci</a>
        </div>
    </div>

</x-layout>