<div id="mySidebar" class="sidebar bg-primary shadow">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">x</i></i></a>
    <a href="#"><i class="fa-solid fa-eject me-3"></i>About</a>
    <a href="#"><i class="fa-solid fa-eject me-3"></i>Services</a>
    <a href="#"><i class="fa-solid fa-taxi  me-3"></i>Clients</a>
    <a href="#"><i class="fa-solid fa-address-book  me-3"></i>Contact</a>
</div>

<script>
    function openNav() {
        document.getElementById("mySidebar").style.width = "250px";
        document.getElementById("container").style.marginLeft = "250px";
        document.getElementById("sideBarButton").style.display = "none";

    }

    function closeNav() {
        document.getElementById("mySidebar").style.width = "0";
        document.getElementById("container").style.marginLeft = "0";
        document.getElementById("sideBarButton").style.display = "block";

    }
</script>

<nav class="navbar navbar-expand-lg pt-3 pb-3 bg-white shadow-sm">
    <div class="container">

        <button id="sideBarButton" class="btn btn-primary me-3" style="display: none;" onclick="openNav()"><i class="fa-solid fa-bars" style="color: white;"></i></button>

        <a class="navbar-brand" style="color: #0d6efd;" href="#"><b>CRUD MVC</b></a>
        <div class="collapse navbar-collapse justify-content-end " id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" style="color: #0d6efd;" href="/">Book List</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="add-book" style="color: #0d6efd;">Add Book</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" style="color: #0d6efd;">Author</a>
                </li>
                <li class="nav-item d-flex align-items-center">
                    <form method="get" action="add-book" style="display:inline;">
                        <button type="submit" class="btn btn-danger"><b>Logout</b></button>
                    </form>
                </li>
            </ul>
        </div>
    </div>

</nav>