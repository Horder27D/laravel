@if (session('danger'))
    @include('include.alert.danger')
@endif
@if (session('info'))
    @include('include.alert.info')
@endif
@if (session('success'))
    @include('include.alert.success')
@endif
@if (session('warning'))
    @include('include.alert.warning')
@endif