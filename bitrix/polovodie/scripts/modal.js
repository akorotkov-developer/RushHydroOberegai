function showModal(modal) {
    document.getElementById(modal).classList.remove('hidden');
}

function closeModal(modal) {
    document.getElementById(modal).classList.add('hidden');
}

var j = 0;

function addFiles() {
    var input = document.getElementById('input-file');
    var output = document.getElementById('upload-file');

    var files = input.files;

    for (var i = 0; i < files.length; i++) {
        var name = files[i].name;
        var size = returnFileSize(files[i].size);

        var listItem = document.createElement('li');
        listItem.id = 'file_' + j;
        j++;
        output.appendChild(listItem);

        var del = document.createElement('span');
        del.classList.add('remove-file');
        del.setAttribute('onclick', 'removeFiles("' + listItem.id +'")')
        listItem.appendChild(del);

        var content1 = document.createElement('span');
        listItem.appendChild(content1);

        var content2 = document.createElement('p');
        listItem.appendChild(content2);

        content1.innerHTML = name;
        content2.innerHTML = size;
    }
}

function removeFiles(id) {
    var el = document.getElementById(id);
    el.parentNode.removeChild(el);

    //document.getElementById('input-file').value = '';
}

function returnFileSize(number) {
    if (number < 1024) {
        return number + 'bytes';
    } else if (number > 1024 && number < 1048576) {
        return (number / 1024).toFixed(1) + 'KB';
    } else if (number > 1048576) {
        return (number / 1048576).toFixed(1) + 'MB';
    }
}