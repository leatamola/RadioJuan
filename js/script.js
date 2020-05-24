
const RADIO_NAME = "Tu Radio";

// URL of SHOUTCast streaming without / on the final, eg: http://streaming.com:8080
const URL_STREAMING = "http://streaming.escuchanosonline.com:8088/";
const URL_STREAMINGAUDIO = "http://streaming.escuchanosonline.com:8088/live";

// Software type of your streaming server: icecast and shoutcast are both supported.
// When choosing icecast, make sure the file 'player.log' in the document root is writeable.
const STREAMING_TYPE = "icecast";

// Visit https://api.vagalume.com.br/docs/ to get your API key
const API_KEY = "18fe07917957c289983464588aabddfb";

// Set HISTORIC to true to get the last songs played
const HISTORIC = false;

window.onload = function () {
    var page = new Page;
    page.changeTitlePage();
    page.setVolume();

    var player = new Player();
    player.play();

    getStreamingData();
    // Interval to get streaming data in miliseconds
    setInterval(function () {
        getStreamingData();
    }, 4000);

    var coverArt = document.getElementsByClassName('cover-album')[0];

    coverArt.style.height = coverArt.offsetWidth + 'px';
}

// DOM control
function Page() {
    this.changeTitlePage = function (title = RADIO_NAME) {
        document.title = title;
    };

    this.refreshCurrentSong = function (song, artist) {
        var currentSong = document.getElementById('currentSong');
        var currentArtist = document.getElementById('currentArtist');

        if (song !== currentSong.innerHTML) {
            // Animate transition
            currentSong.className = 'animated flipInY text-uppercase';
            currentSong.innerHTML = song;

            currentArtist.className = 'animated flipInY text-capitalize';
            currentArtist.innerHTML = artist;

            // Remove animation classes
            setTimeout(function () {
                currentSong.className = 'text-uppercase';
                currentArtist.className = 'text-capitalize';
            }, 2000);
        }
    }

    

    this.refreshCover = function (song = '', artist) {
        // Default cover art
        var urlCoverArt = 'img/bg-capa.jpg';

        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            var coverArt = document.getElementById('currentCoverArt');
            var coverBackground = document.getElementById('bgCover');

            // Get cover art URL on iTunes API
            if (this.readyState === 4 && this.status === 200) {
                var data = JSON.parse(this.responseText);
                var artworkUrl100 = (data.resultCount) ? data.results[0].artworkUrl100 : urlCoverArt;

                // Se retornar algum dado, alterar a resolução da imagem ou definir a padrão
                urlCoverArt = (artworkUrl100 != urlCoverArt) ? artworkUrl100.replace('100x100bb', '512x512bb') : urlCoverArt;
                var urlCoverArt96 = (artworkUrl100 != urlCoverArt) ? urlCoverArt.replace('512x512bb', '96x96bb') : urlCoverArt;
                var urlCoverArt128 = (artworkUrl100 != urlCoverArt) ? urlCoverArt.replace('512x512bb', '128x128bb') : urlCoverArt;
                var urlCoverArt192 = (artworkUrl100 != urlCoverArt) ? urlCoverArt.replace('512x512bb', '192x192bb') : urlCoverArt;
                var urlCoverArt256 = (artworkUrl100 != urlCoverArt) ? urlCoverArt.replace('512x512bb', '256x256bb') : urlCoverArt;
                var urlCoverArt384 = (artworkUrl100 != urlCoverArt) ? urlCoverArt.replace('512x512bb', '384x384bb') : urlCoverArt;

                coverArt.style.backgroundImage = 'url(' + urlCoverArt + ')';
                coverArt.className = 'animated bounceInLeft';

                coverBackground.style.backgroundImage = 'url(' + urlCoverArt + ')';

                setTimeout(function () {
                    coverArt.className = '';
                }, 2000);

                if ('mediaSession' in navigator) {
                    navigator.mediaSession.metadata = new MediaMetadata({
                        title: song,
                        artist: artist,
                        artwork: [{
                                src: urlCoverArt96,
                                sizes: '96x96',
                                type: 'image/png'
                            },
                            {
                                src: urlCoverArt128,
                                sizes: '128x128',
                                type: 'image/png'
                            },
                            {
                                src: urlCoverArt192,
                                sizes: '192x192',
                                type: 'image/png'
                            },
                            {
                                src: urlCoverArt256,
                                sizes: '256x256',
                                type: 'image/png'
                            },
                            {
                                src: urlCoverArt384,
                                sizes: '384x384',
                                type: 'image/png'
                            },
                            {
                                src: urlCoverArt,
                                sizes: '512x512',
                                type: 'image/png'
                            }
                        ]
                    });
                }
            }
        }
        xhttp.open('GET', 'https://itunes.apple.com/search?term=' + artist + ' ' + song + '&media=music&limit=1', true);
        xhttp.send();
    }

    this.changeVolumeIndicator = function (volume) {
        document.getElementById('volIndicator').innerHTML = volume;

        if (typeof (Storage) !== 'undefined') {
            localStorage.setItem('volume', volume);
        }
    }

    this.setVolume = function () {
        if (typeof (Storage) !== 'undefined') {
            var volumeLocalStorage = (!localStorage.getItem('volume')) ? 80 : localStorage.getItem('volume');
            document.getElementById('volume').value = volumeLocalStorage;
            document.getElementById('volIndicator').innerHTML = volumeLocalStorage;
        }
    }
}

