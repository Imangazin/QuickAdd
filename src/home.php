<!DOCTYPE html>
<html>
<head lang="en">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <!-- Brightspace button style -->
  <style>
        .btn-primary {
                color: #ffffff;
                background-color: #006fbf;
        }
        .btn-primary:hover {
                color: #ffffff;
                background-color: #004489;
        }
        .btn-primary:active {
                color: #ffffff;
                background-color: #004489;
        }
  </style>

</head>
<body style="font-family: 'Lato', sans-serif;color: #202122;">
<div class="container">
  <form method="post" id="quickAddForm" action="src/adduser.php">
    <input type="hidden" name="session_id" value="<?php echo $id; ?>"> 
    <div class="mb-3">
      <label class="form-label" id="output"></label>
      <input type="text" class="form-control" id="username" required placeholder="Enter username" name="username">
    </div>
    <div class="mb-3">
      <select class="form-select" id="userrole" required name="userrole">
        <option value="" disabled selected>Select Role</option>
        <option value="121">Teaching Assistant</option>
        <option value="109">Instructor</option>
      </select>
    </div>
    <div class="mb-3">
        <div class="row">
          <div class="d-grid gap-2 col-6">
            <button type="submit" class="btn btn-primary">Add</button>
          </div>
          <div class="col">
            <div id="quickAddSpinner"></div>
          </div>
        </div>
    </div>
  </form>
  <div id="quickAddResponse" tabindex="-1"></div>
<div>
<script type="text/javascript" src="src/quickadd.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>
