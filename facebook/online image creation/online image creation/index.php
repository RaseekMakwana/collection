<html>
    <head>
        <title>Test</title>
        <script src="http://gigdawg.localhost.com/public/js/frontend/jquery-3.1.0.min.js"></script>
        <script src="http://gigdawg.localhost.com/public/js/frontend/html2canvas.js"></script>
    </head>
    <body>
        <div id="image_generate">
            <img src="https://d1a9c78allwo98.cloudfront.net/3f7d3bb1-957d-47bc-a270-0e84bb01450e.jpg">
        </div>
        <input type="submit" id="image_data">
        <script>
            $(document).ready(function () {
                $('#image_data').click(function () {
                    html2canvas($('#image_generate'), {
                        allowTaint: true,
                        taintTest: false,
                        onrendered: function (canvas) {
                            document.body.appendChild(canvas);
                            $('canvas').attr('id', 'canvas');
                            $('canvas').attr('class', 'canvas_blk');
                            var canvas = document.getElementById("canvas");
                            //window.location.href = canvas.toDataURL('image/jpeg');
                            var images = canvas.toDataURL("image/jpeg"); //.replace("image/png", "image/octet-stream");
                            var file_name = Math.floor(Date.now()) + '.jpeg';
                            //$('#image_generate').hide();
                            $('#canvas').attr('id', 'null');
                        }

                    });
                });
            });

        </script>
    </body>
</html>
