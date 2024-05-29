@section('title')
    เอกสาร PDF
@endsection


<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: "THSarabun";
        }
        h1, p {
            font-family: "THSarabun";
            font-size: 16pt;
        }
    </style>
</head>
<body>
    <h1 style="font-size: 20pt">{{ strip_tags($data->title) }}</h1>
    <p>{{ strip_tags($data->content) }}</p>
    <!-- เพิ่มฟิลด์ตามต้องการ และนำ tag HTML ออก -->
</body>
</html>
