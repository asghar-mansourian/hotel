<style>
    body{
        direction: rtl;
        font-family: 'yekan';
    }
    table {
        border-collapse: collapse;
        width: 100%;
    }

    th, td {
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {background-color: #f2f2f2;}
</style>
<div class="table-responsive" id="tableList">
    <table class="table table-bordered table-hover table-striped">
        <thead>
        <tr>

            <th>شناسه</th>
            <th>نام</th>
            <th>نام خانوادگی</th>
            <th>ایمیل</th>
        </tr>
        </thead>
        <tbody class="mytbody">
        @foreach($records as $record)
            <tr>

                        <td>{{$record->id}}</td>
                        <td>{{$record->name}}</td>
                        <td>{{$record->family}}</td>
                        <td>{{$record->email}}</td>

            </tr>
        @endforeach


        </tbody>
    </table>

    <style>
        nav {
            text-align: center;
        }
    </style>


</div>
