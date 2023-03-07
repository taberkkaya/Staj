<?php 
    session_start();
    if(!$_SESSION['session']){
        header("Location:index.php");
    }
    else{
        include 'database.php';
        $msg = "";
    }
    
    if($_GET){
        $_SESSION['session'] = false;
        session_unset();
        session_destroy();
        header("Location:index.php");
    }

    if($_POST){


        $request_no = $_POST['request_no'];
        $exist = search_employee($request_no);

        if(!$exist){
            $msg = "TANIMLANMAYAN SİCİL NUMARASI";
        }
        else{
            $access = for_access($request_no);
            if($access){
                $msg = "ÇALIŞAN ZATEN YETKİLİ";
            }
            else{
                update($request_no);
                $msg = "GÜNCELLEME BAŞARILI";
            }
        }
    } 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YETKİLENDİRME</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
    <div class="container" style="margin-top: 15%;">
      <div class="row">
        <div class="col"></div>
        <div class="col">
            <form action="permission.php" method="post">
                <div class="form-text"><?php echo $msg; ?></div>
                <div class="col-auto">
                    <label for="inputPassword6" class="col-form-label">YETKİLENDİRİLECEK SİCİL NUMARASI</label>
                </div>
                <div class="mb-3">
                  <input type="text" class="form-control" name="request_no">
                </div>
                <button type="submit" class="btn btn-success" style="margin-left: 35%;">YETKİLENDİR</button>
            </form>
            <br>
            <form action="permission.php" method="get">
                <button type="submit" class="btn btn-danger" name="quit" style="margin-left: 42%;">ÇIKIŞ</button>
            </form>
        </div>
        <div class="col"></div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>
