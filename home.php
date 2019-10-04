<?php

$data = json_decode(file_get_contents("users.json"), true);
// Start session
session_start();
if (isset($_SESSION['Name'])) {
  $user['Name'] = $_SESSION['Name'];
} else {
  header('location: index.php');
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <!-- <link rel="stylesheet" type="text/css" href="style.css"> -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <!-- JavaScript -->
  <script src="app.js"></script>

  <title>SignIn</title>
  <style type="text/css">
    .container {
      padding: 2em;
      font-family: 'Montserrat', serif;
    }

    .head-txt {
      padding-top: 50px;
      font-size: 5vw;
    }

    .btn {
      border-radius: 0;
      outline: none;
    }
    h4{
      text-align: center;
    }
    .btn-primary {
      background: #344A84;
      outline: none;
    }
  </style>
</head>

<body>
  <header class="text-center mt-2">
    <h1 class="head-txt">Net Worth Calculator</h1>
    <h3 class="wl-note lead mb-2">Welcome, <?php echo $user['Name']; ?></h3>
  </header>
  <div class="container">
  <h4>Frequently Asked Questions</h4>
    <h4>click on each of the links below to show description.</h4>
        <div id="accordion">
        <div class="card">
            <div class="card-header">
                <a class="card-link" data-toggle="collapse" href="#collapseOne">Land Properties</a>
            </div>
            <div id="collapseOne" class="collapse show" data-parent="#accordion">
                <div class="card-body">Land property or Land estate is a property that generates income for the owner, without the owner having to do the actual work of the estate.</div>
            </div>
        </div>
    <div class="card">
            <div class="card-header">
                <a class="card-link" data-toggle="collapse" href="#collapseTwo">Expenses</a>
            </div>
            <div id="collapseTwo" class="collapse show" data-parent="#accordion">
                <div class="card-body">Expenses are the money spent or cost incurred in purchasing something.</div>
            </div>
        </div>
    <div class="card">
            <div class="card-header">
                <a class="card-link" data-toggle="collapse" href="#collapseThree">Furnitures</a>
            </div>
            <div id="collapseThree" class="collapse show" data-parent="#accordion">
                <div class="card-body">The movable objects intended to support human activites such as Tables(for eating), Bed(for sleeping).</div>
            </div>
        </div>
    <div class="card">
            <div class="card-header">
                <a class="card-link" data-toggle="collapse" href="#collapseFour">Personal Loan</a>
            </div>
            <div id="collapseFour" class="collapse show" data-parent="#accordion">
                <div class="card-body">A loan that establishes consumer credit that is granted for personal use; this is given out with the aim of being repayed.</div>
            </div>
        </div>
    <div class="card">
            <div class="card-header">
                <a class="card-link" data-toggle="collapse" href="#collapseFive">Vehicles</a>
            </div>
            <div id="collapseFive" class="collapse show" data-parent="#accordion">
                <div class="card-body">A thing used for transportation.</div>
            </div>
        </div>
    <div class="card">
            <div class="card-header">
                <a class="card-link" data-toggle="collapse" href="#collapseSix">Tax Payable</a>
            </div>
            <div id="collapseSix" class="collapse show" data-parent="#accordion">
                <div class="card-body">This is the compiled taxes due to the government within one year.</div>
            </div>
        </div>
    <div class="card">
            <div class="card-header">
                <a class="card-link" data-toggle="collapse" href="#collapseSeven">Royalty Payments</a>
            </div>
            <div id="collapseSeven" class="collapse show" data-parent="#accordion">
                <div class="card-body">A royalty is a payment made by one person/party to another person/party that owns a particular asset, for the right to ongoing use of that asset.</div>
            </div>
        </div>
<div class="card">
        <div class="card-header">
            <a class="card-link" data-toggle="collapse" href="#collapseEight">Rent/Lease Payment</a>
        </div>
        <div id="collapseEight" class="collapse show" data-parent="#accordion">
            <div class="card-body">This is a tenant's regular payment to a landlord for the use of land or property for a specified time.</div>
        </div>
    </div>
        </div>
    <div class="alert alert-primary" role="alert">
      <span>All input fields must be filled, to get an accurate calculation! <br>
      <b>Insert Zero(0), if the input field has to be empty!</b> </span>
    </div>
    <div class="row net-dis1">
      <div class="col-sm">
        <h3 class="lead text-center">Your Assets(what you own)</h3>
        <form class="form-box net-display text-center">
          <div class="form-group">
            <label class="col-xs sr-only">-Land Properties</label>
            <input class="col-xs form-control" id="land" type="number" onchange="add()" placeholder="Land Properties" required>
          </div>
          <div class="form-group">
            <label class="col-xs sr-only">-Funitures</label>
            <input class="col-xs form-control" id="furniture" type="number" onchange="add()" placeholder="Funitures" required>
          </div>
          <div class="form-group">
            <label class="col-xs  sr-only">-Vehicles</label>
            <input class="col-xs form-control" id="vehicles" type="number" onchange="add()" placeholder="Vehicles" required>
          </div>
          <div class="form-group">
            <label class="col-xs sr-only">-Royalty Payments</label>
            <input class="col-xs form-control" id="royalty" type="number" onchange="add()" placeholder="Royalty Payments" required>
          </div>
          <div class="form-group">
            <label class="col-xs sr-only">Add other Assets</label>
            <input class="col-xs form-control" id="others" type="number" onchange="add()" placeholder="Add other Assets" required>
          </div>
          <input class="calc-btn btn btn-primary" type="reset" value="Reset Assets">
          <div class="form-group mt-4">
            <label class="col-xs sr-only">Total Assests:</label>
            <input class="col-xs form-control" id="total" type="number" onchange="add()" placeholder="Total Assests" disabled><br>
          </div>
        </form>
      </div>
      <div class="col-sm">
        <h3 class="h2-back lead text-center">Your Liabilities(what you owe)</h3>
        <form action="" class="form-box net-display text-center">
          <div class="form-group">
            <label class="col-xs sr-only">-Expenses</label>
            <input class="col-xs form-control" id="expenses" type="number" onchange="addLiabilities()" placeholder="Expenses">
          </div>
          <div class="form-group">
            <label class="col-xs sr-only">-Personal loan</label>
            <input class="col-xs form-control" id="loan" type="number" onchange="addLiabilities()" placeholder="Personal loan">
          </div>
          <div class="form-group">
            <label class="col-xs sr-only">-Tax payable</label>
            <input class="col-xs form-control" id="tax" type="number" onchange="addLiabilities()" placeholder="Tax payable">
          </div>
          <div class="form-group">
            <label class="col-xs sr-only">-Rent/Lease Payment</label>
            <input class="col-xs form-control" id="rent" type="number" onchange="addLiabilities()" placeholder="Rent/Lease Payment">
          </div>
          <div class="form-group">
            <label class="col-xs sr-only">Add other liabilities</label>
            <input class="col-xs form-control" id="other" type="number" onchange="addLiabilities()" placeholder="Add other liabilities">
          </div>
          <input class="calc-btn btn btn-primary" type="reset" value="Reset Liabilities">
          <div class="form-group mt-4">
            <label class="col-xs sr-only">Total Liabilities:</label>
            <input class="col-xs form-control" id="total-liabilities" type="number" onchange="addLiabilities()" placeholder="Total Liabilities" disabled>
          </div>
        </form>

      </div>

    </div>
    <div class="calc-back text-center">
      <button class="calc-button btn btn-primary" onclick="calc()">Calculate</button>
      <div class="output-result mt-2 mb-2">
        <p class="lead mb-2">Total Networth:</p>
        <input class="col-xs form-control" id="net" type="number" onchange="add()" placeholder="Total Networth" disabled><br>
      </div>
    </div>

    <?php

    /* Logout button */
    if (isset($_POST['logout'])) {
      session_destroy();
      session_unset();

      /* Redirect to login page */
      header('location: index.php');
    }

    ?>
    <div class="logout">
      <form action="home.php" method="post">
        <button style="width: 100%" type="submit" class="btn-sign-in" name="logout">Logout</button>
      </form>
    </div>
  </div>


  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>