$(function () {
    $("ul > li").click(function () {
        var next = $(this).next().prop("tagName");
        if (next == 'UL') {
            $(this).next().slideToggle();
        }
    });
    $("h2,h3,h4").click(function () {
        var next = $(this).next().prop("tagName");
        if (next == 'DIV') {
            $(this).next().slideToggle();
        }
    });
    $(".hiraku").click(function () {
        var next = $(this).next().prop("tagName");
        if (next == 'TABLE') {
            $(this).next().fadeIn();
        }
    });
    $("a[href^=#]").click(function () {
        var attr = $(this).attr("href");
        $(attr).click();
    });
});