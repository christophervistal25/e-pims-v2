<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">
     <style>
          body {
               font-family: 'Inter', sans-serif;
          }

     </style>
</head>
<body>
     <h3>Salary Grade {{ $year }}</h3>
     <hr color="black">
     <br>
     <table width="100%;" border="1" cellpadding="5" style="border-collapse:collapse;">
          <thead>
          <tr>
               <th>Salary Grade</th>
               <th>Step 1</th>
               <th>Step 2</th>
               <th>Step 3</th>
               <th>Step 4</th>
               <th>Step 5</th>
               <th>Step 6</th>
               <th>Step 7</th>
               <th>Step 8</th>
          </tr>
          </thead>
          <tbody>
               @foreach($grades as $grade)
               <tr>
                    <td style="text-align:center;">{{ $grade->sg_no }}</td>
                    <td style="text-align:right;">{{ number_format($grade->sg_step1, 2, ".", ",") }}</td>
                    <td style="text-align:right;">{{ number_format($grade->sg_step2, 2, ".", ",") }}</td>
                    <td style="text-align:right;">{{ number_format($grade->sg_step3, 2, ".", ",") }}</td>
                    <td style="text-align:right;">{{ number_format($grade->sg_step4, 2, ".", ",") }}</td>
                    <td style="text-align:right;">{{ number_format($grade->sg_step5, 2, ".", ",") }}</td>
                    <td style="text-align:right;">{{ number_format($grade->sg_step6, 2, ".", ",") }}</td>
                    <td style="text-align:right;">{{ number_format($grade->sg_step7, 2, ".", ",") }}</td>
                    <td style="text-align:right;">{{ number_format($grade->sg_step8, 2, ".", ",") }}</td>
               </tr>
               @endforeach
          </tbody>
     </table>
</body>
</html>