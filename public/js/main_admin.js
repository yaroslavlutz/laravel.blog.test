//console.log('test string for checking native js');

$(document).ready(function() {

    /** For work CKEDITOR */
    CKEDITOR.replace( 'description_short' ); //`description_short` - селектор поля(textarea) к которому применяем текстовый редактор
    CKEDITOR.replace( 'description' ); //`description` - селектор поля(textarea) к которому применяем текстовый редактор
});
