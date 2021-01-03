@push('scripts')
    <script src="{{ url('js/changePswClient.js') }}"></script>
@endpush
@extends('client.accountC')
@section('savePswModal')
    <div class="modal fade" id="savePWModal" tabindex="-1" role="dialog" aria-labelledby="changePWModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body pt-5 pb-5">
                    <div class="container-fluid @if(session('successful')===true) success @else error @endif">
                        Ihr Passwort wurde @if (session('successful')===false) nicht @endif erfolgreich geändert.
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
