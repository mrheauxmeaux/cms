$(function () {
    $("#player").draggable({
        axis: "x",
        containment: "#area_player",
        scroll: false,
        handle: ".handle"
    });
});

$(".o-c").click(function(){
	$("#player").toggleClass("minimize");
});

$(".play").click(function () {
    $(".play").toggleClass("pause");
});

function getVolume() {
    alert(player2.volume);
}

function SetVolumeLower() {
    player2.volume -= 0.03;
}

function SetVolumeHigher() {
    player2.volume += 0.03;
}
function updateAudio() {
	updateField('unicosver', 'Loading Data...');
    var update = document.getElementById('player2');
    player2.src = 'https://culthotel.nl:8000/radio.mp3 ';
    player2.load();
    updateText();
}
function updateText() {
    setInterval(function () {
        updateData();
    }, 15000);
}

const apiUrl = "https://culthotel.nl/api/nowplaying ";

function updateData() {
    fetch(apiUrl)
    .then(response => response.json())
    .then(data => {
        if (data[0] == null)
            return;
        var radioData = data[0];

        if (radioData.listeners != null && radioData.listeners.current != null) {
            listeners = radioData.listeners.current;
        }

        if (radioData.live != null && radioData.live.is_live && radioData.live.streamer_name != null) {
            speaker = radioData.live.streamer_name;
        }

        if (radioData.now_playing != null) {
            if (radioData.now_playing.streamer != null) {
                speaker = radioData.now_playing.streamer;
            }
            if (radioData.now_playing.song != null && radioData.now_playing.song.title != null) {
                nowplayingsong = radioData.now_playing.song.title;
            }
			if (radioData.listeners != null && radioData.now_playing.song.title != null) {
				nowplayingartist = radioData.now_playing.song.artist;
			}	
        }

        if (speaker.length === 0) {
            speaker = "Auto DJ";
        }

        updateField('currentspeaker', speaker);
        updateField('currentplaying', nowplayingsong);
		updateField('currentartist', nowplayingartist);
        updateField('currentlistners', listeners);
    })
    .catch(error => {
        console.error('Error:', error);
    });
}

function updateField(id, value) {
    $("#" + id).text("...");
    $("#" + id).text(value);
}

function auto() {
    document.getElementById('player2').volume = 0.3;
}

$(document).ready(function () {
    auto();
    updateAudio();
    $(document).on("click", "#playerButton", function () {
        if ($("#playerButton").attr('data-enable') == 0) {
            document.getElementById('player2').muted = false;
            $("#playerButton").attr('data-enable', '1');
        } else {
            document.getElementById('player2').muted = true;
            $("#playerButton").attr('data-enable', '0');
        }
    });
});