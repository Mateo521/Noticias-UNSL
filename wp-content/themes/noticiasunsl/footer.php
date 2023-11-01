<p> Footer </p>




<script>
    document.addEventListener("DOMContentLoaded", function() {
        //var item1 = document.querySelector("#titulo-miniatura");
        var videoPlayer = document.querySelector("#videoPlayer");
        var miniaturas = document.querySelectorAll(".miniatura");
        console.log(miniaturas);
        miniaturas.forEach(function(miniatura) {
            miniatura.addEventListener("click", function() {
                var videoId = this.getAttribute("data-video-id");
                videoPlayer.src = "https://www.youtube.com/embed/" + videoId;
            });
        });
    });
</script>
</body>

</html>