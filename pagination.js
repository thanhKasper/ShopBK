function fetchProductOnPage(res) {
    const parent = document.querySelector(".row.mb-3")

    for (let product of res) {
        const div1 = document.createElement("div")
        div1.className = "col-sm-12 col-lg-6"
        parent.append(div1)

        const div2 = document.createElement("div")
        div2.className = "card mb-4"
        div1.append(div2)

        const div3 = document.createElement("div")
        div3.className = "row"
        div2.append(div3)

        const imgContainer = document.createElement("div")
        imgContainer.className = "col-lg-4 d-flex align-items-center justify-content-center"
        div3.append(imgContainer)

        const img = document.createElement("img")
        img.setAttribute("src", "https://placehold.co/600x400")
        img.setAttribute("alt", "product")
        img.className = "img-fluid"
        imgContainer.append(img)

        const contentContainer = document.createElement("div")
        contentContainer.className = "col-lg-8"
        div3.appendChild(contentContainer)

        const card = document.createElement("div")
        card.className = "card-body"
        contentContainer.appendChild(card)

        // The content of the card
        const h5 = document.createElement("h5")
        h5.className = "card-title fs-4"
        h5.innerHTML = product.product_name
        card.append(h5)

        const h6 = document.createElement("h6")
        h6.className = "card-subtitle"
        h6.innerHTML = product.rating + " ⭐"
        card.append(h6)

        //<p class="card-text mt-1 mb-1 fw-bold">Price: <?php echo $row['price'] ?>vnd</p>
        const p1 = document.createElement("p")
        p1.className = "card-text mt-1 mb-1 fw-bold"
        p1.innerHTML = product.price + " vnđ"
        card.append(p1)

        //<p class="card-text product-description"><?php echo $row["description"] ?></p>
        const p2 = document.createElement("p")
        p2.className = "card-text product-description"
        p2.innerHTML = product.description
        card.append(p2)
        //<a href="#" class="btn btn-primary">More Detail</a>
        const link = document.createElement("a")
        link.className = "btn btn-primary"
        link.innerHTML = "More Detail"
        card.append(link)
    }
}

// Pagination when there is no search query
$(document).ready(function () {
    let currentPage = 1;

    let productNum;
    // One page will have 6 products
    const PRODUCT_PER_PAGE = 6;
    let NUMBER_OF_PAGE;


    /*
    action = 1: get the number of pages
    action = 2: get the limited number of products
     */


    const xhttp = new XMLHttpRequest()
    xhttp.open("GET", "./controller/paginationController.php?action=1")
    xhttp.send()
    xhttp.onload = function () {
        productNum = parseInt(this.responseText)
        NUMBER_OF_PAGE = Math.ceil(productNum / PRODUCT_PER_PAGE)
        $(".pagination").ready(function () {
            // Create previous link
            const prevPage = document.createElement('li')
            $(prevPage).addClass("page-item")
            $(prevPage).addClass("z-0")

            const linkPage = document.createElement("p")
            $(linkPage).text("Previous")
            $(linkPage).css(
                {
                    "cursor": "default",
                    "user-select": "none"
                }
            )
            $(linkPage).addClass('page-link')
            $(linkPage).addClass('z-0')
            $(prevPage).append(linkPage)
            $(".pagination").append(prevPage)

            // Create number link
            for (let i = 1; i <= NUMBER_OF_PAGE; ++i) {
                const page = document.createElement('li')
                $(page).addClass("page-item")
                $(page).addClass("z-0")

                const numPage = document.createElement("p")
                $(numPage).text(i)
                $(numPage).css("cursor", "default")
                $(numPage).addClass('page-link')
                $(numPage).addClass('z-0')
                $(page).append(numPage)
                $(".pagination").append(page)
            }

            // Create Next link
            const nextPage = document.createElement('li')
            $(nextPage).addClass("page-item")

            const lastPage = document.createElement("p")
            $(lastPage).text("Next")
            $(lastPage).css(
                {
                    "cursor": "default",
                    "user-select": "none"
                }
            )
            $(lastPage).addClass('page-link')
            $(nextPage).append(lastPage)
            $(".pagination").append(nextPage)

            // On first load set the first page active
            // Put in here because of asynchronous
            $(".page-link").eq(currentPage).addClass("active")
            $(".page-link").eq(currentPage).addClass("z-0")
            // Load the database on first come to page
            $.get("./controller/paginationController.php?action=2&page=1", function (data, status) {
                const res = JSON.parse(data).list
                const h1 = document.querySelector("h1")
                h1 != null && h1.remove()
                fetchProductOnPage(res)
            })
        })
    }



    // Set active of current page
    $(".pagination").click(function (e) {
        // Set active if user click the previous button
        $(".page-link").removeClass("active")
        if (e.target.innerHTML == "Previous") {
            if (currentPage != 1) --currentPage;
            $(".page-link").eq(currentPage).addClass("active")
            // Load the database with appropriate limit
            $.get(`./controller/paginationController.php?action=2&page=${currentPage}`, function (data, status) {
                const res = JSON.parse(data).list
                console.log(res)
                const h1 = document.querySelector("h1")
                h1 != null && h1.remove()
                const removeEle = document.querySelector(".row.mb-3")
                const parent = removeEle.parentElement;
                removeEle.remove()
                const newContainer = document.createElement('div')
                newContainer.className = "row mb-3"
                parent.append(newContainer)
                fetchProductOnPage(res)
            })
        }
        // Set active if user click the next button
        else if (e.target.innerHTML == "Next") {
            if (currentPage != NUMBER_OF_PAGE) ++currentPage;
            $(".page-link").eq(currentPage).addClass("active")
            // Load the database with appropriate limit
            $.get(`./controller/paginationController.php?action=2&page=${currentPage}`, function (data, status) {
                const res = JSON.parse(data).list
                console.log(res)
                const h1 = document.querySelector("h1")
                h1 != null && h1.remove()
                const removeEle = document.querySelector(".row.mb-3")
                const parent = removeEle.parentElement;
                removeEle.remove()
                const newContainer = document.createElement('div')
                newContainer.className = "row mb-3"
                parent.append(newContainer)
                fetchProductOnPage(res)
            })
        }
        else {
            $(e.target).addClass('active')
            currentPage = e.target.innerHTML
            // Load the database with appropriate limit
            $.get(`./controller/paginationController.php?action=2&page=${currentPage}`, function (data, status) {
                const res = JSON.parse(data).list
                console.log(res)
                const h1 = document.querySelector("h1")
                h1 != null && h1.remove()
                const removeEle = document.querySelector(".row.mb-3")
                const parent = removeEle.parentElement;
                removeEle.remove()
                const newContainer = document.createElement('div')
                newContainer.className = "row mb-3"
                parent.append(newContainer)
                fetchProductOnPage(res)
            })
        }

    })

})

