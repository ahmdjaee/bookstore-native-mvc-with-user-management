<div id="mySidebar" class="sidebar bg--primary shadow">
    <div class="d-flex gap-3 align-items-center p-3">
        <img src="https://static.vecteezy.com/system/resources/previews/015/693/299/non_2x/book-store-logo-for-business-symbol-vector.jpg" class="rounded-circle img-fluid w-25" alt="">
        <h4 class="link--hover p-0 m-0 co--white ">Book Store</h4>
    </div>
    <a href="javascript:void(0)" id="sidebarAction"><i class="fa-solid fa-bars"></i></a>
    <a href="/" <?= $_SERVER['REQUEST_URI'] == '/' ? 'class="activeLink"' : '' ?>><i class="fa-solid fa-home "></i><span id="sidebarItem">Dashboard</span></a>
    <a href="/authors" <?= $_SERVER['REQUEST_URI'] == '/authors' ? 'class="activeLink"' : '' ?>><i class="fa-solid fa-user "></i><span id="sidebarItem">Author</span></a>
    <a href="/books" <?= $_SERVER['REQUEST_URI'] == '/books' ? 'class="activeLink"' : '' ?>><i class="fa-solid fa-book"></i><span id="sidebarItem">Books</span></a>
    <a href="#"><i class="fa-solid fa-address-book  "></i><span id="sidebarItem">Contact</span></a>
    <a href="#"><i class="fa-solid fa-right-from-bracket"></i><span id="sidebarItem">Logout</span></a>

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
                item.style.display = "inline-block";
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