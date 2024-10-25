<style>
.raj_textile{
  text-decoration-line: overline;
  text-decoration-color: black;
  text-color:black;
}
</style>
<?php
  if(isset($_SESSION["role"]))
  {
    if($_SESSION["role"]>=1)
  {
?>

<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">CHALAN</a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="new_chalan.php">New Chalan</a></li>
                <li><a class="dropdown-item" href="view_chalan.php">View Chalan</a></li>
                <li><a class="dropdown-item" href="search_chalan.php">Search Bill/Chalan</a></li>
                <!-- <li><a class="dropdown-item" href="viewstudentdoc.php">View student</a></li> -->
            </ul>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">FIRM</a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="add_firm.php">Add Firm</a></li>
                <li><a class="dropdown-item" href="view_firm.php">View Firm</a></li>
            </ul>
        </li>
      <?php } 
      if($_SESSION["role"]==2)
      {
        ?>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">PAYMENT</a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="payment_list.php">All Payment List</a></li>
                <li><a class="dropdown-item" href="payment_pending.php">Pending Paymnet</a></li>
                <li><a class="dropdown-item" href="payment_received.php">Received Paymnet</a></li>
                <li><a class="dropdown-item" href="payment_each_firm.php">Total Pending Payment form each Firm</a></li>
            </ul>
        </li>
        <?php }?>
        
        
      </ul>
      <span class="mx-auto">
        <h1><a href="https://rajtextile.netlify.app" class="raj_textile">RAJ TEXTILE</a></h1>
      </span>
      <a href="logout.php"><button class="btn btn-outline-danger">Log out</button></a>
    </div>
  </div>
</nav>

<?php
  }
?>