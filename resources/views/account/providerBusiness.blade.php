<?php ?>
    <!doctype html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Passwort zurücksetzen</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
          integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
            crossorigin="anonymous"></script>

    <style>

        h1 {
            margin-left: auto;
        }

        .labelInput {
            float: left;
            position: relative;

        }


        #name, #address, #website {
            width: 180px;
        }

        #openHours, #telNr, #description {
            width: 250px;

        }


    </style>


</head>
<body>
<h1>Mein Geschäft</h1>

<form method="POST" action="{{route('save')}}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="name" class="labelInput">Name:</label>
        <input type="text"required class="form-control" id="name" name="name" value=>
        <span style="color: red">@error('name'){{$message}}@enderror</span>
    </div>

    <div class="form-group">
        <label for="address" class="labelInput">Adresse:</label>
        <input type="text" required class="form-control" id="address" name="address" value=>
        <span style="color: red">@error('address'){{$message}}@enderror</span>
    </div>
    <div class="form-group">
        <label for="website" class="labelInput">Webseite:</label>
        <input type="url" class="form-control" id="website" name="website" value=>
        <span style="color: red">@error('website'){{$message}}@enderror</span>
    </div>

    <div class="form-group">
        <label for="openHours" class="labelInput">Öffnungszeiten</label>
        <input type="text" class="form-control" id="openHours" name="openHours" value=>
        <span style="color: red">@error('openHours'){{$message}}@enderror</span>
    </div>

    <div class="form-group">
        <label for="telNr" class="labelInput">Telefonnummer:</label>
        <input type="number" class="form-control" id="telNr" name="telNr" value=>
        <span style="color: red">@error('telNr'){{$message}}@enderror</span>
    </div>

    <div class="form-group">
        <label for="description" class="labelInput">Beschreibung:</label>
        <input type="text" class="form-control" id="description" name="description" value=>
        <span style="color: red">@error('description'){{$message}}@enderror</span>
    </div>

    <div class="form-group">
        <img src="{{ asset($provider->image)}}" width="200px" onerror=this.src="{{asset('storage/providersImage/uploadImage.png')}}" >
        <input type="file" class="form-control" id="image" name="image"  value="on">
        <span style="color: red">@error('image'){{$message}}@enderror</span>
    </div>


    <br>


    <button type="submit" class="btn btn-primary" id="register">Speichern</button>
    <br>
    <a href="{{route('business_view')}}" class="btn btn-primary" role="button" id="back">Abbrechen</a>


</form>

</body>
</html>



