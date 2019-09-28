// alert('How far');

function calc() {
	// body...
	let asset = parseInt(document.getElementById('assets').value);
	let cash = parseInt(document.getElementById('cash').value);
	let liability = parseInt(document.getElementById('liability').value);
	let result;

	
	if (result = asset + cash - liability) {
		// result = parseInt(currency);
		let toCurrency = new Intl.NumberFormat('en-NG', { style: 'currency', currency: 'NGN' }).format(result);
		document.querySelector('#result').innerHTML = toCurrency;
	}
}
