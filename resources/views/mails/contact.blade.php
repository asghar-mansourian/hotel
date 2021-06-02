<!DOCTYPE html>
<html lang="en">
<head>
    <title>Email</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        .text-left {
            text-align: left !important;
        }

        .container {
            width: 1024px;
            margin: 0 auto;
            font-family: Tahoma;
        }

        .card {
            box-shadow: 0px 0px 10px #d6bcbc;
            padding: 10px;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 1px solid rgba(0, 0, 0, 0.125);
            border-radius: 0.25rem;
        }

        .alert-info {
            color: #ffffff !important;
            background-color: #407f8a;
            border-color: #33a2b5;
        }

        .alert-warning {
            color: #ffffff !important;
            background-color: #407f8a;
            border-color: #33a2b5;
        }

        .alert {
            position: relative;
            padding: 0.75rem 1.25rem;
            margin-bottom: 1rem;
            border: 1px solid transparent;
            border-radius: 0.25rem;
        }


        .card-header {
            text-align: center !important;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="card mt-4">
        <div class="card-header text-left">
             From :{{$request->input('telephone')}}
        </div>
        <div class="card-body">

            <p class="text-left" style="font-weight:bold;">Name</p>
            <p class="alert-info alert text-left">{{$request->input('name')}}</p>

            <p class="text-left" style="font-weight:bold;">Message</p>
            <p class="alert-warning alert text-left">{{$request->input('message')}}</p>

            <p class="text-left" style="font-weight:bold;">email</p>
            <p class="alert-warning alert text-left">{{$request->input('email')}}</p>

        </div>
    </div>
</div>

</body>
</html>
