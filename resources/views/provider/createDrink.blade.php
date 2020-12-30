<style>
.g, #product, #type{

    width: 400px;
}
</style>

<div class="sticky-top">
    @include('layout.navbar')
</div>
<body>
<h1>Getränk der Datenbank hinzufügen</h1>
<form method="POST" action="{{route('create_drink')}}" enctype="multipart/form-data">
    @csrf

    <div class="form-group g">
        <img src="" width="200px"
             onerror=this.src="{{asset('storage/drinksImage/uploadImage.png')}}">
        <input type="file" class="form-control" id="drinkImage" name="drinkImage">
        <span style="color: red">@error('drinkImage'){{$message}}@enderror</span>
    </div>


    <div class="form-group g">
        <label for="name" class="labelInput">Name:</label>
        <input type="text" class="form-control" id="name" name="name" >
        <span style="color: red">@error('name'){{$message}}@enderror</span>
    </div>

    <div class="form-group g">
        <label for="ean" class="labelInput">EAN:</label>
        <input type="text" class="form-control" id="ean" name="ean" placeholder="(Besteht aus 8 oder 13 Ziffern)">
        <span style="color: red">@error('ean'){{$message}}@enderror</span>
    </div>

    <div class="col-md-7" id="product">
        <label for="product">Produkt:</label>
        <select id="product" name="product" class="form-control">
            <option value="Bier" name="beer">Bier</option>
            <option value="Wein" name="wine">Wein</option>
        </select>
    </div>

    <div class="col-md-7 g" id="type">
        <label for="type">Art</label>
        <select name="type" id="type">
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

    <div class="form-group g">
        <label for="origin" class="labelInput">Herkunftsland:</label>
        <input type="text" class="form-control" id="origin" name="origin" placeholder="Zb.: Deutschland, Hamburg">
        <span style="color: red">@error('origin'){{$message}}@enderror</span>
    </div>

    <div class="form-group g">
        <label for="substances" class="labelInput">Inhaltsstoffe:</label>
        <input type="text" class="form-control" id="substances" name="substances" placeholder="Zb.: Wasser,Limetten A (A steht für Allergen)">
        <span style="color: red">@error('substances'){{$message}}@enderror</span>
    </div>

    <div class="form-group g">
        <label for="alcoholContent" class="labelInput">Alkoholgehalt:</label>
        <input type="number" step="0.01" class="form-control" id="alcoholContent" name="alcoholContent" placeholder="Zb.: 2.1">
        <span style="color: red">@error('alcoholContent'){{$message}}@enderror</span>
    </div>

    <button type="submit" class="btn btn-primary" id="addbtn">Hinzufügen</button>

</form>
