/* import './bootstrap';
import '../css/app.css';  */
import Dropzone from "dropzone";
Dropzone.autoDiscover = false;

let dropzone = new Dropzone("#dropzone",{
    dictDefaultMessage: "Sube tu evidencia",
    acceptedFiles: ".png,.jpg,.jpeg,.gif",
    addRemoveLinks: true,
    dictRemoveFile: "Borrar archivo",
    maxFiles: 1,
    uploadMultiple: false,

    init: function (){
        if(document.querySelector("#evidencia_problema").value.trim()){
            const imagenPublicada={}
            imagenPublicada.size = 1234;
            imagenPublicada.name = document.querySelector("#evidencia_problema").value;

            this.options.addedfile.call(this, imagenPublicada);
            this.options.thumbnail.call(this, imagenPublicada, `/uploads/${imagenPublicada.name}`);
            imagenPublicada.previewElement.classList.add("dz-success", "dz-complete");

        }
    }
});

dropzone.on("success", function (file, response) {
    document.querySelector("#evidencia_problema").value=response.imagen;
});

dropzone.on("removedfile", function(){
    document.querySelector("#evidencia_problema").value="";
});


