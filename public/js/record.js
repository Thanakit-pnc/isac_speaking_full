URL = window.URL || window.webkitURL;

let gumStream, recorder, input, encodingType;
let encodeAfterRecord = true;

const AudioContext = window.AudioContext || window.webkitAudioContext;
let audioContext;

const fileType = "mp3";

const recordBtns = document.querySelectorAll('.record');
const recordBox = document.querySelectorAll('.show-record');
const finishBtn = document.getElementById('finish');

const minutesEl = document.getElementById('min');
const secondsEl = document.getElementById('sec');

let indexBox = 0;
let fileName;

let totalTime, timer;

recordBtns.forEach((record, index) => {
	record.addEventListener('click', () => startRecording(index))
});

function startRecording(index) {
	let constraints = { audio: true, video: false };

	navigator.mediaDevices.getUserMedia(constraints).then((stream) => {

		audioContext = new AudioContext();

		gumStream = stream;

		input = audioContext.createMediaStreamSource(stream);
        
		recorder = new WebAudioRecorder(input, {
			workerDir: "/isac_speaking/public/js/",
			encoding: fileType,
			numChannels: 2,
			onEncoderLoading: function(recorder, encode) {
				recordBox[indexBox].innerHTML = `
					<button class="btn btn-dark width-lg" type="button">
						<span class="spinner-grow spinner-grow-sm mr-1" role="status" aria-hidden="true"></span>
						Recording...
					</button>`;
				$('.record').attr('disabled', true)
			},
		});

		recorder.setOptions({
		  timeLimit: totalTime,
		  encodeAfterRecord: encodeAfterRecord,
		  mp3: {
			mimeType: "audio/mpeg",
			bitRate: 160  
		  }
		});
		
		recorder.onComplete = function(recorder, blob) {
			$('.record').attr('disabled', false) 
			totalTime = timeCount;
			createDownloadLink(blob, recorder.encoding);
		}

		recorder.onError = function(recorder, msg) {
			console.log(msg);
		}

		recorder.startRecording();

		startTime();
	})

	indexBox = index;
	fileName = `answer${index+1}`;
}

// Count Time

function setTime() {
	totalTime--;

	let minutes = Math.floor(totalTime / 60);
    let seconds = totalTime % 60;

	if(totalTime === 0) {
		stopTime();
	} 
	
	minutesEl.innerText = `${minutes < 10 ? '0'+minutes : minutes}`; 
	secondsEl.innerText = `${seconds < 10 ? '0'+seconds : seconds}`; 
}

function startTime() {
	timer = setInterval(setTime, 1000);
}
    
function stopTime() {
	clearInterval(timer);
}