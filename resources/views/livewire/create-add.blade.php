<div>
    <h2 class="anton-font display-4">Crea il tuo annuncio!</h2>
    <div class="container p-5 shadow rounded mt-5">
        @if (session()->has('message'))
         <div class="alert alert-success text-center">
            {{ session('message') }}
            </div>
        @endif
    
        
        <form wire:submit.prevent="store">
            
        
            @csrf
    
            <div class="mb-3">
                <label for="title" class="form-label anton-font h5">Titolo Annuncio</label>
                <input id="title" wire:model.lazy="title" type="text" class="maven-font form-control @error('title') is-invalid @enderror">
                @error('title')
                    <p class="text-danger fst-italic anton-font">{{$message}}</p>
                @enderror
            </div>
    
            <div class="mb-3">
                <label for="place" class="form-label anton-font h5">Città</label>
                <input id="place" wire:model.lazy="place" type="text" class="maven-font form-control @error('place') is-invalid @enderror">
                @error('place')
                    <p class="text-danger fst-italic anton-font">{{$message}}</p>
                @enderror
            </div>
    
            <div class="mb-3">
                <label for="price" class="form-label anton-font h5">Prezzo (€)</label>
                <input id="price" wire:model.lazy="price" type="number" step="any"  class="maven-font form-control @error('price') is-invalid @enderror w-25">
                @error('price')
                    <p class="text-danger fst-italic anton-font">{{$message}}</p>
                @enderror
            </div>
    
            <hr>
                <div class="mb-3">
                    <label for="category" class="form-label anton-font h5">Categoria</label><br>
                    
                    <select wire:model.defer='category' id="category" class="form-select @error('category') is-invalid @enderror">
                        <option selected value="Placeholder" hidden class="anton-font">Categoria dell'annuncio</option>
                        @foreach($sortedCategories as $sortedCategory)
                            <option value="{{$sortedCategory->id}}" class="anton-font">{{$sortedCategory->name}}</option>
                        @endforeach
                    </select>
                    @error('category')
                        <p class="text-danger fst-italic anton-font">{{$message}}</p>
                    @enderror
                </div>
            <hr>
    
            <div class="mb-3">
                <label for="description"  class="form-label anton-font h5">Descrizione</label>
                <textarea class="form-control maven-font" wire:model.lazy="description" id="description" cols="30" rows="7"></textarea>
                @error('description')
                    <p class="text-danger fst-italic anton-font">{{$message}}</p>
                @enderror
            </div>
    
            <div class="mb-3">
                <input wire:model="temporary_images" type="file" name="images" multiple class="form-control shadow @error('temporary_images.*') is-invalid @enderror" placeholder="Img"/>
                @error('temporary_images.*')
                    <p class="text-danger mt-2">{{$message}}</p>
                @enderror    
            </div>
            @if(!empty($images))
                <div class="row">
                    <div class="col-12">
                        <p>Anteprima foto</p>
                        <div class="row border-4 border-info rounded shadow py-4">
                        @foreach($images as $key=>$image)
                            <div class="col my-3">
                                <div class="img-preview mx-auto shadow rounded" style="background-image: url({{$image->temporaryUrl()}});"></div>
                                <button type="button" class="btn btn-danger shadow d-block text-center mt-2 mx-auto" wire:click="removeImage({{$key}})">Cancella</button>


                            </div>     
                        @endforeach

                        </div>
                    </div>
                </div>
            @endif  

            <button type="submit" class="btn btn-lg btn-dark mb-3 anton-font h5">Inserisci annuncio</button><br>
    

            
            {{-- <button type="submit" class="btn btn-primary my-4 shadow px-4 py-2" >Crea</button> --}}




        </form>
    
    </div>

</div>
