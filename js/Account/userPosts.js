function sendPost(id, body_id) {
    var postBody = document.getElementById('post_body').value,
        user_id = id,
        body_id = body_id;
    if (postBody && user_id && body_id) {
        $.ajax({
            url: 'userposts.php',
            type: 'POST',
            data: { userpost: 'posts', user_id: user_id, post_body: postBody, body_id: body_id },
            success: function(data) {
                ndata = data.replace(/\s*/g,'');
                if (ndata === 'success') location.reload();
            }
        });
    }
}

function addLike() {
    alert('fkdajfdlsa');
}