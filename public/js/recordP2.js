URL = window.URL || window.webkitURL

let gumStream, recorder, input, encodingType
let encodeAfterRecord = true

const AudioContext = window.AudioContext || window.webkitAudioContext
let audioContext

const fileType = 'mp3'

const recordBtn = document.getElementById('play')
const finishBtn = document.getElementById('finish')
const resetBtn = document.getElementById('reset')
const loadingBtn = document.getElementById('loading')
const audioContainer = document.getElementById('audio-container')

let fileName

let totalTime, timer

recordBtn.addEventListener('click', startRecording)
resetBtn.addEventListener('click', () => location.reload())
recordBtn.addEventListener('click', startRecording)

function startRecording() {
  let constraints = { audio: true, video: false }

  navigator.mediaDevices.getUserMedia(constraints).then((stream) => {
    audioContext = new AudioContext()

    gumStream = stream

    input = audioContext.createMediaStreamSource(stream)

    recorder = new WebAudioRecorder(input, {
      workerDir: '/isac-speaking-full/public/js/',
      encoding: fileType,
      numChannels: 2,
      onEncoderLoading: function (recorder, encode) {
          recordBtn.classList.add('d-none');
          loadingBtn.classList.remove('d-none');
      },
    })

    recorder.setOptions({
      timeLimit: totalTime,
      encodeAfterRecord: encodeAfterRecord,
      mp3: {
        mimeType: 'audio/mpeg',
        bitRate: 160,
      },
    })

    recorder.onComplete = function (recorder, blob) {
      totalTime = timeCount
      createDownloadLink(blob, recorder.encoding)
    }

    recorder.onError = function (recorder, msg) {
      console.log(msg)
    }
    startTime()
    recorder.startRecording()
  })

}

// Count Time
function setTime() {
  totalTime--

  let minutes = Math.floor(totalTime / 60)
  let seconds = totalTime % 60

  let min = minutes < 10 ? '0' + minutes : minutes
  let sec = seconds < 10 ? '0' + seconds : seconds

  $('#timer').text(min + ':' + sec)

  if (totalTime === 0) {
    stopTime()
  }
}

function startTime() {
  timer = setInterval(setTime, 1000)
}

function stopTime() {
  clearInterval(timer)
}