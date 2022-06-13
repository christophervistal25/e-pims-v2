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
               padding : 0px;
               margin : 0px;
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
          var canvas = new fabric.Canvas('canvas');

          fabric.Image.fromURL('http://e-pims.test/assets/img/png-happy-birthday-2.jpg', (template) => {
               template.lockMovementX = true;
               template.lockMovementY = true;
               template.hasControls = false; 
               template.hasBorders = false;
               template.selectable = false;
               canvas.add(template).sendToBack(template);
               console.log('Template Image : ', 
                    canvas.getObjects().indexOf(template)
               );
          });

          fabric.Image.fromURL('http://e-pims.test/assets/img/luna.jpg', function(image) {
               image.scale(0.55).set({
                    top : canvas.height / 2 - 260,
                    left : canvas.width / 2 - 211.5
               });
               image.selectable = false;
               canvas.add(image).bringForward(image);
               console.log('Employee Image : ',
                    canvas.getObjects().indexOf(image)
               );
          });
          

          function saveImage() {
               this.href = canvas.toDataURL({
                    format: "png",
                    quality : 1,
               });
               this.download = "birthday-card.png";
               window.close();
          }
          $('#saveImage').click(saveImage);
          
          setTimeout(() => {
               $('a')[0].click();
          }, 1000);
     </script>
</body>
</html>
