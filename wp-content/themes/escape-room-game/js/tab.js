function escape_room_game_open_tab(evt, cityName) {
    var escape_room_game_i, escape_room_game_tabcontent, escape_room_game_tablinks;
    escape_room_game_tabcontent = document.getElementsByClassName("tabcontent");
    for (escape_room_game_i = 0; escape_room_game_i < escape_room_game_tabcontent.length; escape_room_game_i++) {
        escape_room_game_tabcontent[escape_room_game_i].style.display = "none";
    }
    escape_room_game_tablinks = document.getElementsByClassName("tablinks");
    for (escape_room_game_i = 0; escape_room_game_i < escape_room_game_tablinks.length; escape_room_game_i++) {
        escape_room_game_tablinks[escape_room_game_i].className = escape_room_game_tablinks[escape_room_game_i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}

jQuery(document).ready(function () {
    jQuery( ".tab-sec .tablinks" ).first().addClass( "active" );
});