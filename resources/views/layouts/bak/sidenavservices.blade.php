{{-- <div id="sidebar" class="sidebar float-left">
    <div class="text-center">
        <img src="https//via.placeholder.com/100" alt="">
    </div>
    <div class="items-container">
        <a href="">
        <h6 class="menu-item"></h6> <i class="fa fa-tachometer-alt"></i>Dashboard</h6>
    </a>
        <a href="/">
            <h6 class="menu-item"></h6> <i class="fa fa-tachometer-alt"></i>users</h6>
        </a>

    </div>


</div> --}}

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: "Lato", sans-serif;
}

.sidebar {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidebar a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidebar a:hover {
  color: #f1f1f1;
}

.sidebar .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

.openbtn {
  font-size: 20px;
  cursor: pointer;
  background-color: #111;
  color: white;
  padding: 10px 15px;
  border: none;
  margin-top: 100px;
}

.openbtn:hover {
  background-color: #444;
}

#main {
  transition: margin-left .5s;
  padding: 16px;
}

/* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
@media screen and (max-height: 450px) {
  .sidebar {padding-top: 15px;}
  .sidebar a {font-size: 18px;}
}
</style>
</head>
<body>

<div id="mySidebar" class="sidebar">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>

  <a href="{{ route('home') }}"> <h1> Dashboard</h1></a>

  <div>
    <a class=" btn-primary dropdown-toggle" data-toggle="collapse" data-target="#charter">Citizens Charter</a>

    <div id="charter" class="collapse" >
      <a href="#">**View List</a>
      <a href="{{ route('services.create') }}"><h6>Create Citizens' Charter</h6></a>
      <a href="{{ route('analysis.index') }}"><h6>Create Chem-Micro(RSTL Only)</h6></a>
      <a href="{{ route('chemmicro.sched.index') }}"><h6>Create Chem-Micro Schedule(RSTL Only)</h6></a>
    </div>
  </div>
  <br>
  <br>
<div>
  <a class=" btn-primary dropdown-toggle" data-toggle="collapse" data-target="#library">Library</a>

  <div id="library" class="collapse" >
    <a href="#">**Users</a>
    <a href="{{ route('divisions.index') }}"><h6>Division</h6></a>
    <a href="{{ route('units.index') }}"><h6>Unit</h6></a>
  </div>
</div>
<br>
<br>
<div>
  <a class="btn-primary dropdown-toggle" data-toggle="collapse" data-target="#conf">System</a>

  <div id="conf" class="collapse">
    <a href="{{ route('settings.index') }}"><h6>Configuration</h6></a>
  </div>
</div>
<br>
<br>
<div>
    <a class=" btn-primary dropdown-toggle" data-toggle="collapse" data-target="#profile">Profile</a>

    <div id="profile" class="collapse" >
      <a href="#">**View/Update</a>
      <a href="{{ route('register') }}"><h6>Register User</h6></a>
      <a href="#">**Logout</a>
    </div>
  </div>



</div>

<div id="main">
  <button class="openbtn" onclick="openNav()">>>> </button>
</div>

<script>
function openNav() {
  document.getElementById("mySidebar").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
  document.getElementById("mySidebar").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
}
</script>

</body>
</html>
