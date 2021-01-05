@extends('dominik_master')
@push('styles')
    <link rel="stylesheet" href="{{ url('/css/createDrink.css') }}"> <!-- CCS File ist in public/css -->
@endpush
@push('scripts')

@section('content')
    <div class="p-4">
      <div id="heading" class="mt-2 mb-3">Getränk der Datenbank hinzufügen</div>
        <form id="drinkForm" method="POST" action="{{ route('create_drink') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
                <div id="drinkPictureContainer" class="form-group col-4">
                    <!-- Bild laden oder Standard anzeigen -->
                    <img id="businessProfilePicture"
                         class="img-fluid img-thumbnail" alt="Bild des Getränks"
                         src="{{ asset('storage/drinksImage/uploadImage.png') }}">
                    <input type="file" class="form-control-file" id="image" name="drinkImage">
                    <span style="color: red">@error('drinkImage'){{$message}}@enderror</span>
                </div>
                <div class="col-8">
                    <div class="form-group row">
                        <div class="col-4">
                            <label for="nameInput" class="labelInput col-form-label">Name:</label>
                        </div>
                        <div class="col-8">
                            <input type="text" class="form-control" id="nameInput" required name="name">
                        </div>
                        <span style="color: red">@error('name'){{$message}}@enderror</span>
                    </div>

                    <div class="form-group row">
                        <div class="col-4">
                            <label for="eanInput" class="labelInput col-form-label">EAN:</label>
                        </div>
                        <div class="col-8">
                            <input type="text" class="form-control" id="eanInput" name="ean">
                        </div>
                        <span style="color: red">@error('ean'){{$message}}@enderror</span>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-12 form-group row">
                    <div class="col-5">
                        <label for="produktInput" class="labelInput col-form-label">Produkt:</label>
                    </div>
                    <div class="col-7">
                        <select id="produktInput" name="product" class="form-control">
                            <option value="Bier" name="beer">Bier</option>
                            <option value="Wein" name="wine">Wein</option>
                        </select>
                    </div>
                </div>
                <div class="col-12 form-group row">
                    <div class="col-5">
                        <label for="artInput" class="labelInput col-form-label">Art:</label>
                    </div>
                    <div class="col-7">
                        <select name="type" id="artInput" class="form-control">
                            <option value="Mischbier">Mischbier</option>
                            <option value="Pils">Pils</option>
                            <option value="Weizen">Weizen</option>
                            <option value="Weissbier">Weissbier</option>
                            <option value="Dunkelbier">Dunkelbier</option>
                            <option value="Weisswein">Weisswein</option>
                            <option value="Rotwein">Rotwein</option>
                            <option value="Glühwein">Glühwein</option>
                            <option value="Rose">Rose</option>
                        </select>
                    </div>
                </div>
                <div class="col-12 form-group row">
                    <div class="col-5">
                        <label for="originInput" class="labelInput col-form-label">Herkunftsland:</label>
                    </div>
                    <div class="col-7">
                        <input type="text" class="form-control" id="originInput" placeholder="Zb.: Deutschland, Hamburg" required name="origin">
                    </div>
                    <span style="color: red">@error('origin'){{$message}}@enderror</span>
                </div>
                <div class="col-12 form-group row">
                    <div class="col-5">
                        <label for="inhaltsstoffeInput" class="labelInput col-form-label">Inhaltsstoffe:</label>
                    </div>
                    <div class="col-7">
                        <input type="text" class="form-control" id="inhaltsstoffeInput" placeholder="Zb.: Wasser,Limetten A (A steht für Allergen)" required name="substances">
                    </div>
                    <span style="color: red">@error('substances'){{$message}}@enderror</span>
                </div>
                <div class="col-12 form-group row">
                    <div class="col-5">
                        <label for="alkoholgehaltInput" class="labelInput col-form-label">Alkoholgehalt:</label>
                    </div>
                    <div class="col-7">
                        <input type="number" step="0.01" class="form-control" id="alkoholgehaltInput" placeholder="Zb.: 2.1" required name="alcoholContent">
                    </div>
                    <span style="color: red">@error('alcoholContent'){{$message}}@enderror</span>
                </div>
            </div>


            <div id="formButtonContainer" class="mt-4">
                <div class="">
                    <button type="submit" class="btn mintButton" id="register">Hinzufügen</button>
                </div>
            </div>
        </form>
    </div>
@endsection
