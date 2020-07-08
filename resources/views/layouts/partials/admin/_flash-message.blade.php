@if (session('success'))
    <x-alert :type="'success'"></x-alert>
@elseif (session('error'))
    <x-alert :type="'error'"></x-alert>
@elseif (session('warning'))
    <x-alert :type="'warning'"></x-alert>
@elseif (session('info'))
    <x-alert :type="'info'"></x-alert>
@elseif (session('danger'))
    <x-alert :type="'danger'"></x-alert>
@endif
