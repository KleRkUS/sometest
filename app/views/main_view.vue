<form id="form">
	<label for="text">Введите искомый E-mail: </label>
	<input type="text" name="text" id="text" placeholder="E-mail">
	<div id="result"><pre>{{data}}</pre></div>
</form>


<script>
	
	var app = new Vue({
	el: "#form",
		data : {
			data: ""
		}
	})

	text.oninput = function() {
		app.data = getData(this);
	}

	function getData(e) {
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				if (this.responseText == 0) {
					result.style.color = "red";
					app.data = "Записей для "+e.value+" не найдено";
				} else {
					result.style.color = "green";
					app.data = this.responseText;
				}
 			}
		}
		xmlhttp.open("POST", '/main/getrow?email='+e.value, true);
		xmlhttp.send();
	}
</script>