var audio = new Audio(URL_STREAMINGAUDIO);

// Player control
function Player() {
    this.play = function () {
        audio.play();

        var defaultVolume = document.getElementById('volume').value;

        if (typeof (Storage) !== 'undefined') {
            if (localStorage.getItem('volume') !== null) {
                audio.volume = intToDecimal(localStorage.getItem('volume'));
            } else {
                audio.volume = intToDecimal(defaultVolume);
            }
        } else {
            audio.volume = intToDecimal(defaultVolume);
        }
        document.getElementById('volIndicator').innerHTML = defaultVolume;
    };

    this.pause = function () {
        audio.pause();
    };
}

// On play, change the button to pause
audio.onplay = function () {
    var botao = document.getElementById('playerButton');

    if (botao.className === 'fa fa-play') {
        botao.className = 'fa fa-pause';
    }
}

// On pause, change the button to play
audio.onpause = function () {
    var botao = document.getElementById('playerButton');

    if (botao.className === 'fa fa-pause') {
        botao.className = 'fa fa-play';
    }
}

// Unmute when volume changed
audio.onvolumechange = function () {
    if (audio.volume > 0) {
        audio.muted = false;
    }
}

audio.onerror = function () {
    var confirmacao = confirm('Error al comunicar con el servidor. \nClick OK para reintentar.');

    if (confirmacao) {
        window.location.reload();
    }
}

document.getElementById('volume').oninput = function () {
    audio.volume = intToDecimal(this.value);

    var page = new Page();
    page.changeVolumeIndicator(this.value);
}

function togglePlay() {
    if (!audio.paused) {
        audio.pause();
    } else {
        audio.load();
        audio.play();
    }
}

function volumeUp() {
    var vol = audio.volume;
    if(audio) {
        if(audio.volume >= 0 && audio.volume < 1) {
            audio.volume = (vol + .01).toFixed(2);
        }
    }
}

function volumeDown() {
    var vol = audio.volume;
    if(audio) {
        if(audio.volume >= 0.01 && audio.volume <= 1) {
            audio.volume = (vol - .01).toFixed(2);
        }
    }
}

function mute() {
    if (!audio.muted) {
        document.getElementById('volIndicator').innerHTML = 0;
        document.getElementById('volume').value = 0;
        audio.volume = 0;
        audio.muted = true;
    } else {
        var localVolume = localStorage.getItem('volume');
        document.getElementById('volIndicator').innerHTML = localVolume;
        document.getElementById('volume').value = localVolume;
        audio.volume = intToDecimal(localVolume);
        audio.muted = false;
    }
}

function getStreamingData() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {

        if (this.readyState === 4 && this.status === 200) {

            if(this.response.length === 0) {
                console.log('%cdebug', 'font-size: 22px')
            }

            var data = JSON.parse(this.responseText);

            var page = new Page();

            // Formating characters to UTF-8
            let song = data.currentSong.replace(/&apos;/g, '\'');
            currentSong = song.replace(/&amp;/g, '&');

            let artist = data.currentArtist.replace(/&apos;/g, '\'');
            currentArtist = artist.replace(/&amp;/g, '&');

            // Change the title
            document.title = currentSong + ' | ' + RADIO_NAME;

            if (document.getElementById('currentSong').innerHTML !== song) {
                page.refreshCover(currentSong, currentArtist);
                page.refreshCurrentSong(currentSong, currentArtist);
            }
        }
    };

    var d = new Date();

    // Requisition with timestamp to prevent cache on mobile devices
    xhttp.open('GET', 'api.php?url=' + URL_STREAMING + '&streamtype=' + STREAMING_TYPE  + '&t=' + d.getTime(), true);
    xhttp.send();
}

function intToDecimal(vol) {
    return vol / 100;
}

function decimalToInt(vol) {
    return vol * 100;
}
