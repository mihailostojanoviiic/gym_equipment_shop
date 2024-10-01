window.onscroll = function() {
    scrollFunction();
};
function scrollFunction() {
    if (document.documentElement.scrollTop > 400) {
        document.getElementById("scrollToTopBtn").style.display = "block";
    } else {
        document.getElementById("scrollToTopBtn").style.display = "none";
    }
}
function scrollToTop() {
    document.documentElement.scrollTop = 0;
}