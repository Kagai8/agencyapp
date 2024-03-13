<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>App Suspension</title>
<style>
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

.container-full {
    padding: 20px;
}

.box {
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    padding: 20px;
}

.box-header {
    background-color: #007bff;
    color: #fff;
    padding: 10px;
    border-top-left-radius: 5px;
    border-top-right-radius: 5px;
}

.box-title {
    margin: 0;
    font-size: 24px;
}

.box-body {
    margin-top: 20px;
}

h4 {
    color: #333;
}

@media (max-width: 768px) {
    .container-full {
        padding: 10px;
    }
}
</style>
</head>
<body>

<div class="container-full">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">
        <div class="row">

            <div class="col-12">

                <div class="box">
                    <div class="box-header">
                    	 <img src="{{ asset('minister/minister/images/3.png')}}" alt="Company Logo" style="max-width: 100px;">
                        <h3 class="box-title">System Suspended</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div>
                            <h4>The application has been suspended by the Minister. Please contact the Minister for further details.</h4>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

            </div>
            <!-- /.col -->

        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->

</div>

</body>
</html>
