@section('component')
    <div class="modal fade" id="soundModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-{{ $title == 'Record' ? '-dialog-lg' : 'sm' }}">
            <div class="modal-content">
                <div class="modal-header bg-primary p-2">
                    <h4 class="modal-title text-white" id="mySmallModalLabel">{{ $title }}</h4>
                </div>
                <div class="modal-body text-center">
                    @isset($content)
                        {{ $content }}   
                    @endisset
                    <button class="btn btn-primary" id="btnPlaySound">{{ $textBtn }}</button>
                </div>
            </div>
        </div>
    </div>

    <audio src="{{ asset($path) }}" id="audio"></audio>
@endsection
