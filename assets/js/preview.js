function triggerClick() {
    let $file =  document.querySelector('#profileImage').click();
    if(document.getElementsByName('imagem') == '') {
    }
}
function displayImage(e) {
    if(e.files[0]) {
        let reader = new FileReader();

        reader.onload = function(e) {
            document.querySelector('#profileDisplay').setAttribute('src', e.target.result);
        }
        reader.readAsDataURL(e.files[0]);
    }
}