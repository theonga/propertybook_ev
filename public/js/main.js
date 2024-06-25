$(document).ready(function () {

     $(".navbar-nav .nav-item .nav-link").on("click", function () {
         $(".navbar-nav .nav-item .nav-link").css("color", "#d8c9c9"); // Set all to gray
         $(this).css("color", "white"); // Set clicked one to white
     });

    $(document).on("click", '[id^="story_title_"]', function () {
        $('[id^="story_content_"]').addClass("d-none");
        $('[id^="story_title_"]').removeClass("bg-primary text-white");
        $('[id^="story_title_"]').addClass("tab-title-inactive");
        $(this).removeClass("tab-title-inactive");
        $(this).addClass("bg-primary text-white");
        var id = this.id.split("_")[2];
        $('[id^="story_content_"]').addClass("d-none"); // Add this line to hide all content before showing the clicked one
        $("#story_content_" + id).removeClass("d-none");
    });
});
