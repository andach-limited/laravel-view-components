@if(Session::has('success'))
    <x-andach-alert variant="success" title="Success" icon="<i class='fa-solid fa-thumbs-up'></i>">{{ Session::get('success') }}</x-andach-alert>
@endif

@if(Session::has('warning'))
    <x-andach-alert variant="success" title="Warning" icon="<i class='fa-solid fa-triangle-exclamation'></i>">{{ Session::get('warning') }}</x-andach-alert>
@endif

@if(Session::has('danger'))
    <x-andach-alert variant="danger" title="error" icon="<i class='fa-solid fa-circle-exclamation'></i>">{{ Session::get('danger') }}</x-andach-alert>
@endif

@if(Session::has('errors'))
    <x-andach-alert variant="danger" title="Form Submission Errors" icon="<i class='fa-solid fa-circle-exclamation'></i>">
        {!! implode('<br />', $errors->all()) !!}
    </x-andach-alert>
@endif
