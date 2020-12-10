<style>
    #firstName, #secondName,#email,#birthDate {
        width: 200px;
    }


</style>

<div class="sticky-top">
    @include('layout.navbar')
</div>

<h1> Mein Konto </h1>

<br>


<form method="POST" action={{route('provider_account_change')}}>
    @csrf
    <div class="form-group">
        <label for="firstName" class="labelInput">Vorname:</label>
        <input type="text" class="form-control" id="firstName" name="firstName" placeholder="{{$firstName}}">
        <span style="color: red">@error('firstName'){{$message}}@enderror</span>
    </div>
    <div class="form-group">
        <label for="secondName" class="labelInput">Nachname:</label>
        <input type="text" class="form-control" id="secondName" name="secondName" placeholder="{{$secondName}}">
        <span style="color: red">@error('secondName'){{$message}}@enderror</span>
    </div>
    <div class="form-group">
        <label for="emailr" class="labelInput">E-Mail:</label>
        <input type="text" class="form-control" id="email" name="email" placeholder="{{$email}}">
        <span style="color: red">@error('email'){{$message}}@enderror</span>
    </div>
    <div class="form-group">
        <label for="birthDate" class="labelInput">Geburtsdatum:</label>
        <input type="text" class="form-control" id="birthDate" name="birthDate" placeholder="{{$birthDate}}">
        <span style="color: red">@error('birthDate'){{$message}}@enderror</span>
    </div>


    <button type="submit" class="btn btn-primary" id="register">Speichern</button>
</form>

<br>
<a href="{{route('business_view')}}" class="btn btn-primary" role="button" id="back">Mein Geschaeft</a>



<a data-toggle="modal" data-target="#pswChangeModal" onclick="history.pushState({}, null, '/Anbieter/Konto/Passwort/aendern')">
    <button type="button" class="btn btn-primary" id="pswChange">Passwort ändern</button>
</a>

@include('provider.changePswP')
<script>
    //Prüft ob die URL /login ist. Wenn ja wird das Modal gezeigt
    if (window.location.pathname === '/Anbieter/Konto/Passwort/aendern') {
        $('#pswChangeModal').modal('show');
    }
</script>
