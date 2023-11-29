$(document).ready(function () {
    let currentPage = 1;

    const xhttp = new XMLHttpRequest()
    /*
    action = 1: get the number of products in the database
    */
    let productNum;
    // One page will have 6 products
    const PRODUCT_PER_PAGE = 6;
    let NUMBER_OF_PAGE;
    xhttp.open("GET", "./controller/paginationController.php?action=1")
    xhttp.send()
    xhttp.onload = function () {
        productNum = parseInt(this.responseText)
        NUMBER_OF_PAGE = Math.ceil(productNum / PRODUCT_PER_PAGE)
        $(".pagination").ready(function () {
            // Create previous link
            const prevPage = document.createElement('li')
            $(prevPage).addClass("page-item")
            
            const linkPage = document.createElement("p")
            $(linkPage).text("Previous")
            $(linkPage).css("cursor", "default")
            $(linkPage).addClass('page-link')
            $(prevPage).append(linkPage)
            $(".pagination").append(prevPage)
            
            // Create number link
            for (let i = 1; i <= NUMBER_OF_PAGE; ++i) {
                const page = document.createElement('li')
                $(page).addClass("page-item")
                
                const numPage = document.createElement("p")
                $(numPage).text(i)
                $(numPage).css("cursor", "default")
                $(numPage).addClass('page-link')
                $(page).append(numPage)
                $(".pagination").append(page)
            }
            
            // Create Next link
            const nextPage = document.createElement('li')
            $(nextPage).addClass("page-item")
            
            const lastPage = document.createElement("p")
            $(lastPage).text("Next")
            $(lastPage).css("cursor", "default")
            $(lastPage).addClass('page-link')
            $(nextPage).append(lastPage)
            $(".pagination").append(nextPage)
            
            // On first load set the first page active
            // Put in here because of asynchronous
            $(".page-link").eq(currentPage).addClass("active")
            // Load the database on first load
            
        })
    }

    
    
    // Set active of current page
    $(".pagination").click(function(e) {
        // Set active if user click the previous button
        $(".page-link").removeClass("active")
        if (e.target.innerHTML == "Previous") {
            if (currentPage != 1) --currentPage;
            $(".page-link").eq(currentPage).addClass("active")
            // Load the database with appropriate limit
        }
        // Set active if user click the next button
        else if (e.target.innerHTML == "Next") {
            if (currentPage != NUMBER_OF_PAGE) ++currentPage;
            $(".page-link").eq(currentPage).addClass("active")
            // Load the database with appropriate limit
        }
        else {
            $(e.target).addClass('active')
            currentPage = e.target.innerHTML
            // Load the database with appropriate limit
        }
        
    })

})

