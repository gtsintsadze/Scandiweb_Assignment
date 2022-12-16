class Product
{
    postData(data) {
        fetch('delete-products', {
            method: 'POST',
            headers: {
                'Accept': 'application/json, text/plain, */*',
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: JSON.stringify(data)
        }).then(function (response) {
            return response.json()
        }).
        then(function (response) {
            if (response) {
                const dataLength = Object.keys(data['skus']).length
                for (let i = 0; i < dataLength; i++) {
                    let id = data['skus'][i]
                    document.getElementById(id).remove()
                }
                window.location.reload();
            }
        });
    }

    delete() {
        const checkboxes = document.getElementsByClassName('delete-checkbox')
        const checkboxesLength = checkboxes.length

        let skus = []
        for (let i = 0; i < checkboxesLength; i++) {
            let checkbox = checkboxes[i]
            if (checkbox.checked) {
                skus.push(checkbox.value)
            }
        }
        this.postData({'skus': skus})
    }

    typeSwitch(productName) {
        let productNames = ['dvd', 'furniture', 'book']
        for (const productKey in productNames) {
            let element = document.getElementById(productNames[productKey])
            element.classList.remove('show')
        }

        let element = document.getElementById(productName)
        element.classList.add('show')
    }
}

