$(document).ready(function() {
    $(".message").each(function() {
        if ($(this).text().length > 0) {
            $(this).slideDown(500, function() {
                $(this).delay(3000).slideUp(500)
            })
        }
    })
    $(".delete-btn").on("click", function() {
        return confirm("Etes-vous sûr de vouloir supprimer?")
    })
    tinymce.init({
        selector: '.post',
        menubar: false,
        plugins: [
            'advlist autolink lists link image charmap print preview anchor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table paste code help wordcount'
        ],
        toolbar: 'undo redo | formatselect | ' +
            'bold italic backcolor | alignleft aligncenter ' +
            'alignright alignjustify | bullist numlist outdent indent | ' +
            'removeformat | help',
        content_css: '//www.tiny.cloud/css/codepen.min.css'
    });

    
    console.log("test")
})

