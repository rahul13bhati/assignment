{{--ini_get('post_max_size')
ini_get('upload_max_filesize')--}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Assignment</title>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <style type="text/css">
            html, body {
                margin: 0;
                padding: 0;
                width: 100%;
                height: 100%;
                display: table
            }
            .container {
                display: table-cell;
                text-align: center;
                vertical-align: middle;
            }
        </style>
    </head>
    <body >
        <div class="container">
            <form id="fileUploadForm" action="{{url('upload')}}" enctype="multipart/form-data" method="POST">
                {{csrf_field()}}
                <div class="form-horizontal">
                    <div class="form-group">
                        <div class="row">
                            <label class="control-label col-md-2 text-right" for="filename"><strong>Excel File:</strong></label>
                            <div class="col-md-10">
                                <div class="input-group">
                                    <input type="hidden" id="filename" name="filename" value="">
                                    <input type="file" id="uploadedFile" name="uploadedFile" class="form-control form-control-sm" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                                    <div class="input-group-btn">
                                        <input type="submit" value="Upload" class="rounded-0 btn btn-primary">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>                        
                </div>
            </form>
        </div>
    </body>
</html>
