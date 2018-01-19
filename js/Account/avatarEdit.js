var avatarInput = document.getElementById('avatar');
var formdata = false;
var id = document.getElementById('memValue').value;

if (window.FormData) {
    formdata = new FormData();
}

if (avatarInput.addEventListener('change', function(evt) {
        var i;
        var img;
        var reader;
        var file = this.files[0];

        if (file.type.match(/image.*/)) {

            if (window.FileReader) {
                reader = new FileReader();
                reader.readAsDataURL(file);
            }

            if (formdata) {
                formdata.append('avatar', file);
                formdata.append('user_id', id);
                $.ajax({
                    url: 'editavatar.php',
                    type: 'POST',
                    data: formdata,
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        ndata = data.slice(1, data.length);
                        if (ndata === 'success') location.reload();
                    }
                });
            }

        }


    }), false);