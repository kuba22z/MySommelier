
    <style>
        .modal-title {

            margin-left: auto;
        }

        .email{
            display: block;
            text-align: center;
        }

    </style>


<!-- Button trigger modal -->
<a data-toggle="modal" data-target="#pswresetModal" hidden>
</a>

<div class="modal fade" id="pswresetModal" tabindex="-1" aria-labelledby="pswresetModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="pswresetModalLabel">Passwort zurücksetzen</h5>
                <button type="button" disabled class="close" data-dismiss="modal" aria-label="Close">
                    <!--   <span aria-hidden="true">&times;</span>  optional close button-->
                </button>
            </div>
            <div class="modal-body"><br><br>

                <div>Um Ihr Passwort zurückzusetzen, senden Sie eine Email an</div>
                <div class="email"><a href="support@cyber-sommelier.de">support@cyber-sommelier.de</a></div>
                @for($i=0;$i<12;$i++)
                    <br>
                @endfor

            </div>
        </div>
    </div>
</div>





