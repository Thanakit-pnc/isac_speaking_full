<h3 class="text-center mb-3">{{ $title }}</h3>
<form action="{{ $route }}" method="post">
    {{ csrf_field() }}

    <input type="hidden" name="id" value="{{ $id }}">

    <div class="form-group row">
        <label class="col-sm-auto col-form-label">Expected Score</label>
        <div class="col-sm">
            <input type="text" class="form-control" name="expected_score" placeholder="Expected Score" required>
        </div>
    </div>

    <div class="form-group row justify-content-center">
        <label class="col-sm-auto col-form-label">Current Course</label>
        <div class="col-sm">
            <select name="current_course" class="form-control" required>
                <option value="" disabled selected>Select Course</option>
                <option value="-">-</option>
                <option value="Foundation for IELTS">Foundation for IELTS</option>
                <option value="Foundation Extension">Foundation Extension</option>
                <option value="Key Skills">Key Skills</option>
                <option value="Key Skills Extension">Key Skills Extension</option>
                <option value="Speak Write">Speak Write</option>
                <option value="IELTS Extension">IELTS Extension</option>
            </select>
        </div>
    </div>

    <div class="text-center pt-2">
        <input type="submit" value="Submit" class="btn btn-primary width-lg">
    </div>
</form>

<div class="modal fade" id="soundModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header bg-primary p-2">
                <h4 class="modal-title text-white" id="mySmallModalLabel">Click to continue</h4>
            </div>
            <div class="modal-body text-center">
                <button class="btn btn-primary" id="btnPlaySound">Continue</button>
            </div>
        </div>
    </div>
</div>

<audio src="{{ asset($sound_ended) }}" id="audio"></audio>