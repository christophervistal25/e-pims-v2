<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/4.3.1/fabric.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <title>Document</title>
    <style>
        body {
            padding: 0px;
            margin: 0px;
        }

    </style>
</head>
<body>
    <center>
        <canvas id="canvas" width="1080" height="1080">
            {{-- <img src="{{ asset('/assets/img/png-happy-birthday-1.jpg') }}" alt=""> --}}
        </canvas>
        <a id="saveImage">download</a>
    </center>
    <script>
        const name = "{{ $name }}";
        const employeeID = "{{ $employeeID }}";
        const AGE = "{{ $ageOrdinal }}";
        var canvas = new fabric.Canvas('canvas');

        fabric.Image.fromURL('/assets/img/png-happy-birthday-2.jpg', (template) => {
            template.lockMovementX = true;
            template.lockMovementY = true;
            template.hasControls = false;
            template.hasBorders = false;
            template.selectable = false;
            canvas.add(template).sendToBack(template);
            console.log('Template Image : '
                , canvas.getObjects().indexOf(template)
            );
        });

        fabric.Image.fromURL(`/assets/img/profiles/${employeeID}.jpg`, function(image) {
            image.scale(0.55).set({
                top: canvas.height / 2 - 260
                , left: canvas.width / 2 - 211.5
            });
            image.selectable = false;
            canvas.add(image).bringForward(image);
            console.log('Employee Image : '
                , canvas.getObjects().indexOf(image)
            );
        });

        // canvas.add(geek).bringForward(geek).setActiveObject(geek);

         // Create shadow object
        var shadow = new fabric.Shadow({
            color: 'black',
            blur: 10
        });

        // Create a new Text instance
        var text = new fabric.Text(AGE, {
            shadow: shadow,
            // fill: '#fffdff',
            fill: '#fffdff',
            top: 200,
            fontSize: 110,
            fontFamily: 'League Spartan',
            width: canvas.width
        });


        // canvas.add(text).bringForward(text).setActiveObject(text);

        /* function saveImage() {
            this.href = canvas.toDataURL({
                format: "png"
                , quality: 1
            , });
            this.download = "birthday-card.png";
            window.close();
        }
        $('#saveImage').click(saveImage);

        setTimeout(() => {
            $('a')[0].click();
        }, 1000);*/

    </script>
</body>
</html>
