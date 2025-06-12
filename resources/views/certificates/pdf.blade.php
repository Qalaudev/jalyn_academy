<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Certificate</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            text-align: center;
            padding: 50px;
        }
        h1 {
            font-size: 36px;
            margin-bottom: 50px;
        }
        .certificate-content {
            font-size: 18px;
        }
    </style>
</head>
<body>
<h1>СЕРТИФИКАТ</h1>
<div class="certificate-content">
    <p>Бұл сертификат <strong>{{ $name }}</strong> атына беріледі</p>
    <p><strong>{{ $course_title }}</strong> курсынан өтуін растайды</p>
    <p>Куәлік нөмірі: <strong>{{ $certificate_number }}</strong></p>
    <p>Берілген күні: <strong>{{ $issue_date }}</strong></p>
</div>
</body>
</html>
