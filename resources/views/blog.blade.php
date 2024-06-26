@extends('layouts.app')
@section('title')
    Blog ♡
@endsection
@section('content')
    @if ($blogs->count() > 0)
    <h2 class="text text-center py-2">Blog <3</h2>
    <table class="table table-hover table-bordered text text-center">
        <thead>
            <tr class="table-primary">
                <th scope="col">ชื่อบทความ</th>
                <th scope="col">สถานะ</th>
                <th scope="col">แก้ไขบทความ</th>
                <th scope="col">ลบบทความ</th>
                <th scope="col">Download PDF</th>
                <th scope="col">Download Word</th>
                
            </tr>
        </thead>
        <tbody>
            @foreach ($blogs as $item)
                <tr>
                    <td>{{$item->title}}</td>
                    {{-- <td>{{Str::limit($item->content, 10)}}</td> --}}
                    <td>
                        @if ($item->status == true)
                            <a href="{{route('change', $item->id)}}" class="btn btn-success">เผยแพร่</a> 
                        @else
                            <a href="{{route('change', $item->id)}}" class="btn btn-secondary">ฉบับร่าง</a>
                        @endif
                    </td>
                    <td>
                        <a href="{{route('edit', $item->id)}}" class="btn btn-warning">แก้ไข</a>
                    </td>
                    <td>
                        <a href="{{route('delete', $item->id)}}" class="btn btn-danger" onclick="return confirm('คุณต้องการลบบทความ {{$item->title}} หรือไม่ ?')">ลบ</a>
                    </td>
                    <td>
                        <a href="{{ route('gPDF', $item->id) }}" class="btn btn-outline-danger">
                            <i class="bi bi-file-earmark-pdf"></i>
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('exportWord', $item->id) }}" class="btn btn-outline-primary">
                            <i class="bi bi-file-earmark-word"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    

    {{$blogs->links()}}
    <a href="/author/pdf" class="btn btn-outline-success">Download file</a>
    @else
        <h2 class="text text-center py-2">ไม่มีบทความในระบบ</h2>
    @endif
          
@endsection
