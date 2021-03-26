@extends('backend.layout.app')

@section('content')
    @if (session('unknown_errors'))
        @foreach(session('unknown_errors') as $key => $error)
            <div class="alert alert-danger">
                <button class="close custom-close" data-close="alert" data-id="{{ $key }}"></button>
                {{ $error }}
            </div>
        @endforeach
    @else
        Ошибок нет
    @endif
@endsection

@push('scripts')
    <script>
        $(document).on('click', '.custom-close', function (e){
            $.ajax({
                url: '/dashboard/error-remove',
                data: {id: $(this).data('id')},
                success: function () {
                    window.location.reload();
                }
            })
        })
    </script>
@endpush