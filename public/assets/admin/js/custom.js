

function imagesUpload(obj) {
    
    let xhr = new XMLHttpRequest;

    xhr.onload = function () {
        
    }

    xhr.open('POST', 'imagesupload.php', true);
    xhr.setRequestHeader("Content-Type", "x-www-enctype-multipart-form");
    xhr.send();

}

$('.deleteconfirm').click((e) => {
    if (!confirm('Törlés?'))
        e.preventDefault();
})