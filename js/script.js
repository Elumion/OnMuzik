
const audioList = document.querySelector(".songs__list");

let player = null;
let audioObj = null;
currentId = 0;

const Player = () => {
    let audiofiles = [...audioList.children];
    audioObj = audiofiles.map((elem, id) => {
        let title = elem.children[1].children[1].innerText;
        let file = elem.children[1].children[2].children[0].getAttribute('src');
        let songId = "s" + id;
        let poster = elem.children[0].children[0].getAttribute('src');
        return {
            "title": title,
            "file": file,
            "id": songId,
            "poster": poster,
        }
    })
    player = new Playerjs({ id: "player", title: audioObj[0].title, poster: audioObj[0].poster, file: audioObj, autonext: 1 });

}

const playSong = (event) => {
    if (!event.target.hasAttribute("data-id")) {
        return false;
    }
    event.preventDefault();
    let playId = event.target.getAttribute('data-id');
    console.log(playId)
    currentId = +playId.substr(1);
    player.api("file", playId);
    player.api("find", playId);
    player.api("title", audioObj[currentId].title);
    player.api("poster", audioObj[currentId]['poster']);
    player.api("play");
}

function PlayerjsEvents(event, id, info) {
    if (event == "end") {
        console.log(('s' + audioObj.length));
        if (player.api('playlist_id') == ('s' + (audioObj.length - 1))) {
            player.api("find", 's0');
            player.api("title", audioObj[0].title);
            player.api("poster", audioObj[0]['poster']);
            player.api("play");
            return;
        }
    }
}


document.addEventListener("DOMContentLoaded", Player);
audioList.addEventListener("click", playSong);

