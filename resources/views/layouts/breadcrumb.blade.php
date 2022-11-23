<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
    <li class="breadcrumb-item text-sm">
      <a class="opacity-5 text-white" href="{{ url('/') }}">
        <i class="fa fa-home"></i>
      </a>
    </li>
    @foreach($breadcrumb as $b)
    <li class="breadcrumb-item text-sm text-white active" aria-current="page">
      <a href="{{ $b['route'] }}" class="text-sm text-white active">
        {{ $b['name'] }}
      </a>
    </li>
    @endforeach
  </ol>
  <h6 class="font-weight-bolder text-white mb-0">{{ end($breadcrumb)['name'] }}</h6>
</nav>
