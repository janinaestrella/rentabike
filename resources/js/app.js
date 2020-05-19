require('./bootstrap');

let addToCartBtns = document.querySelectorAll('.request-count');

// console.log(addToCartBtns);
addToCartBtns.forEach( function(addToCartBtn) {
	addToCartBtn.addEventListener('click', function() {
		// console.log(this); //para view ung laman ng buttons
		console.log(this.dataset.id); //para makuha ung data-id sa add to cart button
		let id = this.dataset.id;

		let csrfToken = document.querySelector('meta[name="csrf-token').getAttribute('content');

		let url = "/api/bikerequests/update-count";
		fetch(url, {
			method: 'PUT',
			headers: {
				"Accept" : "application/json",
				"X-CSRF-TOKEN" :  csrfToken
			},
			body: JSON.stringify({
				id : id //:id is from let id above (bike id)
			})

		})
		.then( response => {
			return response.json()

		})
		.then( data => {
			console.log(data)
			document.querySelector('#cart-count').innerHTML = data.message;
		})
	})

});