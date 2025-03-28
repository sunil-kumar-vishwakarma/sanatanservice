ClassicEditor
    .create(document.querySelector('#description'), {
        height: 300 // Yeh option directly nahi hota CKEditor me, isliye CSS lagayenge
    })
    .then(editor => {
        editor.editing.view.change(writer => {
            writer.setStyle('height', '300px', editor.editing.view.document.getRoot());
        });
    })
    .catch(error => {
        console.error(error);
    });

function openPopup() {
    document.getElementById("popupForm").style.display = "flex";
}

function closePopup() {
    document.getElementById("popupForm").style.display = "none";
}

// for + add support button
function openPopup1() {
    document.getElementById("popupForm-addsupport").style.display = "flex";
}

function closePopup1() {
    document.getElementById("popupForm-addsupport").style.display = "none";
}

// for Edit support button
function openPopup2() {
    document.getElementById("popupForm-edit").style.display = "flex";
}

function closePopup2() {
    document.getElementById("popupForm-edit").style.display = "none";
}

// for delete support button
function openPopup3() {
    document.getElementById("popupForm-delete").style.display = "flex";
}

function closePopup3() {
    document.getElementById("popupForm-delete").style.display = "none";
}
