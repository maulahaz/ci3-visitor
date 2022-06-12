<script>
	// alert(1);
	const BASE_URL = "<?= base_url() ?>";
	var myTable = document.getElementById("dtbl_visitors");
	var visitorUrl = BASE_URL+"welcome/getDataVisitor";
	var delay = 1000;

	//== Table ======================================================================
	function getVisitorData() {
		// alert('getVisitorData');
		fetch(visitorUrl, {method:"GET"})
		.then(response => {
			// if (res.ok) {
			//     return res.json();
			// }
			// return Promise.reject(res);
			// throw new Error('Something went wrong');
			if (response.status === 404) throw new Error('Error 404, Page not found');
			return response.text();
		})
		.then((response) => {
			const objData = JSON.parse(response);
			// console.log(objData);
			let output = '';
			var no = 1;
			if(objData.length > 0){
				for(let row of objData){
					var stts = (row.log_type == 'punch_in') ? '<span class="badge bg-primary">IN</span>' : '<span class="badge bg-secondary">OUT</span>' ;
					output += `
						<tr>
							<td>${no++}</td>
							<td>${row.fullname}</td>
							<td class="text-center">${stts}</td>                      
							<td>${row.log_at}</td>                                           
							<td>${row.description}</td>
						</tr>
					`;
				}
			}else{
				output += `
					<tr>
						<td colspan="5" class="text-center">Data not available</td>
					</tr>
				`;
			}

			myTable.innerHTML = output;
		})
		.catch(e => {
			console.log(e.message);
		});
	}

	getVisitorData();

	//== POSTING NEW Visitor ======================================================================
	let timeout = null;
	let txtBarcode = document.querySelector('#user_barcode');
	let txtDeviceId = document.querySelector('#device_id');
	let msgbox = document.querySelector('.msgbox');
	txtBarcode.addEventListener('keyup', function (e) {
		// console.log('Value:', this.value);

		if(this.value.length < 10 || this.value.length >20){
			return false;
		}

		clearTimeout(timeout);

		timeout = setTimeout(function () {
			var targetUrl = BASE_URL+"welcome/savepunch";
			var postData = {user_barcode : txtBarcode.value, device_id : txtDeviceId.value};
			var xhr = new XMLHttpRequest();
			xhr.open("POST", targetUrl);
			xhr.setRequestHeader('Content-type', 'application/json');
			//--with token: xhr.setRequestHeader('trongatetoken', token);
			xhr.send(JSON.stringify(postData));
			xhr.onload = function() {
				// console.log(xhr.status);
				// console.log(xhr.responseText);
				var resData = JSON.parse(this.responseText);
				txtBarcode.value = "";
				if(resData.isSuccess){
					msgbox.style.cssText += 'display:block; color: blue';
				}else{
					msgbox.style.cssText += 'display:block; color: red';
				}
				msgbox.innerHTML = resData.msg;

				//--Fade-out Alert:
				var s = msgbox.style;
				s.opacity = 1;
				(function fade(){(s.opacity-=.1) < 0 ? s.display="none" : setTimeout(fade, 500)})();
				
				getVisitorData();
			}
		}, delay);
	});

	
</script>