<p> Footer </p>
<style>
    .rl-basicgrid-gallery {
        flex-wrap: wrap;
        gap:10px;
        justify-content : center;
        display: flex;
    }
    .rl-basicgrid-gallery img {
width: 100%;
height: 100%;
object-fit: cover;
    }
</style>


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