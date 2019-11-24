        <!-- JS Files -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri().'/components/slick-slider/slick.min.js'?>"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                $('.slick-slider').slick({
                    dots: true,
                    arrows: true,
                    prevArrow: '<button type="button" class="slick-prev">Previous</button>',
                    nextArrow: '<button type="button" class="slick-next">Next</button>',
                });
            });
        </script>
    </body>
</html>