const vietNamCity = ["Ho Chi Minh", "Ha Noi", "Da Nang", "Hai Phong"]
const usaCity = ["Seattle", "New York", "California", "Massachusetts"]
const japanCity = ["Tokyo", "Kyoto", "Osaka", "Sapporo"]
const koreaCity = ["Seoul", "Busan", "Daegu", "Jeju"]

const countrySelection = document.querySelector('select[name="country"]')
const citySelection = document.querySelector('select[name="city"]')

countrySelection.addEventListener('change', (e) => {
    const countryCode = e.target.value;
    if (countryCode == 'Viet Nam') {
        while (citySelection.firstChild) {
            citySelection.removeChild(citySelection.lastChild)
        }

        const opt = document.createElement('option')
        opt.value = 'none'
        opt.innerHTML = "-- Choose the city -- "
        citySelection.appendChild(opt);

        for (let city of vietNamCity) {
            const opt = document.createElement('option')
            opt.value = city
            opt.innerHTML = city
            citySelection.appendChild(opt);
        }
    }
    else if (countryCode == 'USA') {
        while (citySelection.firstChild) {
            citySelection.removeChild(citySelection.lastChild)
        }

        const opt = document.createElement('option')
        opt.value = 'none'
        opt.innerHTML = "-- Choose the city -- "
        citySelection.appendChild(opt);

        for (let city of usaCity) {
            const opt = document.createElement('option')
            opt.value = city
            opt.innerHTML = city
            citySelection.appendChild(opt);
        }
    }
    else if (countryCode == 'Japan') {
        while (citySelection.firstChild) {
            citySelection.removeChild(citySelection.lastChild)
        }

        const opt = document.createElement('option')
        opt.value = 'none'
        opt.innerHTML = "-- Choose the city -- "
        citySelection.appendChild(opt);

        for (let city of japanCity) {
            const opt = document.createElement('option')
            opt.value = city
            opt.innerHTML = city
            citySelection.appendChild(opt);
        }
    }
    else if (countryCode == 'Korea') {
        while (citySelection.firstChild) {
            citySelection.removeChild(citySelection.lastChild)
        }

        const opt = document.createElement('option')
        opt.value = 'none'
        opt.innerHTML = "-- Choose the city -- "
        citySelection.appendChild(opt);

        for (let city of koreaCity) {
            const opt = document.createElement('option')
            opt.value = city
            opt.innerHTML = city
            citySelection.appendChild(opt);
        }
    }
})





