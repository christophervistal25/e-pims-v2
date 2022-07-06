<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/521/fabric.min.js" integrity="sha512-nPzvcIhv7AtvjpNcnbr86eT6zGtiudLiLyVssCWLmvQHgR95VvkLX8mMpqNKWs1TG3Hnf+tvHpnGmpPS3yJIgw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <title>Document</title>
    <style>
        body {
            padding: 0px;
            margin: 0;
        }

    </style>
</head>
<body>
    <center>
        <canvas id="canvas" width="1080" height="1080">
            <img src="{{ asset('/assets/img/happy-birthday-1.jpg') }}" alt="">
        </canvas>
        <a id="saveImage">download</a>
    </center>
    <script>
        const name = "{{ $name }}";
        const employeeID = "{{ $employeeID }}";
        const AGE = "{{ $ageOrdinal }}";

        var canvas = new fabric.Canvas('canvas');

        fabric.Image.fromURL('http://e-pims.test/assets/img/png-happy-birthday.png', (template) => {
            template.lockMovementX = true;
            template.lockMovementY = true;
            template.hasControls = false;
            template.hasBorders = false;
            template.selectable = false;
            canvas.add(template).sendToBack(template);
        });

        fabric.Image.fromURL(`http://e-pims.test/assets/img/profiles/${employeeID}.jpg`, function(image) {
            image.scale(0.53);
            image.selectable = false;
            canvas.add(image).sendToBack(image).centerObject(image);
        });

        // Create shadow object
        var shadow = new fabric.Shadow({
            color: 'black'
            , blur: 4.5
        });

        // Create a new Text instance
        var geek = new fabric.Textbox(` ${name.toUpperCase()} `, {
            fill: '#152d73'
            , top: 683
            , fontSize: 60
            , fontFamily: 'League Spartan'
            , width: canvas.width
            , textAlign: "center"
            , selectable: false
            , lockMovementX: true
            , lockMovementY: true
            , hasControls: false
            , hasBorders: false
            , selectable: false
        , });


        canvas.add(geek).bringForward(geek).setActiveObject(geek);
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
 

        canvas.add(text).bringForward(text).setActiveObject(text);

    </script>
</body>
</html>
