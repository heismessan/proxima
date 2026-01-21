
document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".video-thumbnail").forEach(function (thumb) {
        thumb.addEventListener("click", function () {
            const videoID = this.dataset.video;
            const iframe = document.createElement("iframe");
            iframe.src = `https://www.youtube.com/embed/${videoID}?autoplay=1`;
            iframe.width = "100%";
            iframe.height = "315";
            iframe.allow = "accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture";
            iframe.allowFullscreen = true;
            // iframe.frameBorder = "0";
            this.replaceWith(iframe);
        });
    });
});
