jQuery(document).ready(function ($) {
    $(document).on('click', '.welcome-notice .notice-dismiss', function () {

        $.ajax({
            type: 'POST',
            url: ajaxurl,
            data: {
                action: 'escape_room_game_dismissed_notice',
            }
        });

    });
});

// Plugin – AI Content Writer plugin activation
document.addEventListener('DOMContentLoaded', function () {
    const escape_room_game_button = document.getElementById('install-activate-button');

    if (!escape_room_game_button) return;

    escape_room_game_button.addEventListener('click', function (e) {
        e.preventDefault();

        const escape_room_game_redirectUrl = escape_room_game_button.getAttribute('data-redirect');

        // Step 1: Check if plugin is already active
        const escape_room_game_checkData = new FormData();
        escape_room_game_checkData.append('action', 'check_plugin_activation');

        fetch(installPluginData.ajaxurl, {
            method: 'POST',
            body: escape_room_game_checkData,
        })
        .then(res => res.json())
        .then(res => {
            if (res.success && res.data.active) {
                // Plugin is already active → just redirect
                window.location.href = escape_room_game_redirectUrl;
            } else {
                // Not active → proceed with install + activate
                escape_room_game_button.textContent = 'Installing & Activating...';

                const escape_room_game_installData = new FormData();
                escape_room_game_installData.append('action', 'install_and_activate_required_plugin');
                escape_room_game_installData.append('_ajax_nonce', installPluginData.nonce);

                fetch(installPluginData.ajaxurl, {
                    method: 'POST',
                    body: escape_room_game_installData,
                })
                .then(res => res.json())
                .then(res => {
                    if (res.success) {
                        window.location.href = escape_room_game_redirectUrl;
                    } else {
                        alert('Activation error: ' + (res.data?.message || 'Unknown error'));
                        escape_room_game_button.textContent = 'Try Again';
                    }
                })
                .catch(error => {
                    alert('Request failed: ' + error.message);
                    escape_room_game_button.textContent = 'Try Again';
                });
            }
        })
        .catch(error => {
            alert('Check request failed: ' + error.message);
        });
    });
});
