$(document).ready(function () {
    $(".image-card").hover(
      function () {
        $(this).find(".image-overlay").css("opacity", "1");
      },
      function () {
        $(this).find(".image-overlay").css("opacity", "0");
      }
    );
  });
  
