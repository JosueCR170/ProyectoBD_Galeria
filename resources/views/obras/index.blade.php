@extends('app')

@section('content')
<link rel="stylesheet" href="{{asset('css/app.css')}}">

<div class="container w-25 border">
    <div class="row mx-auto">
    <form class="form" method="POST" action="{{route('obras')}}">
        @csrf

        <div class="mb-3 col" style="display: flex; flex-direction: column;">
        @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        @if (session('success'))
                <h6 class="alert alert-success">{{ session('success') }}</h6>
        @endif
        <div class="flex">
            <label id="label" style="margin-bottom: 20px">
                <input required="" placeholder="" name="idArtista" type="text" class="input">
                <span>ID Artista</span>
            </label>
    
            <select style="margin-bottom: 20px" aria-label="Large select example" name="tecnica" class="comboBox rounded">
                <option selected disabled>Técnica</option>
                <option value="Óleo sobre lienzo">Óleo sobre lienzo</option>
                <option value="Acuarela">Acuarela</option>
                <option value="Acuarela sobre papel">Acuarela sobre papel</option>
                <option value="Témpera">Témpera</option>
                <option value="Pintura al pastel">Pintura al pastel</option>
                <option value="Pintura al fresco">Pintura al fresco</option>
                <option value="Pintura digital">Pintura digital</option>
                <option value="Talla en madera">Talla en madera</option>
                <option value="Escultura en mármol">Escultura en mármol</option>
                <option value="Grabado">Grabado</option>
                <option value="Serigrafía">Serigrafía</option>
                <option value="Fotografía artística">Fotografía artística</option>
                <option value="Arte digital">Arte digital</option>
                <option value="Collage">Collage</option>
                <option value="Pirograbado">Pirograbado</option>
                <option value="Escultura en bronce">Escultura en bronce</option>
            </select>
            <!--<label id="label" style="margin-bottom: 20px">
                <input required="" placeholder="" type="text" class="input">
                <span>last name</span>
            </label>-->
        </div>  
                
        <label style="margin-bottom: 20px">
            <input required="" placeholder="" type="Text" name="nombre" class="input">
            <span>Nombre</span>
        </label> 
            
        <label style="margin-bottom: 20px">
            <input required="" type="text" placeholder="" name="tamaño" class="input">
            <span>Tamaño</span>
        </label>
        
            <div class="input-group mb-3">
                <span class="input-group-text">$</span>
                <input type="text" class="input form-control" name="precio" aria-label="Amount (to the nearest dollar)">
                <span class="input-group-text">.00</span>
            </div>

            <label style="margin-bottom: 20px">
                <input required="" type="text" placeholder="" name="categoria" class="input">
                <span>Categoria</span>
            </label>

            <div class="input-group mb-4" >
                <input type="file" class="form-control" name="imagen" id="inputGroupFile02">
            </div>
       
        <div style="width: 100%; padding-left: 30px;"><input type="submit" value="Agregar" class="fancy"></input></div>
        
        </div>
    </form>

    <div >
        @foreach ($obras as $obra)
        
            <div class="row py-1">
                <div class="col-md-9 d-flex align-items-center">
                    <a href="{{ route('obras-edit', ['id' => $obra->id]) }}">{{ $obra->nombre }}</a>
                </div>

                <div class="col-md-3 d-flex justify-content-end">
                    <form action="{{ route('obras-destroy', [$obra->id]) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger btn-sm">Eliminar</button>
                    </form>
                </div>
            </div>
            
        @endforeach
    </div>
    </div>
</div>
@endsection