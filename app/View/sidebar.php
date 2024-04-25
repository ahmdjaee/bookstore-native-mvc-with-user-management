<link rel="stylesheet" href="style/sidebar.css">

<div id="mySidebar" class="sidebar d-flex flex-column bg--primary shadow">
    <div>
        <a href="javascript:void(0)" id="sidebarAction"><i class="fa-solid fa-bars"></i></a>
        <a class="d-flex gap-3 align-items-center link--hover" style="padding-inline: 24px;" href="/">
            <img src="https://img.freepik.com/free-vector/gradient-bookstore-logo_23-2149332421.jpg" class="rounded-circle" height="40" width="40" alt="">
            <h4 class=" p-0 m-0 co--white ">Book Store</h4>
        </a>
    </div>
    <a href="/dashboard" <?= $_SERVER['REQUEST_URI'] == '/dashboard' ? 'class="activeLink"' : '' ?>><i class="fa-solid fa-home "></i><span class="fs-6" id="sidebarItem">Dashboard</span></a>
    <a href="/authors" <?= $_SERVER['REQUEST_URI'] == '/authors' ? 'class="activeLink"' : '' ?>><i class="fa-solid fa-user "></i><span class="fs-6" id="sidebarItem">Author</span></a>
    <a href="/books" <?= $_SERVER['REQUEST_URI'] == '/books' ? 'class="activeLink"' : '' ?>><i class="fa-solid fa-book"></i><span class="fs-6" id="sidebarItem">Books</span></a>
    <a href="#"><i class="fa-solid fa-address-book  "></i><span class="fs-6" id="sidebarItem">Contact</span></a>
    <a href="/users/logout"><i class="fa-solid fa-right-from-bracket"></i><span class="fs-6" id="sidebarItem">Logout</span></a>
</div>

<script>
    let isClose = false;

    document.getElementById("sidebarAction").addEventListener("click", () => {
        isClose = !isClose;
        if (!isClose) {
            document.getElementById("mySidebar").style.width = "250px";
            document.getElementById("container").style.marginLeft = "250px";
            const sidebarItem = document.querySelectorAll("#sidebarItem");
            sidebarItem.forEach((item) => {
                item.style.display = "flex";
            })
        } else {
            document.getElementById("mySidebar").style.width = "85px";
            document.getElementById("container").style.marginLeft = "85px";
            const sidebarItem = document.querySelectorAll("#sidebarItem");
            sidebarItem.forEach((item) => {
                item.style.display = "none";
            })
        }
    })
</script>