function reloadTable() {
	$.ajax({
        url: "php/table.php",
        type: "GET",
        dataType: "json",
        success: function(datas){
			$("#table_user").empty();
			$("#table_feedback").empty();
			
			$("#table_user").append(
				`<tr>
					<th>id</th>
					<th>nickname</th>
					<th>email</th>
					<th>password</th>
					<th>admin</th>
				</tr`
			);

			$.each(datas.user, function(i, datas){
				var fila = `<tr>
								<th>${datas.id}</th>
								<th>${datas.nickname}</th>
								<th>${datas.email}</th>
								<th>${datas.password}</th>
								<th>${datas.admin}</th>
							</tr>`;

				$("#table_user").append(fila);
			});
			
			$("#table_feedback").append(
				`<tr>
					<th>id user</th>
					<th>message</th>
				</tr>`
			);

			$.each(datas.feedback, function(i, datas){
				var fila = `<tr>
								<th>${datas.id_user}</th>
								<th>${datas.message}</th>
							</tr>`;

				$("#table_feedback").append(fila);
			});
        },
        error: function(error){
          alert("error al cargar las tablas");
        }
	});
}

reloadTable();