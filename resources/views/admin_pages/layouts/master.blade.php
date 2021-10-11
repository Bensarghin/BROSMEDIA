@include('admin_pages.layouts.header')

<div class="content-title">
    <h5>@yield('title')</h5>
    <span></span>
</div>
@yield('content')

@include('admin_pages.layouts.footer')