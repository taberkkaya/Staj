<?php 
    include 'database.php';

    $msg = "";
    if($_POST){
        $employee_no = $_POST['employee_no'];

        $conn = connection();
        $exist = search_employee($employee_no);

        if($exist){
            $access = for_access($employee_no);
            if($access){
                session_start();
                $_SESSION['employee_no'] = $employee_no;
                $_SESSION['access'] = $access;
                $_SESSION['session'] = true;
                header("Location:permission.php");
            }
            else $msg = "YETKİSİZ KULLANICI";
        }
        else $msg = "TANIMLANMAYAN SİCİL NUMARASI";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ÇALIŞAN YETKİLENDİRME</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>

<div class="container" style="margin-top: 15%;">
  <div class="row">
    <div class="col"></div>
    <div class="col">
        <form action="index.php" method="post">
            <div class="form-text"><?php echo $msg; ?></div>
            <div class="col-auto">
                <label for="inputPassword6" class="col-form-label">SİCİL NUMARASI</label>
            </div>
            <div class="mb-3">
              <input type="text" class="form-control" name="employee_no">
            </div>
            <div class="col-auto">
                <label for="inputPassword6" class="col-form-label">PAROLA</label>
            </div>
            <div class="mb-3">
              <input type="password" class="form-control" name="password">
            </div>
            <button type="submit" class="btn btn-success" style="margin-left: 45%;" >GİRİŞ</button>
        </form>
    </div>
    <div class="col"></div>
  </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>