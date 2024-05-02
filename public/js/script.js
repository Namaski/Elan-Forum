$(document).ready(function () {


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
})
$(".message").each(function () {
    if ($(this).text().length > 0) {
        $(this).slideDown(500, function () {
            $(this).delay(3000).slideUp(500)
        })
    }
})

$(".delete-btn").on("click", function () {
    return confirm("Etes-vous sûr de vouloir supprimer?")
})

$(".hamburgerIcon").on("click", function () {
    // $(".secondaryNav").toggle();
    // $(".hamburgerIcon").toggleClass("hide show");
    $(".secondaryNav").toggleClass("isFade");
    setTimeout(function () {
        $(".secondaryNav").toggleClass("hideNav");
    }, 250);
});

$("#pills-register").hide();

$(".nav-item").on("click", function () {
    let navItem = jQuery(this).attr("id");

    if (navItem === 'tab-login') {

        //SET ARIA FOR ACCESIBILITY 

        $('.nav-login').prop('aria-selected', true);
        $('.nav-register').prop('aria-selected', false);
       

        // HIDE REGISTER FORM
        $("#pills-register").fadeOut(200)
        setTimeout(() => {
            $("#pills-register").hide()
        }, 200);

        //  SHOW LOGIN FORM
        setTimeout(() => {
            $("#pills-login").fadeIn(200)
            setTimeout(() => {
                $("#pills-login").show()
            }, 200);
        }, 200);

        


    } else if (navItem === 'tab-register') {

        //SET ARIA FOR ACCESIBILITY ------------ REGARDER POURQUOI CA MARCHE PAS APRES

        $('.nav-register').prop('aria-selected', true);
        $('.nav-login').prop('aria-selected', false);

        // HIDE LOGIN FORM
        $("#pills-login").fadeOut(200)
        setTimeout(() => {
            $("#pills-login").hide()
        }, 200);

        //SHOW REGISTER FORM
        setTimeout(() => {
            $("#pills-register").fadeIn(200)
            setTimeout(() => {
                $("#pills-register").show()
            }, 200);
        }, 200);

    }
});

