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
			onEncoderLoading: function() {
			},
		});

		recorder.onComplete = function(recorder, blob) { 
			createDownloadLink(blob, recorder.encoding);
		}

		recorder.setOptions({
		  timeLimit: 120,
		  encodeAfterRecord: encodeAfterRecord,
	      ogg: {quality: 0.5},
	      mp3: {bitRate: 160}
	    });

		recorder.startRecording();
		startTime();
	})

	indexBox = index;
	fileName = `answer${index+1}`;
}

function stopRecording() {
	gumStream.getAudioTracks()[0].stop();

	recorder.finishRecording();
}


function createDownloadLink(blob) {
	
    let url = URL.createObjectURL(blob);

    recordBox[indexBox].innerHTML = `<audio src="${url}" controlsList="nodownload" controls></audio>`;

	let form_data = new FormData();
	form_data.append('audio_data_'+fileName, blob, fileName);

	finishBtn.addEventListener('click', () => {
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		$.ajax({
			url: "/isac-speaking-full/upload_audio",
			type: 'POST',
			data: form_data,
			processData: false,
			contentType: false,
			success: function(data) {
				// console.log(data);
			}
		});
	});
}


// Count Time
let totalTime = 3;
let timer;

function setTime() {
	totalTime--;

	let minutes = Math.floor(totalTime / 60);
    let seconds = totalTime % 60;

	if(totalTime === 0) {
		stopRecording();
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
	totalTime = 3;
}