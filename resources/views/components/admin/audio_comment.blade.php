@if (in_array($speakings->part, [1, 3]))
    <h3 class="mb-2">Part {{ $speakings->part }} <i class="fas fa-angle-right font-16 align-middle"></i> Topic {{ $speakings->topic }}</h3>
    @foreach ($speakings->sound as $key => $sound)
    <div class="d-flex">
        <p>Q {{ $key+1 }}: {!! $questions[$key] !!}</p>
    </div>
    <div class="d-flex align-items-center mb-3">
        <p class="mb-0 mr-2">A {{ $key+1 }}:</p>
        <audio src="{{ asset('public/files/'.$sound->path) }}" controls></audio>
    </div>
    @endforeach
@else
    
    <div class="card mb-2">
        <div class="card-header bg-primary p-1">
            <h3 class="text-center text-white m-0">Part {{ $speakings->part }} <i class="fas fa-angle-right font-16 align-middle"></i> Topic {{ $speakings->topic }}</h3>
        </div>
        <div class="card-body">
            <a href="{{ asset('public/assets/topics/Topic'.($speakings->topic < 10 ? '0'.$speakings->topic : $speakings->topic).'.jpg') }}" class="image-popup" title="Topic {{ $speakings->topic }}">
                <img src="{{ asset('public/assets/topics/Topic'.($speakings->topic < 10 ? '0'.$speakings->topic : $speakings->topic).'.jpg') }}" class="img-fluid" alt="work-thumbnail">
            </a>
        </div>
    </div>

    <audio src="{{ asset('public/files/'.$speakings->sound->first()->path) }}" controls class="w-100"></audio>
@endif