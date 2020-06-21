const file = document.getElementById('file');
const image = document.getElementById("PicFromUser");
file.onchange = function() {
    const fileData = this.files[0];
    const pettern = /^image/;

    console.info(fileData.type);

    if (!pettern.test(fileData.type)) {
        alert("图片格式不正确");
        return;
    }
    const reader = new FileReader();
    reader.readAsDataURL(fileData);


    reader.onload = function(e) {
        console.log(e);
        console.log(this.result);
        image.setAttribute("src", this.result);
    };
    document.getElementById("placeholder").style.display = "none";
};