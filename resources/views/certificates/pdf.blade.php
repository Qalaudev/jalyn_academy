<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Сертификат</title>
    <style>
        body {
            font-family: 'DejaVu Sans', sans-serif; /* Для поддержки кириллицы */
            text-align: center;
            padding: 50px;
            position: relative;
        }
        .certificate-container {
            border: 10px solid #0056b3;
            padding: 20px;
            position: relative;
            height: 700px; /* Фиксированная высота для примера */
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        h1 {
            font-size: 48px;
            margin-bottom: 20px;
            color: #0056b3;
        }
        p {
            font-size: 24px;
            margin-bottom: 10px;
        }
        .signature {
            margin-top: 50px;
            font-style: italic;
        }
        .watermark {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) rotate(-45deg);
            font-size: 150px;
            color: rgba(0, 0, 0, 0.1);
            z-index: -1;
            white-space: nowrap;
        }
    </style>
</head>
<body>
    <div class="certificate-container">
        <div class="watermark">Jalyn Academy</div>
        <h1>СЕРТИФИКАТ</h1>
        <p>Настоящим удостоверяется, что</p>
        <p><strong>{{ $name }}</strong></p>
        <p>успешно завершил(а) курс</p>
        <p><strong>"{{ $course_title }}"</strong></p>
        <p>Дата выдачи: {{ $issue_date }}</p>
        <p class="signature">Jalyn Academy</p>
        <p>Сертификат №: {{ $certificate_number }}</p>
    </div>
</body>
</html>
